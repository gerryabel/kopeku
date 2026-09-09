<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $forum->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('comment'),
        ]);

        return redirect()->route('forum.show', $forum)->with('success', 'Komentar berhasil dikirim.');
    }

    public function update(Request $request, Comment $comment)
    {

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->content = $request->content;
        $comment->updated_at = now(); // pastikan ini berubah
        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil diperbarui.');
    }

    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
