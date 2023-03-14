<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index')->with(['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $request->validated();
        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('categories')->with('massage', 'Created Successfully');
    }

    public function edit(Category $category)
    {
        return View('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|min:5|max:55',
        ]);
        $category->update($data);
        return redirect()->route('categories', $category)->with('massage', 'Updated Successfully');
    }


    public function destory(Category $category)
    {
        $category->delete();
        return redirect()->route('categories')->with('massage', 'Deleted Successfully');
    }
}
