<?php

namespace App\Http\Controllers;

use App\Events\RigesterUser;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;


class PostController extends Controller
{

    public function index(Post $post)
    {
        $categories = Category::all();
        $posts = Post::paginate(6);
        return view('welcome', compact('categories', 'posts'));
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
        $data['slug'] = Str::slug($request->titel);
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $request->file('image')->store('public/post_images') ?? null;
        $post = Post::create($data);
        $post->tags()->attach($request->tags);

        return redirect()->route('welcome', ['post' => $post])->with('massage', 'Created Successfully');
    }

    public function show(Post $post)
    {
        $comments = Comment::all();
        return view('post.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit(Post $post)
    {
        // $this->authorize('update', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return View('post.edit')->with(['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        //   $this->authorize('update', $post);
        $data = $request->validated();
        $data['image'] = $request->file('image')->store('public/post_images') ?? null;
        $post->update($data);
        return redirect()->route('post.show', $post)->with('massage', 'Updated Successfully');
    }

    public function destory(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('welcome')->with('massage', 'Deleted Successfully');
    }
}
