<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
         return view('home');
    }

    public function welcome()
    {
         return view('welcome');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
