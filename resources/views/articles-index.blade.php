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

  {{-- SEO & Metadata Dinamis Halaman News & Events --}}
  <title>{{ $settings['meta_title'] }}</title>
  <meta name="description" content="{{ $settings['meta_description'] }}">
  <meta name="keywords" content="berita teknologi bogor, edukasi website murah, tips seo ranking 1, panduan jaringan lan kantor, maintenance it bogor">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="{{ $settings['canonical_url'] }}">

  {{-- GEO Tagging --}}
  <meta name="geo.region" content="{{ $settings['geo_region'] ?? 'ID-JB' }}">
  <meta name="geo.placename" content="{{ $settings['geo_placename'] ?? 'Bogor, Jawa Barat' }}">
  <meta name="geo.position" content="{{ $settings['geo_latitude'] ?? '-6.6698' }};{{ $settings['geo_longitude'] ?? '106.8532' }}">
  <meta name="ICBM" content="{{ $settings['geo_latitude'] ?? '-6.6698' }}, {{ $settings['geo_longitude'] ?? '106.8532' }}">

  {{-- Open Graph / WhatsApp / Facebook --}}
  <meta property="og:locale" content="id_ID">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NazwaGraha">
  <meta property="og:title" content="{{ $settings['meta_title'] }}">
  <meta property="og:description" content="{{ $settings['meta_description'] }}">
  <meta property="og:url" content="{{ $settings['canonical_url'] }}">
  <meta property="og:image" content="{{ asset('assets/images/hero-technology.webp') }}">

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $settings['meta_title'] }}">
  <meta name="twitter:description" content="{{ $settings['meta_description'] }}">
  <meta name="twitter:image" content="{{ asset('assets/images/hero-technology.webp') }}">

  <link rel="icon" type="image/webp" href="{{ asset('assets/images/logo-nazwagraha.webp') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

  {{-- Structured Data (JSON-LD) --}}
  <script type="application/ld+json">
  {!! json_encode($schemaCollection, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>

  {{-- Google Tag & GA4 Conversion Tracker --}}
  @include('partials.analytics')
</head>
<body>
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
          <a class="nav-link" href="{{ route('home') }}#portfolio">Portofolio</a>
          <a class="nav-link" href="{{ route('home') }}#testimoni">Testimoni</a>
          <a class="nav-link active" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya ingin konsultasi seputar layanan IT & website.') }}" target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya ingin konsultasi seputar layanan IT & website.') }}" target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Konsultasi Gratis
        </a>
      </div>
    </div>
  </header>

  <main id="main">
    {{-- Hero Banner Section --}}
    <section class="hero" style="min-height: auto; padding: 50px 0 45px; text-align: center;">
      <div class="hero-pattern"></div>
      <div class="container" style="position: relative; z-index: 2; max-width: 820px; margin: 0 auto;">
        <span class="eyebrow eyebrow-light" style="justify-content: center; margin-bottom: 12px;">
          <i></i> EDUKASI, BERITA & INSIGHT IT <i></i>
        </span>
        <h1 style="font-size: clamp(32px, 3.8vw, 48px); line-height: 1.15; margin: 10px 0 16px; font-weight: 800; color: #fff;">
          Wawasan, Berita & <span>Edukasi Teknologi</span>
        </h1>
        <p style="color: #cbd5e1; font-size: 16px; line-height: 1.6; margin: 0 auto 28px; max-width: 640px;">
          Panduan strategi pembuatan website murah, optimasi SEO ranking 1 Google, instalasi jaringan kabel LAN, pengadaan komputer, dan manajemen IT untuk bisnis Anda.
        </p>

        {{-- Search Input Bar --}}
        <form action="{{ route('articles.index') }}" method="GET" style="max-width: 540px; margin: 0 auto 24px; display: flex; gap: 8px;">
          @if(!empty($category) && strtolower($category) !== 'semua')
            <input type="hidden" name="category" value="{{ $category }}">
          @endif
          <div style="position: relative; flex: 1;">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari topik artikel (contoh: biaya website, mikrotik, seo)..." class="form-control" style="width: 100%; border-radius: 50px; padding: 12px 20px 12px 42px; background: rgba(255,255,255,0.95); border: none; font-size: 14px; color: #0f172a;">
            <span style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #64748b;">🔍</span>
          </div>
          <button type="submit" class="btn btn-primary" style="min-height: 44px; padding: 0 20px; font-size: 13px; border-radius: 50px;">
            Cari
          </button>
        </form>

        {{-- Category Filter Pills --}}
        <div style="display: flex; align-items: center; justify-content: center; gap: 8px; flex-wrap: wrap;">
          @foreach($categories as $cat)
            @php
              $isActive = (empty($category) && $cat === 'Semua') || (strtolower($category) === strtolower($cat));
            @endphp
            <a href="{{ route('articles.index', array_merge(request()->except(['category', 'page']), ['category' => $cat === 'Semua' ? null : $cat])) }}"
               style="display: inline-block; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 700; text-decoration: none; transition: all 0.2s; {{ $isActive ? 'background: var(--orange); color: #fff; box-shadow: 0 4px 12px rgba(244,119,18,0.35);' : 'background: rgba(255,255,255,0.1); color: #e2e8f0; border: 1px solid rgba(255,255,255,0.2);' }}">
              {{ $cat }}
            </a>
          @endforeach
        </div>
      </div>
    </section>

    {{-- Breadcrumb Bar --}}
    <div style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 12px 0; font-size: 13px;">
      <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
        <div style="display: flex; align-items: center; gap: 8px; color: #64748b;">
          <a href="{{ route('home') }}" style="color: var(--orange); font-weight: 700;">Beranda</a>
          <span>›</span>
          <span style="color: #0f172a; font-weight: 600;">News & Events</span>
          @if(!empty($category) && strtolower($category) !== 'semua')
            <span>›</span>
            <span style="color: var(--orange); font-weight: 700;">{{ $category }}</span>
          @endif
        </div>
        <div style="font-size: 12px; color: #64748b; font-weight: 600;">
          Menampilkan <strong>{{ $articles->firstItem() ?? 0 }} - {{ $articles->lastItem() ?? 0 }}</strong> dari <strong>{{ $articles->total() }}</strong> Artikel
        </div>
      </div>
    </div>

    {{-- Article 3x3 Grid Section (9 Record per Page) --}}
    <section class="section" style="padding: 50px 0 70px; background: #fff;">
      <div class="container">
        @if($articles->isEmpty())
          <div style="text-align: center; padding: 60px 20px; background: #f8fafc; border-radius: 18px; border: 1px dashed #cbd5e1;">
            <div style="font-size: 40px; margin-bottom: 12px;">🔍</div>
            <h3 style="font-size: 20px; color: #0f172a; margin: 0 0 8px;">Tidak Ada Artikel Ditemukan</h3>
            <p style="color: #64748b; font-size: 14px; margin: 0 0 20px;">
              Maaf, tidak ada artikel yang sesuai dengan pencarian atau filter yang Anda pilih.
            </p>
            <a href="{{ route('articles.index') }}" class="btn btn-primary" style="min-height: 42px; font-size: 13px;">
              Lihat Semua Artikel
            </a>
          </div>
        @else
          {{-- Exactly 9 Cards per page on 3x3 Grid --}}
          <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 26px;">
            @foreach($articles as $art)
              <article class="portfolio-card" style="margin: 0; display: flex; flex-direction: column; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 18px rgba(15,23,42,0.05);">
                <a href="{{ route('articles.show', $art->slug) }}" style="display: block; position: relative; overflow: hidden; background: #0f172a;">
                  <img src="{{ asset($art->image) }}" alt="{{ $art->image_alt ?? $art->title }}" style="width: 100%; height: 200px; object-fit: cover; transition: transform 0.35s ease;" loading="lazy" decoding="async">
                  <span style="position: absolute; top: 12px; left: 12px; background: rgba(16,24,40,0.85); backdrop-filter: blur(4px); color: var(--orange); font-size: 11px; font-weight: 800; padding: 4px 10px; border-radius: 20px; letter-spacing: 0.5px;">
                    {{ $art->category }}
                  </span>
                </a>
                <div style="padding: 20px; display: flex; flex-direction: column; flex: 1;">
                  <div style="display: flex; align-items: center; justify-content: space-between; font-size: 11.5px; color: #64748b; margin-bottom: 8px;">
                    <span>📅 {{ $art->published_at ? $art->published_at->translatedFormat('d M Y') : '' }}</span>
                    <span>⏱ {{ $art->reading_time ?? '5 Menit' }}</span>
                  </div>
                  <h2 style="font-size: 17px; line-height: 1.35; margin: 0 0 10px; font-weight: 800;">
                    <a href="{{ route('articles.show', $art->slug) }}" style="color: #0f172a; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--orange)'" onmouseout="this.style.color='#0f172a'">
                      {{ $art->title }}
                    </a>
                  </h2>
                  <p style="font-size: 13px; color: #64748b; line-height: 1.6; margin: 0 0 16px; flex: 1;">
                    {{ Str::limit($art->excerpt, 115) }}
                  </p>
                  <div style="border-top: 1px solid #f1f5f9; padding-top: 12px; display: flex; align-items: center; justify-content: space-between;">
                    <span style="font-size: 11.5px; color: #475569; font-weight: 600;">📍 {{ $art->geo_target ?? 'Bogor & Ciawi' }}</span>
                    <a href="{{ route('articles.show', $art->slug) }}" style="font-size: 12px; font-weight: 800; color: var(--orange); text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                      Baca Selengkapnya <span>→</span>
                    </a>
                  </div>
                </div>
              </article>
            @endforeach
          </div>

          {{-- Custom Styled Pagination Controls --}}
          <div style="margin-top: 48px; text-align: center;">
            <div style="display: inline-flex; align-items: center; gap: 6px; background: #f8fafc; padding: 8px 14px; border-radius: 50px; border: 1px solid #e2e8f0; box-shadow: 0 2px 10px rgba(15,23,42,0.04);">
              {{-- Previous Page Link --}}
              @if ($articles->onFirstPage())
                <span style="color: #94a3b8; padding: 6px 14px; font-size: 13px; font-weight: 700; cursor: not-allowed;">‹ Sebelumnya</span>
              @else
                <a href="{{ $articles->previousPageUrl() }}" style="color: #0f172a; padding: 6px 14px; font-size: 13px; font-weight: 700; text-decoration: none; border-radius: 30px; transition: background 0.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='transparent'">‹ Sebelumnya</a>
              @endif

              {{-- Pagination Elements --}}
              @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                @if ($page == $articles->currentPage())
                  <span style="width: 36px; height: 36px; border-radius: 50%; background: var(--orange); color: #fff; display: grid; place-items: center; font-weight: 800; font-size: 13px; box-shadow: 0 4px 10px rgba(244,119,18,0.3);">
                    {{ $page }}
                  </span>
                @else
                  <a href="{{ $url }}" style="width: 36px; height: 36px; border-radius: 50%; color: #334155; display: grid; place-items: center; font-weight: 700; font-size: 13px; text-decoration: none; transition: background 0.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='transparent'">
                    {{ $page }}
                  </a>
                @endif
              @endforeach

              {{-- Next Page Link --}}
              @if ($articles->hasMorePages())
                <a href="{{ $articles->nextPageUrl() }}" style="color: #0f172a; padding: 6px 14px; font-size: 13px; font-weight: 700; text-decoration: none; border-radius: 30px; transition: background 0.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='transparent'">Selanjutnya ›</a>
              @else
                <span style="color: #94a3b8; padding: 6px 14px; font-size: 13px; font-weight: 700; cursor: not-allowed;">Selanjutnya ›</span>
              @endif
            </div>

            <p style="margin-top: 14px; font-size: 12px; color: #64748b;">
              Menampilkan <strong>{{ $articles->firstItem() ?? 0 }} - {{ $articles->lastItem() ?? 0 }}</strong> dari total <strong>{{ $articles->total() }}</strong> Artikel Edukasi
            </p>
          </div>
        @endif
      </div>
    </section>

    {{-- Pre-Footer Consultation CTA Bar --}}
    <section style="background: linear-gradient(135deg, #10151d 0%, #1e2c3f 100%); color: #fff; padding: 45px 0; border-top: 2px solid var(--orange);">
      <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 24px;">
        <div>
          <span style="color: #ff9a4b; font-size: 12px; font-weight: 800; letter-spacing: 1px; display: block; margin-bottom: 6px;">KONSULTASI TEKNOLOGI GRATIS</span>
          <h2 style="font-size: clamp(22px, 2.5vw, 30px); margin: 0 0 6px; font-weight: 800; color: #fff;">
            Punya Pertanyaan Seputar Kebutuhan IT & Website Anda?
          </h2>
          <p style="color: #cbd5e1; font-size: 14px; margin: 0; max-width: 580px;">
            Diskusikan rencana pembuatan website, optimasi SEO lokal Google, atau perbaikan jaringan kantor bersama konsultan NazwaGraha Ciawi Bogor.
          </p>
        </div>
        <div style="flex-shrink: 0;">
          <a class="btn btn-primary" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya membaca artikel di News & Events dan ingin konsultasi gratis.') }}" target="_blank" rel="noopener" style="min-height: 48px; font-size: 14px;">
            <span class="wa-icon">◉</span> Konsultasi WhatsApp Sekarang
          </a>
        </div>
      </div>
    </section>
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
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya sedang melihat halaman News & Events dan ingin konsultasi.') }}" target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  <script src="{{ asset('assets/js/main.js') }}" defer></script>
</body>
</html>
