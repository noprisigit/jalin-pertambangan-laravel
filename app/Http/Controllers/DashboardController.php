<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $totalArticles = Post::query()->count();
        $totalServices = Service::query()->count();
        $totalProducts = Product::query()->count();
        $totalFeedbacks = Feedback::query()->count();

        return view('admin.pages.dashboard', compact(
            'totalArticles',
            'totalServices',
            'totalProducts',
            'totalFeedbacks'
        ));
    }
}
