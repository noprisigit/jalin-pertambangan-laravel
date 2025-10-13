<?php

namespace App\View\Components\Landing;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $posts;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->posts = Post::query()
            ->with('category')
            ->where('status', 'publish')
            ->latest()
            ->take(3)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.footer');
    }
}
