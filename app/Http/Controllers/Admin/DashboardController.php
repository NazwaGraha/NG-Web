<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with overview statistics.
     */
    public function index()
    {
        $totalArticles = 0;
        $publishedArticles = 0;
        $totalCategories = 0;
        $totalInquiries = 0;
        $newInquiries = 0;
        $totalServices = 0;
        $totalPortfolios = 0;

        if (Schema::hasTable('articles')) {
            $totalArticles = Article::count();
            $publishedArticles = Article::where('is_published', true)->count();
        }

        if (Schema::hasTable('categories')) {
            $totalCategories = Category::count();
        }

        if (Schema::hasTable('inquiries')) {
            $totalInquiries = Inquiry::count();
            $newInquiries = Inquiry::where('status', 'baru')->count();
        }

        if (Schema::hasTable('services')) {
            $totalServices = Service::count();
        }

        if (Schema::hasTable('portfolios')) {
            $totalPortfolios = Portfolio::count();
        }

        // Recent articles
        $recentArticles = collect();
        if (Schema::hasTable('articles')) {
            $recentArticles = Article::orderByDesc('created_at')->take(5)->get();
        }

        // Recent inquiries
        $recentInquiries = collect();
        if (Schema::hasTable('inquiries')) {
            $recentInquiries = Inquiry::orderByDesc('created_at')->take(5)->get();
        }

        return view('admin.dashboard', compact(
            'totalArticles',
            'publishedArticles',
            'totalCategories',
            'totalInquiries',
            'newInquiries',
            'totalServices',
            'totalPortfolios',
            'recentArticles',
            'recentInquiries'
        ));
    }
}
