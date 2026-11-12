<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServicePage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
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
            'meta_title' => 'Jasa Pembuatan Website Murah & Konsultan IT Murah Bogor | NazwaGraha',
            'meta_description' => 'Jasa pembuatan website murah & konsultan IT profesional di Bogor & Ciawi. Web modern cepat, SEO ranking 1, pasang LAN & maintenance bergaransi. Chat sekarang!',
            'meta_keywords' => 'jasa pembuatan website murah, konsultan it murah, jasa website bogor, jasa website ciawi, konsultan it bogor, jasa seo murah, maintenance komputer kantor, pasang jaringan lan murah, web company profile murah',
            'canonical_url' => url('/'),
            'working_hours' => 'Senin - Sabtu: 08.00 - 21.00 WIB (Online Support 24 Jam via WhatsApp)',
            'ga_measurement_id' => env('GA_MEASUREMENT_ID', 'G-5GYSVPFZ48'),
        ];

        try {
            if (Schema::hasTable('site_settings')) {
                $dbSettings = SiteSetting::allKeyed();
                $settings = array_merge($settings, array_filter($dbSettings));
            }
        } catch (\Throwable $e) {
            // gracefully fallback to defaults
        }

        return $settings;
    }

    /**
     * Helper to load dynamic ServicePage data and check active status.
     */
    private function resolveServicePage(string $slug, array &$settings, array &$packages, array &$comparisons = [], array &$faqs = [])
    {
        try {
            if (Schema::hasTable('service_pages')) {
                $servicePage = ServicePage::where('slug', $slug)->first();
                if ($servicePage) {
                    if (!$servicePage->is_active && !auth()->check()) {
                        return redirect()->route('home')->with('info', "Layanan '{$servicePage->service_title}' saat ini sedang diperbarui.");
                    }

                    if (!empty($servicePage->meta_title)) {
                        $settings['meta_title'] = $servicePage->meta_title;
                    }
                    if (!empty($servicePage->meta_description)) {
                        $settings['meta_description'] = $servicePage->meta_description;
                    }

                    if (!empty($servicePage->pricing_packages) && is_array($servicePage->pricing_packages)) {
                        $packages = collect($servicePage->pricing_packages)->map(function ($pkg, $i) {
                            return (object) [
                                'id' => $pkg['id'] ?? ('pkg-' . ($i + 1)),
                                'name' => $pkg['name'] ?? '',
                                'price' => $pkg['price'] ?? '',
                                'strike_price' => $pkg['strike_price'] ?? '',
                                'billing_cycle' => $pkg['billing_cycle'] ?? '',
                                'duration' => !empty($pkg['duration']) ? $pkg['duration'] : 'Sesuai Kesepakatan',
                                'badge' => $pkg['badge'] ?? '',
                                'is_popular' => !empty($pkg['is_popular']) ? (bool) $pkg['is_popular'] : (!empty($pkg['badge']) && (str_contains(strtolower($pkg['badge']), 'populer') || str_contains(strtolower($pkg['badge']), 'laris') || str_contains(strtolower($pkg['badge']), 'rekomendasi') || str_contains(strtolower($pkg['badge']), 'best seller'))),
                                'target_audience' => $pkg['target_audience'] ?? '',
                                'cta_text' => !empty($pkg['cta_text']) ? $pkg['cta_text'] : 'Pesan Sekarang ➔',
                                'features' => $pkg['features'] ?? [],
                            ];
                        })->all();
                    }

                    if (!empty($servicePage->comparison_data) && is_array($servicePage->comparison_data)) {
                        $comparisons = collect($servicePage->comparison_data)->map(function ($item) {
                            return [
                                'feature' => $item['feature'] ?? '',
                                'nazwa' => $item['nazwagraha'] ?? ($item['nazwa'] ?? ''),
                                'others' => $item['others'] ?? '',
                            ];
                        })->all();
                    }

                    if (!empty($servicePage->faq_items) && is_array($servicePage->faq_items)) {
                        $faqs = collect($servicePage->faq_items)->map(function ($faq) {
                            return (object) [
                                'question' => $faq['question'] ?? '',
                                'answer' => $faq['answer'] ?? '',
                            ];
                        })->all();
                    }

                    return $servicePage;
                }
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return null;
    }

    /**
     * Display the main high-converting landing page.
     */
    public function index()
    {
        // 1. Load Settings with robust defaults
        $settings = $this->getCommonSettings();

        // 2. Load Services (Dynamic from Database)
        $services = collect();
        $hasDbServices = false;
        try {
            if (Schema::hasTable('services')) {
                $hasDbServices = Service::exists();
                $services = Service::where('is_active', true)->orderBy('sort_order')->get();
            }
        } catch (\Throwable $e) {
            // fallback
        }

        if ($services->isEmpty() && !$hasDbServices) {
            $services = collect([
                (object) [
                    'slug' => 'jasa-pembuatan-website-murah',
                    'name' => 'Jasa Pembuatan Website Murah',
                    'badge' => 'Terlaris',
                    'short_description' => 'Website company profile, landing page, katalog produk, hingga toko online berdesain modern, responsif, dan super cepat.',
                    'price_starting_from' => 'Mulai Rp 499.000',
                    'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="5" y="7" width="38" height="27" rx="3"/><path d="M16 41h16M24 34v7M18 17l-5 4 5 4m12-8 5 4-5 4m-5-8-3 8"/></svg>',
                    'features' => [
                        'Desain Modern & Mobile-First',
                        'Skor 95+ di Google PageSpeed',
                        'Gratis Domain & SSL Cepat',
                        'Tombol WhatsApp & Call to Action Tajam',
                        'Struktur SEO Friendly Sejak Awal',
                        'Garansi Revisi & Panduan Penggunaan',
                    ],
                ],
                (object) [
                    'slug' => 'jasa-seo-murah',
                    'name' => 'Jasa SEO Murah Bergaransi',
                    'badge' => 'Target Ranking 1',
                    'short_description' => 'Optimasi teknis dan konten website untuk mendongkrak visibilitas bisnis Anda ke peringkat atas Google dan menjaring calon pelanggan tanpa henti.',
                    'price_starting_from' => 'Mulai Rp 750.000',
                    'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><circle cx="20" cy="20" r="13"/><path d="m30 30 11 11M14 20h12m-6-6v12"/></svg>',
                    'features' => [
                        'Riset Kata Kunci Tertarget & Niat Beli Tinggi',
                        'Optimasi On-Page, Metadata & Schema Markup',
                        'GEO SEO & Google Bisnis Profil (Lokal Bogor & Nasional)',
                        'Perbaikan Kecepatan Loading & Core Web Vitals',
                        'Laporan Kinerja Bulanan Transparan',
                    ],
                ],
                (object) [
                    'slug' => 'instalasi-jaringan-lan',
                    'name' => 'Instalasi Jaringan (LAN) & Wi-Fi',
                    'badge' => 'Stabil & Rapi',
                    'short_description' => 'Perencanaan dan instalasi jaringan kabel UTP/STP, router Mikrotik, switch, dan access point agar konektivitas internet kantor stabil dan tertata rapi.',
                    'price_starting_from' => 'Konsultasi & Survei',
                    'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="17" y="4" width="14" height="10" rx="2"/><rect x="4" y="34" width="12" height="10" rx="2"/><rect x="32" y="34" width="12" height="10" rx="2"/><path d="M24 14v10M10 34v-7h28v7"/></svg>',
                    'features' => [
                        'Penarikan Kabel Jaringan Rapi & Berlabel',
                        'Konfigurasi Router Mikrotik / Cisco',
                        'Manajemen Bandwidth & Pembagian Beban',
                        'Pemasangan Server & Rack Cabinet',
                        'Garansi Instalasi & Troubleshooting Cepat',
                    ],
                ],
                (object) [
                    'slug' => 'pengadaan-komputer-murah',
                    'name' => 'Pengadaan Komputer & Hardware IT',
                    'badge' => 'Harga Terbaik',
                    'short_description' => 'Penyediaan komputer PC kantor, laptop bisnis, printer, UPS, dan perangkat pendukung IT sesuai spesifikasi dan anggaran perusahaan.',
                    'price_starting_from' => 'Sesuai Kebutuhan',
                    'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><rect x="5" y="7" width="38" height="27" rx="3"/><path d="M17 41h14m-7-7v7M12 13h24"/></svg>',
                    'features' => [
                        'Spesifikasi Disesuaikan Kebutuhan Kerja',
                        'Unit Bergaransi Resmi Distributor',
                        'Sudah Termasuk Instalasi OS & Software Dasar',
                        'Pengantaran & Pemasangan Langsung di Kantor',
                        'Harga Kompetitif untuk Pengadaan Skala Kecil hingga Besar',
                    ],
                ],
                (object) [
                    'slug' => 'konsultan-it-murah-maintenance',
                    'name' => 'Konsultan IT Murah & Maintenance',
                    'badge' => 'Solutif',
                    'short_description' => 'Layanan konsultasi arsitektur IT, audit sistem, perawatan berkala, serta penanganan kendala hardware/software demi kelancaran operasional usaha Anda.',
                    'price_starting_from' => 'Mulai Rp 350.000',
                    'icon_svg' => '<svg viewBox="0 0 48 48" aria-hidden="true"><path d="M29 7a12 12 0 0 0 12 15L25 38l-8-8L33 14A12 12 0 0 0 29 7Z"/><path d="m8 9 8 8m-8-8 5-5m-5 5-5 5m13 24 5 5"/></svg>',
                    'features' => [
                        'Konsultasi Solusi IT Efisien & Hemat Biaya',
                        'Maintenance Rutin Bulanan / Panggilan Darurat',
                        'Pembersihan Virus, Malware & Optimasi Sistem',
                        'Backup Data Berkala & Pengamanan File',
                        'Bisa Kunjungan Langsung (On-Site) maupun Remote Support',
                    ],
                ],
            ]);
        }

        // 3. Load Portfolios
        $portfolios = collect();
        try {
            if (Schema::hasTable('portfolios')) {
                $portfolios = Portfolio::where('is_active', true)->orderBy('sort_order')->get();
            }
        } catch (\Throwable $e) {
            // fallback
        }

        if ($portfolios->isEmpty()) {
            $portfolios = collect([
                (object) [
                    'title' => 'PT Samudera Logistik Prima',
                    'category' => 'Website Company Profile Korporat',
                    'client' => 'PT Samudera Logistik Prima (Bogor)',
                    'image' => 'assets/images/portfolio-1.webp',
                    'description' => 'Website profil perusahaan logistik modern dengan fitur pelacakan armada cepat, katalog rute, dan kecepatan akses di bawah 1 detik.',
                    'badge' => 'Loading 0.8 Detik',
                ],
                (object) [
                    'title' => 'Klinik Pratama Sehat Medika',
                    'category' => 'Website Layanan Medis & SEO Lokal Ciawi',
                    'client' => 'Klinik Sehat Medika (Ciawi - Bogor)',
                    'image' => 'assets/images/portfolio-2.webp',
                    'description' => 'Website profil klinik, jadwal praktik dokter, pendaftaran antrean via WhatsApp, dan optimasi Google Maps lokal hingga ranking 1.',
                    'badge' => 'Rank #1 Google Ciawi',
                ],
                (object) [
                    'title' => 'CV Anugerah Teknik Mandiri',
                    'category' => 'Website Katalog Mesin & SEO Ranking 1',
                    'client' => 'CV Anugerah Teknik Mandiri (Depok & Bogor)',
                    'image' => 'assets/images/portfolio-3.webp',
                    'description' => 'Katalog digital mesin dan suku cadang industri dengan sistem Request for Quotation (RFQ) instan dan integrasi WhatsApp.',
                    'badge' => 'Order Naik 300%',
                ],
                (object) [
                    'title' => 'Sentra Niaga & Coworking Hub',
                    'category' => 'Instalasi Jaringan LAN 36 Titik & Wi-Fi',
                    'client' => 'Sentra Niaga Hub (Bogor Kota)',
                    'image' => 'assets/images/portfolio-4.webp',
                    'description' => 'Penarikan kabel UTP Cat6 berlabel, konfigurasi Router Mikrotik dual ISP load-balancing, access point roaming, dan server rack 15U.',
                    'badge' => 'Zero Downtime',
                ],
                (object) [
                    'title' => 'Firma Hukum & Konsultan Pajak Artha',
                    'category' => 'Pengadaan 12 PC Kantor All-in-One',
                    'client' => 'Artha & Partners (Jakarta & Bogor)',
                    'image' => 'assets/images/portfolio-1.webp',
                    'description' => 'Pengadaan 12 unit PC All-in-One Core i5 SSD, 4 laptop bisnis slim, printer network, dan setup software kantor legal.',
                    'badge' => 'Hemat Biaya 25%',
                ],
                (object) [
                    'title' => 'PT Berkah Pangan Nusantara',
                    'category' => 'Konsultan IT & Maintenance Rutin',
                    'client' => 'PT Berkah Pangan Nusantara (Cibinong, Bogor)',
                    'image' => 'assets/images/portfolio-2.webp',
                    'description' => 'Kontrak pemeliharaan rutin infrastruktur IT, proteksi antivirus server, backup otomatis NAS Synology, dan on-call emergency.',
                    'badge' => 'Standby Support',
                ],
            ]);
        }

        // Testimoni Klien Nyata NazwaGraha
        $testimonials = collect([
            (object) [
                'name' => 'Hendra Wijaya, S.T.',
                'role' => 'Direktur Operasional',
                'company' => 'PT Samudera Logistik Prima',
                'location' => 'Bogor',
                'service' => 'Website Profil Bisnis & SEO',
                'rating' => 5,
                'avatar' => 'HW',
                'quote' => 'Awalnya kami ragu karena harga di NazwaGraha sangat bersahabat dibanding agensi Jakarta. Namun hasilnya luar biasa mewah, loading di bawah 1 detik, dan sekarang profil logistik kami dipercaya banyak klien korporat. Sangat direkomendasikan!',
            ],
            (object) [
                'name' => 'dr. Ratna Kartika',
                'role' => 'Pengelola & Penanggung Jawab',
                'company' => 'Klinik Pratama Sehat Medika',
                'location' => 'Ciawi, Bogor',
                'service' => 'Website Klinik & SEO Google Maps',
                'rating' => 5,
                'avatar' => 'RK',
                'quote' => 'Alhamdulillah, setelah website klinik kami dibuat dan dioptimasi oleh NazwaGraha, pasien baru yang reservasi via WhatsApp naik drastis. Lokasi klinik kami juga langsung mendominasi pencarian Google Maps untuk area Ciawi dan sekitarnya.',
            ],
            (object) [
                'name' => 'Budi Santoso',
                'role' => 'Owner & Founder',
                'company' => 'CV Anugerah Teknik Mandiri',
                'location' => 'Depok & Bogor',
                'service' => 'Website Katalog & Jasa SEO Ranking 1',
                'rating' => 5,
                'avatar' => 'BS',
                'quote' => 'Website katalog mesin kami berhasil tembus halaman 1 Google dalam waktu 2 bulan. Telepon dan chat WhatsApp masuk dari calon pembeli berbagai kota, bahkan luar pulau. NazwaGraha benar-benar tahu cara kerja SEO komersial.',
            ],
            (object) [
                'name' => 'Maya Anggraini, S.Kom.',
                'role' => 'Head of GA & IT Procurement',
                'company' => 'PT Berkah Pangan Nusantara',
                'location' => 'Cibinong, Bogor',
                'service' => 'Instalasi Jaringan LAN & Pengadaan PC',
                'rating' => 5,
                'avatar' => 'MA',
                'quote' => 'Pengerjaan instalasi kabel LAN dan server rack di kantor kami sangat rapi dan berlabel jelas. Pengadaan 12 unit PC kantor juga tepat waktu dengan garansi resmi. Komunikasi teknisi NazwaGraha sangat profesional dan tanggap.',
            ],
        ]);

        // 4. Load Articles (Always fetch the 3 latest published articles)
        $articles = collect();
        $totalArticlesCount = 0;
        try {
            if (Schema::hasTable('articles')) {
                $articles = Article::published()
                    ->orderByDesc('published_at')
                    ->orderByDesc('id')
                    ->take(3)
                    ->get();
                $totalArticlesCount = Article::published()->count();
            }
        } catch (\Throwable $e) {
            // fallback
        }

        if ($articles->isEmpty()) {
            $articles = collect([
                (object) [
                    'title' => 'Hal yang Perlu Disiapkan Sebelum Membuat Website Bisnis Murah tapi Berkualitas',
                    'category' => 'WEBSITE',
                    'excerpt' => 'Kenali tujuan bisnis, target pengunjung, dan materi penting agar pembuatan website murah Anda tetap menghasilkan tampilan premium dan mendatangkan pelanggan.',
                    'image' => 'assets/images/article-1.webp',
                    'image_alt' => 'Hal yang Perlu Disiapkan Sebelum Membuat Website Bisnis Murah',
                ],
                (object) [
                    'title' => 'Mengapa SEO Penting untuk Visibilitas Bisnis dan Menembus Ranking 1 Google?',
                    'category' => 'SEO',
                    'excerpt' => 'Memahami fondasi SEO on-page, GEO targeting lokal, dan bagaimana konten relevan membantu calon pelanggan menemukan jasa Anda tanpa henti.',
                    'image' => 'assets/images/article-2.webp',
                    'image_alt' => 'Mengapa SEO Penting untuk Visibilitas Bisnis dan Ranking 1 Google',
                ],
                (object) [
                    'title' => 'Tips Menjaga Jaringan Kantor (LAN) & Perangkat IT Tetap Stabil Bebas Kendala',
                    'category' => 'INFRASTRUKTUR IT',
                    'excerpt' => 'Langkah praktis mengelola router, penataan kabel LAN rapi, dan perawatan berkala komputer kantor agar operasional tim tidak terganggu.',
                    'image' => 'assets/images/article-3.webp',
                    'image_alt' => 'Tips Menjaga Jaringan Kantor LAN dan Perangkat IT',
                ],
            ]);
        }

        // 5. Load FAQs
        $faqs = collect();
        try {
            if (Schema::hasTable('faqs')) {
                $faqs = Faq::where('is_active', true)->orderBy('sort_order')->get();
            }
        } catch (\Throwable $e) {
            // fallback
        }

        if ($faqs->isEmpty()) {
            $faqs = collect([
                (object) [
                    'question' => 'Berapa biaya jasa pembuatan website murah di NazwaGraha?',
                    'answer' => 'Biaya pembuatan website di NazwaGraha sangat terjangkau, mulai dari Rp 499.000 untuk landing page atau website profil bisnis sederhana. Kami juga menyediakan paket kustom sesuai fitur spesifik yang Anda butuhkan tanpa biaya tersembunyi.',
                ],
                (object) [
                    'question' => 'Apakah website yang dibuat dijamin responsif dan cepat dibuka di smartphone?',
                    'answer' => 'Ya, tentu saja! Seluruh website yang kami kembangkan mengusung pendekatan Mobile-First dan ditargetkan meraih skor performa 95+ di Google PageSpeed Insights, sehingga sangat cepat diakses dan nyaman dibuka dari smartphone, tablet, maupun desktop.',
                ],
                (object) [
                    'question' => 'Bagaimana layanan jasa SEO murah NazwaGraha membantu mencapai ranking 1 Google?',
                    'answer' => 'Kami mengoptimalkan website Anda secara menyeluruh: mulai dari struktur kode semantik, kecepatan rendering, riset kata kunci dengan niat beli tinggi (seperti "Jasa pembuatan website murah" dan "Konsultan IT Murah"), optimasi GEO lokal Google Maps, hingga konten yang menjawab kebutuhan calon pelanggan Anda.',
                ],
                (object) [
                    'question' => 'Apakah melayani instalasi jaringan LAN, pengadaan komputer, dan maintenance IT di wilayah Bogor & Ciawi?',
                    'answer' => 'Ya, kantor kami berlokasi di Banjarwangi, Ciawi, Bogor. Kami siap melayani kunjungan langsung (on-site) untuk wilayah Ciawi, Kota/Kabupaten Bogor, Jabodetabek, Sukabumi, dan sekitarnya, serta siap melayani pengadaan perangkat IT dan konsultasi online ke seluruh Indonesia.',
                ],
                (object) [
                    'question' => 'Bagaimana cara memulai konsultasi dan memesan jasa di NazwaGraha?',
                    'answer' => 'Sangat mudah! Anda cukup klik tombol WhatsApp (0812 98 506 111) atau mengisi formulir konsultasi cepat di website ini. Tim kami akan langsung merespons untuk mendiskusikan kebutuhan, memberikan rekomendasi solusi tepat, serta penawaran harga terbaik.',
                ],
            ]);
        }

        // 6. Build Multi-Schema JSON-LD for Search Engines (Rich Snippets)
        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            '@id' => url('/') . '#localbusiness',
            'name' => 'NazwaGraha - Jasa Pembuatan Website Murah & Konsultan IT Murah',
            'alternateName' => ['NazwaGraha', 'Nazwa Graha IT Solution'],
            'url' => url('/'),
            'logo' => asset('assets/images/logo-nazwagraha.webp'),
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+6281298506111',
            'email' => $settings['email'],
            'hasMap' => 'https://maps.google.com/?q=-6.6698,106.8532',
            'priceRange' => 'Rp 350.000 - Rp 8.500.000',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2',
                'addressLocality' => 'Ciawi',
                'addressRegion' => 'Bogor, Jawa Barat',
                'postalCode' => '16720',
                'addressCountry' => 'ID',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => -6.6698,
                'longitude' => 106.8532,
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    'opens' => '08:00',
                    'closes' => '21:00',
                ],
            ],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Bogor'],
                ['@type' => 'AdministrativeArea', 'name' => 'Ciawi'],
                ['@type' => 'AdministrativeArea', 'name' => 'Jabodetabek'],
                ['@type' => 'AdministrativeArea', 'name' => 'Jawa Barat'],
                ['@type' => 'Country', 'name' => 'Indonesia'],
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Layanan IT & Website Murah NazwaGraha',
                'itemListElement' => $services->map(function ($s) {
                    return [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => $s->name,
                            'description' => $s->short_description,
                        ],
                    ];
                })->toArray(),
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '5.0',
                'reviewCount' => '48',
                'bestRating' => '5',
                'worstRating' => '1',
            ],
            'review' => $testimonials->map(function ($t) {
                return [
                    '@type' => 'Review',
                    'author' => [
                        '@type' => 'Person',
                        'name' => $t->name,
                        'jobTitle' => $t->role . ', ' . $t->company,
                    ],
                    'reviewBody' => $t->quote,
                    'reviewRating' => [
                        '@type' => 'Rating',
                        'ratingValue' => $t->rating,
                        'bestRating' => '5',
                    ],
                ];
            })->toArray(),
        ];

        $schemaFaq = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqs->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer,
                    ],
                ];
            })->toArray(),
        ];

        $schemaWebSite = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => url('/') . '#website',
            'name' => 'NazwaGraha',
            'url' => url('/'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => url('/?q={search_term_string}'),
                'query-input' => 'required name=search_term_string',
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
                    'name' => 'Jasa Pembuatan Website Murah',
                    'item' => url('/#website'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Konsultan IT Murah',
                    'item' => url('/#services'),
                ],
            ],
        ];

        return view('home', compact(
            'settings',
            'services',
            'portfolios',
            'testimonials',
            'articles',
            'totalArticlesCount',
            'faqs',
            'schemaLocalBusiness',
            'schemaFaq',
            'schemaWebSite',
            'schemaBreadcrumb'
        ));
    }

    /**
     * Display the dedicated high-converting service page: Jasa Pembuatan Website Murah.
     */
    public function websiteService()
    {
        $settings = $this->getCommonSettings();
        $settings['meta_title'] = 'Jasa Pembuatan Website Murah, Profesional & Bergaransi | NazwaGraha';
        $settings['meta_description'] = 'Jasa pembuatan website murah terbaik di Bogor, Ciawi & seluruh Indonesia. Desain modern, loading super cepat PageSpeed 95+, gratis domain (.com) & SSL, SEO friendly, dan 100% hak milik aset.';
        $settings['canonical_url'] = url('/jasa-pembuatan-website-murah');

        $packages = [
            (object) [
                'id' => 'landing-page',
                'name' => 'Paket Landing Page Promo',
                'badge' => '⚡ Hemat & Cepat',
                'price' => 'Rp 499.000',
                'strike_price' => 'Rp 950.000',
                'duration' => '2 - 3 Hari Kerja',
                'is_popular' => false,
                'target_audience' => 'Ideal untuk produk tunggal, kampanye promosi, iklan FB/TikTok Ads, dan penawaran jasa kilat.',
                'cta_text' => 'Pesan Landing Page ➔',
                'features' => [
                    '1 Halaman Penjualan Panjang (Sales Funnel Konversi Tinggi)',
                    'Desain Mobile-First 100% Responsif & Modern',
                    'Gratis Domain (.my.id / .com promo) 1 Tahun',
                    'Gratis Cloud SSL Certificate (HTTPS Aman)',
                    'Tombol WhatsApp Floating & Form Pemesanan Otomatis',
                    'Kecepatan Google PageSpeed Score 90+',
                    'Integrasi Google Maps & Peta Alamat',
                    'Garansi Revisi Desain Hingga Sesuai',
                ],
            ],
            (object) [
                'id' => 'company-profile',
                'name' => 'Paket Company Profile Bisnis',
                'badge' => '🔥 Paling Populer (Best Value)',
                'price' => 'Rp 899.000',
                'strike_price' => 'Rp 1.750.000',
                'duration' => '3 - 5 Hari Kerja',
                'is_popular' => true,
                'target_audience' => 'Sangat cocok untuk UMKM, CV/PT, kantor, klinik, yayasan, kontraktor, dan jasa profesional.',
                'cta_text' => 'Pilih Paket Company Profile ➔',
                'features' => [
                    'Hingga 5 - 7 Halaman Menu (Home, Profil, Layanan, Portofolio, Berita, Kontak)',
                    'Gratis Domain Internasional (.com / .id) 1 Tahun',
                    'Gratis SSD NVMe High-Speed Cloud Hosting 1 Tahun',
                    'Gratis Email Bisnis Resmi (contoh: info@namaperusahaan.com)',
                    'Dashboard Admin / CMS Praktis (Bisa Edit Tulisan & Foto Sendiri)',
                    'Optimasi On-Page SEO & Schema Markup Google',
                    'Setup Google Bisnis Profil & Peta Kantor Resmi',
                    'Garansi Pemeliharaan Sistem & Video Tutorial Penggunaan',
                ],
            ],
            (object) [
                'id' => 'toko-online',
                'name' => 'Paket Toko Online & Katalog WhatsApp',
                'badge' => '🛒 Siap Jualan Online',
                'price' => 'Rp 1.490.000',
                'strike_price' => 'Rp 2.800.000',
                'duration' => '5 - 7 Hari Kerja',
                'is_popular' => false,
                'target_audience' => 'Pilihan tepat untuk pebisnis fashion, kuliner/F&B, retail, distributor, dan toko fisik.',
                'cta_text' => 'Pesan Toko Online ➔',
                'features' => [
                    'Katalog Produk & Kategori Tanpa Batas (Bisa Tambah Sendiri)',
                    'Tombol "Order via WhatsApp" Otomatis Terisi Nama & Harga Barang',
                    'Fitur Harga Diskon / Coret & Status Ketersediaan Stok',
                    'Integrasi Estimasi Ongkir Ekspedisi & Informasi Rekening',
                    'Gratis Domain (.com) + High Resource Hosting 1 Tahun',
                    'Email Bisnis Resmi + Cloudflare SSL Security',
                    'SEO Produk agar Tampil di Halaman Pencarian Google',
                    'Pendampingan Input Produk Perdana & Panduan Lengkap',
                ],
            ],
            (object) [
                'id' => 'custom-web',
                'name' => 'Paket Custom Web & Portal Bisnis',
                'badge' => '⚙️ Enterprise & Khusus',
                'price' => 'Rp 2.500.000+',
                'strike_price' => 'Sesuai Kebutuhan',
                'duration' => 'Konsultasikan',
                'is_popular' => false,
                'target_audience' => 'Untuk alur sistem unik, portal membership, sistem booking, inventaris, atau aplikasi web terpadu.',
                'cta_text' => 'Konsultasikan Kebutuhan ➔',
                'features' => [
                    'Framework Modern PHP (Laravel) & Database MySQL Handal',
                    'Fitur & Modul Disesuaikan SOP / Kebutuhan Bisnis Klien',
                    'Keamanan Tingkat Tinggi (Anti SQL Injection, CSRF, & XSS)',
                    'Multi-Level User Access (Admin, Staff, Customer)',
                    'Integrasi API Payment Gateway & Ekspedisi (Opsional)',
                    'Serah Terima Source Code Lengkap 100% Hak Milik Klien',
                    'Garansi Maintenance Teknis & SLA Dukungan Prioritas',
                ],
            ],
        ];

        $comparisons = [
            [
                'feature' => 'Kecepatan & Kinerja',
                'others' => 'Sering lambat (> 5 detik) karena hosting murahan & plugin berlebih',
                'nazwa' => 'Super cepat (< 2 detik), Skor 95+ di Google PageSpeed Insights',
            ],
            [
                'feature' => 'Kepemilikan Aset',
                'others' => 'Akun cPanel & domain ditahan atau disandera, klien tidak bebas',
                'nazwa' => '100% Hak Milik Anda. Akses cPanel, domain, dan file diserahkan penuh',
            ],
            [
                'feature' => 'Biaya Perpanjangan',
                'others' => 'Tahun kedua melonjak mahal tanpa penjelasan diawal (biaya jebakan)',
                'nazwa' => 'Transparan & terjangkau. Hanya bayar biaya modal server & domain',
            ],
            [
                'feature' => 'Keamanan & Lisensi',
                'others' => 'Menggunakan tema bajakan (nulled) yang rawan disusupi virus / judi online',
                'nazwa' => 'Kode bersih, resmi, bebas script berbahaya & dilengkapi SSL otomatis',
            ],
            [
                'feature' => 'Dukungan & Garansi',
                'others' => 'Sulit dihubungi dan lepas tangan setelah website selesai dibayar',
                'nazwa' => 'Konsultasi ramah via WhatsApp, garansi revisi, dan panduan penggunaan',
            ],
        ];

        $faqs = [
            (object) [
                'question' => 'Bagaimana jika saya belum memiliki logo dan materi tulisan?',
                'answer' => 'Tidak perlu bingung! Tim NazwaGraha siap membantu menyusun struktur tulisan promosi (copywriting), memilihkan foto ilustrasi berlisensi resmi yang sesuai dengan industri Anda, serta membantu merapikan logo usaha Anda agar siap ditampilkan di website.',
            ],
            (object) [
                'question' => 'Berapa biaya perpanjangan domain dan hosting di tahun berikutnya?',
                'answer' => 'Biaya perpanjangan di NazwaGraha sangat transparan dan hemat. Kami tidak memungut biaya siluman atau biaya jasa ulang. Di tahun kedua, Anda hanya membayar biaya sewa domain dan hosting standar (mulai Rp 350.000 hingga Rp 650.000 per tahun tergantung spesifikasi paket yang Anda gunakan).',
            ],
            (object) [
                'question' => 'Apakah websitenya bisa saya edit dan kelola sendiri nantinya?',
                'answer' => 'Tentu saja! Kami menyediakan panel admin (CMS) yang sangat ramah pengguna, bahkan untuk pemula. Anda dapat mengubah nomor WhatsApp, menambah produk baru, mengganti harga, atau mengunggah artikel blog. Kami juga menyertakan panduan video langkah demi langkah.',
            ],
            (object) [
                'question' => 'Berapa lama proses pembuatan website hingga online?',
                'answer' => 'Untuk Paket Landing Page rata-rata selesai dalam 2-3 hari kerja. Untuk Paket Company Profile memakan waktu 3-5 hari kerja, dan Paket Toko Online sekitar 5-7 hari kerja setelah seluruh materi dasar kami terima.',
            ],
            (object) [
                'question' => 'Bagaimana sistem pembayarannya?',
                'answer' => 'Sistem pembayaran sangat aman dan nyaman: Anda cukup membayar uang muka (DP) sebesar 50% di awal sebagai tanda jadi dan pemesanan nama domain. Sisa pelunasan 50% dibayarkan setelah website selesai dikerjakan, Anda tinjau, dan siap dipublikasikan.',
            ],
            (object) [
                'question' => 'Apakah website saya dijamin bisa muncul di pencarian Google?',
                'answer' => 'Ya, setiap website yang kami bangun sudah dioptimasi dengan kaidah SEO On-Page dasar, struktur metadata ramah mesin pencari, sitemap XML, serta didaftarkan ke Google Search Console agar dapat cepat terindeks oleh robot Google.',
            ],
        ];

        $servicePage = $this->resolveServicePage('jasa-pembuatan-website-murah', $settings, $packages, $comparisons, $faqs);
        if ($servicePage instanceof \Illuminate\Http\RedirectResponse) {
            return $servicePage;
        }

        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha - Jasa Pembuatan Website Murah',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+62' . ltrim($settings['phone'] ?? '081298506111', '0'),
            'email' => $settings['email'] ?? 'nazwagraha@gmail.com',
            'hasMap' => 'https://maps.google.com/?q=' . ($settings['geo_latitude'] ?? '-6.6698') . ',' . ($settings['geo_longitude'] ?? '106.8532'),
            'priceRange' => 'Rp 499.000 - Rp 2.500.000',
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
                'latitude' => $settings['geo_latitude'],
                'longitude' => $settings['geo_longitude'],
            ],
            'url' => url('/jasa-pembuatan-website-murah'),
        ];

        $schemaService = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Jasa Pembuatan Website Murah & Profesional',
            'serviceType' => 'Web Development',
            'provider' => [
                '@type' => 'ProfessionalService',
                'name' => 'NazwaGraha',
                'url' => url('/'),
            ],
            'areaServed' => [
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Bogor',
                ],
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Jabodetabek',
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Indonesia',
                ],
            ],
            'offers' => [
                '@type' => 'AggregateOffer',
                'priceCurrency' => 'IDR',
                'lowPrice' => '499000',
                'highPrice' => '2500000',
                'offerCount' => '4',
            ],
        ];

        $schemaFaq = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer,
                    ],
                ];
            })->toArray(),
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
                    'name' => 'Layanan Kami',
                    'item' => url('/#services'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Jasa Pembuatan Website Murah',
                    'item' => url('/jasa-pembuatan-website-murah'),
                ],
            ],
        ];

        return view('website-service', compact(
            'servicePage',
            'settings',
            'packages',
            'comparisons',
            'faqs',
            'schemaLocalBusiness',
            'schemaService',
            'schemaFaq',
            'schemaBreadcrumb'
        ));
    }

    /**
     * Display the dedicated high-converting service page: Jasa SEO Murah Bergaransi.
     */
    public function seoService()
    {
        $settings = $this->getCommonSettings();
        $settings['meta_title'] = 'Jasa SEO Murah Bergaransi Ranking 1 Google | NazwaGraha';
        $settings['meta_description'] = 'Jasa SEO murah & bergaransi di Bogor & seluruh Indonesia. Optimasi kata kunci tertarget, Google Bisnis Profil, teknik White-Hat aman, dan laporan transparan. Mulai Rp 750rb.';
        $settings['canonical_url'] = url('/jasa-seo-murah');

        $packages = [
            (object) [
                'id' => 'seo-lokal',
                'name' => 'Paket SEO Lokal & UMKM',
                'badge' => '📍 Spesialis Bisnis Lokal',
                'price' => 'Rp 750.000',
                'strike_price' => 'Rp 1.400.000',
                'duration' => 'Bulanan (Hasil Terlihat 1-2 Bulan)',
                'is_popular' => false,
                'target_audience' => 'Sangat cocok untuk bisnis lokal, klinik, bengkel, katering, jasa area Bogor, Jabodetabek & kota spesifik.',
                'cta_text' => 'Pesan SEO Lokal ➔',
                'features' => [
                    '3 - 5 Kata Kunci Lokal Tertarget & Niat Beli Tinggi',
                    'Optimasi Google Bisnis Profil (Google Maps & Review)',
                    'On-Page SEO (Title Tag, Meta Description, Heading H1-H3)',
                    'Optimasi Kecepatan Loading & Core Web Vitals',
                    'Penanaman Schema Markup LocalBusiness (Kaya Cuplikan Google)',
                    'Laporan Perkembangan Ranking & Trafik Setiap Bulan',
                    'Konsultasi & Support via WhatsApp',
                ],
            ],
            (object) [
                'id' => 'seo-bisnis',
                'name' => 'Paket SEO Bisnis Berkembang',
                'badge' => '🔥 Paling Populer (Best Value)',
                'price' => 'Rp 1.500.000',
                'strike_price' => 'Rp 2.800.000',
                'duration' => 'Bulanan (Hasil Terlihat 2-3 Bulan)',
                'is_popular' => true,
                'target_audience' => 'Pilihan terbaik untuk toko online, distributor, kontraktor, dan perusahaan jasa dengan jangkauan nasional.',
                'cta_text' => 'Pilih Paket SEO Bisnis ➔',
                'features' => [
                    '8 - 12 Kata Kunci Transaksional (Niat Beli Tinggi)',
                    'Riset Analisis Kompetitor & Celah Kata Kunci (Keyword Gap)',
                    'Gratis 4 Artikel Pilar SEO Berkualitas Tinggi per Bulan',
                    'Perbaikan Technical SEO (Sitemap, Robot.txt, Canonical)',
                    'Optimasi Struktur Silo & Internal Linking Antar Halaman',
                    'Strategi Backlink Berkualitas & Alami (100% White-Hat)',
                    'Setup & Monitoring Google Search Console & GA4',
                    'Laporan Bulanan Lengkap & Rekomendasi Pertumbuhan',
                ],
            ],
            (object) [
                'id' => 'seo-korporat',
                'name' => 'Paket SEO Agresif / Korporat',
                'badge' => '🚀 Dominasi Halaman 1 Google',
                'price' => 'Rp 2.750.000',
                'strike_price' => 'Rp 4.500.000',
                'duration' => 'Bulanan (Hasil Terlihat 2-4 Bulan)',
                'is_popular' => false,
                'target_audience' => 'Untuk brand nasional, portal e-commerce besar, dan industri dengan tingkat persaingan kata kunci tinggi.',
                'cta_text' => 'Pesan SEO Korporat ➔',
                'features' => [
                    'Hingga 20+ Kata Kunci Strategis & Turunannya (Long-Tail)',
                    'Gratis 8 - 10 Artikel SEO Edukatif & Transaksional per Bulan',
                    'Audit Teknis Menyeluruh & Optimasi Arsitektur Web Lanjutan',
                    'Kampanye Backlink Berkualitas Otoritas Tinggi (High DA/PA)',
                    'Monitoring Fluktuasi Algoritma Google & Proteksi Penurunan',
                    'Tracking Posisi Kata Kunci Mingguan & Evaluasi Konversi',
                    'Konsultasi Strategis 1-on-1 Bersama Tim Pakar SEO',
                ],
            ],
            (object) [
                'id' => 'seo-audit',
                'name' => 'Paket Audit SEO & Quick Fix',
                'badge' => '⚡ Bedah Masalah Web (One-Time)',
                'price' => 'Rp 499.000',
                'strike_price' => 'Rp 950.000',
                'duration' => '3 - 5 Hari Kerja (Sekali Bayar)',
                'is_popular' => false,
                'target_audience' => 'Bagi pemilik website yang trafiknya anjlok, tidak muncul di Google, atau ingin tahu kendala teknis webnya.',
                'cta_text' => 'Pesan Audit SEO ➔',
                'features' => [
                    'Audit Menyeluruh 50+ Parameter SEO Google',
                    'Pendeteksian Error Crawling, 404, Broken Link & Redirect Loop',
                    'Pemeriksaan Penalti Algoritma Google / Spam Score',
                    'Audit Kecepatan Mobile & Desktop di PageSpeed Insights',
                    'Dokumen Laporan PDF Masalah & Panduan Solusi Perbaikan',
                    'Konsultasi 30 Menit untuk Membedah Hasil Audit',
                ],
            ],
        ];

        $comparisons = [
            [
                'feature' => 'Metode Optimasi',
                'others' => 'Menggunakan bot otomatis & beli ribuan backlink spam (Black-Hat)',
                'nazwa' => '100% Teknik White-Hat resmi sesuai pedoman Webmaster Google terbaru',
            ],
            [
                'feature' => 'Keamanan Domain',
                'others' => 'Beresiko tinggi terkena pinalti deindex atau peringkat hilang seketika',
                'nazwa' => 'Aman permanen, posisi ranking stabil dan terus menguat jangka panjang',
            ],
            [
                'feature' => 'Target Kata Kunci',
                'others' => 'Kata kunci asal-asalan tanpa pencari dan tanpa niat beli (zero conversion)',
                'nazwa' => 'Riset kata kunci transaksional yang mendatangkan pembeli nyata',
            ],
            [
                'feature' => 'Optimasi Lokal (Google Maps)',
                'others' => 'Diabaikan, hanya fokus backlink tanpa integrasi peta dan review lokal',
                'nazwa' => 'Didukung GEO SEO & Google Bisnis Profil untuk mendominasi area Bogor & sekitarnya',
            ],
            [
                'feature' => 'Transparansi Laporan',
                'others' => 'Tanpa laporan jelas atau hanya memberi screenshot yang dimanipulasi',
                'nazwa' => 'Laporan berkala data asli dari Google Search Console & tools rank tracker',
            ],
        ];

        $faqs = [
            (object) [
                'question' => 'Berapa lama waktu yang dibutuhkan hingga website masuk halaman 1 Google?',
                'answer' => 'Waktu yang dibutuhkan bervariasi tergantung tingkat persaingan kata kunci dan usia domain Anda. Rata-rata website mulai mengalami pergerakan naik dalam 4 hingga 8 minggu pertama, dan mencapai halaman 1 Google dalam 2 hingga 4 bulan dengan optimasi konsisten.',
            ],
            (object) [
                'question' => 'Mengapa SEO lebih menguntungkan dibanding Google Ads berbayar?',
                'answer' => 'Pada Google Ads, trafik akan langsung berhenti begitu saldo iklan Anda habis. Sementara dengan SEO, begitu website Anda berada di halaman 1 Google, Anda akan mendapatkan aliran calon pembeli secara gratis tanpa bayar per klik, 24 jam nonstop.',
            ],
            (object) [
                'question' => 'Apakah teknik SEO di NazwaGraha dijamin aman dari pinalti Google?',
                'answer' => 'Sangat aman! NazwaGraha secara ketat menerapkan kaidah White-Hat SEO murni. Kami tidak pernah menggunakan trik manipulasi terlarang seperti bot spam backlink atau keyword stuffing yang dapat merusak domain Anda di mata Google.',
            ],
            (object) [
                'question' => 'Bisakah SEO difokuskan hanya untuk wilayah Bogor atau Jabodetabek saja?',
                'answer' => 'Tentu saja! Ini adalah salah satu keunggulan utama kami (Local SEO). Kami akan mengoptimalkan website Anda agar muncul ketika calon pelanggan mencari kata kunci lokal (contoh: "jasa katering bogor", "distributor herbal ciawi"), serta memaksimalkan visibilitas di Google Maps.',
            ],
            (object) [
                'question' => 'Apakah saya perlu merombak seluruh isi website saya saat ini?',
                'answer' => 'Tidak perlu. Kami akan melakukan perbaikan pada halaman yang sudah ada (On-Page SEO), menyempurnakan struktur judul, deskripsi, kecepatan loading, dan menambahkan artikel pendukung tanpa mengubah tampilan utama website Anda.',
            ],
            (object) [
                'question' => 'Apakah saya akan menerima laporan perkembangan setiap bulannya?',
                'answer' => 'Ya, setiap akhir periode pengerjaan bulanan, kami akan mengirimkan laporan perkembangan posisi kata kunci, lonjakan impresi, dan grafik klik pengunjung yang bersumber langsung dari Google Search Console secara transparan.',
            ],
        ];

        $servicePage = $this->resolveServicePage('jasa-seo-murah', $settings, $packages, $comparisons, $faqs);
        if ($servicePage instanceof \Illuminate\Http\RedirectResponse) {
            return $servicePage;
        }

        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha - Jasa SEO Murah Bergaransi',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+62' . ltrim($settings['phone'] ?? '081298506111', '0'),
            'email' => $settings['email'] ?? 'nazwagraha@gmail.com',
            'hasMap' => 'https://maps.google.com/?q=' . ($settings['geo_latitude'] ?? '-6.6698') . ',' . ($settings['geo_longitude'] ?? '106.8532'),
            'priceRange' => 'Rp 499.000 - Rp 2.750.000',
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
                'latitude' => $settings['geo_latitude'],
                'longitude' => $settings['geo_longitude'],
            ],
            'url' => url('/jasa-seo-murah'),
        ];

        $schemaService = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Jasa SEO Murah Bergaransi Ranking 1 Google',
            'serviceType' => 'Search Engine Optimization',
            'provider' => [
                '@type' => 'ProfessionalService',
                'name' => 'NazwaGraha',
                'url' => url('/'),
            ],
            'areaServed' => [
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Bogor',
                ],
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Jabodetabek',
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Indonesia',
                ],
            ],
            'offers' => [
                '@type' => 'AggregateOffer',
                'priceCurrency' => 'IDR',
                'lowPrice' => '499000',
                'highPrice' => '2750000',
                'offerCount' => '4',
            ],
        ];

        $schemaFaq = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer,
                    ],
                ];
            })->toArray(),
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
                    'name' => 'Layanan Kami',
                    'item' => url('/#services'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Jasa SEO Murah Bergaransi',
                    'item' => url('/jasa-seo-murah'),
                ],
            ],
        ];

        return view('seo-service', compact(
            'servicePage',
            'settings',
            'packages',
            'comparisons',
            'faqs',
            'schemaLocalBusiness',
            'schemaService',
            'schemaFaq',
            'schemaBreadcrumb'
        ));
    }

    /**
     * Display the dedicated high-converting service page: Instalasi Jaringan (LAN) & Wi-Fi.
     */
    public function networkService()
    {
        $settings = $this->getCommonSettings();
        $settings['meta_title'] = 'Jasa Instalasi Jaringan LAN & Wi-Fi Kantor Murah Bogor | NazwaGraha';
        $settings['meta_description'] = 'Jasa instalasi jaringan LAN, penarikan kabel UTP/STP Cat6, setting Router Mikrotik & Cisco, Wi-Fi kantor, server rack & troubleshooting di Bogor & Jabodetabek. Bergaransi & rapi.';
        $settings['canonical_url'] = url('/instalasi-jaringan-lan');

        $packages = [
            (object) [
                'id' => 'lan-small',
                'name' => 'Paket LAN Kantor Skala Kecil',
                'badge' => '⚡ Ruko & Kantor Kecil',
                'price' => 'Rp 1.250.000',
                'strike_price' => 'Rp 2.000.000',
                'duration' => '1 - 2 Hari Kerja',
                'is_popular' => false,
                'target_audience' => 'Cocok untuk ruko, klinik, kafe, kantor cabang, dan UMKM dengan 5 hingga 10 titik kabel komputer/printer.',
                'cta_text' => 'Pesan LAN Skala Kecil ➔',
                'features' => [
                    'Jasa Penarikan Kabel LAN UTP Cat6 (Hingga 10 Titik)',
                    'Crimping Konektor RJ45 Berkualitas & Faceplate Modular Rapi',
                    'Labeling & Penomoran Setiap Ujung Titik Kabel',
                    'Konfigurasi Dasar Modem ISP, Router & Switch Unmanaged',
                    'Pengujian Kecepatan Transfer Data (Throughput Test) Tiap Titik',
                    'Termasuk Proteksi Pelindung Kabel (Ducting PVC Standar)',
                    'Garansi Instalasi & Maintenance Teknis 30 Hari',
                ],
            ],
            (object) [
                'id' => 'lan-business',
                'name' => 'Paket LAN & Wi-Fi Bisnis Terpadu',
                'badge' => '🔥 Paling Populer (Best Value)',
                'price' => 'Rp 2.500.000',
                'strike_price' => 'Rp 4.200.000',
                'duration' => '2 - 3 Hari Kerja',
                'is_popular' => true,
                'target_audience' => 'Pilihan tepat untuk perkantoran 2-3 lantai, coworking space, gudang, dan sekolah (15 hingga 30 titik).',
                'cta_text' => 'Pilih Paket LAN Bisnis ➔',
                'features' => [
                    'Jasa Tarik Kabel UTP/STP Cat6 Berpelindung Pipa Conduit (15 - 30 Titik)',
                    'Instalasi & Setting Access Point Wi-Fi Roaming (UniFi / Ruijie) Tanpa Putus',
                    'Konfigurasi Router Mikrotik Cerdas (Bandwidth Management & Anti Lemot)',
                    'Pemisahan Jalur Wi-Fi Staff Kantor vs Wi-Fi Tamu (Guest Network)',
                    'Terminasi Patch Panel Rapi ke Rack Server Mini (Wallmount)',
                    'Dokumentasi Skema Topologi & Peta Denah Titik Jaringan',
                    'Garansi Instalasi Penuh & Layanan Panggilan Cepat 60 Hari',
                ],
            ],
            (object) [
                'id' => 'lan-enterprise',
                'name' => 'Paket Enterprise & Server Rack',
                'badge' => '🏢 Gedung & Pabrik',
                'price' => 'Rp 4.500.000+',
                'strike_price' => 'Sesuai Survei',
                'duration' => '3 - 5 Hari Kerja',
                'is_popular' => false,
                'target_audience' => 'Untuk korporasi, pabrik industri, hotel, gedung bertingkat, dan ruang server pusat data (> 30 titik).',
                'cta_text' => 'Konsultasikan Enterprise ➔',
                'features' => [
                    'Penataan & Perakitan Server Rack Cabinet (Closed/Open Rack 19")',
                    'Konfigurasi Switch Manageable (VLAN Antar Divisi, LACP, QoS, Trunking)',
                    'Setting Failover Dual ISP (Backup Internet Otomatis Jika 1 Provider Mati)',
                    'Konfigurasi VPN Site-to-Site & Proteksi Firewall Jaringan Kantor',
                    'Integrasi Jalur IP Camera CCTV, Fingerprint & Server File Lokal (NAS)',
                    'Dokumentasi Lengkap Port Mapping & Topologi Jaringan Standar Industri',
                    'SLA Dukungan Darurat & Garansi Pemeliharaan Eksklusif',
                ],
            ],
            (object) [
                'id' => 'lan-troubleshoot',
                'name' => 'Paket Perapian & Troubleshooting',
                'badge' => '🔧 Solusi Kabel Kusut & Lemot',
                'price' => 'Rp 650.000',
                'strike_price' => 'Rp 1.200.000',
                'duration' => '1 Hari Kerja',
                'is_popular' => false,
                'target_audience' => 'Solusi cepat untuk kantor dengan kabel semrawut, internet sering putus-nyambung, atau IP conflict.',
                'cta_text' => 'Pesan Troubleshooting ➔',
                'features' => [
                    'Audit & Pelacakan Jalur Kabel LAN yang Rusak / Putus Menggunakan Cable Tester',
                    'Perapian Kabel Semrawut di Area Kerja & Meja Karyawan',
                    'Re-kabeling & Penataan Ulang Kabel Kusut di Switch / Rack Server',
                    'Pembersihan IP Conflict & Konfigurasi Ulang DHCP Server',
                    'Optimalisasi Frekuensi Saluran Wi-Fi (Mengatasi Wi-Fi Lemot / Tabrakan Sinyal)',
                    'Laporan Rekomendasi Peningkatan Performa Jaringan Kantor',
                ],
            ],
        ];

        $comparisons = [
            [
                'feature' => 'Kerapian Jalur Kabel',
                'others' => 'Kabel bergelantungan tanpa pipa pelindung, tercecer di lantai dan rawan digigit tikus',
                'nazwa' => '100% Rapi menggunakan pipa conduit, ducting PVC berlabel, dan tersembunyi elegan',
            ],
            [
                'feature' => 'Manajemen Bandwidth',
                'others' => 'Tanpa pengaturan router: jika 1 karyawan download/streaming, seluruh kantor langsung lemot',
                'nazwa' => 'Setting Router Mikrotik cerdas: alokasi bandwidth adil per divisi dan prioritas meeting online',
            ],
            [
                'feature' => 'Kualitas Wi-Fi Kantor',
                'others' => 'Menggunakan router rumahan murah yang sering hang saat diakses belasan orang bersamaan',
                'nazwa' => 'Access Point Enterprise (UniFi / Ruijie) sanggup menangani puluhan hingga ratusan perangkat stabil',
            ],
            [
                'feature' => 'Labeling & Dokumentasi',
                'others' => 'Tanpa nomor titik kabel: jika ada komputer mati, bingung melacak kabel di panel switch',
                'nazwa' => 'Setiap titik kabel diberi nomor terstruktur (patch cord to wallplate) lengkap dengan peta topologi',
            ],
            [
                'feature' => 'Garansi & Kunjungan Lapangan',
                'others' => 'Tukang pasang lepas tangan setelah kabel tersambung dan sulit dihubungi saat ada kendala',
                'nazwa' => 'Garansi on-site resmi dengan teknisi siap datang ke lokasi kantor Anda di area Bogor & sekitarnya',
            ],
        ];

        $faqs = [
            (object) [
                'question' => 'Berapa lama waktu yang dibutuhkan untuk pengerjaan instalasi jaringan LAN?',
                'answer' => 'Untuk kantor skala kecil (5-10 titik) umumnya selesai dalam 1 hari kerja. Untuk skala menengah (15-30 titik) memakan waktu 2 hingga 3 hari kerja, termasuk tahapan penarikan kabel, penataan pipa pelindung, crimping, dan setting router/access point.',
            ],
            (object) [
                'question' => 'Apakah NazwaGraha menyediakan layanan survei lokasi kantor terlebih dahulu?',
                'answer' => 'Ya, tentu saja! Kami menyediakan layanan survei lokasi gratis untuk wilayah Ciawi dan Bogor. Tim teknisi kami akan mengukur panjang jalur kabel, mengecek struktur ruangan, dan memberikan estimasi kebutuhan perangkat yang paling hemat dan efisien.',
            ],
            (object) [
                'question' => 'Apakah perangkat jaringan (kabel, switch, router) disediakan oleh NazwaGraha atau beli sendiri?',
                'answer' => 'Sangat fleksibel: Anda bisa memilih paket "Terima Beres" di mana kami menyediakan seluruh perangkat berkualitas standar industri (Belden/Schneider Cat6, Mikrotik, Cisco, UniFi), atau Anda dapat menyediakan perangkat sendiri dan kami hanya mengenakan biaya jasa instalasi.',
            ],
            (object) [
                'question' => 'Bagaimana solusi mengatasi internet kantor yang sering lemot karena karyawan streaming / download?',
                'answer' => 'Kami akan mengonfigurasi Router Mikrotik dengan fitur Bandwidth Management (Queues). Setiap staf akan mendapatkan batas kecepatan yang adil, jalur streaming media sosial dapat dibatasi pada jam kerja, dan jalur meeting Zoom / Google Meet diprioritaskan.',
            ],
            (object) [
                'question' => 'Apakah instalasi kabel dijamin rapi dan tidak merusak estetika interior kantor?',
                'answer' => 'Pasti! Standar kerja kami mengutamakan kerapian estetika interior. Kabel selalu dilindungi pipa conduit PVC atau ducting kabel lantai/dinding, melewati jalur plafon tersembunyi, dan dipasang rapi pada wallplate modular.',
            ],
            (object) [
                'question' => 'Wilayah mana saja yang dijangkau untuk jasa instalasi jaringan ini?',
                'answer' => 'Kami melayani instalasi on-site langsung di lokasi untuk area Ciawi, Bogor Kota, Kabupaten Bogor, Depok, Sukabumi, Jakarta, Tangerang, Bekasi (Jabodetabek) dan sekitarnya.',
            ],
        ];

        $servicePage = $this->resolveServicePage('instalasi-jaringan-lan', $settings, $packages, $comparisons, $faqs);
        if ($servicePage instanceof \Illuminate\Http\RedirectResponse) {
            return $servicePage;
        }

        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha - Jasa Instalasi Jaringan LAN & Wi-Fi',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+62' . ltrim($settings['phone'] ?? '081298506111', '0'),
            'email' => $settings['email'] ?? 'nazwagraha@gmail.com',
            'hasMap' => 'https://maps.google.com/?q=' . ($settings['geo_latitude'] ?? '-6.6698') . ',' . ($settings['geo_longitude'] ?? '106.8532'),
            'priceRange' => 'Rp 650.000 - Rp 4.500.000',
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
                'latitude' => $settings['geo_latitude'],
                'longitude' => $settings['geo_longitude'],
            ],
            'url' => url('/instalasi-jaringan-lan'),
        ];

        $schemaService = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Jasa Instalasi Jaringan LAN & Wi-Fi Kantor',
            'serviceType' => 'Network Installation & Maintenance',
            'provider' => [
                '@type' => 'ProfessionalService',
                'name' => 'NazwaGraha',
                'url' => url('/'),
            ],
            'areaServed' => [
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Bogor',
                ],
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Jabodetabek',
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Indonesia',
                ],
            ],
            'offers' => [
                '@type' => 'AggregateOffer',
                'priceCurrency' => 'IDR',
                'lowPrice' => '650000',
                'highPrice' => '4500000',
                'offerCount' => '4',
            ],
        ];

        $schemaFaq = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer,
                    ],
                ];
            })->toArray(),
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
                    'name' => 'Layanan Kami',
                    'item' => url('/#services'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Instalasi Jaringan LAN & Wi-Fi',
                    'item' => url('/instalasi-jaringan-lan'),
                ],
            ],
        ];

        return view('network-service', compact(
            'servicePage',
            'settings',
            'packages',
            'comparisons',
            'faqs',
            'schemaLocalBusiness',
            'schemaService',
            'schemaFaq',
            'schemaBreadcrumb'
        ));
    }

    /**
     * Display the dedicated high-converting service page: Pengadaan Komputer & Hardware IT.
     */
    public function hardwareService()
    {
        $settings = $this->getCommonSettings();
        $settings['meta_title'] = 'Jasa Pengadaan Komputer & Laptop Kantor Murah Bogor | NazwaGraha';
        $settings['meta_description'] = 'Jasa pengadaan komputer PC kantor, laptop bisnis, printer, UPS, dan hardware IT bergaransi resmi distributor di Bogor & Jabodetabek. Siap pakai, diantar & disetting langsung di kantor.';
        $settings['canonical_url'] = url('/pengadaan-komputer');

        $packages = [
            (object) [
                'id' => 'pc-admin',
                'name' => 'Paket PC Kantor & Administrasi',
                'badge' => '⚡ Hemat & Handal',
                'price' => 'Mulai Rp 3.850.000 / unit',
                'strike_price' => 'Rp 4.500.000',
                'duration' => '1 - 3 Hari (Ready Stock)',
                'is_popular' => false,
                'target_audience' => 'Sangat cocok untuk staf administrasi, resepsionis, kasir, accounting, dan operasional harian kantor.',
                'cta_text' => 'Pesan PC Administrasi ➔',
                'features' => [
                    'Processor Intel Core i3 / Core i5 / AMD Ryzen Kencang',
                    'RAM 8GB / 16GB DDR4 High Speed (Bebas Lag Multitasking)',
                    'Storage Ultra Cepat SSD NVMe 256GB / 512GB',
                    'Monitor LED 21.5" IPS Full HD Jernih & Nyaman di Mata',
                    'Keyboard, Mouse & Mousepad Bisnis Tahan Banting',
                    'Terinstal OS Windows & Software Office Siap Langsung Kerja',
                    'Garansi Resmi Distributor 1 - 2 Tahun Penuh',
                ],
            ],
            (object) [
                'id' => 'laptop-business',
                'name' => 'Paket Laptop Bisnis & Operasional',
                'badge' => '🔥 Paling Populer (Best Value)',
                'price' => 'Mulai Rp 5.200.000 / unit',
                'strike_price' => 'Rp 6.200.000',
                'duration' => '1 - 2 Hari Pengiriman',
                'is_popular' => true,
                'target_audience' => 'Pilihan utama untuk tim marketing, manajer, staf mobile, dan profesional yang sering bekerja di luar kantor.',
                'cta_text' => 'Pilih Laptop Bisnis ➔',
                'features' => [
                    'Brand Resmi Ternama (Lenovo ThinkPad / HP / ASUS ExpertBook)',
                    'Processor Generasi Baru Hemat Daya & Performa Tinggi',
                    'RAM 8GB / 16GB + Storage Cepat SSD NVMe 512GB',
                    'Layar 14" Full HD Anti-Glare (Bebas Pantulan Cahaya)',
                    'Baterai Awet Tahan Seharian + Charger Cepat (Fast Charging)',
                    'Bonus Tas Laptop Bisnis Eksklusif & Mouse Wireless',
                    'Garansi Resmi Distributor Nasional & Bantuan Klaim Cepat',
                ],
            ],
            (object) [
                'id' => 'pc-workstation',
                'name' => 'Paket PC Desain & Workstation Berat',
                'badge' => '🚀 Render & Desain Berat',
                'price' => 'Mulai Rp 8.500.000 / unit',
                'strike_price' => 'Rp 10.500.000',
                'duration' => '2 - 4 Hari Perakitan',
                'is_popular' => false,
                'target_audience' => 'Khusus untuk desainer grafis, video editor 4K, arsitek (AutoCAD/3ds Max), programmer, dan olah data besar.',
                'cta_text' => 'Pesan PC Workstation ➔',
                'features' => [
                    'Processor Performa Ekstrem Intel Core i7 / AMD Ryzen 7',
                    'Kartu Grafis Dedicated NVIDIA GeForce RTX Series',
                    'RAM 16GB / 32GB Dual Channel untuk Rendering Kilat',
                    'Dual Storage: SSD NVMe 512GB + HDD 1TB / 2TB Penyimpanan',
                    'Monitor 24" - 27" IPS Akurasi Warna Tinggi (sRGB 99%)',
                    'Power Supply Bersertifikat 80+ Bronze & Casing Airflow Dingin',
                    'Garansi Komponen Part Resmi hingga 3 Tahun',
                ],
            ],
            (object) [
                'id' => 'it-bundling',
                'name' => 'Paket Pengadaan Bundling Kantor Lengkap',
                'badge' => '🏢 Pengadaan Kantor Baru',
                'price' => 'Konsultasikan Sesuai Anggaran',
                'strike_price' => 'Diskon Paket Proyek',
                'duration' => 'Fleksibel Sesuai Kebutuhan',
                'is_popular' => false,
                'target_audience' => 'Untuk pendirian kantor baru, laboratorium sekolah, peremajaan unit PC, dan cabang perusahaan.',
                'cta_text' => 'Konsultasi Pengadaan Proyek ➔',
                'features' => [
                    'Paket Kombinasi PC/Laptop Sesuai Jumlah Karyawan (5 - 50+ Unit)',
                    'Termasuk Printer All-in-One (Print, Scan, Copy) & Mesin Scanner',
                    'UPS Back-UPS Penstabil Tegangan & Pelindung Saat Listrik Mati',
                    'Gratis Pengantaran & Perakitan Langsung di Meja Kerja Kantor',
                    'Setting Sambungan ke Jaringan LAN & Printer Bersama (Sharing)',
                    'Dukungan Dokumen Legalitas Faktur Pajak & Invoice Resmi Perusahaan',
                    'Layanan Pemeliharaan Berkala & Prioritas Penanganan Darurat',
                ],
            ],
        ];

        $comparisons = [
            [
                'feature' => 'Keaslian & Garansi',
                'others' => 'Sering diberi komponen bekas/rekondisi dengan garansi toko singkat (hanya 1 bulan)',
                'nazwa' => '100% Unit baru bergaransi resmi distributor Indonesia (1 hingga 3 tahun penuh)',
            ],
            [
                'feature' => 'Kesesuaian Spesifikasi',
                'others' => 'Menjual barang sisa gudang yang tidak pas dengan kebutuhan software kerja Anda',
                'nazwa' => 'Spesifikasi disesuaikan tepat dengan jenis beban kerja staf (tidak mubazir & tidak lemot)',
            ],
            [
                'feature' => 'Pengantaran & Instalasi',
                'others' => 'Hanya dikirim kardusan: Anda harus merakit, install Windows, dan setting kabel sendiri',
                'nazwa' => 'Terima beres: teknisi kami antar, rakit, install OS/Office, dan setting di meja kantor Anda',
            ],
            [
                'feature' => 'Administrasi & Pembayaran',
                'others' => 'Tidak menyediakan invoice resmi, faktur pajak, atau opsi Purchase Order (PO)',
                'nazwa' => 'Legalitas jelas: mendukung PO resmi, invoice perusahaan, faktur pajak, dan termin bertahap',
            ],
            [
                'feature' => 'Layanan Purna Jual',
                'others' => 'Lepas tangan jika terjadi kerusakan dan pembeli harus mengurus klaim garansi sendiri',
                'nazwa' => 'Didampingi tim NazwaGraha: kami bantu pengecekan on-site dan pengurusan klaim garansi',
            ],
        ];

        $faqs = [
            (object) [
                'question' => 'Apakah seluruh unit komputer dan laptop bergaransi resmi distributor?',
                'answer' => 'Ya, 100% dijamin baru dan bergaransi resmi distributor Indonesia (seperti Synnex Metrodata, Astrindo, ECS, dll.) selama 1 hingga 3 tahun. Kami tidak pernah menjual barang rekondisi atau barang black market.',
            ],
            (object) [
                'question' => 'Apakah unit komputer sudah siap pakai atau harus diinstal sendiri?',
                'answer' => 'Semua unit sudah kami siapkan "Terima Beres": terinstal sistem operasi Windows resmi terbaru, software produktivitas standar perkantoran (Office, browser, PDF reader, antivirus), dan driver perangkat keras lengkap. Karyawan Anda bisa langsung mulai bekerja begitu unit dinyalakan.',
            ],
            (object) [
                'question' => 'Apakah NazwaGraha melayani pengantaran dan setting langsung di meja kantor?',
                'answer' => 'Tentu saja! Untuk wilayah Ciawi, Bogor, Depok, dan Jabodetabek, teknisi kami akan mengantarkan unit langsung ke kantor Anda, merakit kabel di meja kerja, serta menghubungkannya ke jaringan internet dan printer kantor.',
            ],
            (object) [
                'question' => 'Bagaimana sistem pembayaran untuk pengadaan perusahaan / PT?',
                'answer' => 'Kami sangat memahami prosedur pengadaan perusahaan. Kami menerima pemesanan menggunakan Purchase Order (PO) resmi, menyediakan invoice dan faktur pajak, serta skema pembayaran termin uang muka (DP) dan pelunasan setelah unit diterima dan dicek.',
            ],
            (object) [
                'question' => 'Bisakah spesifikasi komputer dirakit kustom sesuai anggaran kantor kami?',
                'answer' => 'Sangat bisa! Anda cukup menginformasikan anggaran dan kebutuhan aplikasi yang akan dijalankan. Tim teknisi kami akan meracik kombinasi komponen paling optimal dengan harga terbaik tanpa mengorbankan kualitas dan daya tahan.',
            ],
            (object) [
                'question' => 'Bagaimana jika salah satu komputer mengalami kendala teknis setelah dibeli?',
                'answer' => 'Anda tidak perlu repot membawa unit ke service center. Cukup hubungi kami via WhatsApp, teknisi NazwaGraha akan melakukan diagnosa awal (remote atau kunjungan on-site) dan membantu proses penanganan garansi hingga tuntas.',
            ],
        ];

        $servicePage = $this->resolveServicePage('pengadaan-komputer', $settings, $packages, $comparisons, $faqs);
        if ($servicePage instanceof \Illuminate\Http\RedirectResponse) {
            return $servicePage;
        }

        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha - Jasa Pengadaan Komputer & Hardware IT',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+62' . ltrim($settings['phone'] ?? '081298506111', '0'),
            'email' => $settings['email'] ?? 'nazwagraha@gmail.com',
            'hasMap' => 'https://maps.google.com/?q=' . ($settings['geo_latitude'] ?? '-6.6698') . ',' . ($settings['geo_longitude'] ?? '106.8532'),
            'priceRange' => 'Mulai Rp 3.850.000',
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
                'latitude' => $settings['geo_latitude'],
                'longitude' => $settings['geo_longitude'],
            ],
            'url' => url('/pengadaan-komputer'),
        ];

        $schemaService = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Jasa Pengadaan Komputer & Hardware IT Kantor',
            'serviceType' => 'Computer Hardware Procurement',
            'provider' => [
                '@type' => 'ProfessionalService',
                'name' => 'NazwaGraha',
                'url' => url('/'),
            ],
            'areaServed' => [
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Bogor',
                ],
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Jabodetabek',
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Indonesia',
                ],
            ],
        ];

        $schemaFaq = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer,
                    ],
                ];
            })->toArray(),
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
                    'name' => 'Layanan Kami',
                    'item' => url('/#services'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Pengadaan Komputer Kantor',
                    'item' => url('/pengadaan-komputer'),
                ],
            ],
        ];

        return view('hardware-service', compact(
            'servicePage',
            'settings',
            'packages',
            'comparisons',
            'faqs',
            'schemaLocalBusiness',
            'schemaService',
            'schemaFaq',
            'schemaBreadcrumb'
        ));
    }

    /**
     * Display the dedicated high-converting service page: Konsultan IT & Maintenance.
     */
    public function maintenanceService()
    {
        $settings = $this->getCommonSettings();
        $settings['meta_title'] = 'Jasa Konsultan IT & Maintenance Komputer Kantor Murah Bogor | NazwaGraha';
        $settings['meta_description'] = 'Jasa konsultan IT, maintenance komputer kantor rutin, pembersihan virus, backup data, perbaikan jaringan, dan IT support on-site & remote di Bogor & Jabodetabek. Lebih hemat dari staf IT sendiri.';
        $settings['canonical_url'] = url('/konsultan-it-maintenance');

        $packages = [
            (object) [
                'id' => 'maint-oncall',
                'name' => 'Paket Maintenance Panggilan (On-Call)',
                'badge' => '⚡ Solusi Cepat Saat Rusak',
                'price' => 'Mulai Rp 350.000 / visit',
                'strike_price' => 'Rp 500.000',
                'duration' => 'Respons Kunjungan Cepat',
                'is_popular' => false,
                'target_audience' => 'Cocok untuk kantor kecil atau UMKM yang membutuhkan penanganan kendala komputer darurat tanpa kontrak bulanan.',
                'cta_text' => 'Pesan Layanan Panggilan ➔',
                'features' => [
                    'Pemeriksaan & Troubleshooting Hardware / Software Komputer',
                    'Pembersihan Virus, Malware, Adware & Sistem yang Lemot',
                    'Perbaikan Masalah Printer Sharing & Akses Jaringan Lokal',
                    'Instalasi Ulang OS Windows & Penataan Driver Komponen',
                    'Penggantian & Upgrade Part Komputer (RAM / SSD Baru)',
                    'Maksimal 3 Jam Kerja per Kunjungan di Lokasi Kantor',
                    'Garansi Pengerjaan Teknis 14 Hari',
                ],
            ],
            (object) [
                'id' => 'maint-monthly',
                'name' => 'Paket IT Support Bulanan UMKM',
                'badge' => '🔥 Paling Populer (Best Value)',
                'price' => 'Mulai Rp 1.250.000 / bln',
                'strike_price' => 'Rp 2.000.000',
                'duration' => 'Kontrak Bulanan Fleksibel',
                'is_popular' => true,
                'target_audience' => 'Paling pas untuk kantor dengan 5 - 15 unit komputer/laptop yang ingin operasional lancar tanpa biaya gaji IT in-house mahal.',
                'cta_text' => 'Pilih Paket Bulanan ➔',
                'features' => [
                    'Mencakup hingga 15 Unit Komputer PC / Laptop & Printer',
                    'Kunjungan Rutin Maintenance Fisik & Sistem 2x per Bulan',
                    'Dukungan Remote Support Tanpa Batas via WhatsApp & AnyDesk',
                    'Pembersihan Debu Fisik Komputer & Thermal Paste Pendingin',
                    'Pemeliharaan Backup Data Penting Perusahaan Secara Terjadwal',
                    'Pemeriksaan Berkala Stabilitas Jaringan Internet & Wi-Fi',
                    'Prioritas Kunjungan Darurat Tanpa Biaya Panggilan Tambahan',
                ],
            ],
            (object) [
                'id' => 'maint-corporate',
                'name' => 'Paket IT Outsourcing Korporasi',
                'badge' => '🏢 Kantor Berkembang & Pabrik',
                'price' => 'Mulai Rp 2.750.000 / bln',
                'strike_price' => 'Rp 4.000.000',
                'duration' => 'Kontrak Bisnis Prioritas',
                'is_popular' => false,
                'target_audience' => 'Untuk perusahaan skala menengah (15-40 unit), server kantor, pabrik, klinik, atau kantor multi-lantai.',
                'cta_text' => 'Pesan IT Korporasi ➔',
                'features' => [
                    'Mencakup 15 - 40 Unit PC, Laptop, Server Lokal & Network Switch',
                    'Kunjungan Rutin Terjadwal 4x per Bulan + Emergency Visit Cepat',
                    'SLA Respon Darurat On-Site Kurang dari 2 Jam di Area Bogor',
                    'Manajemen Server Kantor (Windows Server / Linux / Synology NAS)',
                    'Pencegahan Serangan Siber Ransomware & Keamanan Endpoint',
                    'Dokumentasi & Inventarisasi Aset Hardware/Software Resmi',
                    'Konsultasi Perencanaan Anggaran & Upgrade IT Jangka Panjang',
                ],
            ],
            (object) [
                'id' => 'maint-audit',
                'name' => 'Paket Audit & Konsultasi Sistem IT',
                'badge' => '🔍 Cek Kesehatan Infrastruktur',
                'price' => 'Mulai Rp 1.500.000 / audit',
                'strike_price' => 'Rp 2.500.000',
                'duration' => '3 - 5 Hari Kerja',
                'is_popular' => false,
                'target_audience' => 'Untuk perusahaan yang ingin membedah kelemahan sistem, keamanan data, dan efisiensi teknologi sebelum ekspansi.',
                'cta_text' => 'Jadwalkan Audit IT ➔',
                'features' => [
                    'Audit Menyeluruh Keamanan Jaringan & Celah Kerentanan Data',
                    'Evaluasi Efektivitas Sistem Backup Data & Disaster Recovery',
                    'Pemeriksaan Legalitas Lisensi Software & Kelaikan Komponen PC',
                    'Pemberian Dokumen Laporan Resmi Rekomendasi Solusi Efisiensi',
                    'Sesi Presentasi & Tanya Jawab Bersama Manajemen Perusahaan',
                ],
            ],
        ];

        $comparisons = [
            [
                'feature' => 'Biaya Operasional',
                'others' => 'Menggaji 1 staf IT internal menghabiskan Rp 4 - 6 juta/bulan + THR, BPJS & tunjangan',
                'nazwa' => 'Jauh lebih hemat: mulai ratusan ribu hingga 1 jutaan/bulan tanpa tunjangan dan bebas ribet',
            ],
            [
                'feature' => 'Keahlian & Pengalaman',
                'others' => 'Satu orang staf IT internal sering kali memiliki keahlian terbatas dan sering bingung saat kendala rumit',
                'nazwa' => 'Didukung tim teknisi dengan keahlian lengkap: hardware, software, server, jaringan, dan keamanan siber',
            ],
            [
                'feature' => 'Pencegahan Masalah',
                'others' => 'Hanya bertindak saat komputer sudah rusak parah atau data perusahaan sudah terlanjur hilang',
                'nazwa' => 'Maintenance rutin proaktif: backup berkala, pembersihan debu, dan optimasi sebelum terjadi kerusakan',
            ],
            [
                'feature' => 'Ketersediaan Dukungan',
                'others' => 'Staf IT sering izin cuti, sakit, atau resign mendadak saat sistem kantor sedang bermasalah',
                'nazwa' => 'Dukungan selalu siap sedia: remote support instan dan teknisi pengganti yang selalu siaga',
            ],
            [
                'feature' => 'Kerahasiaan Data (NDA)',
                'others' => 'Teknisi freelance pinggir jalan tanpa kontrak resmi dan tidak ada jaminan keamanan data perusahaan',
                'nazwa' => 'Terikat perjanjian kerahasiaan data (NDA resmi) dengan jaminan keamanan aset informasi perusahaan',
            ],
        ];

        $faqs = [
            (object) [
                'question' => 'Mengapa menggunakan jasa maintenance IT NazwaGraha jauh lebih hemat dibanding menggaji staf IT sendiri?',
                'answer' => 'Menggaji seorang staf IT in-house membutuhkan biaya gaji UMR (Rp 4-5 juta/bulan) ditambah tunjangan kesehatan, BPJS, THR, dan peralatan kerja. Dengan jasa maintenance NazwaGraha, Anda hanya membayar biaya berlangganan hemat mulai Rp 1 jutaan/bulan namun mendapatkan dukungan dari tim profesional berpengalaman.',
            ],
            (object) [
                'question' => 'Seberapa cepat respon tim teknisi saat kantor kami mengalami kendala mendesak?',
                'answer' => 'Untuk kendala software atau settingan yang mendesak, teknisi kami langsung memberikan bantuan remote support melalui WhatsApp atau AnyDesk dalam hitungan menit. Jika membutuhkan kehadiran fisik, teknisi kami akan meluncur ke lokasi kantor Anda di area Bogor dan sekitarnya.',
            ],
            (object) [
                'question' => 'Bagaimana jaminan kerahasiaan data penting perusahaan kami?',
                'answer' => 'Kami menjamin kerahasiaan data Anda 100%. NazwaGraha bersedia menandatangani perjanjian kerahasiaan (Non-Disclosure Agreement / NDA) resmi. Teknisi kami bekerja dengan standar etika profesional tanpa pernah membuka, menyalin, atau membocorkan file bisnis Anda.',
            ],
            (object) [
                'question' => 'Apa saja yang dilakukan teknisi pada saat jadwal kunjungan rutin bulanan?',
                'answer' => 'Pada setiap kunjungan rutin, teknisi kami melakukan pembersihan fisik debu komputer, pengecekan suhu prosesor, pembersihan file sampah dan virus, pengecekan sistem backup data penting, serta memastikan koneksi printer dan jaringan internet di seluruh meja karyawan berjalan lancar.',
            ],
            (object) [
                'question' => 'Apakah melayani kantor yang hanya butuh perbaikan sekali saja (tanpa kontrak bulanan)?',
                'answer' => 'Tentu saja! Kami menyediakan Paket Maintenance Panggilan (On-Call) tanpa ikatan kontrak. Teknisi kami akan datang menangani permasalahan komputer atau jaringan kantor Anda dan Anda hanya membayar biaya per kunjungan.',
            ],
            (object) [
                'question' => 'Area mana saja yang dijangkau untuk jasa konsultan IT dan maintenance ini?',
                'answer' => 'Kami melayani kunjungan langsung (on-site) untuk wilayah Ciawi, Bogor Kota, Kabupaten Bogor, Depok, Sukabumi, Jakarta, Tangerang, Bekasi (Jabodetabek) dan sekitarnya.',
            ],
        ];

        $servicePage = $this->resolveServicePage('konsultan-it-maintenance', $settings, $packages, $comparisons, $faqs);
        if ($servicePage instanceof \Illuminate\Http\RedirectResponse) {
            return $servicePage;
        }

        $schemaLocalBusiness = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'NazwaGraha - Jasa Konsultan IT & Maintenance Komputer',
            'image' => asset('assets/images/hero-technology.webp'),
            'telephone' => '+62' . ltrim($settings['phone'] ?? '081298506111', '0'),
            'email' => $settings['email'] ?? 'nazwagraha@gmail.com',
            'hasMap' => 'https://maps.google.com/?q=' . ($settings['geo_latitude'] ?? '-6.6698') . ',' . ($settings['geo_longitude'] ?? '106.8532'),
            'priceRange' => 'Mulai Rp 350.000',
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
                'latitude' => $settings['geo_latitude'],
                'longitude' => $settings['geo_longitude'],
            ],
            'url' => url('/konsultan-it-maintenance'),
        ];

        $schemaService = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'Jasa Konsultan IT & Maintenance Komputer Kantor',
            'serviceType' => 'IT Consulting & Maintenance',
            'provider' => [
                '@type' => 'ProfessionalService',
                'name' => 'NazwaGraha',
                'url' => url('/'),
            ],
            'areaServed' => [
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Bogor',
                ],
                [
                    '@type' => 'AdministrativeArea',
                    'name' => 'Jabodetabek',
                ],
                [
                    '@type' => 'Country',
                    'name' => 'Indonesia',
                ],
            ],
        ];

        $schemaFaq = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(function ($faq) {
                return [
                    '@type' => 'Question',
                    'name' => $faq->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq->answer,
                    ],
                ];
            })->toArray(),
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
                    'name' => 'Layanan Kami',
                    'item' => url('/#services'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Konsultan IT & Maintenance',
                    'item' => url('/konsultan-it-maintenance'),
                ],
            ],
        ];

        return view('maintenance-service', compact(
            'servicePage',
            'settings',
            'packages',
            'comparisons',
            'faqs',
            'schemaLocalBusiness',
            'schemaService',
            'schemaFaq',
            'schemaBreadcrumb'
        ));
    }
}
