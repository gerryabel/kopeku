<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $photos = Photo::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(12);

        return view('photos.index', compact('photos', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        Photo::create([
            'filename' => $path,
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('photos.index')->with('success', 'Foto berhasil diupload!');
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);

        if (auth()->user()->id !== $photo->user_id && auth()->user()->role !== 'admin') {
            abort(403); // Forbidden
        }

        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        // Validasi input
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // tambahkan validasi foto
        ]);

        // Pastikan hanya owner atau admin yang bisa update
        if (auth()->id() !== $photo->user_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Jika ada file foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($photo->filename && \Storage::disk('public')->exists($photo->filename)) {
                \Storage::disk('public')->delete($photo->filename);
            }

            // Simpan foto baru
            $data['filename'] = $request->file('photo')->store('photos', 'public');
        }

        // Update data di database
        $photo->update($data);

        return redirect()->back()->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);

        if (auth()->user()->id !== $photo->user_id && auth()->user()->role !== 'admin') {
            abort(403);
        }

        if (Storage::exists('public/' . $photo->filename)) {
            Storage::delete('public/' . $photo->filename);
        }

        $photo->delete();

        return redirect()->route('photos.index')->with('success', 'Foto berhasil dihapus.');
    }
}
