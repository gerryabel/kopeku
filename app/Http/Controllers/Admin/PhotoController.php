<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', ''); // ambil input pencarian, default kosong

        $photos = Photo::when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10);

        // supaya saat pindah halaman query search tetap dibawa
        $photos->appends(['search' => $search]);

        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('filename')->store('photos', 'public');

        Photo::create([
            'title' => $validated['title'],
            'filename' => $path,
            'description' => $validated['description'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.photos.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'filename' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('filename')) {
            if ($photo->filename && \Storage::disk('public')->exists($photo->filename)) {
                \Storage::disk('public')->delete($photo->filename);
            }

            $path = $request->file('filename')->store('photos', 'public');
            $photo->filename = $path;
        }

        $photo->title = $validated['title'];
        $photo->description = $validated['description'];
        $photo->save();

        return redirect()->route('admin.photos.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Photo $photo)
    {
        if ($photo->filename && \Storage::disk('public')->exists($photo->filename)) {
            \Storage::disk('public')->delete($photo->filename);
        }

        $photo->delete();

        return redirect()->route('admin.photos.index')->with('success', 'Foto berhasil dihapus.');
    }
}
