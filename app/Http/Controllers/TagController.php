<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequeste;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index')->with(['tags' => $tags]);
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(StoreTagRequeste $request)
    {
        $request->validated();
        Tag::create([
            'name' => $request->name,
            'slug' => $request->slug = Str::lower(str_replace(' ', ' -', $request->name))
        ]);
        return redirect()->route('tags')->with('massage', 'Created Successfully');
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit')->with(['tag' => $tag]);
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name' => 'string|min:2|max:55'
        ]);
        $tag->update($data);
        return redirect()->route('tags')->with('massage', 'Updated Successfully');
    }

    public function show(Tag $tag)
    {
        return view('tag.show')->with(['tag' => $tag]);
    }

    public function destory(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags')->with('massage', 'Deleted Successfully');
    }
}
