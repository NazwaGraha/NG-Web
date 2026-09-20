<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
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
    <title>@yield('title', 'NazwaGraha Pratama - Jasa Pembuatan Website, SEO & Solusi IT Kantor')</title>
    <meta name="description" content="@yield('meta_description', 'Pusat solusi pembuatan website cepat bergaransi, optimasi SEO & GEO Google, instalasi jaringan LAN kantor, dan pengadaan hardware IT terpercaya di Indonesia.')">
    <meta name="keywords" content="@yield('meta_keywords', 'jasa pembuatan website, jasa seo, jasa pasang lan kantor, pengadaan hardware it, service komputer kantor, nazwagraha pratama, web developer bogor, jasa it ciawi bogor')">
    <meta name="author" content="NazwaGraha Pratama">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'NazwaGraha Pratama - Jasa Pembuatan Website & Solusi IT Terpercaya')">
    <meta property="og:description" content="@yield('meta_description', 'Solusi pembuatan website bisnis performa tinggi, ranking 1 Google, instalasi jaringan LAN kantor, dan pengadaan hardware IT.')">
    <meta property="og:image" content="@yield('og_image', asset('images/commercial_hero_workspace.webp'))">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="NazwaGraha Pratama">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'NazwaGraha Pratama - Jasa Pembuatan Website & Solusi IT Terpercaya')">
    <meta name="twitter:description" content="@yield('meta_description', 'Solusi pembuatan website bisnis performa tinggi, ranking 1 Google, instalasi jaringan LAN kantor, dan pengadaan hardware IT.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/commercial_hero_workspace.webp'))">

    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/ngp-logo.webp') }}">

    <!-- Fast Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .orange-gradient {
            background: linear-gradient(135deg, #FF6A00 0%, #EA580C 100%);
        }
        .card-shadow {
            box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.06), 0 0 2px rgba(15, 23, 42, 0.05);
            transition: all 0.3s ease;
        }
        .card-shadow:hover {
            box-shadow: 0 20px 40px -10px rgba(249, 115, 22, 0.2);
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
        "alternateName": "NGP IT Solutions",
        "legalName": "NazwaGraha Pratama",
        "description": "Pusat penyedia jasa pembuatan website kilat (skor 90+ Google PageSpeed), optimasi SEO & GEO ranking 1 Google, instalasi jaringan LAN dan server kantor, pengadaan hardware IT dan servis komputer bergaransi di Bogor dan seluruh Indonesia.",
        "image": "{{ asset('images/commercial_hero_workspace.webp') }}",
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
<body class="bg-[#F8FAFC] text-slate-800 antialiased selection:bg-orange-500 selection:text-white pb-8 sm:pb-0">

    <!-- Top Announcement Strip (Neat, Authoritative, High Contrast) -->
    <div class="bg-slate-900 text-slate-300 text-xs py-2 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-2 sm:gap-3">
                <span class="bg-orange-500 text-white px-2.5 py-0.5 rounded-full font-black uppercase text-[10px] tracking-wider shadow-sm">Promo 2026</span>
                <span class="hidden md:inline text-slate-200">🎁 Paket Website Komplit: Gratis Domain .COM + Cloud Server + Garansi 1 Tahun Penuh!</span>
                <span class="md:hidden text-slate-200">🎁 Promo: Free Domain .COM + Cloud Hosting!</span>
            </div>
            <div class="flex items-center gap-4 text-[11px]">
                <a href="tel:081298506111" class="hidden sm:inline-flex items-center gap-1.5 text-slate-300 hover:text-orange-400 transition">
                    <span class="text-orange-400 font-bold">📞</span>
                    <span>081298506111</span>
                </a>
                <span class="hidden sm:inline text-slate-600">|</span>
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20tertarik%20dengan%20layanan%20Anda" target="_blank" class="text-orange-400 hover:text-orange-300 font-extrabold flex items-center gap-1 transition">
                    <span>Chat WhatsApp Admin</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header (Clean, Modern, Organized) -->
    <header class="bg-white/95 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo & Brand Identity (Text hidden on mobile, logo only) -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 group">
                <div class="h-10 sm:h-12 flex items-center">
                    <img src="{{ asset('images/ngp-logo.webp') }}" alt="Logo NazwaGraha Pratama" width="211" height="80" fetchpriority="high" loading="eager" decoding="async" class="h-8 sm:h-10 w-auto object-contain transition-transform group-hover:scale-105">
                </div>
                <!-- Brand text hidden on mobile screens, shown on tablet & desktop -->
                <div class="hidden sm:block border-l border-slate-200 pl-3">
                    <div class="flex items-center gap-1.5">
                        <span class="text-base sm:text-lg font-black tracking-tight text-slate-900 leading-none group-hover:text-orange-600 transition">NAZWAGRAHA</span>
                        <span class="text-[9px] font-black px-1.5 py-0.5 rounded bg-orange-100 text-orange-700 uppercase leading-none tracking-wider">PRATAMA</span>
                    </div>
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mt-1">IT Solutions &amp; Web Services</span>
                </div>
            </a>

            <!-- Desktop Navigation Menu (Beranda, Layanan IT, Info [Tentang Kami, Artikel IT, Portofolio], Kontak) -->
            <nav class="hidden lg:flex items-center gap-1 xl:gap-2 text-sm font-semibold text-slate-700">
                
                <!-- 1. Beranda -->
                <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('home') ? 'bg-orange-50 text-orange-600 font-bold' : 'hover:text-orange-600 hover:bg-slate-50' }}">
                    Beranda
                </a>

                <!-- 2. Layanan IT (Dropdown) -->
                <div class="relative group" id="servicesDropdown">
                    <button type="button" class="px-3.5 py-2 rounded-xl transition flex items-center gap-1.5 text-slate-700 hover:text-orange-600 hover:bg-slate-50 group-hover:text-orange-600 group-hover:bg-slate-50 {{ request()->routeIs('services.*') ? 'bg-orange-50 text-orange-600 font-bold' : '' }}">
                        <span>Layanan IT</span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-orange-600 group-hover:rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Box with Hover Bridge to prevent flickering -->
                    <div class="absolute top-full left-0 pt-2 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 transform group-hover:translate-y-0 translate-y-1">
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-200/90 p-2 space-y-1">
                            
                            <a href="{{ route('services.website') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('services.website') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">🌐</span>
                                <span>Pembuatan Website</span>
                            </a>

                            <a href="{{ route('services.seo-geo') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('services.seo-geo') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">🚀</span>
                                <span>Optimasi SEO &amp; GEO (AI)</span>
                            </a>

                            <a href="{{ route('services.jaringan-lan') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('services.jaringan-lan') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">🔌</span>
                                <span>Jaringan LAN &amp; Server</span>
                            </a>

                            <a href="{{ route('services.hardware') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('services.hardware') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">💻</span>
                                <span>Pengadaan Hardware IT</span>
                            </a>

                            <a href="{{ route('services.servis') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('services.servis') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">🛠️</span>
                                <span>Servis &amp; Troubleshooting</span>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- 3. Info (Sub Menu: Tentang Kami, Artikel IT, Portofolio) -->
                <div class="relative group" id="infoDropdown">
                    <button type="button" class="px-3.5 py-2 rounded-xl transition flex items-center gap-1.5 text-slate-700 hover:text-orange-600 hover:bg-slate-50 group-hover:text-orange-600 group-hover:bg-slate-50 {{ (request()->routeIs('about') || request()->routeIs('articles.*') || request()->routeIs('gallery.*')) ? 'bg-orange-50 text-orange-600 font-bold' : '' }}">
                        <span>Info</span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-orange-600 group-hover:rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Box Info -->
                    <div class="absolute top-full left-0 pt-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 transform group-hover:translate-y-0 translate-y-1">
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-200/90 p-2 space-y-1">
                            
                            <!-- Sub Menu 1: Tentang Kami -->
                            <a href="{{ route('about') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('about') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">🏢</span>
                                <span>Tentang Kami</span>
                            </a>

                            <!-- Sub Menu 2: Artikel IT -->
                            <a href="{{ route('articles.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('articles.*') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">📰</span>
                                <span>Artikel IT</span>
                            </a>

                            <!-- Sub Menu 3: Portofolio -->
                            <a href="{{ route('gallery.index') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-bold {{ request()->routeIs('gallery.*') ? 'text-orange-600 bg-orange-50' : 'text-slate-700 hover:text-orange-600 hover:bg-orange-50' }} transition">
                                <span class="text-base">🖼️</span>
                                <span>Portofolio</span>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- 4. Kontak -->
                <a href="{{ route('contact.index') }}" class="px-3.5 py-2 rounded-xl transition {{ request()->routeIs('contact.*') ? 'bg-orange-50 text-orange-600 font-bold' : 'hover:text-orange-600 hover:bg-slate-50' }}">
                    Kontak
                </a>

            </nav>

            <!-- CTA Actions & Mobile Hamburger -->
            <div class="flex items-center gap-2 sm:gap-3">
                
                <!-- Direct WhatsApp Button (Desktop / Tablet) -->
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20website%20dan%20solusi%20IT" target="_blank" class="hidden sm:flex px-4 sm:px-5 py-2.5 sm:py-3 rounded-xl orange-gradient text-white text-xs sm:text-sm font-black shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 transition transform hover:-translate-y-0.5 items-center gap-2 shrink-0">
                    <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.094-.179.196-.077.371.101.174.45 1.743 1.95 2.072.193.042.361.026.495-.038.159-.076.694-.808.88-1.084.188-.276.375-.231.625-.138.25.092 1.587.748 1.86.885.274.137.456.205.522.319.066.114.066.662-.078 1.067z"/></svg>
                    <span>Konsultasi Gratis</span>
                </a>



                <!-- Mobile Hamburger Button (Clear ☰ Icon & Menu Label) -->
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

        <!-- Mobile Drawer Menu (Hidden by default, slides out when hamburger clicked) -->
        <div id="mobileDrawer" class="hidden lg:hidden border-t border-slate-200 bg-white/98 backdrop-blur-xl transition-all shadow-2xl px-4 py-5 space-y-4 max-h-[85vh] overflow-y-auto">
            
            <div class="space-y-2">
                <!-- 1. Beranda -->
                <a href="{{ route('home') }}" class="flex items-center justify-between p-3 rounded-xl font-bold text-sm {{ request()->routeIs('home') ? 'bg-orange-50 text-orange-600' : 'text-slate-800 hover:bg-slate-50' }} transition">
                    <span class="flex items-center gap-2.5">
                        <span class="text-base">🏠</span>
                        <span>Beranda</span>
                    </span>
                    <span class="text-xs text-slate-400">→</span>
                </a>

                <!-- 2. Layanan IT Group -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-3 space-y-2">
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-400 block px-1">Layanan Solusi IT:</span>
                    
                    <a href="{{ route('services.website') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.website') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>🌐</span>
                        <span>Pembuatan Website</span>
                    </a>
                    
                    <a href="{{ route('services.seo-geo') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.seo-geo') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>🚀</span>
                        <span>Optimasi SEO &amp; GEO (AI)</span>
                    </a>

                    <a href="{{ route('services.jaringan-lan') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.jaringan-lan') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>🔌</span>
                        <span>Jaringan LAN &amp; Server</span>
                    </a>

                    <a href="{{ route('services.hardware') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.hardware') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>💻</span>
                        <span>Pengadaan Hardware IT</span>
                    </a>

                    <a href="{{ route('services.servis') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('services.servis') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>🛠️</span>
                        <span>Servis &amp; Troubleshooting</span>
                    </a>
                </div>

                <!-- 3. Info (Sub Menu: Tentang Kami, Artikel IT, Portofolio) -->
                <div class="rounded-2xl border border-slate-200/80 bg-slate-50/80 p-3 space-y-2">
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-400 block px-1">Info:</span>
                    
                    <a href="{{ route('about') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('about') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>🏢</span>
                        <span>Tentang Kami</span>
                    </a>

                    <a href="{{ route('articles.index') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('articles.*') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>📰</span>
                        <span>Artikel IT</span>
                    </a>

                    <a href="{{ route('gallery.index') }}" class="flex items-center gap-2.5 p-2 rounded-lg text-xs font-bold {{ request()->routeIs('gallery.*') ? 'text-orange-600 bg-white shadow-xs' : 'text-slate-700 hover:text-orange-600 hover:bg-white' }} transition">
                        <span>🖼️</span>
                        <span>Portofolio</span>
                    </a>
                </div>

                <!-- 4. Kontak -->
                <a href="{{ route('contact.index') }}" class="flex items-center justify-between p-3 rounded-xl font-bold text-sm {{ request()->routeIs('contact.*') ? 'bg-orange-50 text-orange-600' : 'text-slate-800 hover:bg-slate-50' }} transition">
                    <span class="flex items-center gap-2.5">
                        <span class="text-base">📍</span>
                        <span>Kontak</span>
                    </span>
                    <span class="text-xs text-slate-400">→</span>
                </a>
            </div>

            <!-- Mobile Contact Cards -->
            <div class="pt-3 border-t border-slate-200 space-y-2.5 text-xs">
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi" target="_blank" class="w-full py-3 rounded-xl orange-gradient text-white font-extrabold flex items-center justify-center gap-2 shadow-md hover:shadow-lg transition">
                    <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.094-.179.196-.077.371.101.174.45 1.743 1.95 2.072.193.042.361.026.495-.038.159-.076.694-.808.88-1.084.188-.276.375-.231.625-.138.25.092 1.587.748 1.86.885.274.137.456.205.522.319.066.114.066.662-.078 1.067z"/></svg>
                    <span>Chat WhatsApp (081298506111)</span>
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
                <p>© {{ date('Y') }} NazwaGraha Pratama. Seluruh Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-4">
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
