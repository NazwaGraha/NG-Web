@extends('layouts.app')

@section('title', 'Galeri & Portofolio Proyek - NazwaGraha Pratama')
@section('meta_description', 'Dokumentasi hasil pengerjaan pembuatan website, instalasi jaringan LAN kantor, dan pengadaan hardware komputer oleh tim ahli NazwaGraha Pratama.')

@section('content')

<!-- Header Banner -->
<section class="py-12 bg-gradient-to-b from-orange-50/60 to-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">
                Dokumentasi Hasil Karya
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-slate-900 mt-3 leading-tight">
                Galeri Portofolio & Instalasi Proyek
            </h1>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Lihat bukti nyata pengerjaan proyek kami: Mulai dari website toko online, company profile korporat, instalasi kabel server rack kantor, hingga pengadaan perangkat kerja.
            </p>
        </div>

        <!-- Filter Tabs -->
        <div class="mt-8 flex flex-wrap items-center gap-2">
            @foreach($categories as $key => $label)
            <a href="{{ route('gallery.index', ['kategori' => $key]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ (request('kategori', 'semua') == $key) ? 'orange-gradient text-white shadow-md' : 'bg-white border border-slate-200 text-slate-700 hover:border-orange-300' }}">
                {{ $label }}
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleries as $gallery)
            <div class="rounded-3xl overflow-hidden bg-white border border-slate-200 card-shadow flex flex-col justify-between group">
                <div>
                    <div class="relative h-64 overflow-hidden bg-slate-900">
                        <img src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-md text-slate-900 text-[10px] font-bold px-3 py-1 rounded-full shadow-sm uppercase tracking-wider">
                            {{ $categories[$gallery->category] ?? ucfirst($gallery->category) }}
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-slate-900 text-base leading-snug mb-2 group-hover:text-orange-600 transition">
                            {{ $gallery->title }}
                        </h3>
                        @if($gallery->description)
                        <p class="text-xs text-slate-500 leading-relaxed">
                            {{ $gallery->description }}
                        </p>
                        @endif
                    </div>
                </div>

                <div class="p-6 pt-0">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($gallery->title) }}%20dan%20ingin%20konsultasi" target="_blank" class="block w-full py-2.5 text-center rounded-xl bg-slate-100 hover:bg-orange-500 hover:text-white text-slate-700 font-bold text-xs transition">
                        Tanya Proyek Serupa via WhatsApp →
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-slate-200 p-8">
                <div class="text-4xl mb-3">🖼️</div>
                <h3 class="text-lg font-bold text-slate-800">Belum ada foto dalam kategori ini</h3>
                <a href="{{ route('gallery.index') }}" class="inline-block mt-4 px-5 py-2 rounded-xl orange-gradient text-white text-xs font-bold">
                    Lihat Semua Galeri
                </a>
            </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $galleries->links() }}
        </div>

    </div>
</section>

@endsection
