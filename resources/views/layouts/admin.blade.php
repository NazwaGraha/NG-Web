<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - NazwaGraha Pratama</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/webp" href="{{ asset('images/ngp-logo.webp') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            500: '#f97316',
                            600: '#ea580c',
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
    </style>
    @stack('styles')
</head>
<body class="bg-slate-100 text-slate-800 antialiased font-sans">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        <!-- Sidebar Navigation -->
        <aside class="w-full md:w-64 bg-slate-900 text-slate-300 flex-shrink-0 flex flex-col justify-between">
            <div>
                <!-- Brand Header -->
                <div class="p-5 border-b border-slate-800 flex items-center gap-3">
                    <div class="h-10 w-24 bg-slate-800 rounded-lg p-1 flex items-center justify-center">
                        <img src="{{ asset('images/ngp-logo.webp') }}" alt="Logo NGP" class="max-h-full max-w-full object-contain">
                    </div>
                    <div>
                        <span class="block font-black text-sm text-white tracking-wide">NAZWAGRAHA</span>
                        <span class="block text-[10px] text-orange-400 font-bold uppercase tracking-wider">Backoffice Admin</span>
                    </div>
                </div>

                <!-- Nav Menu Links -->
                <nav class="p-4 space-y-1.5 text-xs font-semibold">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'orange-gradient text-white shadow-md' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>📊</span>
                        <span>Ringkasan Dashboard</span>
                    </a>

                    <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        Konten & Edukasi
                    </div>

                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.categories.*') ? 'orange-gradient text-white shadow-md' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>🏷️</span>
                        <span>Kategori Artikel</span>
                    </a>

                    <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.articles.*') ? 'orange-gradient text-white shadow-md' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>📝</span>
                        <span>Kelola Artikel & SEO</span>
                    </a>

                    <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        Media & Portofolio
                    </div>

                    <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.galleries.*') ? 'orange-gradient text-white shadow-md' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>🖼️</span>
                        <span>Kelola Galeri Foto</span>
                    </a>

                    <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        Prospek & Penjualan
                    </div>

                    <a href="{{ route('admin.contact-messages.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.contact-messages.*') ? 'orange-gradient text-white shadow-md' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <span>📩</span>
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

                    <div class="pt-4 pb-1 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">
                        Sistem & Pengguna
                    </div>

                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.users.*') ? 'orange-gradient text-white shadow-md' : 'hover:bg-slate-800 text-slate-400 hover:text-white' }}">
                        <span>👥</span>
                        <span>Manajemen User</span>
                    </a>
                </nav>
            </div>

            <!-- User & Bottom Links -->
            <div class="p-4 border-t border-slate-800 space-y-3">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-slate-300 font-semibold transition">
                    <span>🌐 Lihat Website Publik</span>
                    <span>↗</span>
                </a>

                <div class="flex items-center justify-between pt-2">
                    <div class="flex items-center gap-2.5 min-w-0">
                        @if(Auth::check() && Auth::user()->avatar)
                            <div class="w-9 h-9 rounded-full overflow-hidden border border-slate-700 flex-shrink-0">
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-9 h-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-xs font-bold text-slate-300 flex-shrink-0">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                            </div>
                        @endif
                        <div class="text-xs min-w-0">
                            <div class="flex items-center gap-1.5 mb-0.5">
                                <span class="block text-white font-bold truncate max-w-[95px]">{{ Auth::user()->name ?? 'Administrator' }}</span>
                                @if(Auth::check() && Auth::user()->isSuperUser())
                                    <span class="px-1.5 py-0.5 rounded text-[9px] font-black uppercase tracking-wider bg-purple-500/20 text-purple-300 border border-purple-500/30" title="Super User - Hak Akses Penuh">Super</span>
                                @elseif(Auth::check() && Auth::user()->isSupervisor())
                                    <span class="px-1.5 py-0.5 rounded text-[9px] font-black uppercase tracking-wider bg-blue-500/20 text-blue-300 border border-blue-500/30" title="Supervisor - Hak Akses Penuh">SPV</span>
                                @else
                                    <span class="px-1.5 py-0.5 rounded text-[9px] font-black uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/30" title="Admin - Tanpa Hak Hapus">Admin</span>
                                @endif
                            </div>
                            <span class="block text-[10px] text-slate-400 truncate max-w-[125px]">{{ Auth::user()->email ?? '' }}</span>
                        </div>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST" class="flex-shrink-0 ml-1">
                        @csrf
                        <button type="submit" class="p-2 rounded-lg bg-red-500/20 text-red-400 hover:bg-red-500 hover:text-white text-xs transition" title="Logout">
                            🚪
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            
            <!-- Top Bar -->
            <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between">
                <h1 class="text-lg font-black text-slate-900">
                    @yield('title', 'Dashboard')
                </h1>
                
                <div class="flex items-center gap-3">
                    <span class="text-xs text-slate-500 hidden sm:inline">
                        Sistem Manajemen NazwaGraha Pratama
                    </span>
                </div>
            </header>

            <!-- Main Page Content -->
            <main class="p-6 flex-1">
                <!-- Alerts Flash Messages -->
                @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-2">
                        <span>✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-xs sm:text-sm font-semibold flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-2">
                        <span>❌</span>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-xs sm:text-sm space-y-1 shadow-sm">
                    <div class="font-bold flex items-center gap-2">
                        <span>⚠️</span>
                        <span>Terdapat kesalahan pengisian data:</span>
                    </div>
                    <ul class="list-disc list-inside pl-4 text-xs">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </main>

        </div>

    </div>

    @stack('scripts')
</body>
</html>
