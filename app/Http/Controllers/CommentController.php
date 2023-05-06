<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post, Request $request)
    {
        $request->validate([
            'comment' => 'string|',
        ]);
        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => $request->user()->id,
        ]);
        return redirect()->back()->with(['post' => $post]);
    }
    public function destory(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('massage', 'Comment Deleted Successfully');
    }
}
