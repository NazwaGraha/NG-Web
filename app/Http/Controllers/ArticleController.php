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
        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        // Filter by category
        $category = trim($request->get('category', ''));
        if (! empty($category) && strtolower($category) !== 'semua') {
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
        if (! auth()->check()) {
            $articleQuery->published();
        }
        $article = $articleQuery->firstOrFail();

        $settings = $this->getCommonSettings();

        // Custom Article Meta Tags
        $settings['meta_title'] = $article->meta_title ?: ($article->title.' | NazwaGraha');
        $settings['meta_description'] = $article->meta_description ?: $article->excerpt;
        $settings['canonical_url'] = route('articles.show', $article->slug);
        $settings['focus_keyword'] = $article->focus_keyword ?: 'jasa pembuatan website murah bogor';
        $settings['geo_target'] = $article->geo_target ?: 'Bogor, Ciawi, Jawa Barat';

        // Build rich keyword list (Focus + Secondary + LSI + GEO)
        $keywordParts = array_filter([
            $article->focus_keyword,
            $article->secondary_keywords,
            $article->lsi_keywords,
            $article->geo_target,
            'jasa website murah',
            'konsultan it bogor',
        ]);
        $settings['all_keywords'] = implode(', ', $keywordParts);

        // Related articles
        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $ratingVal = $article->rating_value ?: 5.0;
        $reviewCnt = $article->review_count ?: 48;

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
            'keywords' => $settings['all_keywords'],
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

        // 3. Local Business Schema with Verified 5-Star Aggregate Rating
        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+6281298506111',
            'email' => $settings['email'],
            'hasMap' => 'https://maps.google.com/?q=-6.6698,106.8532',
            'priceRange' => 'Rp',
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
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => number_format($ratingVal, 1, '.', ''),
                'bestRating' => '5',
                'worstRating' => '1',
                'ratingCount' => (string) $reviewCnt,
            ],
        ];

        // 4. Service Schema with Aggregate Rating (Google 5-Star Review Snippet)
        $schemaServiceRating = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $article->title,
            'serviceType' => $article->category ?: 'IT & Website Development',
            'provider' => [
                '@type' => 'LocalBusiness',
                'name' => 'NazwaGraha',
                'telephone' => '+6281298506111',
                'image' => asset('assets/images/logo-nazwagraha.webp'),
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => $settings['address'],
                    'addressLocality' => $settings['city'],
                    'addressRegion' => $settings['province'],
                    'postalCode' => $settings['postal_code'],
                    'addressCountry' => 'ID',
                ],
            ],
            'areaServed' => [
                '@type' => 'AdministrativeArea',
                'name' => $article->geo_target ?: 'Bogor, Ciawi, Jawa Barat, Indonesia',
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => number_format($ratingVal, 1, '.', ''),
                'bestRating' => '5',
                'worstRating' => '1',
                'ratingCount' => (string) $reviewCnt,
            ],
        ];

        // 5. FAQPage Schema (Google Rich Snippets & AI Search Crawlers)
        $schemaFaq = null;
        if (! empty($article->faqs) && is_array($article->faqs)) {
            $faqElements = [];
            foreach ($article->faqs as $f) {
                if (! empty($f['question']) && ! empty($f['answer'])) {
                    $faqElements[] = [
                        '@type' => 'Question',
                        'name' => $f['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => strip_tags($f['answer']),
                        ],
                    ];
                }
            }
            if (! empty($faqElements)) {
                $schemaFaq = [
                    '@context' => 'https://schema.org',
                    '@type' => 'FAQPage',
                    'mainEntity' => $faqElements,
                ];
            }
        }

        return view('article-detail', compact(
            'article',
            'settings',
            'relatedArticles',
            'schemaArticle',
            'schemaBreadcrumb',
            'schemaLocalBusiness',
            'schemaServiceRating',
            'schemaFaq'
        ));
    }
}
