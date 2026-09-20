<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary SEO Meta Tags -->
    <title><?php echo $__env->yieldContent('title', 'NazwaGraha Pratama - Jasa Pembuatan Website, SEO & Solusi IT Kantor'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Pusat solusi pembuatan website cepat bergaransi, optimasi SEO & GEO Google, instalasi jaringan LAN kantor, dan pengadaan hardware IT terpercaya di Indonesia.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'jasa pembuatan website, jasa seo, jasa pasang lan kantor, pengadaan hardware it, service komputer kantor, nazwagraha pratama'); ?>">
    <meta name="author" content="NazwaGraha Pratama">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo e(url()->current()); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'NazwaGraha Pratama - Jasa Pembuatan Website & Solusi IT Terpercaya'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Solusi pembuatan website bisnis performa tinggi, ranking 1 Google, instalasi jaringan LAN kantor, dan pengadaan hardware IT.'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/commercial_hero_workspace.jpg')); ?>">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="NazwaGraha Pratama">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo e(url()->current()); ?>">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'NazwaGraha Pratama - Jasa Pembuatan Website & Solusi IT Terpercaya'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description', 'Solusi pembuatan website bisnis performa tinggi, ranking 1 Google, instalasi jaringan LAN kantor, dan pengadaan hardware IT.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('og_image', asset('images/commercial_hero_workspace.jpg')); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="<?php echo e(asset('images/ngp-logo.webp')); ?>">

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
    </style>

    <!-- Schema.org JSON-LD (SEO & Generative AI Optimization) -->
    <script type="application/ld+json">
    {
        "<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>": "https://schema.org",
        "@type": ["LocalBusiness", "ProfessionalService", "ITService"],
        "name": "NazwaGraha Pratama",
        "image": "<?php echo e(asset('images/commercial_hero_workspace.jpg')); ?>",
        "logo": "<?php echo e(asset('images/ngp-logo.webp')); ?>",
        "@id": "<?php echo e(url('/')); ?>",
        "url": "<?php echo e(url('/')); ?>",
        "telephone": "+6281298506111",
        "email": "nazwagraha@gmail.com",
        "priceRange": "$$",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi",
            "addressLocality": "Ciawi",
            "addressRegion": "Jawa Barat",
            "addressCountry": "ID"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": -6.6578,
            "longitude": 106.8524
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
            "name": "Layanan Solusi IT & Digital",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Jasa Pembuatan Website Perusahaan & Toko Online"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Jasa Optimasi SEO & GEO (AI Search Engine Optimization)"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Jasa Instalasi & Setting Jaringan LAN Kantor"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Pengadaan Hardware IT & Komputer Kantor"
                    }
                }
            ]
        }
    }
    </script>
    <?php echo $__env->yieldPushContent('schema'); ?>
</head>
<body class="bg-[#F8FAFC] text-slate-800 antialiased selection:bg-orange-500 selection:text-white pb-24 md:pb-0">

    <!-- Top Announcement Strip -->
    <div class="orange-gradient text-white text-xs py-2 px-4 shadow-sm">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="bg-black/20 px-2.5 py-0.5 rounded-full font-bold uppercase text-[10px] tracking-wider">Promo Spesial</span>
                <span class="hidden sm:inline">🎁 Paket Website Komplit: Gratis Domain .COM + Cloud Hosting + Garansi 1 Tahun!</span>
                <span class="sm:hidden">🎁 Promo Website: Free Domain + Hosting Cloud!</span>
            </div>
            <div class="flex items-center gap-4">
                <span class="hidden md:inline text-orange-100">📞 Telp/WA: <strong>081298506111</strong></span>
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20tertarik%20dengan%20layanan%20Anda" target="_blank" class="bg-white text-orange-600 font-extrabold px-3 py-1 rounded-full text-[11px] hover:bg-orange-50 transition shadow-sm">
                    Chat WhatsApp →
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="bg-white/95 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo Brand -->
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
                <div class="h-12 w-28 sm:w-32 flex items-center justify-center p-1 rounded-xl bg-slate-50 border border-slate-200 group-hover:border-orange-400 transition">
                    <img src="<?php echo e(asset('images/ngp-logo.webp')); ?>" alt="Logo NazwaGraha Pratama" class="max-h-full max-w-full object-contain">
                </div>
                <div class="hidden sm:block border-l border-slate-200 pl-3">
                    <span class="block text-base font-black tracking-tight text-slate-900 leading-none">NAZWAGRAHA</span>
                    <span class="block text-[11px] font-bold tracking-wider text-orange-600 uppercase mt-1">Pratama IT Solutions</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold text-slate-700">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-orange-600 transition <?php echo e(request()->routeIs('home') ? 'text-orange-600 font-bold' : ''); ?>">Beranda</a>
                <a href="<?php echo e(route('home')); ?>#layanan" class="hover:text-orange-600 transition">Semua Layanan</a>
                <a href="<?php echo e(route('gallery.index')); ?>" class="hover:text-orange-600 transition <?php echo e(request()->routeIs('gallery.*') ? 'text-orange-600 font-bold' : ''); ?> flex items-center gap-1.5">
                    <span>Galeri & Portofolio</span>
                    <span class="bg-orange-100 text-orange-600 text-[10px] font-bold px-2 py-0.5 rounded-full">Hasil Nyata</span>
                </a>
                <a href="<?php echo e(route('articles.index')); ?>" class="hover:text-orange-600 transition <?php echo e(request()->routeIs('articles.*') ? 'text-orange-600 font-bold' : ''); ?>">Artikel & Tips IT</a>
                <a href="<?php echo e(route('home')); ?>#harga" class="hover:text-orange-600 transition">Paket & Biaya</a>
                <a href="<?php echo e(route('contact.index')); ?>" class="hover:text-orange-600 transition <?php echo e(request()->routeIs('contact.*') ? 'text-orange-600 font-bold' : ''); ?>">Kontak Kami</a>
            </nav>

            <!-- CTA Buttons -->
            <div class="flex items-center gap-3">
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20website%20dan%20solusi%20IT" target="_blank" class="px-4 sm:px-5 py-2.5 sm:py-3 rounded-xl orange-gradient text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.094-.179.196-.077.371.101.174.45 1.743 1.95 2.072.193.042.361.026.495-.038.159-.076.694-.808.88-1.084.188-.276.375-.231.625-.138.25.092 1.587.748 1.86.885.274.137.456.205.522.319.066.114.066.662-.078 1.067z"/></svg>
                    <span>Hubungi Kami</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Injection -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
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
                        <li><a href="<?php echo e(route('home')); ?>#layanan" class="hover:text-orange-400 transition">Jasa Pembuatan Website Bisnis</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#layanan" class="hover:text-orange-400 transition">Website Toko Online (E-Commerce)</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#layanan" class="hover:text-orange-400 transition">Aplikasi Web & Sistem ERP Kustom</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#layanan" class="hover:text-orange-400 transition">Optimasi SEO & GEO (Google & AI Search)</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#layanan" class="hover:text-orange-400 transition">Jasa Maintenance & Keamanan Website</a></li>
                    </ul>
                </div>

                <!-- Col 3: IT Hardware & LAN Services -->
                <div>
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Infrastruktur & IT Kantor</h4>
                    <ul class="space-y-2.5 text-slate-400">
                        <li><a href="<?php echo e(route('home')); ?>#jaringan-lan" class="hover:text-orange-400 transition">Instalasi Jaringan LAN & Wi-Fi Kantor</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#jaringan-lan" class="hover:text-orange-400 transition">Pengadaan Komputer, Laptop & Server</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#jaringan-lan" class="hover:text-orange-400 transition">Computer Troubleshooting & Servis</a></li>
                        <li><a href="<?php echo e(route('home')); ?>#jaringan-lan" class="hover:text-orange-400 transition">Kontrak Maintenance Rutin Kantor (SLA)</a></li>
                        <li><a href="<?php echo e(route('gallery.index')); ?>" class="hover:text-orange-400 transition">Galeri Foto Portofolio Proyek</a></li>
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
                <p>© <?php echo e(date('Y')); ?> NazwaGraha Pratama. Seluruh Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-4">
                    <a href="<?php echo e(route('seo.sitemap')); ?>" class="hover:text-slate-400 transition">Sitemap XML</a>
                    <span>•</span>
                    <a href="<?php echo e(route('seo.robots')); ?>" class="hover:text-slate-400 transition">Robots.txt</a>
                    <span>•</span>
                    <a href="<?php echo e(route('admin.login')); ?>" class="hover:text-slate-400 transition text-[11px] text-slate-600">Login Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- MOBILE STICKY THUMB ACTION BAR (KUNCI BANJIR ORDERAN DI SMARTPHONE) -->
    <div class="md:hidden fixed bottom-2.5 left-2.5 right-2.5 z-50">
        <div class="bg-white/95 backdrop-blur-xl border border-slate-200 rounded-2xl p-2 flex items-center gap-2 shadow-2xl">
            <a href="<?php echo e(route('home')); ?>#harga" class="flex-1 py-3 text-center rounded-xl bg-slate-100 border border-slate-300 text-slate-800 text-xs font-bold active:scale-95 transition">
                Cek Harga
            </a>
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20mau%20order%20layanan" target="_blank" class="flex-[1.6] py-3 text-center rounded-xl orange-gradient text-white text-xs font-black shadow-lg shadow-orange-500/30 flex items-center justify-center gap-1.5 active:scale-95 transition">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.094-.179.196-.077.371.101.174.45 1.743 1.95 2.072.193.042.361.026.495-.038.159-.076.694-.808.88-1.084.188-.276.375-.231.625-.138.25.092 1.587.748 1.86.885.274.137.456.205.522.319.066.114.066.662-.078 1.067z"/></svg>
                <span>Chat WhatsApp</span>
            </a>
        </div>
    </div>

</body>
</html>
