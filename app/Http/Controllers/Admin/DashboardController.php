<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $publishedArticles = Article::where('is_published', true)->count();
        $totalCategories = Category::count();
        $totalGalleries = Gallery::count();
        $totalViews = Article::sum('views');

        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        $recentArticles = Article::with('category')->latest()->take(5)->get();
        $recentGalleries = Gallery::latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalArticles',
            'publishedArticles',
            'totalCategories',
            'totalGalleries',
            'totalViews',
            'totalMessages',
            'unreadMessages',
            'recentMessages',
            'recentArticles',
            'recentGalleries'
        ));
    }
}
