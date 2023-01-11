<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function redirect(Request $request)
    {
        return $request->user() ? redirect()->route('dashboard') : view('guest');
    }
}
