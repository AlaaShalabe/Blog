<?php

namespace App\Http\Controllers\Auth;

use App\Events\RigesterUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRegisterRequest;
use App\Jobs\SendEmail;
use App\Mail\WelcomeMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RigesterController extends Controller
{
    public function signUp()
    {
        return view('auth.signUp');
    }
    public function rigester(UserAuthRegisterRequest $request)
    {
        //dd('hi');
        $categories = Category::all();
        $posts = Post::all();
        $request->validated();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new RigesterUser($user));
        dispatch(new SendEmail());
        Auth::login($user);

        return view('welcome', ['categories' => $categories, 'posts' => $posts])->with('massage', 'Welcome in our blog');
    }
}
