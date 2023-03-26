<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('welcome')->with(['categories' => $categories, 'posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create')->with(['categories' => $categories, 'tags' => $tags]);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::lower(str_replace(' ', '-', $request->titel));
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $request->file('image')->store('public/post_images') ?? null;
        $post = Post::create($data);
        $post->tags()->attach($request->tags);

        return redirect()->route('welcome', ['post' => $post])->with('massage', 'Created Successfully');
    }

    public function show(Post $post)
    {
        return view('post.show')->with(['post' => $post]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return View('post.edit')->with(['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('post.show', $post)->with('massage', 'Updated Successfully');
    }

    public function destory(Post $post)
    {
        $post->delete();
        return redirect()->route('welcome')->with('massage', 'Deleted Successfully');
    }
}
