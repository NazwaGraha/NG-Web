<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of portfolios (Portofolio & Proyek Nyata).
     */
    public function index(Request $request)
    {
        $query = Portfolio::query();

        // Search Filter
        if ($request->filled('search')) {
            $search = trim($request->get('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('client', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status Filter
        if ($request->filled('status')) {
            $status = $request->get('status');
            if ($status === 'active') {
                $query->where('is_active', true);
            } elseif ($status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Category Filter
        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }

        $portfolios = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(12)
            ->withQueryString();

        $totalPortfolios = Portfolio::count();
        $activePortfolios = Portfolio::where('is_active', true)->count();
        $inactivePortfolios = Portfolio::where('is_active', false)->count();

        // Available categories for filter dropdown
        $categories = Portfolio::select('category')->distinct()->pluck('category');

        return view('admin.portfolios.index', compact(
            'portfolios',
            'totalPortfolios',
            'activePortfolios',
            'inactivePortfolios',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new portfolio project.
     */
    public function create()
    {
        $nextSortOrder = (Portfolio::max('sort_order') ?? 0) + 1;
        
        $presetCategories = [
            'WEBSITE COMPANY PROFILE KORPORAT',
            'WEBSITE LAYANAN MEDIS & SEO LOKAL CIAWI',
            'WEBSITE KATALOG MESIN & SEO RANKING 1',
            'INSTALASI JARINGAN LAN 36 TITIK & WI-FI',
            'PENGADAAN 12 PC KANTOR ALL-IN-ONE',
            'KONSULTAN IT & MAINTENANCE RUTIN',
            'JASA PEMBUATAN LANDING PAGE UMKM',
            'OPTIMASI GOOGLE MAPS & LOCAL SEO',
        ];

        $sampleImages = [
            'assets/images/portfolio-1.webp' => 'Mockup Web Logistik / Korporat (portfolio-1)',
            'assets/images/portfolio-2.webp' => 'Mockup Web Medis / Klinik (portfolio-2)',
            'assets/images/portfolio-3.webp' => 'Mockup Web Katalog Mesin / Industri (portfolio-3)',
            'assets/images/portfolio-4.webp' => 'Mockup Jaringan LAN & Server Rack (portfolio-4)',
            'assets/images/hero-technology.webp' => 'Hero Teknologi NazwaGraha',
        ];

        return view('admin.portfolios.create', compact('nextSortOrder', 'presetCategories', 'sampleImages'));
    }

    /**
     * Store a newly created portfolio in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:200|unique:portfolios,slug',
            'category' => 'required|string|max:150',
            'client' => 'nullable|string|max:150',
            'badge' => 'nullable|string|max:100',
            'description' => 'required|string|max:1500',
            'image_file' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,svg,avif,bmp|max:5120',
            'image_url' => 'nullable|string|max:255',
            'project_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $count = 1;
            while (Portfolio::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $count;
                $count++;
            }
            $validated['slug'] = $slug;
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        // Set default client if empty
        if (empty($validated['client'])) {
            $validated['client'] = 'Klien NazwaGraha';
        }

        // Handle Image Upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $extension;

            $destinationPath = public_path('assets/images/portfolios');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'assets/images/portfolios/' . $filename;
        } elseif (!empty($validated['image_url'])) {
            $validated['image'] = $validated['image_url'];
        } else {
            $validated['image'] = 'assets/images/portfolio-1.webp';
        }

        unset($validated['image_file'], $validated['image_url']);

        $validated['sort_order'] = $validated['sort_order'] ?? ((Portfolio::max('sort_order') ?? 0) + 1);
        $validated['is_active'] = $request->has('is_active') ? true : false;

        $portfolio = Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', "Proyek portofolio '{$portfolio->title}' berhasil ditambahkan ke Portofolio & Proyek Nyata!");
    }

    /**
     * Show the form for editing the specified portfolio.
     */
    public function edit(Portfolio $portfolio)
    {
        $presetCategories = [
            'WEBSITE COMPANY PROFILE KORPORAT',
            'WEBSITE LAYANAN MEDIS & SEO LOKAL CIAWI',
            'WEBSITE KATALOG MESIN & SEO RANKING 1',
            'INSTALASI JARINGAN LAN 36 TITIK & WI-FI',
            'PENGADAAN 12 PC KANTOR ALL-IN-ONE',
            'KONSULTAN IT & MAINTENANCE RUTIN',
            'JASA PEMBUATAN LANDING PAGE UMKM',
            'OPTIMASI GOOGLE MAPS & LOCAL SEO',
        ];

        $sampleImages = [
            'assets/images/portfolio-1.webp' => 'Mockup Web Logistik / Korporat (portfolio-1)',
            'assets/images/portfolio-2.webp' => 'Mockup Web Medis / Klinik (portfolio-2)',
            'assets/images/portfolio-3.webp' => 'Mockup Web Katalog Mesin / Industri (portfolio-3)',
            'assets/images/portfolio-4.webp' => 'Mockup Jaringan LAN & Server Rack (portfolio-4)',
            'assets/images/hero-technology.webp' => 'Hero Teknologi NazwaGraha',
        ];

        return view('admin.portfolios.edit', compact('portfolio', 'presetCategories', 'sampleImages'));
    }

    /**
     * Update the specified portfolio in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:200|unique:portfolios,slug,' . $portfolio->id,
            'category' => 'required|string|max:150',
            'client' => 'nullable|string|max:150',
            'badge' => 'nullable|string|max:100',
            'description' => 'required|string|max:1500',
            'image_file' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,svg,avif,bmp|max:5120',
            'image_url' => 'nullable|string|max:255',
            'project_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $count = 1;
            while (Portfolio::where('slug', $slug)->where('id', '!=', $portfolio->id)->exists()) {
                $slug = $baseSlug . '-' . $count;
                $count++;
            }
            $validated['slug'] = $slug;
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if (empty($validated['client'])) {
            $validated['client'] = 'Klien NazwaGraha';
        }

        // Handle Image Upload if provided
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $extension;

            $destinationPath = public_path('assets/images/portfolios');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['image'] = 'assets/images/portfolios/' . $filename;
        } elseif (!empty($validated['image_url'])) {
            $validated['image'] = $validated['image_url'];
        }

        unset($validated['image_file'], $validated['image_url']);

        $validated['sort_order'] = $validated['sort_order'] ?? $portfolio->sort_order;
        $validated['is_active'] = $request->has('is_active') ? true : false;

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', "Data portofolio '{$portfolio->title}' berhasil diperbarui!");
    }

    /**
     * Remove the specified portfolio from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $title = $portfolio->title;
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', "Proyek portofolio '{$title}' berhasil dihapus.");
    }

    /**
     * Quick toggle status active/inactive.
     */
    public function toggleStatus(Portfolio $portfolio)
    {
        $portfolio->is_active = !$portfolio->is_active;
        $portfolio->save();

        $statusLabel = $portfolio->is_active ? 'diaktifkan (tampil di halaman publik)' : 'dinonaktifkan (disembunyikan)';

        return redirect()->back()
            ->with('success', "Status portofolio '{$portfolio->title}' berhasil {$statusLabel}.");
    }
}
