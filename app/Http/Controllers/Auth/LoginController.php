<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function storeLogin(UserAuthRequestRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->back()->with('massage', 'welcome back');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logOut(UserAuthRequestRequest $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
