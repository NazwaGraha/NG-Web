@extends('layouts.app')

@section('title', ($article->meta_title ?? $article->title) . ' - NazwaGraha Pratama')
@section('meta_description', $article->meta_description ?? $article->excerpt)
@if($article->meta_keywords)
@section('meta_keywords', $article->meta_keywords)
@endif
@section('og_image', asset($article->featured_image ?? 'images/portfolio_web_collection.jpg'))
@section('og_type', 'article')

@push('schema')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "Article",
    "headline": "{{ addslashes($article->title) }}",
    "image": [
        "{{ asset($article->featured_image ?? 'images/portfolio_web_collection.jpg') }}"
    ],
    "datePublished": "{{ $article->published_at ? $article->published_at->toIso8601String() : $article->created_at->toIso8601String() }}",
    "dateModified": "{{ $article->updated_at->toIso8601String() }}",
    "keywords": "{{ addslashes($article->meta_keywords ?? 'jasa pembuatan website, teknologi it, bogor') }}",
    "inLanguage": "id-ID",
    "author": [{
        "@type": "Organization",
        "name": "NazwaGraha Pratama",
        "url": "{{ url('/') }}"
    }],
    "publisher": {
        "@type": "Organization",
        "name": "NazwaGraha Pratama",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('images/ngp-logo.webp') }}"
        }
    },
    "description": "{{ addslashes($article->meta_description ?? $article->excerpt) }}"
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Beranda",
        "item": "{{ route('home') }}"
    },{
        "@type": "ListItem",
        "position": 2,
        "name": "Artikel",
        "item": "{{ route('articles.index') }}"
    },{
        "@type": "ListItem",
        "position": 3,
        "name": "{{ addslashes($article->category->name) }}",
        "item": "{{ route('articles.category', $article->category->slug) }}"
    },{
        "@type": "ListItem",
        "position": 4,
        "name": "{{ addslashes($article->title) }}"
    }]
}
</script>
@endpush

@push('styles')
<style>
    /* Styling for Rich Text Article Content */
    .article-content-body h1 {
        font-size: 1.875rem !important;
        font-weight: 800 !important;
        color: #0f172a !important;
        margin-top: 2rem !important;
        margin-bottom: 1rem !important;
        line-height: 1.25 !important;
    }
    .article-content-body h2 {
        font-size: 1.5rem !important;
        font-weight: 800 !important;
        color: #0f172a !important;
        margin-top: 1.75rem !important;
        margin-bottom: 0.875rem !important;
        line-height: 1.3 !important;
        border-bottom: 2px solid #ffedd5;
        padding-bottom: 0.35rem;
    }
    .article-content-body h3 {
        font-size: 1.25rem !important;
        font-weight: 700 !important;
        color: #0f172a !important;
        margin-top: 1.5rem !important;
        margin-bottom: 0.75rem !important;
        line-height: 1.35 !important;
    }
    .article-content-body h4 {
        font-size: 1.125rem !important;
        font-weight: 700 !important;
        color: #1e293b !important;
        margin-top: 1.25rem !important;
        margin-bottom: 0.5rem !important;
    }
    .article-content-body h5 {
        font-size: 1rem !important;
        font-weight: 600 !important;
        color: #334155 !important;
        margin-top: 1rem !important;
        margin-bottom: 0.5rem !important;
    }
    .article-content-body p {
        margin-bottom: 1rem !important;
        line-height: 1.75 !important;
        color: #334155 !important;
    }
    /* Lists with guaranteed numbering and bullets */
    .article-content-body ul {
        list-style-type: disc !important;
        padding-left: 2rem !important;
        margin: 1rem 0 !important;
    }
    .article-content-body ul ul {
        list-style-type: circle !important;
        padding-left: 1.5rem !important;
        margin: 0.5rem 0 !important;
    }
    .article-content-body ul ul ul {
        list-style-type: square !important;
        padding-left: 1.5rem !important;
    }
    .article-content-body ol {
        list-style-type: decimal !important;
        padding-left: 2rem !important;
        margin: 1rem 0 !important;
    }
    .article-content-body ol ol {
        list-style-type: lower-alpha !important;
        padding-left: 1.5rem !important;
        margin: 0.5rem 0 !important;
    }
    .article-content-body ol ol ol {
        list-style-type: lower-roman !important;
        padding-left: 1.5rem !important;
    }
    .article-content-body li {
        margin-bottom: 0.35rem !important;
        line-height: 1.625 !important;
        color: #334155 !important;
    }
    /* Blockquote (Kutipan) */
    .article-content-body blockquote:not([style*="border: none"]) {
        border-left: 4px solid #f97316 !important;
        background: #fff7ed !important;
        padding: 1rem 1.25rem !important;
        border-radius: 0.5rem !important;
        font-style: italic !important;
        margin: 1.5rem 0 !important;
        color: #475569 !important;
    }
    /* Indented Paragraphs / Blocks */
    .article-content-body blockquote[style*="border: none"] {
        border-left: none !important;
        background: transparent !important;
        padding: 0 !important;
        margin: 0.5rem 0 0.5rem 2.5rem !important;
        font-style: normal !important;
        color: inherit !important;
    }
    /* Code block */
    .article-content-body pre {
        background: #0f172a !important;
        color: #f8fafc !important;
        padding: 1rem 1.25rem !important;
        border-radius: 0.75rem !important;
        overflow-x: auto !important;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;
        font-size: 0.875rem !important;
        margin: 1.5rem 0 !important;
    }
    .article-content-body code {
        background: #f1f5f9 !important;
        color: #ea580c !important;
        padding: 0.15rem 0.4rem !important;
        border-radius: 0.35rem !important;
        font-size: 0.875em !important;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;
    }
    .article-content-body pre code {
        background: transparent !important;
        color: inherit !important;
        padding: 0 !important;
    }
    /* Tables */
    .article-content-body table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 1.5rem 0 !important;
        font-size: 0.875rem !important;
        border-radius: 0.5rem !important;
        overflow: hidden !important;
    }
    .article-content-body th {
        border: 1px solid #cbd5e1 !important;
        padding: 0.75rem 1rem !important;
        background: #f1f5f9 !important;
        font-weight: 700 !important;
        text-align: left !important;
        color: #0f172a !important;
    }
    .article-content-body td {
        border: 1px solid #e2e8f0 !important;
        padding: 0.75rem 1rem !important;
        color: #334155 !important;
    }
    .article-content-body tr:nth-child(even) {
        background: #f8fafc !important;
    }
    /* Links & Images */
    .article-content-body a {
        color: #ea580c !important;
        text-decoration: underline !important;
        font-weight: 600 !important;
    }
    .article-content-body a:hover {
        color: #c2410c !important;
    }
    .article-content-body figure {
        margin: 1.5rem 0;
        transition: all 0.2s ease;
    }
    .article-content-body figure.align-left {
        float: left !important;
        margin: 0.5rem 1.5rem 1rem 0 !important;
        clear: left;
    }
    .article-content-body figure.align-right {
        float: right !important;
        margin: 0.5rem 0 1rem 1.5rem !important;
        clear: right;
    }
    .article-content-body figure.align-center {
        display: block !important;
        margin: 1.5rem auto !important;
        text-align: center !important;
        clear: both !important;
    }
    .article-content-body figure img {
        display: inline-block !important;
        max-width: 100% !important;
        height: auto !important;
        margin: 0 !important;
    }
    .article-content-body figure figcaption {
        font-size: 0.75rem;
        color: #64748b;
        margin-top: 0.5rem;
        font-style: italic;
        text-align: center;
    }
    @media (max-width: 640px) {
        .article-content-body figure.align-left,
        .article-content-body figure.align-right {
            float: none !important;
            max-width: 100% !important;
            width: 100% !important;
            margin: 1.5rem auto !important;
            text-align: center !important;
        }
    }
    .article-content-body img:not(figure img) {
        max-width: 100% !important;
        height: auto !important;
        border-radius: 1rem !important;
        margin: 1.5rem auto !important;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important;
    }
    .article-content-body hr {
        margin: 2rem 0 !important;
        border-color: #e2e8f0 !important;
    }
    .article-content-body sub {
        font-size: 0.75em !important;
        vertical-align: sub !important;
        line-height: 0 !important;
    }
    .article-content-body sup {
        font-size: 0.75em !important;
        vertical-align: super !important;
        line-height: 0 !important;
    }
    .article-content-body ul.task-list {
        list-style: none !important;
        padding-left: 0.25rem !important;
        margin: 1rem 0 !important;
    }
    .article-content-body ul.task-list li {
        display: flex !important;
        align-items: center !important;
        gap: 0.5rem !important;
        margin-bottom: 0.35rem !important;
    }
    .article-content-body ul.task-list li input[type="checkbox"] {
        cursor: pointer !important;
        width: 1rem !important;
        height: 1rem !important;
        border-radius: 0.25rem !important;
        accent-color: #ea580c !important;
    }
</style>
@endpush

@section('content')

<!-- Breadcrumb -->
<div class="bg-white border-b border-slate-200 py-3 text-xs text-slate-500">
    <div class="max-w-7xl xl:max-w-[1380px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto whitespace-nowrap">
        <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Beranda</a>
        <span>/</span>
        <a href="{{ route('articles.index') }}" class="hover:text-orange-600 transition">Artikel</a>
        <span>/</span>
        <a href="{{ route('articles.category', $article->category->slug) }}" class="hover:text-orange-600 transition">{{ $article->category->name }}</a>
        <span>/</span>
        <span class="text-slate-800 font-medium truncate max-w-xs sm:max-w-md">{{ $article->title }}</span>
    </div>
</div>

<!-- Main Article Body -->
<section class="py-12 bg-[#F8FAFC]">
    <div class="max-w-7xl xl:max-w-[1380px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Article Content (Wider: 8 Cols on tablet, 9 Cols on desktop) -->
            <div class="lg:col-span-8 min-[1180px]:col-span-9">
                <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 card-shadow">
                    
                    <!-- Meta Tag Header -->
                    <div class="mb-6 space-y-3">
                        <span class="inline-block bg-orange-100 text-orange-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            {{ $article->category->name }}
                        </span>
                        
                        <h1 class="text-2xl sm:text-4xl font-black text-slate-900 leading-tight">
                            {{ $article->title }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-400 pt-2 border-b border-slate-100 pb-4">
                            <span class="text-slate-700 font-semibold">✍️ Tim NazwaGraha Pratama</span>
                            <span>•</span>
                            <span>📅 {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : $article->created_at->translatedFormat('d F Y') }}</span>
                            <span>•</span>
                            <span>👁️ {{ $article->views }} Kali Dibaca</span>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if($article->featured_image)
                    <div class="rounded-2xl overflow-hidden mb-8 border border-slate-200 shadow-sm">
                        <img src="{{ asset($article->featured_image) }}" alt="{{ $article->featured_image_alt ?? $article->title }}" class="w-full h-auto object-cover max-h-[480px]">
                    </div>
                    @endif

                    <!-- Content (Rich Text) -->
                    <div class="article-content-body prose prose-slate max-w-none text-sm sm:text-base leading-relaxed text-slate-700">
                        {!! $article->content !!}
                    </div>

                    <!-- Author & Share Box -->
                    <div class="mt-10 pt-6 border-t border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-xs text-slate-500">
                            Bagikan artikel ini ke rekan bisnis Anda:
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg bg-emerald-500 text-white text-xs font-bold hover:bg-emerald-600 transition flex items-center gap-1.5 shadow-sm">
                                <span>WhatsApp</span>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="px-3.5 py-1.5 rounded-lg bg-blue-600 text-white text-xs font-bold hover:bg-blue-700 transition flex items-center gap-1.5 shadow-sm">
                                <span>LinkedIn</span>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Related Articles -->
                @if($relatedArticles->count() > 0)
                <div class="mt-12">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Artikel Terkait Lainnya</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        @foreach($relatedArticles as $rel)
                        <div class="bg-white rounded-2xl p-4 border border-slate-200 card-shadow flex flex-col justify-between">
                            <div>
                                <a href="{{ route('articles.show', $rel->slug) }}" class="block relative h-32 rounded-xl overflow-hidden mb-3">
                                    <img src="{{ asset($rel->featured_image ?? 'images/portfolio_web_collection.jpg') }}" alt="{{ $rel->title }}" class="w-full h-full object-cover">
                                </a>
                                <h4 class="text-xs font-bold text-slate-900 leading-snug line-clamp-2 hover:text-orange-600 transition">
                                    <a href="{{ route('articles.show', $rel->slug) }}">{{ $rel->title }}</a>
                                </h4>
                            </div>
                            <div class="pt-2 text-[11px] text-slate-400">
                                {{ $rel->published_at ? $rel->published_at->translatedFormat('d M Y') : $rel->created_at->translatedFormat('d M Y') }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- Sidebar CTA & Contact (Narrower: 4 Cols on tablet, 3 Cols on desktop) -->
            <div class="lg:col-span-4 min-[1180px]:col-span-3 space-y-6">
                
                <!-- Quick Service Order Card -->
                <div class="bg-white rounded-3xl p-5 sm:p-6 border-2 border-orange-400 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-orange-600 text-white text-[10px] font-black uppercase px-3 py-1 rounded-bl-xl tracking-wider">
                        Solusi Bisnis
                    </div>
                    
                    <span class="text-xs font-bold text-orange-600 uppercase tracking-wider">Konsultasi Gratis</span>
                    <h3 class="text-lg font-black text-slate-900 mt-1 mb-2">Ingin Website Cepat & Jaringan Kantor Rapi?</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-6">
                        Dapatkan penawaran harga terbaik dan konsultasi teknis langsung dengan tim NazwaGraha Pratama hari ini.
                    </p>

                    <ul class="space-y-2 text-xs text-slate-700 mb-6">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✔</span> <span>Lolos Skor PageSpeed 90+</span></li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✔</span> <span>Optimasi SEO & AI Search</span></li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✔</span> <span>Teknisi Jaringan Siap Datang</span></li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✔</span> <span>Garansi Maintenance 1 Tahun</span></li>
                    </ul>

                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20membaca%20artikel%20{{ urlencode($article->title) }}%20dan%20ingin%20konsultasi%20layanan" target="_blank" class="block w-full py-3.5 text-center rounded-xl orange-gradient text-white font-extrabold text-xs shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 transition">
                        Chat WhatsApp Sekarang (081298506111) →
                    </a>
                </div>

                <!-- Categories Widget -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 card-shadow">
                    <h4 class="text-sm font-bold text-slate-900 mb-4 pb-2 border-b border-slate-100">Kategori Topik</h4>
                    <div class="space-y-2">
                        @foreach($categories as $cat)
                        <a href="{{ route('articles.category', $cat->slug) }}" class="flex items-center justify-between py-1.5 text-xs text-slate-600 hover:text-orange-600 transition">
                            <span>{{ $cat->name }}</span>
                            <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-500 font-bold text-[10px]">{{ $cat->articles_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Office Card -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200 card-shadow text-xs space-y-2 text-slate-600">
                    <h4 class="text-sm font-bold text-slate-900 pb-2 border-b border-slate-100">Alamat Resmi Kantor</h4>
                    <p class="font-semibold text-slate-800">NazwaGraha Pratama (NGP)</p>
                    <p>Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat</p>
                    <p class="text-slate-500 pt-1">Telp: 081298506111</p>
                    <p class="text-slate-500">Email: nazwagraha@gmail.com</p>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection
