<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Service;
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

        $services = Service::query()->get();

        return view('frontend.pages.home', compact('posts', 'services'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }

    public function blogs()
    {
        $posts = Post::query()
            ->with('category')
            ->where('status', 'publish')
            ->latest()
            ->take(9)
            ->get();

        $newestPosts = Post::query()
            ->with('category')
            ->where('status', 'publish')
            ->latest()
            ->take(5)
            ->get();

        $categories = PostCategory::query()
            ->withCount('posts')
            ->get();

        return view('frontend.pages.blogs', compact('posts', 'newestPosts', 'categories'));
    }
}
