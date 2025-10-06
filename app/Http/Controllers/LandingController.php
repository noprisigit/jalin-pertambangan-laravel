<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
    {
        $posts = Post::query()
            ->with('category')
            ->where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.pages.home', compact('posts'));
    }
}
