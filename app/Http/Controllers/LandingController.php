<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

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

        // Tambahkan produk unggulan di homepage
        $featuredProducts = Product::query()
            ->with(['category', 'files'])
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.pages.home', compact('posts', 'services', 'featuredProducts'));
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

    public function products(Request $request)
    {
        $query = Product::query()
            ->with(['category', 'files', 'creator'])
            ->where('is_active', true);

        // Filter by category if provided
        if ($request->has('category') && $request->get('category')) {
            $query->where('product_category_id', $request->get('category'));
        }

        // Search functionality
        if ($request->has('search') && $request->get('search')) {
            $searchTerm = $request->get('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        // Sort functionality
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'oldest':
                $query->oldest();
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        $categories = ProductCategory::query()
            ->withCount(['products' => function($query) {
                $query->where('is_active', true);
            }])
            ->get();

        $featuredProducts = Product::query()
            ->with(['category', 'files'])
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        // Statistics
        $totalProducts = Product::where('is_active', true)->count();
        $totalCategories = ProductCategory::count();

        return view('frontend.pages.products', compact(
            'products', 
            'categories', 
            'featuredProducts', 
            'totalProducts', 
            'totalCategories'
        ));
    }

    public function productDetail($slug)
    {
        $product = Product::query()
            ->with(['category', 'files', 'creator', 'updater'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Related products
        $relatedProducts = Product::query()
            ->with(['category', 'files'])
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->where('product_category_id', $product->product_category_id)
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.pages.product-detail', compact('product', 'relatedProducts'));
    }
}