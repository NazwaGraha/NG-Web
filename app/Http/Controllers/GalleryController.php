<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('kategori') && $request->kategori !== 'semua') {
            $query->where('category', $request->kategori);
        }

        $galleries = $query->orderBy('sort_order', 'asc')->latest()->paginate(12)->withQueryString();

        $categories = [
            'semua' => 'Semua Portofolio',
            'website' => 'Pembuatan Website & App',
            'jaringan' => 'Instalasi Jaringan LAN',
            'hardware' => 'Pengadaan Hardware IT',
            'support' => 'Dokumentasi Tim & Servis',
        ];

        return view('pages.gallery', compact('galleries', 'categories'));
    }
}
