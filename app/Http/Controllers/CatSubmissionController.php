<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatSubmission;
use App\Models\CatImage;
use App\Models\Adoption;
use App\Models\Address;
use App\Models\Breed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CatSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        $catStatus = $request->query('cat_status');
        $adoptionStatus = $request->query('adoption_status');

        $catSubmissionsQuery = $user->catSubmissions()->orderBy('created_at', 'desc');
        $adoptionSubmissionsQuery = $user->adoptions()->with('cat')->orderBy('created_at', 'desc');

        if ($catStatus) {
            $catSubmissionsQuery->where('status', $catStatus);
        }

        if ($adoptionStatus) {
            $adoptionSubmissionsQuery->where('status', $adoptionStatus);
        }

        $catSubmissions = $catSubmissionsQuery->get();
        $adoptionSubmissions = $adoptionSubmissionsQuery->get();

        return view('adoptions.catsubmission.index', compact('catSubmissions', 'adoptionSubmissions', 'catStatus', 'adoptionStatus'));
    }

    public function create()
    {
        $cats = \App\Models\Cat::all(); // kalau masih dipakai
        $breeds = \App\Models\Breed::all();
        $addresses = \App\Models\Address::all();

        return view('adoptions.catsubmission.create', compact('cats', 'breeds', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:male,female',
            'description' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'owner_contact' => 'required|string|max:255',
            'breed_id' => 'required|exists:breeds,id',
            'address_id' => 'required|exists:addresses,id',
            'images.*' => 'required|image|max:2048',
            'google_maps_link' => ['required', 'url'],
        ], [
            'images.*.required' => 'Mohon upload minimal satu gambar kucing.',
            'images.*.image' => 'File harus berupa gambar.',
            'images.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $catSubmission = CatSubmission::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'age' => $request->age,
            'breed_id' => $request->breed_id,
            'gender' => $request->gender,
            'description' => $request->description,
            'owner_name' => $request->owner_name,
            'owner_contact' => $request->owner_contact,
            'address_id' => $request->address_id,
            'status' => 'pending',
            'google_maps_link' => $request->google_maps_link,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('cat_submissions', 'public');

                CatImage::create([
                    'imageable_id' => $catSubmission->id,
                    'imageable_type' => CatSubmission::class,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('adoptions.index')->with('success', 'Pengajuan kucing berhasil dikirim. Tunggu konfirmasi dari admin.');
    }

    public function edit($id)
    {
        $submission = CatSubmission::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $breeds = Breed::all();
        $addresses = Address::all();

        return view('adoptions.catsubmission.edit', compact('submission', 'breeds', 'addresses'));
    }

    public function update(Request $request, $id)
    {
        $submission = CatSubmission::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:male,female',
            'description' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'owner_contact' => 'required|string|max:255',
            'breed_id' => 'required|exists:breeds,id',
            'address_id' => 'required|exists:addresses,id',
            'images.*' => 'nullable|image|max:2048',
            'google_maps_link' => ['required', 'url'],
        ]);

        // Update field-field utama
        $submission->update([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'age' => $request->age,
            'breed_id' => $request->breed_id,
            'gender' => $request->gender,
            'description' => $request->description,
            'owner_name' => $request->owner_name,
            'owner_contact' => $request->owner_contact,
            'address_id' => $request->address_id,
            'status' => 'pending',
            'google_maps_link' => $request->google_maps_link,
        ]);

        // ✅ Jika ada gambar baru di-upload, hapus gambar lama lalu simpan yang baru
        if ($request->hasFile('images')) {
            // 1. Hapus gambar lama
            foreach ($submission->images as $image) {
                if ($image->image_path && \Storage::disk('public')->exists($image->image_path)) {
                    \Storage::disk('public')->delete($image->image_path);
                }
                $image->delete(); // hapus record dari database
            }

            // 2. Simpan gambar baru
            foreach ($request->file('images') as $image) {
                $path = $image->store('cat_submissions', 'public');

                CatImage::create([
                    'imageable_id' => $submission->id,
                    'imageable_type' => CatSubmission::class,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('adoptions.catsubmission.index')
            ->with('success', 'Pengajuan kucing berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $submission = CatSubmission::findOrFail($id);

        // Hapus semua gambar terkait
        foreach ($submission->images as $image) {
            if (!empty($image->image_path) && Storage::exists($image->image_path)) {
                Storage::delete($image->image_path);
            }
            $image->delete();
        }

        $submission->delete();

        return redirect()->back()->with('success', 'Pengajuan dan gambar berhasil dihapus.');
    }

    public function show($type, $id)
    {
        if ($type === 'cat') {
            $submission = CatSubmission::with(['breed', 'address'])->findOrFail($id);
            $title = 'Detail Pengajuan Kucing';
        } elseif ($type === 'adoption') {
            $submission = Adoption::with('cat', 'applicant')->find($id);
            $title = 'Detail Pengajuan Adopsi';
        } else {
            abort(404);
        }

        return view('adoptions.catsubmission.show', compact('submission', 'type', 'title'));
    }
}
