<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
        # code...
    }
    public function store(Request $request)
    {
        return view('contact');
        # code...
    }
}
