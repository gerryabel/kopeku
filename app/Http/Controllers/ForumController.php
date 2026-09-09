<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\ForumImage;
use App\Models\User;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $forums = Forum::with('images')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // biar query search tetap di pagination link

        return view('forum.index', compact('forums'));
    }

    public function show($slug)
    {
        $forum = Forum::where('slug', $slug)->firstOrFail();

        return view('forum.show', compact('forum'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048', // validasi gambar
        ]);

        $slug = Str::slug($request->title);

        // Pastikan slug unik
        $originalSlug = $slug;
        $count = 1;
        while (Forum::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Simpan forum
        $forum = Forum::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        // Simpan gambar-gambar jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('forum_images', 'public');

                ForumImage::create([
                    'forum_id' => $forum->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('forum.index')->with('success', 'Forum berhasil dibuat.');
    }

    public function edit(Forum $forum)
    {
        if (auth()->id() !== $forum->user_id) {
            abort(403);
        }

        return view('forum.edit', compact('forum')); // folder & file: resources/views/forum/edit.blade.php
    }

    public function update(Request $request, Forum $forum)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'delete_images.*' => 'integer|exists:forum_images,id'
        ]);

        // Update judul & konten
        $forum->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        // Hapus gambar yang dicentang
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ForumImage::where('forum_id', $forum->id)->find($imageId);
                if ($image) {
                    Storage::delete($image->image_path);
                    $image->delete();
                }
            }
        }

        // Simpan gambar baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('forum_images', 'public');
                ForumImage::create([
                    'forum_id' => $forum->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('forum.index', $forum)->with('success', 'Forum berhasil diperbarui.');
    }

    public function destroy(Forum $forum)
    {
        // Cek otorisasi user
        if (auth()->id() !== $forum->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus gambar terkait
        foreach ($forum->images as $image) {
            Storage::delete($image->image_path);
            $image->delete();
        }

        // Soft delete forum (jika menggunakan soft delete di model)
        $forum->delete();

        return redirect()->route('forum.index')->with('success', 'Forum berhasil dihapus.');
    }

    public function deleteImage($id)
    {
        $image = ForumImage::findOrFail($id);
        Storage::delete($image->image_path);
        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }

    public function forceDelete(Forum $forum)
    {
        // atau
        $forum->comments()->forceDelete(); // Jika ingin hapus permanen juga

        $forum->forceDelete(); // Hapus forum permanen

        return redirect()->route('forum.index')->with('success', 'Forum dan komentar terkait berhasil dihapus paksa.');
    }

    public function banUser($id)
    {
        $user = User::findOrFail($id);

        $user->banned = true;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil dibanned.');
    }
}
