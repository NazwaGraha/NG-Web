@extends('layouts.app')

@section('title', isset($activeCategory) ? 'Artikel ' . $activeCategory->name . ' - NazwaGraha Pratama' : 'Artikel & Wawasan Teknologi IT - NazwaGraha Pratama')
@section('meta_description', 'Kumpulan artikel, tips, dan wawasan seputar pembuatan website modern, optimasi SEO & GEO, instalasi jaringan LAN, dan pengadaan hardware IT dari tim ahli NazwaGraha Pratama.')

@section('content')

<!-- Header Banner -->
<section class="py-12 bg-gradient-to-b from-orange-50/60 to-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">
                Edukasi & Wawasan Bisnis
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-slate-900 mt-3 leading-tight">
                {{ isset($activeCategory) ? 'Kategori: ' . $activeCategory->name : 'Artikel & Tips Teknologi Terkini' }}
            </h1>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                {{ isset($activeCategory) ? ($activeCategory->description ?? 'Menampilkan seluruh artikel dalam kategori ini.') : 'Pelajari strategi digital marketing, rekayasa website berkecepatan tinggi, setup jaringan kantor, dan tips hardware dari praktisi berpengalaman.' }}
            </p>
        </div>

        <!-- Search & Filter Form -->
        <div class="mt-8 flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Category Pills -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('articles.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !request('kategori') && !isset($activeCategory) ? 'orange-gradient text-white shadow-md' : 'bg-white border border-slate-200 text-slate-700 hover:border-orange-300' }}">
                    Semua Kategori
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('articles.category', $cat->slug) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition {{ (request('kategori') == $cat->slug || (isset($activeCategory) && $activeCategory->id == $cat->id)) ? 'orange-gradient text-white shadow-md' : 'bg-white border border-slate-200 text-slate-700 hover:border-orange-300' }}">
                    {{ $cat->name }} ({{ $cat->articles_count }})
                </a>
                @endforeach
            </div>

            <!-- Search Input -->
            <form action="{{ route('articles.index') }}" method="GET" class="w-full md:w-72">
                <div class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari artikel..." class="w-full bg-white border border-slate-300 rounded-xl pl-4 pr-10 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
                    <button type="submit" class="absolute right-3 top-2.5 text-slate-400 hover:text-orange-600">
                        🔍
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Articles Grid -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <article class="rounded-3xl overflow-hidden bg-white border border-slate-200 card-shadow flex flex-col justify-between">
                <div>
                    <a href="{{ route('articles.show', $article->slug) }}" class="block relative h-52 overflow-hidden group">
                        <img src="{{ asset($article->featured_image ?? 'images/portfolio_web_collection.jpg') }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-md text-slate-900 text-[11px] font-bold px-3 py-1 rounded-full shadow-sm">
                            {{ $article->category->name }}
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="text-[11px] text-slate-400 mb-2.5 flex items-center gap-2">
                            <span>📅 {{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}</span>
                            <span>•</span>
                            <span>👁️ {{ $article->views }} views</span>
                        </div>
                        <h2 class="font-extrabold text-slate-900 text-lg leading-snug hover:text-orange-600 transition mb-3">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h2>
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                </div>
                
                <div class="px-6 pb-6 pt-3 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-[11px] font-semibold text-slate-400">By Tim NazwaGraha</span>
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-bold text-orange-600 hover:text-orange-700 flex items-center gap-1">
                        <span>Baca Lengkap</span>
                        <span>→</span>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-16 bg-white rounded-3xl border border-slate-200 p-8">
                <div class="text-4xl mb-3">📂</div>
                <h3 class="text-lg font-bold text-slate-800">Belum ada artikel yang ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1">Coba gunakan kata kunci pencarian lain atau pilih kategori yang berbeda.</p>
                <a href="{{ route('articles.index') }}" class="inline-block mt-4 px-5 py-2 rounded-xl orange-gradient text-white text-xs font-bold">
                    Lihat Semua Artikel
                </a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $articles->links() }}
        </div>

    </div>
</section>

<!-- Bottom Conversion CTA -->
<section class="py-12 bg-white border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <h3 class="text-2xl font-black text-slate-900">Punya Pertanyaan Spesifik Terkait Kebutuhan IT Kantor?</h3>
        <p class="text-xs sm:text-sm text-slate-500 max-w-xl mx-auto">
            Tim konsultan teknologi NazwaGraha Pratama siap berdiskusi dan memberikan solusi terbaik tanpa dipungut biaya.
        </p>
        <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20membaca%20artikel%20dan%20ingin%20konsultasi" target="_blank" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl orange-gradient text-white font-bold text-xs sm:text-sm shadow-md">
            <span>Konsultasi Gratis via WhatsApp (081298506111)</span>
            <span>→</span>
        </a>
    </div>
</section>

@endsection
