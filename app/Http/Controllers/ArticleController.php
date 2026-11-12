<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ArticleController extends Controller
{
    /**
     * Get baseline site settings with database overlay.
     */
    private function getCommonSettings(): array
    {
        $settings = [
            'site_name' => 'NazwaGraha',
            'tagline' => 'Jasa Pembuatan Website Murah & Konsultan IT Murah',
            'phone' => '081298506111',
            'phone_display' => '0812 98 506 111',
            'whatsapp' => '081298506111',
            'email' => 'nazwagraha@gmail.com',
            'address' => 'Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat',
            'subdistrict' => 'Ciawi',
            'city' => 'Bogor',
            'province' => 'Jawa Barat',
            'postal_code' => '16720',
            'country' => 'ID',
            'geo_latitude' => '-6.6698',
            'geo_longitude' => '106.8532',
            'geo_region' => 'ID-JB',
            'geo_placename' => 'Bogor, Jawa Barat',
            'ga_measurement_id' => env('GA_MEASUREMENT_ID', 'G-5GYSVPFZ48'),
        ];

        try {
            if (Schema::hasTable('site_settings')) {
                $dbSettings = SiteSetting::allKeyed();
                $settings = array_merge($settings, array_filter($dbSettings));
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return $settings;
    }

    /**
     * Display paginated articles index (News & Events) with search and category filters.
     */
    public function index(Request $request)
    {
        $settings = $this->getCommonSettings();
        $settings['meta_title'] = 'Wawasan, Berita & Edukasi Teknologi IT Terkini | NazwaGraha';
        $settings['meta_description'] = 'Kumpulan artikel panduan jasa pembuatan website murah, strategi SEO ranking 1, instalasi jaringan LAN, pengadaan PC kantor, dan maintenance IT di Bogor & Ciawi.';
        $settings['canonical_url'] = route('articles.index');

        $query = Article::published();

        // Filter by search query
        $search = trim($request->get('q', ''));
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Filter by category
        $category = trim($request->get('category', ''));
        if (!empty($category) && strtolower($category) !== 'semua') {
            $query->where('category', $category);
        }

        // 9 records per page
        $articles = $query->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        $categories = [
            'Semua',
            'WEBSITE',
            'SEO & DIGITAL',
            'INFRASTRUKTUR IT',
            'KONSULTAN IT',
            'HARDWARE PC',
        ];

        // Schema JSON-LD for Collection Page
        $schemaCollection = [
            '@context' => 'https://schema.org',
            '@type' => 'CollectionPage',
            'name' => 'Wawasan, Berita & Edukasi Teknologi NazwaGraha',
            'description' => $settings['meta_description'],
            'url' => route('articles.index'),
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'NazwaGraha',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('assets/images/logo-nazwagraha.webp'),
                ],
            ],
        ];

        $schemaBreadcrumb = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'News & Events',
                    'item' => route('articles.index'),
                ],
            ],
        ];

        return view('articles-index', compact(
            'articles',
            'categories',
            'search',
            'category',
            'settings',
            'schemaCollection',
            'schemaBreadcrumb'
        ));
    }

    /**
     * Display a single SEO & GEO optimized article.
     */
    public function show(string $slug)
    {
        $articleQuery = Article::where('slug', $slug);
        if (!auth()->check()) {
            $articleQuery->published();
        }
        $article = $articleQuery->firstOrFail();

        $settings = $this->getCommonSettings();

        // Custom Article Meta Tags
        $settings['meta_title'] = $article->meta_title ?: ($article->title . ' | NazwaGraha');
        $settings['meta_description'] = $article->meta_description ?: $article->excerpt;
        $settings['canonical_url'] = route('articles.show', $article->slug);
        $settings['focus_keyword'] = $article->focus_keyword ?: 'jasa pembuatan website murah bogor';
        $settings['geo_target'] = $article->geo_target ?: 'Bogor, Ciawi, Jawa Barat';

        // Related articles
        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        // 1. Article Schema JSON-LD (Google Rich Snippets)
        $schemaArticle = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => route('articles.show', $article->slug),
            ],
            'headline' => $article->title,
            'description' => $article->meta_description ?: $article->excerpt,
            'image' => asset($article->image),
            'author' => [
                '@type' => 'Person',
                'name' => $article->author ?: 'Tim NazwaGraha',
                'url' => url('/'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'NazwaGraha',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('assets/images/logo-nazwagraha.webp'),
                ],
            ],
            'datePublished' => $article->published_at ? $article->published_at->toIso8601String() : now()->toIso8601String(),
            'dateModified' => $article->updated_at ? $article->updated_at->toIso8601String() : now()->toIso8601String(),
            'articleSection' => $article->category,
            'keywords' => $article->focus_keyword . ', ' . $article->geo_target . ', jasa website murah, konsultan it bogor',
        ];

        // 2. Breadcrumb Schema
        $schemaBreadcrumb = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Edukasi & Berita IT',
                    'item' => url('/#news'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $article->title,
                    'item' => route('articles.show', $article->slug),
                ],
            ],
        ];

        // 3. Local Business Schema
        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+6281298506111',
            'email' => $settings['email'],
            'hasMap' => 'https://maps.google.com/?q=-6.6698,106.8532',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $settings['address'],
                'addressLocality' => $settings['city'],
                'addressRegion' => $settings['province'],
                'postalCode' => $settings['postal_code'],
                'addressCountry' => 'ID',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => -6.6698,
                'longitude' => 106.8532,
            ],
        ];

        return view('article-detail', compact(
            'article',
            'settings',
            'relatedArticles',
            'schemaArticle',
            'schemaBreadcrumb',
            'schemaLocalBusiness'
        ));
    }
}
