<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Post $post, Request $request)
    {
        $request->validate([
            'comment' => 'string|alpha',
        ]);
        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => $request->user()->id,
        ]);
        return route('post.show', $post);
    }
}
