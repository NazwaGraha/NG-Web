<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#f47712">

  {{-- SEO & Metadata Dinamis Artikel --}}
  <title>{{ $settings['meta_title'] }}</title>
  <meta name="description" content="{{ $settings['meta_description'] }}">
  <meta name="keywords" content="{{ $settings['focus_keyword'] }}, {{ $settings['geo_target'] }}, jasa website bogor, bikin web murah ciawi, konsultan it murah">
  <meta name="author" content="{{ $article->author ?? 'Tim IT NazwaGraha' }}">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="{{ $settings['canonical_url'] }}">

  {{-- GEO Tagging --}}
  <meta name="geo.region" content="{{ $settings['geo_region'] ?? 'ID-JB' }}">
  <meta name="geo.placename" content="{{ $settings['geo_placename'] ?? 'Bogor, Jawa Barat' }}">
  <meta name="geo.position" content="{{ $settings['geo_latitude'] ?? '-6.6698' }};{{ $settings['geo_longitude'] ?? '106.8532' }}">
  <meta name="ICBM" content="{{ $settings['geo_latitude'] ?? '-6.6698' }}, {{ $settings['geo_longitude'] ?? '106.8532' }}">

  {{-- Open Graph / WhatsApp / Facebook --}}
  <meta property="og:locale" content="id_ID">
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="NazwaGraha">
  <meta property="og:title" content="{{ $settings['meta_title'] }}">
  <meta property="og:description" content="{{ $settings['meta_description'] }}">
  <meta property="og:url" content="{{ $settings['canonical_url'] }}">
  <meta property="og:image" content="{{ asset($article->image) }}">
  <meta property="article:published_time" content="{{ $article->published_at ? $article->published_at->toIso8601String() : now()->toIso8601String() }}">
  <meta property="article:section" content="{{ $article->category }}">

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $settings['meta_title'] }}">
  <meta name="twitter:description" content="{{ $settings['meta_description'] }}">
  <meta name="twitter:image" content="{{ asset($article->image) }}">

  <link rel="icon" type="image/webp" href="{{ asset('assets/images/logo-nazwagraha.webp') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

  <style>
    /* Reading Progress Bar */
    .reading-progress-bar {
      position: fixed;
      top: 0;
      left: 0;
      height: 4px;
      width: 0%;
      background: linear-gradient(90deg, #f47712, #ff9a4b);
      z-index: 99999;
      transition: width 0.1s ease-out;
    }

    /* Responsive Grid Layout */
    .article-layout-grid {
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 40px;
      align-items: start;
    }

    @media (max-width: 991px) {
      .article-layout-grid {
        grid-template-columns: 1fr !important;
        gap: 36px !important;
      }
    }

    /* Breadcrumbs on Mobile */
    .breadcrumb-nav-list {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: nowrap;
      overflow-x: auto;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
      padding-bottom: 2px;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }
    .breadcrumb-nav-list::-webkit-scrollbar {
      display: none;
    }

    /* Article Meta Badges */
    .article-meta-badges {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
      margin-bottom: 14px;
    }
    .badge-reading-time {
      font-size: 12px;
      color: #64748b;
      font-weight: 600;
      background: #f1f5f9;
      padding: 4px 10px;
      border-radius: 20px;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }
    .badge-geo-loc {
      font-size: 12px;
      background: #eef4fa;
      color: #1e40af;
      padding: 4px 10px;
      border-radius: 20px;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }

    /* Featured Image */
    .article-featured-img-wrap {
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 28px;
      box-shadow: 0 6px 20px rgba(15,23,42,0.08);
      background: #f1f5f9;
    }
    .article-featured-img-wrap img {
      width: 100%;
      height: auto;
      max-height: 420px;
      object-fit: cover;
      display: block;
    }
    @media (max-width: 640px) {
      .article-featured-img-wrap {
        border-radius: 12px;
        margin-bottom: 20px;
      }
      .article-featured-img-wrap img {
        aspect-ratio: 16 / 9;
        max-height: none;
      }
    }

    /* Table of Contents (Daftar Isi Cepat) */
    .article-toc {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 16px 20px;
      margin: 24px 0 32px;
    }
    .article-toc-header {
      font-size: 15px;
      font-weight: 800;
      color: #0f172a;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      user-select: none;
      margin: 0;
    }
    .article-toc-toggle-icon {
      font-size: 14px;
      color: var(--orange);
      transition: transform 0.2s ease;
    }
    .article-toc.collapsed .article-toc-toggle-icon {
      transform: rotate(-90deg);
    }
    .article-toc.collapsed .article-toc-list {
      display: none;
    }
    .article-toc-list {
      list-style: none;
      padding: 12px 0 0;
      margin: 0;
      display: grid;
      gap: 10px;
      font-size: 13.5px;
      border-top: 1px solid #edf2f7;
      margin-top: 12px;
    }
    .article-toc-list a {
      color: #334155;
      text-decoration: none;
      display: inline-flex;
      align-items: baseline;
      gap: 8px;
      line-height: 1.5;
      transition: color 0.15s ease;
    }
    .article-toc-list a:hover {
      color: var(--orange);
    }
    .article-toc-list a span.toc-num {
      color: var(--orange);
      font-weight: 800;
      font-size: 12px;
    }

    /* Content Typography & Elements */
    .article-body-content {
      font-size: 16px;
      line-height: 1.85;
      color: #334155;
      word-break: break-word;
    }
    .article-body-content h2 {
      font-size: clamp(20px, 3.8vw, 25px);
      font-weight: 800;
      color: #0f172a;
      margin-top: 36px;
      margin-bottom: 16px;
      line-height: 1.35;
      position: relative;
      padding-left: 14px;
      border-left: 4px solid var(--orange);
      scroll-margin-top: 100px;
    }
    .article-body-content h3 {
      font-size: clamp(17px, 3vw, 20px);
      font-weight: 700;
      color: #1e293b;
      margin-top: 28px;
      margin-bottom: 12px;
      line-height: 1.4;
      scroll-margin-top: 100px;
    }
    .article-body-content h4 {
      font-size: 16px;
      font-weight: 700;
      color: #334155;
      margin-top: 20px;
      margin-bottom: 10px;
    }
    .article-body-content p {
      margin-bottom: 20px;
      line-height: 1.85;
      color: #334155;
    }
    .article-body-content ul, .article-body-content ol {
      margin-bottom: 22px;
      padding-left: 24px;
      line-height: 1.8;
    }
    .article-body-content li {
      margin-bottom: 9px;
      padding-left: 4px;
    }
    .article-body-content img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      margin: 20px 0;
      box-shadow: 0 4px 15px rgba(0,0,0,0.06);
    }
    .article-body-content blockquote {
      border-left: 4px solid var(--orange);
      background: #fff7ed;
      padding: 16px 22px;
      margin: 26px 0;
      border-radius: 0 12px 12px 0;
      color: #7c2d12;
      font-style: italic;
      line-height: 1.7;
    }
    .article-body-content a {
      color: var(--orange);
      text-decoration: underline;
      font-weight: 600;
    }
    .article-body-content hr {
      border: 0;
      border-top: 1px solid #e2e8f0;
      margin: 32px 0;
    }

    /* Responsive Table Styles */
    .table-responsive-wrapper {
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      margin: 24px 0;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
      box-shadow: 0 2px 10px rgba(15,23,42,0.03);
    }
    .table-scroll-hint {
      display: none;
      font-size: 11.5px;
      color: #64748b;
      text-align: right;
      padding: 7px 12px;
      background: #f8fafc;
      border-bottom: 1px solid #e2e8f0;
      font-weight: 600;
    }
    @media (max-width: 768px) {
      .table-scroll-hint {
        display: block;
      }
    }
    .article-table {
      width: 100%;
      min-width: 580px;
      border-collapse: collapse;
      margin: 0;
      font-size: 13.5px;
    }
    .article-table th {
      background: #0f172a;
      color: #ffffff;
      padding: 13px 16px;
      text-align: left;
      font-weight: 700;
      font-size: 13px;
      letter-spacing: 0.3px;
    }
    .article-table td {
      padding: 13px 16px;
      border-bottom: 1px solid #edf2f7;
      color: #334155;
    }
    .article-table tr:nth-child(even) td {
      background: #f8fafc;
    }
    .article-table tr:hover td {
      background: #fff7ed;
    }

    /* Highlight Card Callouts */
    .article-highlight-box {
      background: linear-gradient(135deg, #fffaf5 0%, #fff 100%);
      border: 1px solid #fed7aa;
      border-left: 5px solid #f47712;
      border-radius: 12px;
      padding: 18px 20px;
      margin: 26px 0;
    }
    .article-highlight-title {
      font-size: 15px;
      font-weight: 800;
      color: #9a3412;
      margin: 0 0 8px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .article-highlight-box p:last-child {
      margin-bottom: 0;
    }

    /* Social Share Bar */
    .article-share-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
      flex-wrap: wrap;
      padding: 18px 0;
      border-top: 1px solid #e2e8f0;
      border-bottom: 1px solid #e2e8f0;
      margin: 36px 0 28px;
    }
    .share-label {
      font-size: 13.5px;
      font-weight: 700;
      color: #0f172a;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .share-buttons-group {
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }
    .btn-share {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 9px 16px;
      border-radius: 20px;
      font-size: 12.5px;
      font-weight: 700;
      text-decoration: none !important;
      cursor: pointer;
      border: 1px solid transparent;
      transition: transform 0.15s ease, background 0.15s ease, box-shadow 0.15s ease;
    }
    .btn-share:hover {
      transform: translateY(-2px);
    }
    .btn-share-wa {
      background: #25d366;
      color: #fff !important;
      box-shadow: 0 3px 10px rgba(37,211,102,0.25);
    }
    .btn-share-fb {
      background: #1877f2;
      color: #fff !important;
      box-shadow: 0 3px 10px rgba(24,119,242,0.25);
    }
    .btn-share-copy {
      background: #f1f5f9;
      color: #334155 !important;
      border-color: #cbd5e1;
    }
    .copy-toast {
      position: fixed;
      bottom: 85px;
      left: 50%;
      transform: translateX(-50%) translateY(20px);
      background: #0f172a;
      color: #fff;
      padding: 10px 22px;
      border-radius: 30px;
      font-size: 13px;
      font-weight: 600;
      box-shadow: 0 8px 24px rgba(0,0,0,0.25);
      z-index: 100000;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.25s ease, transform 0.25s ease;
    }
    .copy-toast.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    /* Mobile Callout Box WhatsApp CTA */
    .article-cta-box {
      background: linear-gradient(135deg, #0b1120 0%, #1e293b 100%);
      color: #fff;
      border-radius: 18px;
      padding: 32px 26px;
      margin: 38px 0;
      display: flex;
      flex-direction: column;
      gap: 16px;
      border: 1px solid rgba(244,119,18,0.4);
      box-shadow: 0 12px 35px rgba(15,23,42,0.18);
      position: relative;
      overflow: hidden;
    }
    .article-cta-box::before {
      content: '';
      position: absolute;
      top: -30px;
      right: -30px;
      width: 140px;
      height: 140px;
      background: radial-gradient(circle, rgba(244,119,18,0.22) 0%, transparent 70%);
      pointer-events: none;
    }

    /* Author Bio Card */
    .article-author-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 20px;
      display: flex;
      align-items: center;
      gap: 16px;
      margin-top: 35px;
    }

    /* Sidebar Cards */
    .sidebar-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 22px;
      box-shadow: 0 4px 18px rgba(15,23,42,0.05);
    }
    .sidebar-services-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 8px;
      font-size: 13.5px;
    }
    .sidebar-services-list a {
      color: #334155;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 8px 10px;
      border-radius: 8px;
      text-decoration: none;
      transition: background 0.15s ease, color 0.15s ease;
    }
    .sidebar-services-list a:hover {
      background: #fff7ed;
      color: var(--orange);
    }
    .sidebar-related-item {
      display: flex;
      gap: 12px;
      align-items: center;
      text-decoration: none;
      padding: 8px;
      border-radius: 10px;
      transition: background 0.15s ease;
    }
    .sidebar-related-item:hover {
      background: #f8fafc;
    }
    .sidebar-related-item img {
      width: 72px;
      height: 52px;
      object-fit: cover;
      border-radius: 8px;
      flex-shrink: 0;
    }

    /* In-Article Pricing Grid */
    .article-pricing-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      margin: 28px 0;
    }

    /* Mobile Screen Fine-Tuning */
    @media (max-width: 640px) {
      .article-pricing-grid {
        grid-template-columns: 1fr !important;
        gap: 16px;
      }
      .article-share-bar {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
        padding: 16px 0;
      }
      .share-label {
        justify-content: center;
        text-align: center;
      }
      .share-buttons-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
        width: 100%;
      }
      .btn-share-copy {
        grid-column: span 2;
      }
      .btn-share {
        justify-content: center;
        padding: 10px 14px;
        font-size: 13px;
      }
      .article-cta-box {
        padding: 24px 18px;
        border-radius: 14px;
      }
      .article-cta-box h3 {
        font-size: 18px !important;
      }
      .article-cta-box p {
        font-size: 13px !important;
      }
      .article-cta-box .btn-primary {
        width: 100% !important;
        min-height: 48px;
      }
      .article-author-card {
        flex-direction: column;
        text-align: center;
        padding: 22px 18px;
      }
    }
  </style>

  {{-- Structured Data (JSON-LD) --}}
  <script type="application/ld+json">
  {!! json_encode($schemaArticle, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaLocalBusiness, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>

  {{-- Google Tag & GA4 Conversion Tracker --}}
  @include('partials.analytics')
</head>
<body>
  {{-- Reading Progress Bar for Mobile & Desktop --}}
  <div id="readingProgressBar" class="reading-progress-bar" aria-hidden="true"></div>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFR9ZXF" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <a class="skip-link" href="#main">Lewati ke konten utama</a>

  {{-- Topbar Kontak & GEO Lokasi --}}
  <div class="topbar">
    <div class="container topbar-inner">
      <span>📍 Kantor: Ciawi, Bogor | Solusi Digital & Infrastruktur IT Hemat untuk Bisnis</span>
      <div>
        <a href="mailto:{{ $settings['email'] ?? 'nazwagraha@gmail.com' }}">{{ $settings['email'] ?? 'nazwagraha@gmail.com' }}</a>
        <span class="top-sep">•</span>
        <a href="tel:+62{{ ltrim($settings['phone'] ?? '081298506111', '0') }}">{{ $settings['phone_display'] ?? '0812 98 506 111' }}</a>
      </div>
    </div>
  </div>

  {{-- Main Navigation Header --}}
  <header class="site-header">
    <div class="container nav-wrap">
      <a class="brand" href="{{ route('home') }}" aria-label="NazwaGraha Beranda">
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="Logo NazwaGraha" width="105" height="40" loading="eager">
      </a>
      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primaryNav" aria-label="Buka menu navigasi">
        <span></span><span></span><span></span>
      </button>
      <nav class="primary-nav" id="primaryNav">
        <div class="nav-links-center">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
          <a class="nav-link" href="{{ route('home') }}#about">About Us</a>
          <div class="nav-dropdown">
            <button class="nav-link dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
              Layanan Kami <span class="chevron">▾</span>
            </button>
            <div class="dropdown-menu">
              <a href="{{ route('services.website') }}">Jasa Pembuatan Website Murah</a>
              <a href="{{ route('services.seo') }}">Jasa SEO Murah Bergaransi</a>
              <a href="{{ route('services.network') }}">Instalasi Jaringan LAN & Wi-Fi</a>
              <a href="{{ route('services.hardware') }}">Pengadaan Komputer Kantor</a>
              <a href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
            </div>
          </div>
          <a class="nav-link active" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya membaca artikel ' . $article->title . ' dan ingin konsultasi.') }}" target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya membaca artikel ' . $article->title . ' dan ingin konsultasi.') }}" target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Konsultasi Gratis
        </a>
      </div>
    </div>
  </header>

  <main id="main">
    {{-- Breadcrumb Navigation --}}
    <div class="breadcrumb-bar" style="background:#f8fafc; border-bottom:1px solid #e2e8f0; padding:12px 0; font-size:13px;">
      <div class="container breadcrumb-nav-list" style="color:#64748b;">
        <a href="{{ route('home') }}" style="color:var(--orange); font-weight:700;">Beranda</a>
        <span>›</span>
        <a href="{{ route('articles.index') }}" style="color:#475569;">Edukasi & Berita IT</a>
        <span>›</span>
        <span style="color:#0f172a; font-weight:600;">{{ Str::limit($article->title, 45) }}</span>
      </div>
    </div>

    {{-- Article Content Layout --}}
    <article class="section" style="padding:36px 0 70px;">
      <div class="container article-layout-grid">
        
        {{-- Main Article Column --}}
        <div class="article-main" style="background:#fff; border-radius:18px;">
          <div class="article-header" style="margin-bottom:22px;">
            <div class="article-meta-badges">
              <span class="news-category" style="margin:0;">{{ $article->category }}</span>
              <span class="badge-reading-time">⏱ {{ $article->reading_time ?? '5 Menit Baca' }}</span>
              <span class="badge-geo-loc">📍 {{ $article->geo_target ?? 'Bogor, Ciawi' }}</span>
            </div>
            <h1 style="font-size:clamp(22px,3.8vw,38px); line-height:1.25; color:#0f172a; margin:0 0 16px; font-weight:800;">
              {{ $article->title }}
            </h1>
            <div style="display:flex; align-items:center; gap:12px; font-size:13px; color:#64748b; padding-bottom:18px; border-bottom:1px solid #e2e8f0; flex-wrap:wrap;">
              <span>✍ Ditulis oleh: <strong style="color:#0f172a;">{{ $article->author ?? 'Tim IT NazwaGraha' }}</strong></span>
              <span>•</span>
              <time datetime="{{ $article->published_at ? $article->published_at->toDateString() : now()->toDateString() }}">
                📅 {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : now()->translatedFormat('d F Y') }}
              </time>
            </div>
          </div>

          {{-- Featured Image --}}
          <div class="article-featured-img-wrap">
            <img src="{{ asset($article->image) }}" alt="{{ $article->image_alt ?: $article->title }}" loading="eager">
          </div>

          {{-- Table of Contents (Daftar Isi Cepat) --}}
          <div class="article-toc" id="articleToc">
            <div class="article-toc-header" onclick="document.getElementById('articleToc').classList.toggle('collapsed')">
              <span>📑 Daftar Isi Panduan Ini</span>
              <span class="article-toc-toggle-icon">▼</span>
            </div>
            <ul class="article-toc-list">
              <li><a href="#faktor-penentu-biaya"><span class="toc-num">01.</span> Mengapa Biaya Pembuatan Website Bisa Berbeda-beda?</a></li>
              <li><a href="#rincian-paket-harga"><span class="toc-num">02.</span> Daftar Estimasi Biaya Pembuatan Website Bogor 2026</a></li>
              <li><a href="#tabel-perbandingan"><span class="toc-num">03.</span> Tabel Rincian Biaya & Komparasi Fitur Lengkap</a></li>
              <li><a href="#waspada-biaya-tersembunyi"><span class="toc-num">04.</span> Waspadai 5 Tanda Jasa Pembuatan Web Abal-Abal</a></li>
              <li><a href="#keunggulan-nazwagraha"><span class="toc-num">05.</span> Mengapa Bisnis di Bogor Mempercayakan NazwaGraha?</a></li>
              <li><a href="#cara-konsultasi"><span class="toc-num">06.</span> Cara Memulai Pembuatan Website di NazwaGraha</a></li>
            </ul>
          </div>

          {{-- Rich HTML Content --}}
          <div class="article-body-content">
            {!! $article->content !!}
          </div>

          {{-- Social Share Bar --}}
          <div class="article-share-bar">
            <div class="share-label">
              <span>📢 Bagikan Panduan Ini:</span>
            </div>
            <div class="share-buttons-group">
              <a class="btn-share btn-share-wa" href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" rel="noopener" aria-label="Bagikan ke WhatsApp">
                <span>💬 WhatsApp</span>
              </a>
              <a class="btn-share btn-share-fb" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Bagikan ke Facebook">
                <span>📘 Facebook</span>
              </a>
              <button class="btn-share btn-share-copy" type="button" onclick="copyArticleLink()" aria-label="Salin tautan artikel">
                <span>🔗 Salin Link</span>
              </button>
            </div>
          </div>

          {{-- Callout Box WhatsApp CTA --}}
          <div class="article-cta-box">
            <div style="display:flex; align-items:center; gap:10px;">
              <span style="font-size:24px;">💡</span>
              <h3 style="color:#ff9a4b; font-size:19px; margin:0; line-height:1.3;">Konsultasi Kebutuhan IT & Website Bisnis Anda Sekarang!</h3>
            </div>
            <p style="margin:0; font-size:14px; color:#cbd5e1; line-height:1.65;">
              Tim ahli <strong>NazwaGraha Ciawi Bogor</strong> siap membantu merancang solusi website profesional, optimasi SEO Google ranking 1, instalasi kabel LAN kantor, hingga pengadaan perangkat IT bergaransi resmi.
            </p>
            <div>
              <a class="btn btn-primary" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya membaca artikel: ' . $article->title . ' dan ingin konsultasi gratis.') }}" target="_blank" rel="noopener" style="min-height:48px;">
                <span class="wa-icon">◉</span> Hubungi Kami via WhatsApp (Respon Cepat)
              </a>
            </div>
          </div>

          {{-- Author Bio Card --}}
          <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:14px; padding:20px; display:flex; align-items:center; gap:16px; margin-top:35px;">
            <div style="width:55px; height:55px; border-radius:50%; background:linear-gradient(135deg,#f47712,#ff9a4b); color:#fff; display:grid; place-items:center; font-weight:800; font-size:18px; flex-shrink:0;">
              NG
            </div>
            <div>
              <b style="font-size:15px; color:#0f172a; display:block;">{{ $article->author ?? 'Tim IT NazwaGraha' }}</b>
              <span style="font-size:12px; color:var(--orange); font-weight:700;">Partner Teknologi & Digital Solution • Bogor & Ciawi</span>
              <p style="margin:4px 0 0; font-size:12.5px; color:#64748b; line-height:1.5;">
                Berdedikasi menghadirkan solusi website murah, optimasi SEO lokal, dan infrastruktur IT handal bagi UMKM dan perusahaan di Indonesia.
              </p>
            </div>
          </div>
        </div>

        {{-- Sidebar --}}
        <aside class="article-sidebar" style="display:flex; flex-direction:column; gap:28px;">
          {{-- Fast Consultation Card --}}
          <div style="background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:24px; box-shadow:0 4px 18px rgba(15,23,42,0.05); text-align:center;">
            <div style="width:52px; height:52px; border-radius:50%; background:#e5f7ed; color:#189c54; display:grid; place-items:center; margin:0 auto 14px; font-size:24px;">
              💬
            </div>
            <h3 style="font-size:17px; color:#0f172a; margin:0 0 8px;">Butuh Bantuan IT Segera?</h3>
            <p style="font-size:13px; color:#64748b; line-height:1.5; margin:0 0 18px;">
              Diskusikan kendala website, jaringan kantor, atau kebutuhan pengadaan komputer langsung dengan konsultan kami.
            </p>
            <a class="btn btn-primary" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya butuh konsultasi IT segera.') }}" target="_blank" rel="noopener" style="width:100%; min-height:44px; font-size:13px;">
              <span class="wa-icon">◉</span> Chat WhatsApp Sekarang
            </a>
          </div>

          {{-- Quick Services Menu --}}
          <div style="background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:22px; box-shadow:0 4px 18px rgba(15,23,42,0.05);">
            <h3 style="font-size:15px; color:#0f172a; margin:0 0 14px; padding-bottom:10px; border-bottom:2px solid #f1f5f9;">
              Layanan Utama NazwaGraha
            </h3>
            <ul style="list-style:none; padding:0; margin:0; display:grid; gap:10px; font-size:13px;">
              <li><a href="{{ route('services.website') }}" style="color:#334155; font-weight:600; display:flex; align-items:center; justify-content:space-between; padding:6px 0;"><span>🌐 Jasa Pembuatan Website</span> <span style="color:var(--orange);">→</span></a></li>
              <li><a href="{{ route('services.seo') }}" style="color:#334155; font-weight:600; display:flex; align-items:center; justify-content:space-between; padding:6px 0;"><span>📈 Jasa SEO Murah Bergaransi</span> <span style="color:var(--orange);">→</span></a></li>
              <li><a href="{{ route('services.network') }}" style="color:#334155; font-weight:600; display:flex; align-items:center; justify-content:space-between; padding:6px 0;"><span>🔌 Instalasi Jaringan LAN</span> <span style="color:var(--orange);">→</span></a></li>
              <li><a href="{{ route('services.hardware') }}" style="color:#334155; font-weight:600; display:flex; align-items:center; justify-content:space-between; padding:6px 0;"><span>💻 Pengadaan Komputer Kantor</span> <span style="color:var(--orange);">→</span></a></li>
              <li><a href="{{ route('services.maintenance') }}" style="color:#334155; font-weight:600; display:flex; align-items:center; justify-content:space-between; padding:6px 0;"><span>🛠 Konsultan IT & Maintenance</span> <span style="color:var(--orange);">→</span></a></li>
            </ul>
          </div>

          {{-- Related Articles --}}
          @if($relatedArticles->isNotEmpty())
            <div style="background:#fff; border:1px solid #e2e8f0; border-radius:16px; padding:22px; box-shadow:0 4px 18px rgba(15,23,42,0.05);">
              <h3 style="font-size:15px; color:#0f172a; margin:0 0 14px; padding-bottom:10px; border-bottom:2px solid #f1f5f9;">
                Artikel Edukasi Lainnya
              </h3>
              <div style="display:grid; gap:14px;">
                @foreach($relatedArticles as $rel)
                  <a href="{{ route('articles.show', $rel->slug) }}" style="display:flex; gap:12px; align-items:center; text-decoration:none;">
                    <img src="{{ asset($rel->image) }}" alt="{{ $rel->title }}" style="width:70px; height:50px; object-fit:cover; border-radius:8px; flex-shrink:0;">
                    <div>
                      <h4 style="font-size:12.5px; color:#0f172a; margin:0 0 4px; line-height:1.35; font-weight:700;">{{ Str::limit($rel->title, 55) }}</h4>
                      <span style="font-size:11px; color:#64748b;">{{ $rel->published_at ? $rel->published_at->translatedFormat('d M Y') : '' }}</span>
                    </div>
                  </a>
                @endforeach
              </div>
            </div>
          @endif
        </aside>
      </div>
    </article>
  </main>

  {{-- Footer --}}
  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand">
        <a href="{{ route('home') }}">
          <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="NazwaGraha" width="110" height="42" loading="lazy" decoding="async">
        </a>
        <p><strong>NazwaGraha</strong> — Jasa Pembuatan Website Murah & Konsultan IT Murah. Mendukung pertumbuhan digital dan kehandalan infrastruktur teknologi bisnis Anda di era modern.</p>
        <div class="footer-geo-box">
          <strong>📍 Lokasi Kantor Resmi:</strong>
          {{ $settings['address'] ?? 'Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat' }}
          <a href="https://maps.google.com/?q={{ $settings['geo_latitude'] ?? '-6.6698' }},{{ $settings['geo_longitude'] ?? '106.8532' }}" target="_blank" rel="noopener" class="geo-map-link"><span>🗺️</span> Buka Petunjuk Arah di Google Maps →</a>
        </div>
      </div>
      <div>
        <h3>Menu Utama</h3>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('home') }}#about">About Us</a>
        <a href="{{ route('home') }}#services">Layanan Kami</a>
        <a href="{{ route('home') }}#portfolio">Portofolio</a>
        <a href="{{ route('home') }}#testimoni">Testimoni Klien</a>
        <a href="{{ route('articles.index') }}">News & Events</a>
        <a href="{{ route('contact.index') }}">Contact Us</a>
      </div>
      <div>
        <h3>Layanan Kami</h3>
        <a href="{{ route('services.website') }}">Jasa Pembuatan Website Murah</a>
        <a href="{{ route('services.seo') }}">Jasa SEO Murah Bergaransi</a>
        <a href="{{ route('services.network') }}">Instalasi Jaringan LAN & Wi-Fi</a>
        <a href="{{ route('services.hardware') }}">Pengadaan Komputer Kantor</a>
        <a href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
      </div>
      <div class="footer-contact">
        <h3>Hubungi Kami</h3>
        <a href="tel:+62{{ ltrim($settings['phone'] ?? '081298506111', '0') }}">☎ {{ $settings['phone_display'] ?? '0812 98 506 111' }}</a>
        <a href="mailto:{{ $settings['email'] ?? 'nazwagraha@gmail.com' }}">✉ {{ $settings['email'] ?? 'nazwagraha@gmail.com' }}</a>
        <a href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}" target="_blank" rel="noopener">◉ WhatsApp: 0812 98 506 111</a>
        <p style="margin-top: 8px;"><strong>Cakupan Layanan:</strong><br>Ciawi, Bogor, Sukabumi, Depok, Jakarta, Tangerang, Bekasi, Jawa Barat & Seluruh Indonesia.</p>
      </div>
    </div>
    <div class="container footer-bottom">
      <p>© {{ date('Y') }} NazwaGraha. All rights reserved. Solusi Digital & IT Terpercaya.</p>
      <a href="#main" style="color:var(--orange); font-weight:700;">Kembali ke atas ↑</a>
    </div>
  </footer>

  {{-- Floating WhatsApp & Back to top Button --}}
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya membaca artikel ' . $article->title . ' dan ingin konsultasi.') }}" target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  {{-- Toast Notification for Copied Link --}}
  <div id="copyToast" class="copy-toast" role="status" aria-live="polite">✓ Link artikel berhasil disalin!</div>

  {{-- Main JS for Mobile Drawer & Scroll Controls --}}
  <script src="{{ asset('assets/js/main.js') }}" defer></script>

  <script>
    // Reading Progress Bar
    window.addEventListener('scroll', function() {
      var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
      var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      var scrolled = (winScroll / height) * 100;
      var bar = document.getElementById('readingProgressBar');
      if (bar) {
        bar.style.width = Math.min(Math.max(scrolled, 0), 100) + '%';
      }
    });

    // Copy Article Link to Clipboard
    function copyArticleLink() {
      var url = window.location.href;
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(url).then(showToast);
      } else {
        var textArea = document.createElement('textarea');
        textArea.value = url;
        textArea.style.position = 'fixed';
        textArea.style.left = '-9999px';
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
          document.execCommand('copy');
          showToast();
        } catch (err) {}
        document.body.removeChild(textArea);
      }
    }

    function showToast() {
      var toast = document.getElementById('copyToast');
      if (!toast) return;
      toast.classList.add('show');
      setTimeout(function() {
        toast.classList.remove('show');
      }, 2500);
    }
  </script>
</body>
</html>
