@extends('layouts.admin')

@section('title', 'Ringkasan Dashboard')

@section('content')

<!-- Active Logged-in User Hero Banner -->
<div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white rounded-3xl p-6 sm:p-7 shadow-md border border-slate-700/50 mb-8 relative overflow-hidden">
    <!-- Decorative Ambient Glow -->
    <div class="absolute -right-16 -top-16 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute right-32 -bottom-16 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
        
        <!-- User Info & Avatar -->
        <div class="flex items-center gap-4 sm:gap-5">
            <!-- Avatar with Active Indicator -->
            <div class="relative flex-shrink-0">
                @if(Auth::check() && Auth::user()->avatar)
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl overflow-hidden border-2 border-orange-500/40 shadow-md">
                        <img src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-orange-500 to-orange-700 text-white font-black text-2xl sm:text-3xl flex items-center justify-center border-2 border-orange-400/40 shadow-md">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                @endif
                <!-- Online Green Dot -->
                <span class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-500 border-2 border-slate-900 rounded-full flex items-center justify-center" title="Sesi Login Aktif">
                    <span class="w-2 h-2 bg-white rounded-full"></span>
                </span>
            </div>

            <!-- Profile Details -->
            <div>
                <div class="flex flex-wrap items-center gap-2 mb-1">
                    <span class="text-xs font-semibold text-orange-400 uppercase tracking-wider flex items-center gap-1">
                        <span>👋</span> Sesi Login Pengguna Aktif
                    </span>

                    @if(Auth::check() && Auth::user()->isSuperUser())
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-purple-500/20 text-purple-300 border border-purple-500/40 inline-flex items-center gap-1">
                            <span>👑</span> Super User (Root Access)
                        </span>
                    @elseif(Auth::check() && Auth::user()->isSupervisor())
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-blue-500/20 text-blue-300 border border-blue-500/40 inline-flex items-center gap-1">
                            <span>🛡️</span> Supervisor (Full Privilege)
                        </span>
                    @else
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 inline-flex items-center gap-1">
                            <span>✍️</span> Administrator (Input & Edit)
                        </span>
                    @endif
                </div>

                <h1 class="text-xl sm:text-2xl font-black text-white tracking-tight">
                    {{ Auth::user()->name ?? 'Administrator' }}
                </h1>

                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 mt-1 text-xs text-slate-400">
                    <span class="font-mono text-slate-300">{{ Auth::user()->email ?? '' }}</span>
                    <span>•</span>
                    <span class="{{ Auth::user()->canDelete() ? 'text-emerald-400 font-semibold' : 'text-amber-400 font-medium' }}">
                        {{ Auth::user()->canDelete() ? '✅ Hak Hapus: Diizinkan (Penuh)' : '🔒 Hak Hapus: Terkunci (Khusus SPV/Super)' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Quick Info / Time Widget -->
        <div class="flex flex-row md:flex-col items-start md:items-end justify-between border-t md:border-t-0 border-slate-700/50 pt-4 md:pt-0 gap-2">
            <div class="text-left md:text-right">
                <span class="block text-[10px] text-slate-400 uppercase tracking-wider font-bold">Waktu Server Sistem</span>
                <span class="block text-xs font-bold text-white mt-0.5">{{ now()->translatedFormat('l, d F Y') }}</span>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.users.index') }}" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 text-xs font-bold transition flex items-center gap-1.5">
                    <span>👥</span> Kelola Pengguna
                </a>
            </div>
        </div>

    </div>
</div>

<!-- Stat Metrics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6 mb-8">
    
    <!-- Hot Leads / Incoming Messages Card -->
    <a href="{{ route('admin.contact-messages.index') }}" class="bg-gradient-to-br from-white to-amber-50/50 rounded-3xl p-5 border border-amber-200/80 shadow-xs hover:border-amber-400 hover:shadow-md transition flex items-center justify-between group">
        <div>
            <span class="text-xs font-bold text-amber-700 uppercase tracking-wider">Pesan Masuk (Leads)</span>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">{{ $totalMessages }}</div>
            <span class="text-[11px] font-extrabold {{ $unreadMessages > 0 ? 'text-amber-600 animate-pulse' : 'text-slate-500' }}">
                {{ $unreadMessages > 0 ? '🔥 ' . $unreadMessages . ' Belum Dibaca' : 'Semua Terbaca' }}
            </span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xl group-hover:scale-110 transition">
            📩
        </div>
    </a>

    <div class="bg-white rounded-3xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Artikel</span>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">{{ $totalArticles }}</div>
            <span class="text-[11px] text-emerald-600 font-semibold">{{ $publishedArticles }} Diterbitkan</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xl">
            📝
        </div>
    </div>

    <div class="bg-white rounded-3xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Kategori Artikel</span>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">{{ $totalCategories }}</div>
            <span class="text-[11px] text-slate-500 font-semibold">Struktur Topik SEO</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xl">
            🏷️
        </div>
    </div>

    <div class="bg-white rounded-3xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Foto Portofolio</span>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">{{ $totalGalleries }}</div>
            <span class="text-[11px] text-orange-600 font-semibold">Bukti Pekerjaan</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xl">
            🖼️
        </div>
    </div>

    <div class="bg-white rounded-3xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Pembaca</span>
            <div class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">{{ number_format($totalViews) }}</div>
            <span class="text-[11px] text-emerald-600 font-semibold">Interaksi Organik</span>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xl">
            👁️
        </div>
    </div>

</div>

<!-- Quick Actions -->
<div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm mb-8">
    <h2 class="text-xs font-extrabold uppercase tracking-wider text-slate-500 mb-4">Aksi Cepat Manajemen</h2>
    <div class="flex flex-wrap gap-3 sm:gap-4">
        <a href="{{ route('admin.contact-messages.index') }}" class="px-5 py-3 rounded-2xl bg-amber-500 hover:bg-amber-600 text-slate-950 font-black text-xs transition flex items-center gap-2 shadow-xs">
            <span>📩 Cek Pesan Masuk ({{ $unreadMessages }} Baru)</span>
        </a>
        <a href="{{ route('admin.articles.create') }}" class="px-5 py-3 rounded-2xl orange-gradient text-white text-xs font-bold shadow-md hover:shadow-orange-500/30 transition flex items-center gap-2">
            <span>+ Buat Artikel SEO Baru</span>
        </a>
        <a href="{{ route('admin.galleries.create') }}" class="px-5 py-3 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition flex items-center gap-2">
            <span>+ Upload Foto Galeri Baru</span>
        </a>
        <a href="{{ route('admin.categories.index') }}" class="px-5 py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-2">
            <span>+ Kelola Kategori Artikel</span>
        </a>
    </div>
</div>

<!-- Recent Leads Section (High-Value Closing Center) -->
<div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm mb-8">
    <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-ping"></span>
                <h3 class="text-sm sm:text-base font-black text-slate-900">Prospek Masuk Terbaru (Hot Leads)</h3>
            </div>
            <p class="text-xs text-slate-400 mt-0.5">Calon klien yang mengisi formulir kebutuhan proyek di website</p>
        </div>
        <a href="{{ route('admin.contact-messages.index') }}" class="text-xs font-bold text-orange-600 hover:underline">
            Lihat Semua Pesan ({{ $totalMessages }}) →
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-400 uppercase tracking-wider text-[10px]">
                <tr>
                    <th class="py-2.5 px-3">Status</th>
                    <th class="py-2.5 px-3">Nama Pengirim</th>
                    <th class="py-2.5 px-3">WhatsApp</th>
                    <th class="py-2.5 px-3">Layanan</th>
                    <th class="py-2.5 px-3">Waktu</th>
                    <th class="py-2.5 px-3 text-center">Aksi Cepat</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @forelse($recentMessages as $lead)
                @php
                    $cleanPhone = preg_replace('/[^0-9]/', '', (string)$lead->phone);
                    if (str_starts_with($cleanPhone, '0')) {
                        $cleanPhone = '62' . substr($cleanPhone, 1);
                    }
                    $waText = urlencode("Halo Bpk/Ibu " . $lead->name . ", terima kasih telah menghubungi NazwaGraha Pratama mengenai " . $lead->service . ". Kami siap membantu proyek Anda.");
                @endphp
                <tr class="hover:bg-slate-50/70 transition {{ !$lead->is_read ? 'bg-amber-50/40 font-semibold' : '' }}">
                    <td class="py-3 px-3 whitespace-nowrap">
                        @if(!$lead->is_read)
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-extrabold bg-amber-100 text-amber-800">
                                ● BARU
                            </span>
                        @else
                            <span class="px-2 py-0.5 rounded-md text-[10px] text-slate-500 bg-slate-100">
                                Dibaca
                            </span>
                        @endif
                    </td>
                    <td class="py-3 px-3">
                        <a href="{{ route('admin.contact-messages.show', $lead) }}" class="font-bold text-slate-900 hover:text-orange-600">
                            {{ $lead->name }}
                        </a>
                    </td>
                    <td class="py-3 px-3 whitespace-nowrap">
                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="text-emerald-600 font-bold hover:underline flex items-center gap-1">
                            <span>💬</span> {{ $lead->phone }}
                        </a>
                    </td>
                    <td class="py-3 px-3">
                        <span class="px-2 py-0.5 rounded bg-orange-50 text-orange-700 text-[11px] font-medium border border-orange-100">
                            {{ $lead->service }}
                        </span>
                    </td>
                    <td class="py-3 px-3 text-slate-400 whitespace-nowrap text-[11px]">
                        {{ $lead->created_at->diffForHumans() }}
                    </td>
                    <td class="py-3 px-3 text-center whitespace-nowrap">
                        <a href="{{ route('admin.contact-messages.show', $lead) }}" class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 text-[11px] font-bold inline-block mr-1">
                            Buka Pesan
                        </a>
                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="px-2.5 py-1 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 text-[11px] font-bold inline-block">
                            Balas WA
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-6 text-center text-slate-400">
                        Belum ada pesan formulir masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Two Columns Grid: Recent Articles & Recent Galleries -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Recent Articles (7 Cols) -->
    <div class="lg:col-span-7 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
            <h3 class="text-sm font-black text-slate-900">Artikel Terbaru</h3>
            <a href="{{ route('admin.articles.index') }}" class="text-xs font-bold text-orange-600 hover:underline">
                Lihat Semua Artikel →
            </a>
        </div>

        <div class="space-y-3">
            @forelse($recentArticles as $art)
            <div class="flex items-center justify-between p-3 rounded-2xl bg-slate-50 border border-slate-100 hover:border-orange-200 transition">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-slate-200 flex-shrink-0">
                        <img src="{{ asset($art->featured_image ?? 'images/portfolio_web_collection.jpg') }}" alt="" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <a href="{{ route('admin.articles.edit', $art->id) }}" class="font-bold text-xs text-slate-800 hover:text-orange-600 line-clamp-1">
                            {{ $art->title }}
                        </a>
                        <span class="text-[10px] text-slate-400">
                            {{ $art->category->name }} • 👁️ {{ $art->views }} views
                        </span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $art->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                        {{ $art->is_published ? 'Terbit' : 'Draft' }}
                    </span>
                    <a href="{{ route('admin.articles.edit', $art->id) }}" class="p-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-xs">
                        ✏️
                    </a>
                </div>
            </div>
            @empty
            <p class="text-xs text-slate-400 py-4 text-center">Belum ada artikel.</p>
            @endforelse
        </div>
    </div>

    <!-- Recent Galleries (5 Cols) -->
    <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
            <h3 class="text-sm font-black text-slate-900">Galeri Foto Proyek</h3>
            <a href="{{ route('admin.galleries.index') }}" class="text-xs font-bold text-orange-600 hover:underline">
                Kelola Galeri →
            </a>
        </div>

        <div class="grid grid-cols-3 gap-3">
            @forelse($recentGalleries as $gal)
            <div class="rounded-xl overflow-hidden relative group aspect-square bg-slate-100">
                <img src="{{ asset($gal->image_path) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center p-1 text-center">
                    <span class="text-[10px] text-white font-bold line-clamp-2">{{ $gal->title }}</span>
                </div>
            </div>
            @empty
            <p class="col-span-3 text-xs text-slate-400 py-4 text-center">Belum ada foto galeri.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection
