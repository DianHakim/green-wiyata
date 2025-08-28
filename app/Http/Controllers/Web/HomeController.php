<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function landing()
    {
        return view('home.landing');
    }

    public function index()
{
    return view('home.index', [
        'locationsCount' => \App\Models\Location::count(),
        'plantsCount'   => \App\Models\Plant::count(),
        'postsCount'    => \App\Models\Post::count(),
        'latestPosts'   => \App\Models\Post::with('createdBy')
                            ->latest()
                            ->take(2)
                            ->get(),
    ]);
}


}
