@extends('layouts.app')

@section('title', 'Halaman Telah Diperbarui - NazwaGraha Pratama')
@section('meta_description', 'Halaman yang Anda cari telah dipindahkan atau diperbarui ke layanan terbaru NazwaGraha Pratama.')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl w-full text-center space-y-6">
        
        <!-- Animated Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-orange-100 border border-orange-200 text-orange-700 text-xs font-bold shadow-xs">
            <span class="w-2 h-2 rounded-full bg-orange-500 animate-ping"></span>
            <span>Pembaruan Website 2026</span>
        </div>

        <div class="space-y-2">
            <h1 class="text-7xl sm:text-8xl font-black text-slate-900 tracking-tight">
                4<span class="text-orange-600">0</span>4
            </h1>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900">
                Halaman Telah Dipindahkan atau Diperbarui
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm max-w-md mx-auto leading-relaxed">
                Tautan yang Anda tuju mungkin berasal dari versi website lama kami yang kini telah diperbarui ke sistem layanan terpadu NazwaGraha Pratama.
            </p>
        </div>

        <!-- Quick Access to Main Services -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200 card-shadow text-left space-y-3">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                Layanan Utama yang Mungkin Anda Cari:
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs font-semibold">
                <a href="{{ route('services.website') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-orange-50 hover:text-orange-600 border border-slate-200/60 transition flex items-center gap-2">
                    <span>🌐</span>
                    <span>Jasa Pembuatan Website</span>
                </a>
                <a href="{{ route('services.seo-geo') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-orange-50 hover:text-orange-600 border border-slate-200/60 transition flex items-center gap-2">
                    <span>🚀</span>
                    <span>Optimasi SEO &amp; GEO Google</span>
                </a>
                <a href="{{ route('services.jaringan-lan') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-orange-50 hover:text-orange-600 border border-slate-200/60 transition flex items-center gap-2">
                    <span>🔌</span>
                    <span>Jaringan LAN &amp; Server</span>
                </a>
                <a href="{{ route('services.hardware') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-orange-50 hover:text-orange-600 border border-slate-200/60 transition flex items-center gap-2">
                    <span>💻</span>
                    <span>Pengadaan Hardware IT</span>
                </a>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-2">
            <a href="{{ route('home') }}" class="w-full sm:w-auto px-6 py-3.5 rounded-xl orange-gradient text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-orange-500/30 hover:scale-105 transition">
                ← Kembali ke Halaman Utama
            </a>
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20mencari%20informasi%20layanan%20Anda" target="_blank" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs sm:text-sm font-extrabold shadow-lg shadow-emerald-600/30 transition flex items-center justify-center gap-2">
                <span>💬 Hubungi CS via WhatsApp</span>
            </a>
        </div>

    </div>
</div>
@endsection
