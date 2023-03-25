<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRegisterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RigesterController extends Controller
{
    public function signUp()
    {
        return view('auth.signUp');
    }
    public function rigester(UserAuthRegisterRequest $request)
    {
        $categories = Category::all();
        $posts = Post::all();
        $request->validated();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return view('welcome', ['categories' => $categories, 'posts' => $posts])->with('massage', 'Welcome in our blog');
    }
}
