<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('sort_order', 'asc')->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'target_badge' => 'nullable|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'original_price' => 'nullable|string|max:100',
            'price_prefix' => 'nullable|string|max:50',
            'price' => 'required|string|max:100',
            'discount_tag' => 'nullable|string|max:100',
            'features' => 'required|string', // newline-separated string
            'cta_text' => 'nullable|string|max:100',
            'cta_whatsapp_text' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'popular_badge_text' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        // Convert newline-separated features to array
        $featuresArray = array_values(array_filter(array_map('trim', explode("\n", $request->features))));

        Package::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']) . '-' . Str::random(5),
            'target_badge' => $validated['target_badge'] ?? null,
            'tagline' => $validated['tagline'] ?? null,
            'original_price' => $validated['original_price'] ?? null,
            'price_prefix' => $validated['price_prefix'] ?? null,
            'price' => $validated['price'],
            'discount_tag' => $validated['discount_tag'] ?? null,
            'features' => $featuresArray,
            'cta_text' => (!empty($validated['cta_text'])) ? $validated['cta_text'] : 'Pesan Paket Sekarang →',
            'cta_whatsapp_text' => $validated['cta_whatsapp_text'] ?? null,
            'is_popular' => $request->boolean('is_popular'),
            'popular_badge_text' => (!empty($validated['popular_badge_text'])) ? $validated['popular_badge_text'] : '★ BEST SELLER & REKOMENDASI',
            'is_active' => $request->boolean('is_active', true),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Paket pembuatan website berhasil ditambahkan!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'target_badge' => 'nullable|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'original_price' => 'nullable|string|max:100',
            'price_prefix' => 'nullable|string|max:50',
            'price' => 'required|string|max:100',
            'discount_tag' => 'nullable|string|max:100',
            'features' => 'required|string',
            'cta_text' => 'nullable|string|max:100',
            'cta_whatsapp_text' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'popular_badge_text' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $featuresArray = array_values(array_filter(array_map('trim', explode("\n", $request->features))));

        $package->update([
            'name' => $validated['name'],
            'target_badge' => $validated['target_badge'] ?? null,
            'tagline' => $validated['tagline'] ?? null,
            'original_price' => $validated['original_price'] ?? null,
            'price_prefix' => $validated['price_prefix'] ?? null,
            'price' => $validated['price'],
            'discount_tag' => $validated['discount_tag'] ?? null,
            'features' => $featuresArray,
            'cta_text' => (!empty($validated['cta_text'])) ? $validated['cta_text'] : 'Pesan Paket Sekarang →',
            'cta_whatsapp_text' => $validated['cta_whatsapp_text'] ?? null,
            'is_popular' => $request->boolean('is_popular'),
            'popular_badge_text' => (!empty($validated['popular_badge_text'])) ? $validated['popular_badge_text'] : '★ BEST SELLER & REKOMENDASI',
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Paket pembuatan website berhasil diperbarui!');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Paket pembuatan website berhasil dihapus!');
    }
}
