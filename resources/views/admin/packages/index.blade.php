@extends('layouts.admin')

@section('title', 'Pilihan Paket Pembuatan Website')

@section('content')

<div class="space-y-8">
    
    <!-- Top Action & Info Bar -->
    <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-100 text-[#F58220] text-xs font-black uppercase tracking-wider mb-2">
                <span>⭐</span> Pengaturan Harga & Paket
            </div>
            <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">
                Pilihan Paket Pembuatan Website
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-2xl">
                Kelola paket harga transparan yang tampil di landing page publik (sesuai spesifikasi Gambar 1). Anda dapat mengubah nama paket, harga promo, daftar fitur checklist, dan status Best Seller.
            </p>
        </div>

        <div class="flex items-center gap-3 shrink-0">
            <a href="{{ route('home') }}#harga" target="_blank" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1.5">
                <span>👁️</span>
                <span>Lihat di Website</span>
            </a>
            <a href="{{ route('admin.packages.create') }}" class="px-5 py-2.5 rounded-xl orange-gradient text-white text-xs font-extrabold shadow-md hover:shadow-orange-500/30 transition flex items-center gap-2">
                <span>+ Tambah Paket Baru</span>
            </a>
        </div>
    </div>

    <!-- Live Preview Box (Tampilan Real-time Persis Gambar 1) -->
    <div class="bg-gradient-to-b from-slate-50 to-white rounded-3xl p-6 sm:p-8 border-2 border-orange-200/80 shadow-md">
        <div class="flex items-center justify-between border-b border-slate-200 pb-4 mb-8">
            <div class="flex items-center gap-2.5">
                <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-xs font-black text-slate-900 uppercase tracking-wider">Preview Langsung: Tampilan di Landing Page Publik</span>
            </div>
            <span class="text-[11px] bg-orange-100 text-[#F58220] font-bold px-3 py-1 rounded-full">
                Sesuai Desain Gambar 1
            </span>
        </div>

        <!-- Section Header Preview Sesuai Gambar 1 -->
        <div class="text-center max-w-3xl mx-auto mb-10">
            <div class="inline-block bg-orange-100 text-[#F58220] font-black text-[11px] uppercase tracking-wider px-3.5 py-1 rounded-full mb-3">
                TRANSPARAN &amp; RESMI
            </div>
            <div class="flex items-center justify-center">
                <h3 class="inline-block bg-[#F58220] text-white text-2xl sm:text-3xl font-black px-4 py-1.5 rounded-lg tracking-tight">
                    Pilihan Paket Pembuatan Website
                </h3>
            </div>
            <p class="text-xs sm:text-sm text-slate-600 mt-3 leading-relaxed">
                Biaya jelas tanpa biaya tersembunyi. Sudah mencakup domain resmi, cloud hosting, dan pemeliharaan penuh.
            </p>
        </div>

        <!-- 3 Cards Grid Preview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-stretch">
            @forelse($packages as $pkg)
            <div class="rounded-3xl {{ $pkg->is_popular ? 'p-6 sm:p-7 bg-white border-2 border-[#F58220] shadow-xl relative transform md:-translate-y-2' : 'p-6 sm:p-7 bg-white border border-slate-200 shadow-sm' }} flex flex-col justify-between transition-all">
                
                @if($pkg->is_popular)
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 orange-gradient text-white text-[10px] font-black uppercase px-4 py-1 rounded-full shadow-md tracking-wider whitespace-nowrap">
                    {{ $pkg->popular_badge_text ?: '★ BEST SELLER & REKOMENDASI' }}
                </div>
                @endif

                <div>
                    <!-- Target Badge -->
                    <span class="text-[10px] font-black uppercase tracking-wider {{ $pkg->is_popular ? 'text-[#F58220]' : 'text-slate-500' }}">
                        {{ $pkg->target_badge ?: 'PAKET STANDAR' }}
                    </span>

                    <!-- Package Name & Tagline -->
                    <h4 class="text-xl sm:text-2xl font-black text-slate-900 mt-1 leading-snug">
                        {{ $pkg->name }}
                    </h4>
                    <p class="text-xs text-slate-500 mt-1 min-h-[32px] leading-relaxed">
                        {{ $pkg->tagline ?: 'Solusi website terbaik untuk pengembangan bisnis Anda.' }}
                    </p>

                    <!-- Price Box -->
                    <div class="my-5 pt-3 border-t border-slate-100">
                        @if($pkg->original_price)
                        <span class="text-xs text-slate-400 {{ str_contains($pkg->original_price, 'Rp') ? 'line-through' : '' }} block mb-0.5">
                            {{ $pkg->original_price }}
                        </span>
                        @else
                        <span class="text-xs text-transparent select-none block mb-0.5">-</span>
                        @endif

                        <div class="flex items-baseline gap-1.5">
                            @if($pkg->price_prefix)
                            <span class="text-xs font-bold text-slate-600">{{ $pkg->price_prefix }}</span>
                            @endif
                            <span class="text-2xl sm:text-3xl font-black {{ $pkg->is_popular ? 'text-[#F58220]' : 'text-slate-900' }}">
                                {{ $pkg->price }}
                            </span>
                        </div>

                        @if($pkg->discount_tag)
                        <span class="inline-block mt-2 text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full">
                            {{ $pkg->discount_tag }}
                        </span>
                        @endif
                    </div>

                    <!-- Checklist Features -->
                    <ul class="space-y-2.5 text-xs text-slate-700 mb-6">
                        @if(is_array($pkg->features))
                            @foreach($pkg->features as $feat)
                            <li class="flex items-start gap-2">
                                <span class="{{ $pkg->is_popular ? 'text-[#F58220]' : 'text-emerald-500' }} font-bold text-sm shrink-0 leading-none mt-0.5">✔</span>
                                <span class="leading-tight">{{ $feat }}</span>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <!-- CTA Button -->
                <div>
                    <div class="w-full py-3 rounded-xl {{ $pkg->is_popular ? 'orange-gradient text-white shadow-md' : 'bg-slate-900 text-white' }} font-bold text-xs text-center">
                        {{ $pkg->cta_text ?: 'Pilih Paket Ini →' }}
                    </div>
                    <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px]">
                        <span class="{{ $pkg->is_active ? 'text-emerald-600 font-bold' : 'text-slate-400' }}">
                            {{ $pkg->is_active ? '● Aktif Tayang' : '○ Dinonaktifkan' }}
                        </span>
                        <a href="{{ route('admin.packages.edit', $pkg->id) }}" class="text-[#F58220] hover:underline font-bold">
                            Edit Data Paket &rarr;
                        </a>
                    </div>
                </div>

            </div>
            @empty
            <div class="col-span-3 text-center py-12 text-slate-400 bg-white rounded-2xl border border-slate-200">
                Belum ada data paket pembuatan website. Silakan klik tombol "+ Tambah Paket Baru".
            </div>
            @endforelse
        </div>
    </div>

    <!-- Management Data Table -->
    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h3 class="text-sm font-black text-slate-900 uppercase tracking-wider">
                    Daftar Manajemen Paket Database
                </h3>
                <p class="text-xs text-slate-500">Kelola rincian harga, status tayang, dan urutan kartu.</p>
            </div>
            <span class="text-xs font-bold bg-slate-100 px-3 py-1 rounded-full text-slate-600">
                Total: {{ $packages->count() }} Paket
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-700 uppercase font-black text-[10px] tracking-wider border-y border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Urutan</th>
                        <th class="py-3 px-4">Nama Paket &amp; Target</th>
                        <th class="py-3 px-4">Harga &amp; Promo</th>
                        <th class="py-3 px-4">Jumlah Fitur</th>
                        <th class="py-3 px-4">Best Seller</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($packages as $pkg)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-4 font-bold text-slate-900">
                            #{{ $pkg->sort_order }}
                        </td>
                        <td class="py-3.5 px-4">
                            <strong class="text-slate-900 block font-bold text-sm">{{ $pkg->name }}</strong>
                            <span class="text-[10px] text-slate-500 font-semibold uppercase">{{ $pkg->target_badge }}</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-extrabold text-slate-900">{{ $pkg->price_prefix ? $pkg->price_prefix . ' ' : '' }}{{ $pkg->price }}</div>
                            @if($pkg->original_price)
                            <span class="text-[10px] text-slate-400 line-through">{{ $pkg->original_price }}</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 font-bold text-[11px]">
                                {{ is_array($pkg->features) ? count($pkg->features) : 0 }} Fitur Checklist
                            </span>
                        </td>
                        <td class="py-3.5 px-4">
                            @if($pkg->is_popular)
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-orange-100 text-[#F58220] border border-orange-200">
                                ★ Best Seller
                            </span>
                            @else
                            <span class="text-slate-400 text-xs">-</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            @if($pkg->is_active)
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-emerald-100 text-emerald-800 border border-emerald-200">
                                Aktif
                            </span>
                            @else
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-slate-100 text-slate-500">
                                Nonaktif
                            </span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-right space-x-1">
                            <a href="{{ route('admin.packages.edit', $pkg->id) }}" class="p-2 rounded-xl bg-slate-100 hover:bg-orange-50 hover:text-[#F58220] text-slate-700 font-bold inline-block text-xs transition" title="Edit Paket">
                                ✏️ Edit
                            </a>
                            @if(Auth::user()->canDelete())
                            <form action="{{ route('admin.packages.destroy', $pkg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket {{ $pkg->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-xl bg-red-100 hover:bg-red-200 text-red-700 font-bold text-xs transition" title="Hapus Paket">
                                    🗑️
                                </button>
                            </form>
                            @else
                            <span class="p-2 rounded-xl bg-slate-100 text-slate-400 cursor-not-allowed text-xs font-bold inline-block opacity-60" title="Akun tipe Admin tidak memiliki izin menghapus paket">
                                🔒
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-8 text-center text-slate-400">
                            Belum ada paket tersimpan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
