<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function langChainge($local)
    {
        if (!in_array($local, ['en', 'ar'])) {
            abort(400);
        }
        session()->put(['locale' => $local]);

        App::setLocale($local);
        //   app()->setLocale($locale);
        return redirect('/');
    }
}
