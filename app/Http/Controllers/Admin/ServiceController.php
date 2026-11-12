<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of services (Layanan Unggulan Kami).
     */
    public function index()
    {
        $services = Service::orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $totalServices = $services->count();
        $activeServices = $services->where('is_active', true)->count();
        $inactiveServices = $services->where('is_active', false)->count();

        return view('admin.services.index', compact(
            'services',
            'totalServices',
            'activeServices',
            'inactiveServices'
        ));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        $nextSortOrder = (Service::max('sort_order') ?? 0) + 1;
        return view('admin.services.create', compact('nextSortOrder'));
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'nullable|string|max:150|unique:services,slug',
            'badge' => 'nullable|string|max:50',
            'short_description' => 'required|string|max:500',
            'full_description' => 'nullable|string',
            'price_starting_from' => 'nullable|string|max:100',
            'icon_svg' => 'nullable|string',
            'features_text' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        // Convert features_text (1 per line) to array
        $features = [];
        if (!empty($validated['features_text'])) {
            $lines = explode("\n", str_replace("\r", "", $validated['features_text']));
            foreach ($lines as $line) {
                $trimmed = trim($line);
                if (!empty($trimmed)) {
                    $features[] = $trimmed;
                }
            }
        }

        $service = Service::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'badge' => $validated['badge'] ?? null,
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'] ?? null,
            'price_starting_from' => $validated['price_starting_from'] ?? 'Konsultasi Gratis',
            'icon_svg' => $validated['icon_svg'] ?? '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="5" y="7" width="38" height="27" rx="3"/><path d="M16 41h16M24 34v7"/></svg>',
            'features' => $features,
            'sort_order' => $validated['sort_order'] ?? 1,
            'is_active' => $request->has('is_active') ? (bool) $request->is_active : true,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', "Layanan baru '{$service->name}' berhasil ditambahkan ke sistem!");
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'nullable|string|max:150|unique:services,slug,' . $service->id,
            'badge' => 'nullable|string|max:50',
            'short_description' => 'required|string|max:500',
            'full_description' => 'nullable|string',
            'price_starting_from' => 'nullable|string|max:100',
            'icon_svg' => 'nullable|string',
            'features_text' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        // Convert features_text (1 per line) to array
        $features = [];
        if (!empty($validated['features_text'])) {
            $lines = explode("\n", str_replace("\r", "", $validated['features_text']));
            foreach ($lines as $line) {
                $trimmed = trim($line);
                if (!empty($trimmed)) {
                    $features[] = $trimmed;
                }
            }
        }

        $service->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'badge' => $validated['badge'] ?? null,
            'short_description' => $validated['short_description'],
            'full_description' => $validated['full_description'] ?? null,
            'price_starting_from' => $validated['price_starting_from'] ?? 'Konsultasi Gratis',
            'icon_svg' => $validated['icon_svg'] ?? $service->icon_svg,
            'features' => $features,
            'sort_order' => $validated['sort_order'] ?? $service->sort_order,
            'is_active' => $request->has('is_active') ? (bool) $request->is_active : false,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', "Konten layanan '{$service->name}' berhasil diperbarui!");
    }

    /**
     * Instant Toggle Status (Aktifkan / Nonaktifkan).
     */
    public function toggleStatus(Service $service)
    {
        $newStatus = !$service->is_active;
        $service->update(['is_active' => $newStatus]);

        if ($newStatus) {
            $message = "Layanan '{$service->name}' BERHASIL DIAKTIFKAN! Layanan ini kini langsung tayang di Landing Page utama.";
        } else {
            $message = "Layanan '{$service->name}' BERHASIL DINONAKTIFKAN! Layanan ini kini disembunyikan dari Landing Page utama.";
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        $name = $service->name;
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', "Layanan '{$name}' berhasil dihapus dari sistem.");
    }
}
