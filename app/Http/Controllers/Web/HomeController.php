<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function landing()
    {
        // ini mengarah ke resources/views/landing.blade.php
        return view('home.landing');
    }

    public function index()
    {
        // ini untuk halaman home setelah login
        return view('home.index');
    }
}
