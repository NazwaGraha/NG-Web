<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="uHDngeaGQvCWK_LPHY9BChUoJ4W5Frj7unpi0SJOmUs" />
    <meta name="msvalidate.01" content="0BEF9D5BD1E3BAB2B08A85DFD9D47F85" />
    <meta name="yandex-verification" content="9081680e1da867cc" />
    <!-- Resource Hints & Preload for Peak PageSpeed -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">
    @yield('preload')

    <!-- Geotargeting & Local SEO (GEO: Ciawi, Bogor, Jawa Barat, Indonesia) -->
    <meta name="geo.region" content="ID-JB">
    <meta name="geo.placename" content="Bogor">
    <meta name="geo.position" content="-6.6578;106.8524">
    <meta name="ICBM" content="-6.6578, 106.8524">
    <meta name="city" content="Bogor">
    <meta name="country" content="Indonesia">

    <!-- Primary SEO Meta Tags -->
    <title>@yield('title', 'Jasa Pembuatan Website Bogor & Solusi IT Kantor - NazwaGraha Pratama')</title>
    <meta name="description" content="@yield('meta_description', 'Jasa pembuatan website murah, cepat & bergaransi di Bogor: Desain mewah profesional, gratis domain .COM & cloud server SSD, optimasi SEO & GEO Google #1, pasang jaringan LAN kantor.')">
    <meta name="keywords" content="@yield('meta_keywords', 'jasa pembuatan website bogor, jasa pembuatan website ciawi, jasa buat web perusahaan, jasa web bogor, web developer bogor, jasa seo bogor, pasang lan kantor bogor, vendor it kantor, nazwa graha pratama')">
    <meta name="author" content="NazwaGraha Pratama">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Jasa Pembuatan Website Bogor & Solusi IT Kantor - NazwaGraha Pratama')">
    <meta property="og:description" content="@yield('meta_description', 'Jasa pembuatan website murah, cepat & bergaransi di Bogor: Desain mewah profesional, gratis domain .COM & cloud server SSD, optimasi SEO & GEO Google #1, pasang jaringan LAN kantor.')">
    <meta property="og:image" content="@yield('og_image', asset('images/commercial_hero_workspace.webp'))">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="NazwaGraha Pratama">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'Jasa Pembuatan Website Bogor & Solusi IT Kantor - NazwaGraha Pratama')">
    <meta name="twitter:description" content="@yield('meta_description', 'Jasa pembuatan website murah, cepat & bergaransi di Bogor: Desain mewah profesional, gratis domain .COM & cloud server SSD, optimasi SEO & GEO Google #1, pasang jaringan LAN kantor.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/commercial_hero_workspace.webp'))">

    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/ngp-logo.webp') }}">

    <!-- Google Fonts for Modern Luxury Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Fast Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ngp: {
                            orange: '#F58220',
                            orangeDark: '#DE6F12',
                            orangeLight: '#FFF4EC',
                            charcoal: '#1E2124',
                            carbon: '#121416',
                            cardDark: '#262A2E',
                            surface: '#FAFAFA',
                            whatsapp: '#25D366'
                        },
                        brand: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
                        heading: ['"Outfit"', '"Plus Jakarta Sans"', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .font-heading {
            font-family: 'Outfit', sans-serif;
        }
        .orange-gradient {
            background: linear-gradient(135deg, #F58220 0%, #EA580C 100%);
        }
        .charcoal-gradient {
            background: linear-gradient(135deg, #1E2124 0%, #121416 100%);
        }
        .card-shadow {
            box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.06), 0 0 2px rgba(15, 23, 42, 0.05);
            transition: all 0.3s ease;
        }
        .card-shadow:hover {
            box-shadow: 0 20px 40px -10px rgba(245, 130, 32, 0.2);
            transform: translateY(-3px);
        }
        @keyframes wa-pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7), 0 10px 25px -5px rgba(16, 185, 129, 0.4);
            }
            70% {
                box-shadow: 0 0 0 18px rgba(37, 211, 102, 0), 0 10px 25px -5px rgba(16, 185, 129, 0.4);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0), 0 10px 25px -5px rgba(16, 185, 129, 0.4);
            }
        }
        @keyframes wa-blink {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.9; transform: scale(1.06); }
        }
        .wa-beacon-btn {
            animation: wa-pulse 2s infinite, wa-blink 3s ease-in-out infinite;
        }
    </style>

    <!-- Schema.org JSON-LD (SEO & Generative Engine Optimization - GEO) -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": ["LocalBusiness", "ProfessionalService", "ITService"],
        "@id": "{{ url('/') }}#business",
        "name": "NazwaGraha Pratama",
        "alternateName": "PT Nazwa Graha Pratama",
        "legalName": "PT Nazwa Graha Pratama",
        "description": "Jasa pembuatan website murah, cepat & bergaransi di Bogor (skor 90+ Google PageSpeed), optimasi SEO & GEO ranking 1 Google, instalasi jaringan LAN dan server kantor, pengadaan hardware IT dan servis komputer di Ciawi, Bogor dan seluruh Jabodetabek.",
        "image": "{{ asset('images/hero_device_showcase_3d.webp') }}",
        "logo": "{{ asset('images/ngp-logo.webp') }}",
        "url": "{{ url('/') }}",
        "telephone": "+6281298506111",
        "email": "nazwagraha@gmail.com",
        "priceRange": "Rp 1.000.000 - Rp 25.000.000",
        "currenciesAccepted": "IDR",
        "paymentAccepted": "Cash, Bank Transfer, QRIS",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi",
            "addressLocality": "Ciawi",
            "addressRegion": "Jawa Barat",
            "postalCode": "16720",
            "addressCountry": "ID"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": -6.6578,
            "longitude": 106.8524
        },
        "areaServed": [
            { "@type": "City", "name": "Bogor" },
            { "@type": "City", "name": "Ciawi" },
            { "@type": "City", "name": "Jakarta" },
            { "@type": "City", "name": "Depok" },
            { "@type": "City", "name": "Tangerang" },
            { "@type": "City", "name": "Bekasi" },
            { "@type": "City", "name": "Sukabumi" },
            { "@type": "Country", "name": "Indonesia" }
        ],
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "254",
            "bestRating": "5",
            "worstRating": "1"
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                "opens": "08:00",
                "closes": "18:00"
            }
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Katalog Solusi IT & Digital NazwaGraha Pratama",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Jasa Pembuatan Website Perusahaan, Toko Online & Aplikasi Web",
                        "description": "Website kilat performa tinggi (Google PageSpeed 90+), gratis domain .COM, cloud server SSD, dan garansi maintenance 1 tahun."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Jasa Optimasi SEO & GEO (AI Search Engine Optimization)",
                        "description": "Optimasi kata kunci ranking 1 Google Search dan integrasi Generative Engine Optimization untuk AI Search (ChatGPT, Perplexity, Gemini)."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Jasa Instalasi & Setting Jaringan LAN Kantor & Server",
                        "description": "Pemasangan kabel LAN rapi, crimping, setting Mikrotik router, Wi-Fi kantor terpusat, dan rack server."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Pengadaan Hardware IT & Komputer Kantor",
                        "description": "Penyediaan PC desktop kantor, laptop bisnis, server, switch hub, dan printer bergaransi resmi."
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Jasa Servis Komputer & Troubleshooting IT On-Site",
                        "description": "Perbaikan hardware/software komputer kantor, penanganan darurat jaringan, dan kontrak perawatan berkala."
                    }
                }
            ]
        },
        "sameAs": [
            "https://wa.me/6281298506111",
            "{{ url('/sitemap.xml') }}",
            "{{ url('/llms.txt') }}"
        ]
    }
    </script>
    @stack('schema')
    @stack('styles')
</head>
<body class="bg-[#F8FAFC] text-slate-800 antialiased selection:bg-orange-500 selection:text-white pb-8 sm:pb-0 overflow-x-hidden w-full">

    <!-- Top Announcement Strip (Neat, Authoritative, High Contrast) -->
    <div class="bg-slate-900 text-slate-300 text-xs py-2 px-3 sm:px-4 border-b border-slate-800 overflow-hidden">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-2">
            <div class="flex items-center gap-1.5 sm:gap-3 min-w-0">
                <span class="bg-orange-600 text-white px-2 py-0.5 rounded-full font-black uppercase text-[9px] sm:text-[10px] tracking-wider shrink-0 shadow-sm">Promo 2026</span>
                <span class="hidden md:inline text-slate-200 font-semibold truncate">🎁 Paket Website Komplit: Gratis Domain .COM + Cloud Server SSD + Garansi Penuh 1 Tahun!</span>
                <span class="md:hidden text-slate-200 font-semibold text-[11px] truncate">🎁 Free Domain .COM + Cloud SSD!</span>
            </div>
            <div class="flex items-center gap-4 text-[11px] font-semibold shrink-0">
                <span class="hidden md:inline-flex items-center gap-1 text-slate-300">
                    <span class="text-orange-400">📍</span>
                    <span>Ciawi, Bogor</span>
                </span>
                <span class="hidden md:inline text-slate-700">|</span>
                <a href="tel:081298506111" class="hidden sm:inline-flex items-center gap-1.5 text-slate-300 hover:text-orange-400 transition">
                    <span class="text-orange-400 font-bold">📞</span>
                    <span>0812-9850-6111</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header (Clean, Modern, Organized - Header Ringkas & Mega Dropdown) -->
    <header class="bg-white/95 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 h-16 sm:h-20 flex items-center justify-between gap-2">
            
            <!-- Official NGP Brand Logo (Matching Image 1) -->
            <a href="{{ route('home') }}" class="flex items-center shrink-0 group py-1" aria-label="Beranda NazwaGraha Pratama">
                <img src="{{ asset('images/ngp-logo.webp') }}" 
                     alt="NazwaGraha Pratama" 
                     width="211" 
                     height="80" 
                     class="h-8 sm:h-12 w-auto object-contain group-hover:scale-105 transition-transform duration-200">
            </a>

            <!-- Desktop Navigation Menu (Concise 5 Items with 2-Column Mega Dropdown) -->
            <nav class="hidden lg:flex items-center gap-5 xl:gap-7 text-xs xl:text-sm font-bold text-slate-700">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#F58220] font-extrabold border-b-2 border-[#F58220] pb-1' : 'hover:text-[#F58220]' }} transition">
                    Beranda
                </a>

                <!-- Layanan IT Mega Dropdown (2 Kolom Mewah) -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1.5 hover:text-[#F58220] transition cursor-pointer font-bold focus:outline-none">
                        <span>Layanan IT</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-[#F58220] group-hover:rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu Box (2 Columns) -->
                    <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200 absolute top-full left-1/2 -translate-x-1/2 w-[620px] bg-white rounded-2xl shadow-2xl border border-slate-200/80 p-5 z-50 mt-1">
                        <div class="grid grid-cols-2 gap-4 text-left">
                            <!-- Kolom 1: Digital, Web & Software -->
                            <div class="space-y-2 border-r border-slate-100 pr-3">
                                <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                                    <span class="text-xs font-black text-[#F58220] uppercase tracking-wider font-heading">Digital &amp; Web</span>
                                    <span class="text-[9px] bg-orange-50 text-[#F58220] px-1.5 py-0.2 rounded font-bold">SEO #1</span>
                                </div>
                                <a href="{{ route('services.website') }}" class="flex items-start gap-2.5 p-2 rounded-xl hover:bg-orange-50/70 transition group/item">
                                    <span class="text-lg">🌐</span>
                                    <div>
                                        <span class="text-xs font-bold text-slate-900 group-hover/item:text-[#F58220] block">Jasa Pembuatan Website Murah</span>
                                        <span class="text-[10px] text-slate-500 font-normal leading-tight block">Landing Page, Compro &amp; Toko Online cepat</span>
                                    </div>
                                </a>
                                <a href="{{ route('services.seo-geo') }}" class="flex items-start gap-2.5 p-2 rounded-xl hover:bg-orange-50/70 transition group/item">
                                    <span class="text-lg">🚀</span>
                                    <div>
                                        <span class="text-xs font-bold text-slate-900 group-hover/item:text-[#F58220] block">Jasa SEO &amp; GEO AI Overviews</span>
                                        <span class="text-[10px] text-slate-500 font-normal leading-tight block">Tembus ranking 1 Google &amp; ChatGPT Search</span>
                                    </div>
                                </a>
                                <a href="{{ route('services.website') }}#it-konsultan" class="flex items-start gap-2.5 p-2 rounded-xl hover:bg-orange-50/70 transition group/item">
                                    <span class="text-lg">💼</span>
                                    <div>
                                        <span class="text-xs font-bold text-slate-900 group-hover/item:text-[#F58220] block">IT Konsultan &amp; Solusi Bisnis</span>
                                        <span class="text-[10px] text-slate-500 font-normal leading-tight block">Audit sistem, transformasi digital &amp; software</span>
                                    </div>
                                </a>
                            </div>

                            <!-- Kolom 2: Infrastruktur, Jaringan & Hardware -->
                            <div class="space-y-2 pl-1">
                                <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                                    <span class="text-xs font-black text-slate-800 uppercase tracking-wider font-heading">Hardware &amp; LAN</span>
                                    <span class="text-[9px] bg-slate-100 text-slate-600 px-1.5 py-0.2 rounded font-bold">Teknisi Ready</span>
                                </div>
                                <a href="{{ route('services.jaringan-lan') }}" class="flex items-start gap-2.5 p-2 rounded-xl hover:bg-orange-50/70 transition group/item">
                                    <span class="text-lg">🔌</span>
                                    <div>
                                        <span class="text-xs font-bold text-slate-900 group-hover/item:text-[#F58220] block">Instalasi Jaringan LAN &amp; Mikrotik</span>
                                        <span class="text-[10px] text-slate-500 font-normal leading-tight block">Setting router, switch, rack server, &amp; WiFi</span>
                                    </div>
                                </a>
                                <a href="{{ route('services.hardware') }}" class="flex items-start gap-2.5 p-2 rounded-xl hover:bg-orange-50/70 transition group/item">
                                    <span class="text-lg">💻</span>
                                    <div>
                                        <span class="text-xs font-bold text-slate-900 group-hover/item:text-[#F58220] block">Pengadaan Komputer Kantor</span>
                                        <span class="text-[10px] text-slate-500 font-normal leading-tight block">PC workstation, laptop, server &amp; aksesoris</span>
                                    </div>
                                </a>
                                <a href="{{ route('services.servis') }}" class="flex items-start gap-2.5 p-2 rounded-xl hover:bg-orange-50/70 transition group/item">
                                    <span class="text-lg">🛠️</span>
                                    <div>
                                        <span class="text-xs font-bold text-slate-900 group-hover/item:text-[#F58220] block">Maintenance &amp; Troubleshooting IT</span>
                                        <span class="text-[10px] text-slate-500 font-normal leading-tight block">Perawatan rutin kantor, backup &amp; garansi SLA</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Bottom Mega Dropdown Strip -->
                        <div class="mt-3 pt-3 border-t border-slate-100 bg-slate-50/80 -mx-5 -mb-5 px-5 py-2.5 rounded-b-2xl flex items-center justify-between text-[11px]">
                            <span class="text-slate-500">Butuh solusi terpadu atau kunjungan teknisi kantor?</span>
                            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20butuh%20solusi%20kustom" target="_blank" class="font-bold text-[#F58220] hover:underline flex items-center gap-1">
                                <span>Konsultasi Khusus via WA</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Portofolio -->
                <a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.*') ? 'text-[#F58220] font-extrabold border-b-2 border-[#F58220] pb-1' : 'hover:text-[#F58220]' }} transition">
                    Portofolio
                </a>

                <!-- Dropdown Tentang Kami -->
                <div class="relative group py-2">
                    <button type="button" class="flex items-center gap-1 hover:text-[#F58220] transition cursor-pointer font-bold focus:outline-none">
                        <span>Tentang Kami</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-[#F58220] group-hover:rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200 absolute top-full right-0 w-52 bg-white rounded-2xl shadow-xl border border-slate-200/80 py-2 z-50 mt-1">
                        <a href="{{ route('articles.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs text-slate-700 hover:bg-orange-50 hover:text-[#F58220] transition font-bold">
                            <span>📰</span><span>News &amp; Article (Blog)</span>
                        </a>
                        <a href="{{ route('about') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs text-slate-700 hover:bg-orange-50 hover:text-[#F58220] transition font-bold">
                            <span>🏢</span><span>Profil PT NGP</span>
                        </a>
                        <a href="{{ route('contact.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs text-slate-700 hover:bg-orange-50 hover:text-[#F58220] transition font-bold">
                            <span>📍</span><span>Kontak &amp; Lokasi Kantor</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- CTA Actions (Clean & Focused) -->
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20website%20dan%20solusi%20IT" target="_blank" class="inline-flex px-3 sm:px-5 py-2 sm:py-2.5 rounded-xl orange-gradient text-white text-xs sm:text-sm font-extrabold shadow-md shadow-orange-500/30 hover:shadow-orange-500/50 transition transform hover:-translate-y-0.5 items-center gap-1.5 sm:gap-2 whitespace-nowrap">
                    <span>💬 Hubungi Kami</span>
                </a>
                <!-- Mobile Hamburger Button -->
                <button type="button" id="mobileMenuBtn" aria-label="Buka Menu Navigasi" aria-expanded="false" class="lg:hidden flex items-center gap-1.5 px-3 py-2 rounded-xl bg-slate-100 hover:bg-orange-50 hover:text-orange-600 text-slate-800 border border-slate-200/80 shadow-sm transition active:scale-95 focus:outline-none focus:ring-2 focus:ring-orange-500/20">
                    <svg id="hamburgerIcon" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="closeIcon" class="w-5 h-5 shrink-0 hidden text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span id="mobileMenuBtnText" class="text-xs font-black uppercase tracking-wider">Menu</span>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer Menu (Organized Matching Concise Structure) -->
        <div id="mobileDrawer" class="hidden lg:hidden border-t border-slate-200 bg-white/98 backdrop-blur-xl transition-all shadow-2xl px-4 py-5 space-y-4 max-h-[85vh] overflow-y-auto">
            <div class="space-y-2">
                <a href="{{ route('home') }}" class="flex items-center justify-between p-3 rounded-xl font-bold text-sm {{ request()->routeIs('home') ? 'bg-orange-50 text-[#F58220]' : 'text-slate-800 hover:bg-slate-50' }} transition">
                    <span class="flex items-center gap-2.5"><span>🏠</span><span>Beranda</span></span>
                    <span class="text-xs text-slate-400">→</span>
                </a>

                <!-- Kategori 1: Digital & Web -->
                <div class="rounded-2xl border border-orange-100 bg-orange-50/40 p-3 space-y-1.5">
                    <div class="flex items-center justify-between px-1 mb-1">
                        <span class="text-[10px] font-black uppercase tracking-wider text-[#F58220]">Digital, Web &amp; SEO</span>
                        <span class="text-[9px] bg-[#F58220] text-white px-1.5 py-0.2 rounded font-black">POPULER</span>
                    </div>
                    <a href="{{ route('services.website') }}" class="flex items-center justify-between p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.website') ? 'text-[#F58220] bg-white shadow-xs' : 'text-slate-800 hover:text-[#F58220] hover:bg-white' }} transition">
                        <span class="flex items-center gap-2"><span>🌐</span><span>Jasa Pembuatan Website Murah</span></span>
                        <span class="text-[10px] text-emerald-600 font-extrabold">Mulai 1,25 Jt</span>
                    </a>
                    <a href="{{ route('services.seo-geo') }}" class="flex items-center justify-between p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.seo-geo') ? 'text-[#F58220] bg-white shadow-xs' : 'text-slate-800 hover:text-[#F58220] hover:bg-white' }} transition">
                        <span class="flex items-center gap-2"><span>🚀</span><span>Jasa SEO &amp; GEO AI Overviews</span></span>
                        <span class="text-[10px] text-slate-400">Google #1</span>
                    </a>
                </div>

                <!-- Kategori 2: Hardware & LAN -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-3 space-y-1.5">
                    <div class="flex items-center justify-between px-1 mb-1">
                        <span class="text-[10px] font-black uppercase tracking-wider text-slate-500">Infrastruktur &amp; Hardware IT</span>
                        <span class="text-[9px] bg-slate-200 text-slate-700 px-1.5 py-0.2 rounded font-bold">ON-SITE</span>
                    </div>
                    <a href="{{ route('services.jaringan-lan') }}" class="flex items-center justify-between p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.jaringan-lan') ? 'text-[#F58220] bg-white shadow-xs' : 'text-slate-800 hover:text-[#F58220] hover:bg-white' }} transition">
                        <span class="flex items-center gap-2"><span>🔌</span><span>Jaringan LAN &amp; IT Kantor</span></span>
                        <span class="text-xs text-slate-400">→</span>
                    </a>
                    <a href="{{ route('services.hardware') }}" class="flex items-center justify-between p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.hardware') ? 'text-[#F58220] bg-white shadow-xs' : 'text-slate-800 hover:text-[#F58220] hover:bg-white' }} transition">
                        <span class="flex items-center gap-2"><span>💻</span><span>Pengadaan Hardware IT</span></span>
                        <span class="text-xs text-slate-400">→</span>
                    </a>
                    <a href="{{ route('services.servis') }}" class="flex items-center justify-between p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.servis') ? 'text-[#F58220] bg-white shadow-xs' : 'text-slate-800 hover:text-[#F58220] hover:bg-white' }} transition">
                        <span class="flex items-center gap-2"><span>🛠️</span><span>Maintenance &amp; Troubleshooting</span></span>
                        <span class="text-xs text-slate-400">→</span>
                    </a>
                </div>

                <!-- Navigasi Tambahan -->
                <a href="{{ route('gallery.index') }}" class="flex items-center justify-between p-3 rounded-xl font-bold text-sm {{ request()->routeIs('gallery.*') ? 'bg-orange-50 text-[#F58220]' : 'text-slate-800 hover:bg-slate-50' }} transition">
                    <span class="flex items-center gap-2.5"><span>🖼️</span><span>Portofolio Hasil Proyek</span></span>
                    <span class="text-xs text-slate-400">→</span>
                </a>
                <a href="{{ route('articles.index') }}" class="flex items-center justify-between p-3 rounded-xl font-bold text-sm {{ request()->routeIs('articles.*') ? 'bg-orange-50 text-[#F58220]' : 'text-slate-800 hover:bg-slate-50' }} transition">
                    <span class="flex items-center gap-2.5"><span>📰</span><span>News &amp; Article (Blog SEO)</span></span>
                    <span class="text-xs text-slate-400">→</span>
                </a>
                <a href="{{ route('contact.index') }}" class="flex items-center justify-between p-3 rounded-xl font-bold text-sm {{ request()->routeIs('contact.*') ? 'bg-orange-50 text-[#F58220]' : 'text-slate-800 hover:bg-slate-50' }} transition">
                    <span class="flex items-center gap-2.5"><span>📍</span><span>Kontak &amp; Lokasi Kantor</span></span>
                    <span class="text-xs text-slate-400">→</span>
                </a>
            </div>

            <!-- Mobile Contact Cards (INSIDE mobileDrawer ONLY) -->
            <div class="pt-3 border-t border-slate-200 space-y-2.5 text-xs">
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi" target="_blank" class="w-full py-3 rounded-xl orange-gradient text-white font-extrabold flex items-center justify-center gap-2 shadow-md hover:shadow-lg transition">
                    <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.094-.179.196-.077.371.101.174.45 1.743 1.95 2.072.193.042.361.026.495-.038.159-.076.694-.808.88-1.084.188-.276.375-.231.625-.138.25.092 1.587.748 1.86.885.274.137.456.205.522.319.066.114.066.662-.078 1.067z"/></svg>
                    <span>Hubungi Kami (0812-9850-6111)</span>
                </a>
                <div class="p-3 rounded-xl bg-slate-100/80 border border-slate-200/70 text-slate-600 space-y-1">
                    <p class="font-bold text-slate-800">📍 Alamat Kantor Operasional</p>
                    <p class="text-[11px] leading-relaxed">Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor</p>
                </div>
            </div>
        </div>

    </header>

    <!-- Main Content Injection -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER (AUTHORITATIVE, SEO-OPTIMIZED, HIGH TRUST) -->
    <footer class="bg-slate-900 text-slate-400 py-14 text-xs border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10 text-slate-300">
                
                <!-- Col 1: Company Profile -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="font-black text-xl text-white">NAZWAGRAHA</span>
                        <span class="text-xs font-bold text-orange-500 uppercase">PRATAMA</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Partner Resmi Solusi Rekayasa Website Performa Tinggi, Optimasi SEO & GEO Ranking 1 Google, Pengadaan Hardware Komputer, serta Instalasi Jaringan LAN Kantor Terpercaya di Indonesia.
                    </p>
                    <div class="text-slate-400 text-xs space-y-1">
                        <p class="text-white font-semibold">📍 Kantor Operasional:</p>
                        <p>Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat</p>
                    </div>
                </div>

                <!-- Col 2: Digital Services -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Layanan Web & Digital</h4>
                    <ul class="space-y-2.5 text-slate-400">
                        <li><a href="{{ route('services.website') }}" class="hover:text-orange-400 transition">Jasa Pembuatan Website Bisnis</a></li>
                        <li><a href="{{ route('services.website') }}#paket-harga" class="hover:text-orange-400 transition">Website Toko Online (E-Commerce)</a></li>
                        <li><a href="{{ route('services.website') }}#paket-harga" class="hover:text-orange-400 transition">Aplikasi Web & Sistem ERP Kustom</a></li>
                        <li><a href="{{ route('services.seo-geo') }}" class="hover:text-orange-400 transition">Optimasi SEO & GEO (Google & AI Search)</a></li>
                        <li><a href="{{ route('services.servis') }}" class="hover:text-orange-400 transition">Jasa Maintenance & Keamanan Website</a></li>
                    </ul>
                </div>

                <!-- Col 3: IT Hardware & LAN Services -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Infrastruktur & IT Kantor</h4>
                    <ul class="space-y-2.5 text-slate-400">
                        <li><a href="{{ route('services.jaringan-lan') }}" class="hover:text-orange-400 transition">Instalasi Jaringan LAN & Wi-Fi Kantor</a></li>
                        <li><a href="{{ route('services.hardware') }}" class="hover:text-orange-400 transition">Pengadaan Komputer, Laptop & Server</a></li>
                        <li><a href="{{ route('services.servis') }}" class="hover:text-orange-400 transition">Computer Troubleshooting & Servis</a></li>
                        <li><a href="{{ route('services.servis') }}" class="hover:text-orange-400 transition">Kontrak Maintenance Rutin Kantor (SLA)</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-orange-400 transition">Galeri Foto Portofolio Proyek</a></li>
                    </ul>
                </div>

                <!-- Col 4: Official Contacts -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Kontak & Layanan Cepat</h4>
                    <div class="space-y-2.5 text-slate-400 text-xs">
                        <p class="flex items-center gap-2">
                            <span class="text-orange-400 font-bold">📞</span>
                            <span>Telp/WA: <strong>081298506111</strong></span>
                        </p>
                        <p class="flex items-center gap-2">
                            <span class="text-orange-400 font-bold">✉️</span>
                            <span>Email: <strong>nazwagraha@gmail.com</strong></span>
                        </p>
                        <p class="flex items-center gap-2">
                            <span class="text-orange-400 font-bold">🌐</span>
                            <span>Website: <strong>nazwagraha.com</strong></span>
                        </p>
                        <div class="pt-3">
                            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20mau%20konsultasi" target="_blank" class="inline-block px-4 py-2 rounded-lg orange-gradient text-white font-bold text-xs shadow-md">
                                Buka Chat WhatsApp Langsung →
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Legal Footprint -->
            <div class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-2">
                <p>© {{ date('Y') }} PT Nazwa Graha Pratama. Seluruh Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-4">
                    <a href="https://maps.google.com/?q=NazwaGraha+Pratama+Ciawi+Bogor" target="_blank" rel="noopener noreferrer" class="hover:text-orange-400 transition flex items-center gap-1">
                        <span>📍 Lokasi Google Maps</span>
                    </a>
                    <span>•</span>
                    <a href="{{ route('seo.sitemap') }}" class="hover:text-slate-400 transition">Sitemap XML</a>
                    <span>•</span>
                    <a href="{{ route('seo.robots') }}" class="hover:text-slate-400 transition">Robots.txt</a>
                    <span>•</span>
                    <a href="{{ route('admin.login') }}" class="hover:text-slate-400 transition text-[11px] text-slate-600">Login Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP WIDGET (BEACON PULSE & CHAT CALLOUT - MOBILE & DESKTOP) -->
    <div id="waWidget" class="fixed bottom-5 right-4 sm:bottom-6 sm:right-6 z-50 flex flex-col items-end gap-2.5">
        
        <!-- Interactive Callout / Speech Bubble (Invites customer to transact) -->
        <div id="waBubble" class="bg-white rounded-2xl shadow-2xl border border-slate-200/90 p-3 sm:p-3.5 max-w-[260px] sm:max-w-[290px] relative transition-all duration-300 transform translate-y-0 select-none">
            <!-- Close mini button -->
            <button type="button" id="waBubbleClose" aria-label="Tutup pesan ajakan" class="absolute -top-2 -left-2 w-5 h-5 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold flex items-center justify-center shadow transition">
                ✕
            </button>
            <div class="flex items-center gap-1.5 mb-1">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                <span class="text-[11px] font-black text-slate-900 uppercase tracking-wider">CS NazwaGraha Online</span>
            </div>
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20pembuatan%20website%20dan%20solusi%20IT" target="_blank" class="block hover:opacity-90 transition">
                <p class="text-xs text-slate-700 leading-snug font-medium">
                    👋 Halo! Mau buat website atau pasang LAN? <span class="font-bold text-emerald-600 underline">Konsultasi Gratis Sekarang &rarr;</span>
                </p>
            </a>
            <!-- Bubble tail pointer -->
            <div class="absolute -bottom-1.5 right-6 w-3 h-3 bg-white border-b border-r border-slate-200 transform rotate-45"></div>
        </div>

        <!-- Floating Action Button with Glowing Beacon Radar Waves -->
        <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20pembuatan%20website%20dan%20solusi%20IT" target="_blank" aria-label="Hubungi WhatsApp Kami Langsung" class="relative wa-beacon-btn flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 rounded-full bg-gradient-to-tr from-emerald-600 via-emerald-500 to-green-400 text-white shadow-2xl shadow-emerald-500/50 hover:scale-110 active:scale-95 transition duration-300">
            
            <!-- Red Notification Badge (1 New Message Effect) -->
            <span class="absolute -top-1 -right-1 flex h-5 w-5 z-10">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-5 w-5 bg-red-500 text-white text-[10px] font-black items-center justify-center shadow-md">1</span>
            </span>

            <!-- WhatsApp SVG Icon -->
            <svg class="w-7 h-7 sm:w-8 sm:h-8 fill-current drop-shadow" viewBox="0 0 24 24">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.094-.179.196-.077.371.101.174.45 1.743 1.95 2.072.193.042.361.026.495-.038.159-.076.694-.808.88-1.084.188-.276.375-.231.625-.138.25.092 1.587.748 1.86.885.274.137.456.205.522.319.066.114.066.662-.078 1.067z"/>
            </svg>
        </a>

    </div>

    <!-- Scripts: Mobile Drawer & WhatsApp Bubble Dismiss -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileDrawer = document.getElementById('mobileDrawer');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeIcon = document.getElementById('closeIcon');
            const mobileMenuBtnText = document.getElementById('mobileMenuBtnText');

            function openMobileMenu() {
                mobileDrawer.classList.remove('hidden');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                if (mobileMenuBtnText) mobileMenuBtnText.textContent = 'Tutup';
                mobileMenuBtn.setAttribute('aria-expanded', 'true');
            }

            function closeMobileMenu() {
                mobileDrawer.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                if (mobileMenuBtnText) mobileMenuBtnText.textContent = 'Menu';
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
            }

            if (mobileMenuBtn && mobileDrawer) {
                mobileMenuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isCurrentlyOpen = !mobileDrawer.classList.contains('hidden');
                    if (isCurrentlyOpen) {
                        closeMobileMenu();
                    } else {
                        openMobileMenu();
                    }
                });

                // Auto close on navigation link click
                mobileDrawer.querySelectorAll('a').forEach(function(link) {
                    link.addEventListener('click', function() {
                        closeMobileMenu();
                    });
                });

                // Close on outside click
                document.addEventListener('click', function(e) {
                    if (!mobileDrawer.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                        closeMobileMenu();
                    }
                });
            }

            // WhatsApp Speech Bubble dismiss button
            const waBubble = document.getElementById('waBubble');
            const waBubbleClose = document.getElementById('waBubbleClose');
            if (waBubbleClose && waBubble) {
                waBubbleClose.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    waBubble.style.display = 'none';
                });
            }
        });
    </script>

</body>
</html>
