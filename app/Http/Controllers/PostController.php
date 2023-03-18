<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
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
        //dd($request->all());
        $request->validated();
        $post = new Post();
        $post->titel = $request->titel;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->imge = $request->file('imge')->store('public/imge');
        $post->slug = $request->slug = Str::lower(str_replace(' ', '-', $request->titel));
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->tags()->attach($request->tag_id);


        return redirect()->route('posts')->with('massage', 'Created Successfully');
    }

    public function edit(Post $post)
    {
        return View('post.edit', ['post' => $post]);
    }



    public function destory(Category $category)
    {
        $category->delete();
        return redirect()->route('posts')->with('massage', 'Deleted Successfully');
    }
}
