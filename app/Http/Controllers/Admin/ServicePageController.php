<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    /**
     * Display the Sub-Menu Services Page Content Manager.
     */
    public function index(Request $request)
    {
        $servicePages = ServicePage::orderBy('id', 'asc')->get();

        // Get currently selected page for editing (default to first page)
        $selectedSlug = $request->query('slug', 'jasa-pembuatan-website-murah');
        $currentPage = $servicePages->firstWhere('slug', $selectedSlug) ?? $servicePages->first();

        return view('admin.service-pages.index', compact('servicePages', 'currentPage'));
    }

    /**
     * Update the content of a specific service sub-menu page.
     */
    public function update(Request $request, ServicePage $servicePage)
    {
        $validated = $request->validate([
            'service_title' => 'required|string|max:150',
            'eyebrow' => 'nullable|string|max:150',
            'hero_h1' => 'required|string|max:255',
            'hero_lead' => 'required|string|max:1000',
            'hero_badges_text' => 'nullable|string',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:500',
            'focus_keyword' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
            'packages' => 'nullable|array',
            'comparison' => 'nullable|array',
            'faq_q' => 'nullable|array',
            'faq_a' => 'nullable|array',
        ]);

        // 1. Process Hero Badges (1 per line)
        $heroBadges = [];
        if (!empty($validated['hero_badges_text'])) {
            $lines = explode("\n", str_replace("\r", "", $validated['hero_badges_text']));
            foreach ($lines as $line) {
                $trimmed = trim($line);
                if (!empty($trimmed)) {
                    $heroBadges[] = $trimmed;
                }
            }
        }

        // 2. Process Pricing Packages
        $pricingPackages = [];
        if ($request->has('packages') && is_array($request->packages)) {
            foreach ($request->packages as $i => $pkg) {
                if (!empty($pkg['name'])) {
                    $features = [];
                    if (!empty($pkg['features_text'])) {
                        $fLines = explode("\n", str_replace("\r", "", $pkg['features_text']));
                        foreach ($fLines as $fl) {
                            $ftrim = trim($fl);
                            if (!empty($ftrim)) {
                                $features[] = $ftrim;
                            }
                        }
                    }

                    $pricingPackages[] = [
                        'id' => !empty($pkg['id']) ? $pkg['id'] : ('pkg-' . ($i + 1)),
                        'name' => $pkg['name'],
                        'price' => $pkg['price'] ?? 'Hubungi Kami',
                        'strike_price' => $pkg['strike_price'] ?? '',
                        'billing_cycle' => $pkg['billing_cycle'] ?? '',
                        'duration' => $pkg['duration'] ?? 'Sesuai Kesepakatan',
                        'badge' => $pkg['badge'] ?? null,
                        'target_audience' => $pkg['target_audience'] ?? null,
                        'cta_text' => !empty($pkg['cta_text']) ? $pkg['cta_text'] : 'Pesan Sekarang ➔',
                        'is_popular' => !empty($pkg['is_popular']),
                        'features' => $features,
                    ];
                }
            }
        }

        // 3. Process Comparison Table Rows
        $comparisonData = [];
        if ($request->has('comparison') && is_array($request->comparison)) {
            foreach ($request->comparison as $cmp) {
                if (!empty($cmp['feature'])) {
                    $comparisonData[] = [
                        'feature' => $cmp['feature'],
                        'nazwagraha' => $cmp['nazwagraha'] ?? '',
                        'others' => $cmp['others'] ?? '',
                    ];
                }
            }
        }

        // 4. Process FAQ items
        $faqItems = [];
        if ($request->has('faq_q') && is_array($request->faq_q)) {
            foreach ($request->faq_q as $idx => $q) {
                $ans = $request->faq_a[$idx] ?? '';
                if (!empty(trim($q)) && !empty(trim($ans))) {
                    $faqItems[] = [
                        'question' => trim($q),
                        'answer' => trim($ans),
                    ];
                }
            }
        }

        // Save update
        $servicePage->update([
            'service_title' => $validated['service_title'],
            'eyebrow' => $validated['eyebrow'] ?? null,
            'hero_h1' => $validated['hero_h1'],
            'hero_lead' => $validated['hero_lead'],
            'hero_badges' => !empty($heroBadges) ? $heroBadges : $servicePage->hero_badges,
            'pricing_packages' => !empty($pricingPackages) ? $pricingPackages : $servicePage->pricing_packages,
            'comparison_data' => !empty($comparisonData) ? $comparisonData : $servicePage->comparison_data,
            'faq_items' => !empty($faqItems) ? $faqItems : $servicePage->faq_items,
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
            'focus_keyword' => $validated['focus_keyword'] ?? null,
            'is_active' => $request->has('is_active') ? (bool) $request->is_active : false,
        ]);

        return redirect()->route('admin.service-pages.index', ['slug' => $servicePage->slug])
            ->with('success', "Konten halaman '{$servicePage->service_title}' berhasil diperbarui!");
    }

    /**
     * Toggle active/inactive status of a service sub-menu page.
     */
    public function toggleStatus(ServicePage $servicePage)
    {
        $newStatus = !$servicePage->is_active;
        $servicePage->update(['is_active' => $newStatus]);

        if ($newStatus) {
            $msg = "Halaman sub-menu '{$servicePage->service_title}' BERHASIL DIAKTIFKAN dan kini tayang di publik!";
        } else {
            $msg = "Halaman sub-menu '{$servicePage->service_title}' BERHASIL DINONAKTIFKAN dan kini disembunyikan dari publik.";
        }

        return redirect()->back()->with('success', $msg);
    }
}
