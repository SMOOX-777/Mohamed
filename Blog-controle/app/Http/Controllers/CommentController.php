<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required'
        ]);

        $post->comments()->create([
            'content' => $validated['content'],
            'user_id' => $request->user()->id
        ]);

        return back()->with('success', 'Comment added successfully');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully');
    }
}