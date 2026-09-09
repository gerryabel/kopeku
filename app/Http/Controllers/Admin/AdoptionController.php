<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Adoption;
use App\Models\CatSubmission;
use App\Notifications\AdoptionStatusNotification;
use App\Notifications\CatSubmissionStatusNotification;
use App\Notifications\CatHasBeenAdoptedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CatImage;

class AdoptionController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->get('active_tab', 'cat');

        // Ambil list breeds lengkap (id dan name) untuk dropdown
        $breeds = \App\Models\Breed::orderBy('name')->get();

        // Filter Daftar Kucing, dengan eager loading breed
        $cats = \App\Models\Cat::with('breed');

        if ($request->filled('search_cat')) {
            $cats->where('name', 'like', '%' . $request->search_cat . '%');
        }

        if ($request->filled('gender_cat')) {
            $cats->where('gender', $request->gender_cat);
        }

        if ($request->filled('breed_cat')) {
            $cats->where('breed_id', $request->breed_cat);
        }

        $cats = $cats->orderBy('created_at', 'desc')->get();

        // Filter Pengajuan Kucing, asumsi ada relasi breed dan user
        $catSubmissions = \App\Models\CatSubmission::with('breed');

        if ($request->filled('search_submission_cat')) {
            $catSubmissions->where('name', 'like', '%' . $request->search_submission_cat . '%');
        }

        if ($request->filled('search_submission_applicant')) {
            $catSubmissions->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search_submission_applicant . '%');
            });
        }

        if ($request->filled('gender_submission')) {
            $catSubmissions->where('gender', $request->gender_submission);
        }

        if ($request->filled('breed_cat')) {
            $catSubmissions->where('breed_id', $request->breed_cat);
        }

        if ($request->submission_date) {
            $catSubmissions->whereDate('created_at', $request->submission_date);
        }

        if ($request->filled('submission_status')) {
            $catSubmissions->where('status', $request->submission_status);
        }

        $catSubmissions = $catSubmissions->orderBy('created_at', 'desc')->get();

        // Filter Pengajuan Adopsi dengan eager loading relasi
        $adoptionSubmissions = \App\Models\Adoption::with(['user', 'images', 'cat.breed'])
            ->when($request->filled('search_adoption_cat'), function ($q) use ($request) {
                $q->whereHas('cat', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search_adoption_cat . '%');
                });
            })
            ->when($request->filled('search_adoption_applicant'), function ($q) use ($request) {
                $q->whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search_adoption_applicant . '%');
                });
            })
            ->when($request->filled('gender_adoption'), function ($q) use ($request) {
                $q->whereHas('cat', function ($catQuery) use ($request) {
                    $catQuery->where('gender', $request->gender_adoption);
                });
            })
            ->when($request->filled('breed_cat'), function ($q) use ($request) {
                $q->whereHas('cat', function ($catQuery) use ($request) {
                    $catQuery->where('breed_id', $request->breed_cat);
                });
            })
            ->when($request->filled('adoption_date'), function ($q) use ($request) {
                $q->whereDate('created_at', $request->adoption_date);
            })
            ->when($request->filled('adoption_status'), function ($q) use ($request) {
                $q->where('status', $request->adoption_status);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.adoptions.index', compact('cats', 'catSubmissions', 'adoptionSubmissions', 'breeds', 'activeTab'));
    }

    public function show(\App\Models\Cat $cat)
    {
        // Load relasi images dan user jika perlu
        $cat->load(['images', 'breed', 'address']);

        return view('admin.adoptions.cats.show', compact('cat'));
    }

    // Form buat data kucing baru
    public function createCat()
    {
        $breeds = \App\Models\Breed::all(); // untuk dropdown jenis kucing
        $addresses = \App\Models\Address::all(); // untuk dropdown alamat

        return view('admin.adoptions.cats.create', compact('breeds', 'addresses'));
    }

    public function storeCat(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'breed_id' => 'required|exists:breeds,id',
            'gender' => 'nullable|string|in:male,female',
            'description' => 'nullable|string',
            'owner_name' => 'nullable|string|max:255',
            'owner_contact' => 'nullable|string|max:255',
            'google_maps_link' => 'nullable|url|max:255',
            'address_id' => 'required|exists:addresses,id', // pakai foreign key
            'images.*' => 'nullable|image|max:2048',
        ]);

        $cat = \App\Models\Cat::create([
            'admin_id' => auth()->id(),
            'name' => $validated['name'],
            'age' => $validated['age'] ?? null,
            'breed_id' => $validated['breed_id'],
            'gender' => $validated['gender'] ?? null,
            'description' => $validated['description'] ?? null,
            'owner_name' => $validated['owner_name'] ?? null,
            'owner_contact' => $validated['owner_contact'] ?? null,
            'google_maps_link' => $validated['google_maps_link'] ?? null,
            'address_id' => $validated['address_id'],
            'is_available_for_adoption' => $request->has('is_available_for_adoption'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('cats', 'public');
                $cat->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.adoptions.index')->with('success', 'Data kucing berhasil ditambahkan.');
    }

    // Form edit kucing
    public function editCat(Cat $cat)
    {
        $breeds = \App\Models\Breed::all();
        $addresses = \App\Models\Address::all();

        return view('admin.adoptions.cats.edit', compact('cat', 'breeds', 'addresses'));
    }

    // Update data kucing
    public function updateCat(Request $request, Cat $cat)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0',
            'breed_id' => 'required|exists:breeds,id',
            'address_id' => 'required|exists:addresses,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'nullable|string|in:male,female',
            'description' => 'nullable|string',
            'owner_name' => 'required|string|max:255',
            'owner_contact' => 'required|string|max:255',
            'google_maps_link' => ['required', 'url'],
        ]);

        $validated['is_available_for_adoption'] = $request->has('is_available_for_adoption');
        $cat->update($validated);

        // Cek apakah ada file gambar baru di-upload
        if ($request->hasFile('images')) {
            // Hapus semua gambar lama
            foreach ($cat->images as $image) {
                Storage::delete('public/' . $image->image_path);
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $file) {
                $path = $file->store('cat_images', 'public');

                $cat->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.adoptions.index')->with('success', 'Data kucing berhasil diperbarui.');
    }

    // Hapus kucing
    public function destroyCat(Cat $cat)
    {
        $cat->delete();
        return redirect()->route('admin.adoptions.index')->with('success', 'Data kucing berhasil dihapus.');
    }

    // Approve pengajuan adopsi
    public function approve($id)
    {
        $adoption = Adoption::findOrFail($id);
        $cat = $adoption->cat;

        // Cek apakah kucing masih tersedia untuk adopsi
        if ($cat->is_available_for_adoption == 0) {
            return redirect()->back()->with('error', 'Kucing ini sudah tidak tersedia untuk diadopsi.');
        }

        // Approve pengajuan ini
        $adoption->status = 'approved';
        $adoption->save();

        // Tandai kucing tidak tersedia untuk adopsi
        $cat->is_available_for_adoption = 0;
        $cat->save();

        // Kirim notifikasi ke pemohon adopsi
        $adoption->applicant->notify(new AdoptionStatusNotification($cat, 'approved'));

        // Kirim notifikasi ke pemilik kucing jika ada user_id
        if ($cat->user_id) {
            $owner = \App\Models\User::find($cat->user_id);
            if ($owner) {
                $owner->notify(new CatHasBeenAdoptedNotification($cat, $adoption->applicant));
            }
        }

        return redirect()->back()->with('success', 'Pengajuan adopsi disetujui dan notifikasi dikirim.');
    }

    // Reject pengajuan adopsi
    public function reject(Request $request, $id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->status = 'rejected';
        $adoption->save();

        $reason = $request->input('reason');

        $adoption->user->notify(new AdoptionStatusNotification($adoption->cat, 'rejected', $reason));

        return redirect()->back()->with('status', 'Pengajuan adopsi telah ditolak.');
    }

    public function catSubmissionShow($id)
    {
        $submission = CatSubmission::with(['images', 'breed', 'address', 'user'])->findOrFail($id);

        return view('admin.adoptions.cat-submissions.show', [
            'submission' => $submission,
            'type' => 'cat',
            'title' => 'Detail Pengajuan Kucing',
        ]);
    }

    public function approveCatSubmission($id)
    {
        $submission = CatSubmission::findOrFail($id);

        if ($submission->status !== 'pending') {
            return back()->with('error', 'Pengajuan ini sudah diproses.');
        }

        // Buat cat baru dari submission
        $cat = Cat::create([
            'name' => $submission->name,
            'gender' => $submission->gender,
            'age' => $submission->age,
            'description' => $submission->description,
            'is_available_for_adoption' => true,
            'admin_id' => auth()->id(),
            'user_id' => $submission->user_id, // 🟢 Tambahkan baris ini
            'owner_name' => $submission->owner_name,
            'owner_contact' => $submission->owner_contact,
            'google_maps_link' => $submission->google_maps_link,
            'breed_id' => $submission->breed_id,
            'address_id' => $submission->address_id,
        ]);

        // Salin gambar dari submission ke cat baru
        foreach ($submission->images as $image) {
            $oldPath = $image->image_path;
            $newPath = null;

            if (\Storage::disk('public')->exists($oldPath)) {
                $fileContents = \Storage::disk('public')->get($oldPath);
                $fileName = basename($oldPath);
                $newPath = 'cats/' . uniqid() . '_' . $fileName;

                \Storage::disk('public')->put($newPath, $fileContents);
            }

            if ($newPath) {
                $cat->images()->create([
                    'image_path' => $newPath,
                ]);
            }
        }

        $submission->update(['status' => 'approved']);

        $user = $submission->applicant;
        $user->notify(new CatSubmissionStatusNotification($submission, 'approved'));

        return back()->with('success', 'Pengajuan disetujui, kucing ditambahkan.');
    }

    public function rejectCatSubmission(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        $submission = CatSubmission::findOrFail($id);

        if ($submission->status !== 'pending') {
            return back()->with('error', 'Pengajuan ini sudah diproses.');
        }

        $submission->update(['status' => 'rejected']);

        $user = $submission->applicant;
        $user->notify(new CatSubmissionStatusNotification($submission, 'rejected', $request->reason));

        return back()->with('success', 'Pengajuan ditolak dengan alasan dikirim.');
    }
}
