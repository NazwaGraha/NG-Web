<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class ServiceController extends Controller
{
    public function website()
    {
        $portfolios = Gallery::where('category', 'website')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('pages.services.website', compact('portfolios'));
    }

    public function seoGeo()
    {
        $portfolios = Gallery::where('category', 'website')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('pages.services.seo-geo', compact('portfolios'));
    }

    public function jaringanLan()
    {
        $portfolios = Gallery::where('category', 'jaringan')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('pages.services.jaringan-lan', compact('portfolios'));
    }

    public function hardware()
    {
        $portfolios = Gallery::where('category', 'hardware')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('pages.services.hardware', compact('portfolios'));
    }

    public function servis()
    {
        $portfolios = Gallery::whereIn('category', ['support', 'hardware'])
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('pages.services.servis', compact('portfolios'));
    }
}
