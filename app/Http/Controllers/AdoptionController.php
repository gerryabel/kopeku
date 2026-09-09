<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Adoption;
use App\Models\Address;
use App\Models\Breed;
use App\Models\CatSubmission;
use App\Notifications\AdoptionStatusNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdoptionController extends Controller
{
    public function index(Request $request)
    {
        $query = Cat::with(['breed', 'address']); // Eager load relasi baru

        // Pencarian nama
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter status adopsi
        if ($request->filled('status')) {
            if ($request->status === 'tersedia') {
                $query->where('is_available_for_adoption', 1);
            } elseif ($request->status === 'tidak tersedia') {
                $query->where('is_available_for_adoption', 0);
            }
        }

        // Filter jenis kucing dari tabel breeds
        if ($request->filled('breed')) {
            $query->whereHas('breed', function ($q) use ($request) {
                $q->where('name', $request->breed);  // disamakan dengan nama breed yg dipilih
            });
        }

        // Filter gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // Filter umur
        if ($request->filled('age')) {
            $query->where('age', $request->age);
        }

        // Filter lokasi berdasarkan relasi address
        if ($request->filled('location')) {
            $query->whereHas('address', function ($q) use ($request) {
                $q->where('address', $request->location); // Sesuaikan dengan kolom yang digunakan
            });
        }

        $breeds = Breed::orderBy('name')->pluck('name');

        // Ambil daftar lokasi unik dari tabel addresses
        $locations = Address::select('address')->distinct()->pluck('address');

        $cats = $query->latest()->paginate(9)->appends($request->query());

        $adoptionStatus = [];
        $userCats = []; // kucing yang dimiliki user (dari cat_submissions)

        if (Auth::check()) {
            $userId = Auth::id();

            // Ambil cat_id yang sudah diajukan oleh user dengan status pending (sudah ada)
            $adoptionStatus = Adoption::where('applicant_id', $userId)
                ->where('status', 'pending')
                ->pluck('cat_id')
                ->toArray();

            // Ambil cat_id yang user punya (dari cat_submissions)
            $userCats = Cat::where('user_id', $userId)->pluck('id')->toArray();
        }

        return view('adoptions.index', compact('cats', 'adoptionStatus', 'locations', 'breeds', 'userCats'));
    }

    public function show(Cat $cat)
    {
        $hasApplied = false;
        $isUserCat = false;

        if (Auth::check()) {
            $userId = Auth::id();

            $hasApplied = Adoption::where('applicant_id', $userId)
                ->where('cat_id', $cat->id)
                ->where('status', 'pending')
                ->exists();

            $isUserCat = $cat->user_id === $userId;
        }

        return view('adoptions.show', compact('cat', 'hasApplied', 'isUserCat'));
    }

    public function create(Cat $cat)
    {
        return view('adoptions.create', compact('cat'));
    }

    public function store(Request $request, Cat $cat)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengajukan adopsi.');
        }

        $user = Auth::user();

        // Cek apakah user memiliki role 'member'
        if ($user->role !== 'member') {
            return redirect()->back()->with('error', 'Hanya pengguna yang dapat mengajukan adopsi.');
        }

        // Cek apakah kucing masih tersedia untuk diadopsi
        if (!$cat->is_available_for_adoption) {
            return redirect()->back()->with('error', 'Kucing ini sudah tidak tersedia untuk diadopsi.');
        }

        // Validasi input
        $validated = $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        // Cek apakah user sudah pernah mengajukan adopsi untuk kucing ini dengan status pending
        $alreadyRequested = Adoption::where('cat_id', $cat->id)
            ->where('applicant_id', $user->id)
            ->where('status', 'pending')
            ->exists();

        if ($alreadyRequested) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan adopsi untuk kucing ini. Mohon tunggu prosesnya.');
        }

        // Simpan pengajuan adopsi
        Adoption::create([
            'cat_id' => $cat->id,
            'applicant_id' => $user->id,
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('adoptions.index')
            ->with('success', 'Pengajuan adopsi berhasil dikirim! Mohon tunggu konfirmasi dari admin.');
    }

    public function edit(Adoption $adoption)
    {
        // Pastikan user adalah pemilik dan status masih pending
        if ($adoption->applicant_id !== Auth::id() || $adoption->status !== 'pending') {
            abort(403, 'Tidak diizinkan.');
        }

        return view('adoptions.edit', [
            'adoption' => $adoption,
            'cat' => $adoption->cat,
        ]);
    }

    public function update(Request $request, Adoption $adoption)
    {
        if ($adoption->applicant_id !== Auth::id() || $adoption->status !== 'pending') {
            abort(403, 'Tidak diizinkan.');
        }

        $request->validate([
            'message' => 'nullable|string|max:1000',
        ]);

        $adoption->update([
            'message' => $request->message,
        ]);

        return redirect()->route('adoptions.catsubmission.index')->with('success', 'Pengajuan adopsi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $adoption = Adoption::where('id', $id)
            ->where('status', 'pending') // hanya boleh hapus jika masih pending
            ->firstOrFail();

        $adoption->delete();

        return redirect()->back()->with('success', 'Pengajuan adopsi berhasil dihapus.');
    }

    public function notifications()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate(10);

        return view('adoptions.notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return back()->with('success', 'Notifikasi telah ditandai sudah dibaca.');
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back()->with('success', 'Semua notifikasi sudah ditandai sudah dibaca.');
    }

    public function approve(Adoption $adoption)
    {
        $adoption->status = 'approved';
        $adoption->save();

        // Kirim notifikasi ke user
        $adoption->applicant->notify(new AdoptionStatusNotification($adoption->cat, 'approved'));

        return redirect()->back()->with('success', 'Pengajuan disetujui dan notifikasi dikirim.');
    }

    public function reject(Adoption $adoption)
    {
        $adoption->status = 'rejected';
        $adoption->save();

        $adoption->applicant->notify(new AdoptionStatusNotification($adoption->cat, 'rejected'));

        return redirect()->back()->with('success', 'Pengajuan ditolak dan notifikasi dikirim.');
    }
}
