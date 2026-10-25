<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Backoffice Admin') - NazwaGraha Pratama</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/ngp-logo.webp') }}">

    <!-- Google Fonts for Modern Luxury Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
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
                        },
                        brand: {
                            500: '#f97316',
                            600: '#ea580c',
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
    </style>
    @stack('styles')
</head>
<body class="bg-[#F8FAFC] text-slate-800 antialiased font-sans selection:bg-orange-500 selection:text-white">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        <!-- Mobile Header Bar (Only visible on < md screens) -->
        <header class="md:hidden bg-slate-900 border-b border-slate-800 px-4 py-3 flex items-center justify-between sticky top-0 z-50">
            <div class="flex items-center gap-3">
                <button type="button" id="adminSidebarToggle" aria-label="Buka Menu Sidebar" class="p-2 rounded-xl bg-slate-800 text-slate-200 hover:text-white hover:bg-slate-700 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/ngp-logo.webp') }}" alt="Logo NGP" class="h-7 w-auto object-contain">
                    <span class="text-xs font-black text-white tracking-wider">BACKOFFICE</span>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 text-[11px] font-bold transition">
                    Website ↗
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="p-1.5 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500 hover:text-white text-xs transition" title="Logout">
                        🚪
                    </button>
                </form>
            </div>
        </header>

        <!-- Sidebar Backdrop Overlay (Mobile) -->
        <div id="adminSidebarOverlay" class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs z-40 hidden md:hidden transition-opacity"></div>

        <!-- Sidebar Navigation (Desktop Fixed & Mobile Slide-in Drawer) -->
        <aside id="adminSidebar" class="fixed inset-y-0 left-0 z-50 w-72 md:w-64 bg-[#1E2124] text-slate-300 flex-shrink-0 flex flex-col justify-between transform -translate-x-full md:translate-x-0 md:static transition-transform duration-300 ease-in-out border-r border-slate-800/80 shadow-2xl md:shadow-none">
            
            <div class="flex-1 overflow-y-auto">
                <!-- Brand Header -->
                <div class="p-5 border-b border-slate-800/80 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-24 bg-slate-900 rounded-xl p-1.5 flex items-center justify-center border border-slate-700/60 shadow-xs">
                            <img src="{{ asset('images/ngp-logo.webp') }}" alt="Logo NGP" class="max-h-full max-w-full object-contain">
                        </div>
                        <div>
                            <span class="block font-black text-sm text-white tracking-wide font-heading">NAZWAGRAHA</span>
                            <span class="block text-[10px] text-orange-400 font-extrabold uppercase tracking-wider">Backoffice 2026</span>
                        </div>
                    </div>

                    <!-- Close Button on Mobile Drawer -->
                    <button type="button" id="adminSidebarClose" class="md:hidden text-slate-400 hover:text-white p-1">
                        ✕
                    </button>
                </div>

                <!-- Nav Menu Links -->
                <nav class="p-4 space-y-1 text-xs font-semibold">
                    
                    <!-- 1. Ringkasan Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'orange-gradient text-white shadow-md shadow-orange-500/20 font-black' : 'hover:bg-slate-800/80 text-slate-400 hover:text-white' }}">
                        <span class="text-base">📊</span>
                        <span>Ringkasan Dashboard</span>
                    </a>

                    <!-- SECTION: HARGA & LAYANAN PUBLIK (GAMBAR 1) -->
                    <div class="pt-4 pb-1.5 px-3 text-[10px] font-black text-slate-500 uppercase tracking-widest font-heading">
                        Paket &amp; Layanan Utama
                    </div>

                    <!-- MENU PILIHAN PAKET PEMBUATAN WEBSITE -->
                    <a href="{{ route('admin.packages.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.packages.*') ? 'orange-gradient text-white shadow-md shadow-orange-500/20 font-black' : 'hover:bg-slate-800/80 text-slate-300 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base text-amber-400">⭐</span>
                            <span>Pilihan Paket Website</span>
                        </div>
                        <span class="text-[9px] bg-orange-500/20 text-orange-300 px-1.5 py-0.5 rounded font-black border border-orange-500/30">
                            Gambar 1
                        </span>
                    </a>

                    <!-- SECTION: KONTEN ARTIKEL (SUB MENU: KATEGORI & POSTING) -->
                    <div class="pt-4 pb-1.5 px-3 text-[10px] font-black text-slate-500 uppercase tracking-widest font-heading">
                        Modul Artikel &amp; SEO
                    </div>

                    <!-- ACCORDION / GROUP MENU ARTIKEL -->
                    <div class="space-y-1 rounded-2xl bg-slate-900/60 p-1.5 border border-slate-800/60">
                        <div class="flex items-center justify-between px-2 py-1 text-[11px] font-bold text-slate-400">
                            <span class="flex items-center gap-2">
                                <span>📚</span>
                                <span>Menu Artikel</span>
                            </span>
                            <span class="text-[9px] text-slate-500 uppercase">Sub Menu</span>
                        </div>

                        <!-- Sub Menu 1: Kategori Artikel -->
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-2.5 pl-4 pr-3 py-2 rounded-xl transition text-xs {{ request()->routeIs('admin.categories.*') ? 'bg-[#F58220] text-white font-black shadow-xs' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                            <span class="text-sm">🏷️</span>
                            <span>Kategori Artikel</span>
                        </a>

                        <!-- Sub Menu 2: Posting Artikel -->
                        <a href="{{ route('admin.articles.index') }}" class="flex items-center justify-between pl-4 pr-3 py-2 rounded-xl transition text-xs {{ request()->routeIs('admin.articles.*') ? 'bg-[#F58220] text-white font-black shadow-xs' : 'hover:bg-slate-800 text-slate-300 hover:text-white' }}">
                            <div class="flex items-center gap-2.5">
                                <span class="text-sm">📝</span>
                                <span>Posting Artikel</span>
                            </div>
                            <span class="text-[10px] text-slate-400 group-hover:text-white">+ Tulis</span>
                        </a>
                    </div>

                    <!-- SECTION: PORTOFOLIO (GAMBAR 2) -->
                    <div class="pt-4 pb-1.5 px-3 text-[10px] font-black text-slate-500 uppercase tracking-widest font-heading">
                        Portofolio &amp; Bukti Karya
                    </div>

                    <!-- MENU PORTOFOLIO -->
                    <a href="{{ route('admin.galleries.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.galleries.*') ? 'orange-gradient text-white shadow-md shadow-orange-500/20 font-black' : 'hover:bg-slate-800/80 text-slate-300 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">🖼️</span>
                            <span>Menu Portofolio</span>
                        </div>
                        <span class="text-[9px] bg-slate-800 text-slate-400 px-1.5 py-0.5 rounded font-black border border-slate-700">
                            Gambar 2
                        </span>
                    </a>

                    <!-- SECTION: LEADS & PENJUALAN -->
                    <div class="pt-4 pb-1.5 px-3 text-[10px] font-black text-slate-500 uppercase tracking-widest font-heading">
                        Prospek &amp; Pelanggan
                    </div>

                    <a href="{{ route('admin.contact-messages.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.contact-messages.*') ? 'orange-gradient text-white shadow-md shadow-orange-500/20 font-black' : 'hover:bg-slate-800/80 text-slate-300 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">📩</span>
                            <span>Pesan Masuk (Leads)</span>
                        </div>
                        @php
                            $sidebarUnreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                        @endphp
                        @if($sidebarUnreadCount > 0)
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-amber-400 text-slate-950 animate-pulse">
                                {{ $sidebarUnreadCount }}
                            </span>
                        @endif
                    </a>

                    <!-- SECTION: SISTEM -->
                    <div class="pt-4 pb-1.5 px-3 text-[10px] font-black text-slate-500 uppercase tracking-widest font-heading">
                        Sistem &amp; Pengguna
                    </div>

                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.users.*') ? 'orange-gradient text-white shadow-md shadow-orange-500/20 font-black' : 'hover:bg-slate-800/80 text-slate-300 hover:text-white' }}">
                        <span class="text-base">👥</span>
                        <span>Manajemen User</span>
                    </a>

                </nav>
            </div>

            <!-- User & Bottom Links -->
            <div class="p-4 border-t border-slate-800/80 bg-slate-950/40 space-y-3">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-xs text-slate-200 font-bold transition border border-slate-700/60 shadow-xs group">
                    <span class="flex items-center gap-2"><span>🌐</span><span>Lihat Website Publik</span></span>
                    <span class="text-orange-400 group-hover:translate-x-0.5 transition-transform">↗</span>
                </a>

                <div class="flex items-center justify-between pt-1">
                    <div class="flex items-center gap-2.5 min-w-0">
                        @if(Auth::check() && Auth::user()->avatar)
                            <div class="w-9 h-9 rounded-xl overflow-hidden border border-orange-500/50 flex-shrink-0 shadow-xs">
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-orange-500 to-amber-600 text-white flex items-center justify-center text-xs font-black flex-shrink-0 shadow-xs">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                            </div>
                        @endif
                        <div class="text-xs min-w-0">
                            <div class="flex items-center gap-1.5 mb-0.5">
                                <span class="block text-white font-bold truncate max-w-[95px]">{{ Auth::user()->name ?? 'Administrator' }}</span>
                                @if(Auth::check() && Auth::user()->isSuperUser())
                                    <span class="px-1.5 py-0.2 rounded text-[8px] font-black uppercase tracking-wider bg-purple-500/20 text-purple-300 border border-purple-500/30">Super</span>
                                @elseif(Auth::check() && Auth::user()->isSupervisor())
                                    <span class="px-1.5 py-0.2 rounded text-[8px] font-black uppercase tracking-wider bg-blue-500/20 text-blue-300 border border-blue-500/30">SPV</span>
                                @else
                                    <span class="px-1.5 py-0.2 rounded text-[8px] font-black uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Admin</span>
                                @endif
                            </div>
                            <span class="block text-[10px] text-slate-400 truncate max-w-[125px] font-mono">{{ Auth::user()->email ?? '' }}</span>
                        </div>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST" class="flex-shrink-0 ml-1">
                        @csrf
                        <button type="submit" class="p-2 rounded-xl bg-red-500/10 hover:bg-red-500 hover:text-white text-red-400 text-xs transition border border-red-500/20" title="Keluar / Logout">
                            🚪
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0">
            
            <!-- Desktop Top Bar -->
            <header class="hidden md:flex bg-white border-b border-slate-200/80 px-8 py-4 items-center justify-between sticky top-0 z-30 shadow-xs">
                <div class="flex items-center gap-3">
                    <h1 class="text-base lg:text-lg font-black text-slate-900 tracking-tight font-heading">
                        @yield('title', 'Dashboard')
                    </h1>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="text-xs text-slate-500 font-semibold hidden lg:inline">
                        PT Nazwa Graha Pratama • Banjarwangi, Ciawi, Bogor
                    </span>
                    <span class="hidden lg:inline text-slate-300">|</span>
                    <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-orange-50 hover:text-[#F58220] text-slate-700 text-xs font-bold transition flex items-center gap-1.5">
                        <span>🌐 Website Publik</span>
                        <span>↗</span>
                    </a>
                </div>
            </header>

            <!-- Main Page Content -->
            <main class="p-4 sm:p-6 lg:p-8 flex-1">
                <!-- Alerts Flash Messages -->
                @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2.5">
                        <span class="w-6 h-6 rounded-full bg-emerald-200 text-emerald-800 flex items-center justify-center font-bold text-xs shrink-0">✓</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-900 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2.5">
                        <span class="w-6 h-6 rounded-full bg-red-200 text-red-800 flex items-center justify-center font-bold text-xs shrink-0">✕</span>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-900 text-xs sm:text-sm space-y-1.5 shadow-xs">
                    <div class="font-bold flex items-center gap-2">
                        <span>⚠️</span>
                        <span>Terdapat beberapa kesalahan pengisian formulir:</span>
                    </div>
                    <ul class="list-disc list-inside pl-4 text-xs space-y-0.5">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer Strip -->
            <footer class="bg-white border-t border-slate-200/80 px-6 py-3.5 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-2">
                <span>© {{ date('Y') }} PT Nazwa Graha Pratama — Backoffice Management System.</span>
                <span class="text-[11px] text-slate-500">Versi 2.0 • PHP {{ PHP_VERSION }} • Laravel {{ app()->version() }}</span>
            </footer>

        </div>

    </div>

    <!-- Mobile Drawer Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('adminSidebarOverlay');
        const toggleBtn = document.getElementById('adminSidebarToggle');
        const closeBtn = document.getElementById('adminSidebarClose');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);
    </script>

    @stack('scripts')
</body>
</html>
