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
        $request->validated();
        Post::create([
            'titel' => $request->titel,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'imge' => $request->file('imge')->store('public/post_imges'),
            'slug' => $request->slug = Str::lower(str_replace(' ', '-', $request->titel)),
            'tag_id' => $request->tag_id,
        ]);

        return redirect()->route('posts')->with('massage', 'Created Successfully');
    }

    public function edit(Post $post)
    {
        return View('post.edit', ['post' => $post]);
    }

    // public function update(UpdatePostRequest $request, Category $category)
    // {
    //     $data =  $request->validated();
    //     $category->update($data);
    //     return redirect()->route('categories', $category)->with('massage', 'Updated Successfully');
    // }


    public function destory(Category $category)
    {
        $category->delete();
        return redirect()->route('categories')->with('massage', 'Deleted Successfully');
    }
}
