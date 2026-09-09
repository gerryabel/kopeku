<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\ForumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Comment;

class ForumController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // ambil input pencarian

        $forums = Forum::with(['user', 'images'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        // supaya saat pindah halaman query search tetap dibawa
        $forums->appends(['search' => $search]);

        return view('admin.forum.index', compact('forums', 'search'));
    }

    public function show(Request $request, Forum $forum)
    {
        $search = $request->query('search');

        $comments = $forum->comments()
            ->with('user')
            ->when($search, function ($query, $search) {
                $query->where('content', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('admin.forum.show', compact('forum', 'comments', 'search'));
    }

    public function create()
    {
        return view('admin.forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;

        while (Forum::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $forum = Forum::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('forum_images', 'public');

                ForumImage::create([
                    'forum_id' => $forum->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.forum.index')->with('success', 'Forum berhasil dibuat.');
    }

    public function edit(Forum $forum)
    {
        // Cek apakah user admin (jika belum pakai middleware)
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.forum.edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
    {
        // Hanya admin
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update data forum (judul dan isi)
        $forum->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // 🔴 Hapus gambar yang dicentang
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ForumImage::find($imageId);
                if ($image && $image->forum_id === $forum->id) {
                    Storage::disk('public')->delete($image->image_path); // Hapus file
                    $image->delete(); // Hapus record
                }
            }
        }

        // 🟢 Tambahkan gambar baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('forum_images', 'public');

                ForumImage::create([
                    'forum_id' => $forum->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.forum.index', $forum)->with('success', 'Forum berhasil diperbarui');
    }

    public function storeComment(Request $request, Forum $forum)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $forum->comments()->create([
            'user_id' => auth()->id(),  // admin id
            'content' => $request->content,
        ]);

        return redirect()->route('admin.forum.show', $forum)
            ->with('comment_success', 'Komentar berhasil dikirim.');
    }

    public function updateComment(Request $request, Forum $forum, Comment $comment)
    {
        // Cek agar hanya admin pemilik komentar yang bisa update
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $comment->content = $request->comment;
        $comment->save();

        return redirect()->route('admin.forum.show', [
            'forum' => $forum,
            'search' => $request->search,
        ])->with('success', 'Komentar berhasil diperbarui.');
    }

    public function deleteComment(Forum $forum, Comment $comment)
    {
        if ($comment->user_id !== auth()->id()) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('admin.forum.show', $forum)
            ->with('success', 'Komentar berhasil dihapus.');
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();

        return redirect()->route('admin.forum.index')
            ->with('success', 'Forum berhasil dihapus.');
    }
}
