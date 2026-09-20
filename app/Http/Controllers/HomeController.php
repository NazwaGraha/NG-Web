<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $galleries = Gallery::where('is_featured', true)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->take(6)
            ->get();

        if ($galleries->isEmpty()) {
            $galleries = Gallery::orderBy('sort_order', 'asc')->latest()->take(6)->get();
        }

        $galleryCategories = [
            'website' => 'Website & App',
            'jaringan' => 'Jaringan LAN',
            'hardware' => 'Hardware IT',
            'support' => 'Servis & Support',
        ];

        $categories = Category::withCount('articles')->get();

        return view('pages.home', compact('articles', 'galleries', 'categories', 'galleryCategories'));
    }

    public function about()
    {
        return view('pages.about');
    }
}
