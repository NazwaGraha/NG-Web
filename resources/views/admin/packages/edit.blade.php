@extends('layouts.admin')

@section('title', 'Edit Paket: ' . $package->name)

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200">
        <div>
            <a href="{{ route('admin.packages.index') }}" class="text-xs font-bold text-[#F58220] hover:underline flex items-center gap-1 mb-1">
                <span>←</span> Kembali ke Daftar Paket
            </a>
            <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">
                Edit Paket: {{ $package->name }}
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">Perbarui rincian harga, fitur, atau status unggulan paket.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm">
        <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Grid 1: Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Paket <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $package->name) }}" required class="w-full text-xs sm:text-sm px-4 py-3 rounded-xl border border-slate-300 font-bold focus:outline-none focus:border-[#F58220] focus:ring-1 focus:ring-[#F58220]">
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                        Target Segment / Badge Atas
                    </label>
                    <input type="text" name="target_badge" value="{{ old('target_badge', $package->target_badge) }}" placeholder="Contoh: UMKM & BISNIS BARU" class="w-full text-xs sm:text-sm px-4 py-3 rounded-xl border border-slate-300 font-bold uppercase focus:outline-none focus:border-[#F58220] focus:ring-1 focus:ring-[#F58220]">
                </div>
            </div>

            <!-- Tagline / Subdescription -->
            <div>
                <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                    Tagline / Deskripsi Singkat
                </label>
                <input type="text" name="tagline" value="{{ old('tagline', $package->tagline) }}" placeholder="Contoh: Untuk Profil Usaha, Kantor Jasa, & Lembaga" class="w-full text-xs sm:text-sm px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:border-[#F58220] focus:ring-1 focus:ring-[#F58220]">
            </div>

            <!-- Grid 2: Pricing Details -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 p-5 rounded-2xl bg-slate-50 border border-slate-200">
                <div>
                    <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Coret / Asli
                    </label>
                    <input type="text" name="original_price" value="{{ old('original_price', $package->original_price) }}" placeholder="Contoh: Rp 3.500.000" class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-300 font-mono focus:outline-none focus:border-[#F58220]">
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                        Prefix Harga
                    </label>
                    <input type="text" name="price_prefix" value="{{ old('price_prefix', $package->price_prefix) }}" placeholder="Contoh: Mulai" class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:border-[#F58220]">
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                        Harga Final / Jual <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="price" value="{{ old('price', $package->price) }}" placeholder="Contoh: Rp 1.950.000 atau Custom / Nego" required class="w-full text-xs sm:text-sm px-4 py-2.5 rounded-xl border border-slate-300 font-black text-slate-900 focus:outline-none focus:border-[#F58220]">
                </div>
            </div>

            <!-- Discount Promo Tag -->
            <div>
                <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                    Label Diskon / Promo (Pill Hijau)
                </label>
                <input type="text" name="discount_tag" value="{{ old('discount_tag', $package->discount_tag) }}" placeholder="Contoh: Hemat 45% Bulan Ini" class="w-full text-xs sm:text-sm px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:border-[#F58220]">
            </div>

            <!-- Features Checklist -->
            <div>
                <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                    Daftar Fitur Checklist (1 Fitur per Baris) <span class="text-red-500">*</span>
                </label>
                @php
                    $featuresText = is_array($package->features) ? implode("\n", $package->features) : $package->features;
                @endphp
                <textarea name="features" rows="6" required class="w-full text-xs sm:text-sm px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:border-[#F58220] font-mono leading-relaxed">{{ old('features', $featuresText) }}</textarea>
                <span class="text-[11px] text-slate-500 mt-1 block">
                    💡 Tekan <code>Enter</code> untuk memisahkan setiap fitur. Otomatis tampil centang di website.
                </span>
            </div>

            <!-- CTA Button & Sort Order -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                        Teks Tombol CTA
                    </label>
                    <input type="text" name="cta_text" value="{{ old('cta_text', $package->cta_text) }}" class="w-full text-xs sm:text-sm px-4 py-3 rounded-xl border border-slate-300 font-bold focus:outline-none focus:border-[#F58220]">
                </div>

                <div>
                    <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                        Urutan Tampil (Sort Order)
                    </label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $package->sort_order) }}" min="0" class="w-full text-xs sm:text-sm px-4 py-3 rounded-xl border border-slate-300 font-bold focus:outline-none focus:border-[#F58220]">
                </div>
            </div>

            <!-- WhatsApp Message Preset -->
            <div>
                <label class="block text-xs font-black uppercase tracking-wider text-slate-700 mb-1.5">
                    Pesan Otomatis WhatsApp (Opsional)
                </label>
                <textarea name="cta_whatsapp_text" rows="2" class="w-full text-xs px-4 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:border-[#F58220]">{{ old('cta_whatsapp_text', $package->cta_whatsapp_text) }}</textarea>
            </div>

            <!-- Highlighting & Status Options -->
            <div class="p-5 rounded-2xl bg-orange-50/60 border border-orange-200/80 space-y-4">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular', $package->is_popular) ? 'checked' : '' }} class="w-4 h-4 text-[#F58220] rounded border-slate-300 focus:ring-[#F58220] mt-0.5">
                    <div>
                        <label for="is_popular" class="text-xs font-black text-slate-900 block cursor-pointer">
                            ★ Jadikan Paket Unggulan / Best Seller (Highlight Border Oranye &amp; Efek Menonjol)
                        </label>
                        <span class="text-[11px] text-slate-600 block mt-0.5">
                            Jika dicentang, kartu ini akan diberi bingkai oranye tebal dan pita Best Seller di bagian atas persis seperti kartu E-Commerce pada Gambar 1.
                        </span>
                    </div>
                </div>

                <div class="pl-7">
                    <label class="block text-[11px] font-bold text-slate-700 mb-1">Teks Pita Best Seller</label>
                    <input type="text" name="popular_badge_text" value="{{ old('popular_badge_text', $package->popular_badge_text) }}" class="w-full sm:w-80 text-xs px-3 py-2 rounded-lg border border-slate-300 font-black uppercase">
                </div>

                <div class="flex items-center gap-3 pt-2 border-t border-orange-200/60">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $package->is_active) ? 'checked' : '' }} class="w-4 h-4 text-[#F58220] rounded border-slate-300 focus:ring-[#F58220]">
                    <label for="is_active" class="text-xs font-bold text-slate-900 cursor-pointer">
                        Aktifkan Paket (Tampilkan Langsung di Website Publik)
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <a href="{{ route('admin.packages.index') }}" class="px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                    Batal
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl orange-gradient text-white text-xs font-black shadow-lg hover:shadow-orange-500/40 transition">
                    Perbarui Data Paket →
                </button>
            </div>

        </form>
    </div>

</div>

@endsection
