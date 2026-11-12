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

  {{-- SEO & Metadata Khusus Jasa SEO Murah --}}
  <title>{{ $settings['meta_title'] ?? 'Jasa SEO Murah Bergaransi Ranking 1 Google | NazwaGraha' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? 'Jasa SEO murah & bergaransi di Bogor & seluruh Indonesia. Optimasi kata kunci tertarget, Google Bisnis Profil, teknik White-Hat aman, dan laporan transparan. Mulai Rp 750rb.' }}">
  <meta name="keywords" content="jasa seo murah, jasa seo bogor, pakar seo ciawi, seo ranking 1 google, optimasi google bisnis profil, jasa seo bergaransi, harga jasa seo 2026, jasa seo white hat, konsultan seo bogor">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="{{ $settings['canonical_url'] ?? url()->current() }}">

  {{-- GEO Tagging (Bogor, Ciawi, Jawa Barat, Indonesia) --}}
  <meta name="geo.region" content="{{ $settings['geo_region'] ?? 'ID-JB' }}">
  <meta name="geo.placename" content="{{ $settings['geo_placename'] ?? 'Bogor, Jawa Barat' }}">
  <meta name="geo.position" content="{{ $settings['geo_latitude'] ?? '-6.6698' }};{{ $settings['geo_longitude'] ?? '106.8532' }}">
  <meta name="ICBM" content="{{ $settings['geo_latitude'] ?? '-6.6698' }}, {{ $settings['geo_longitude'] ?? '106.8532' }}">

  {{-- Open Graph / WhatsApp / Facebook --}}
  <meta property="og:locale" content="id_ID">
  <meta property="og:type" content="service">
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

  {{-- Favicon & Styles --}}
  <link rel="icon" type="image/webp" href="{{ asset('assets/images/logo-nazwagraha.webp') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

  {{-- Structured Data (JSON-LD) Multi-Schema --}}
  <script type="application/ld+json">
  {!! json_encode($schemaLocalBusiness, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaService, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaFaq, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>

  {{-- Google Analytics 4 (GA4) & Lead Conversion Tracking --}}
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

  {{-- Header Navigasi --}}
  <header class="site-header" id="top">
    <div class="container nav-wrap">
      <a class="brand" href="{{ route('home') }}" aria-label="NazwaGraha - Beranda">
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="Logo NazwaGraha - Jasa SEO Murah Bergaransi" width="105" height="40">
      </a>
      <button class="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="primary-nav">
        <span></span><span></span><span></span>
      </button>
      <nav class="primary-nav" id="primary-nav" aria-label="Navigasi utama">
        <div class="nav-links-center">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
          <a class="nav-link" href="{{ route('home') }}#about">About Us</a>
          <div class="nav-dropdown open-on-hover">
            <button class="nav-link dropdown-toggle active" type="button" aria-expanded="false">Layanan Kami <span class="chevron">⌄</span></button>
            <div class="dropdown-menu">
              <a href="{{ route('home') }}#services">Semua Layanan</a>
              <a href="{{ route('services.website') }}">Jasa Pembuatan Website Murah</a>
              <a class="active-dropdown-item" href="{{ route('services.seo') }}">Jasa SEO Murah</a>
              <a href="{{ route('services.network') }}">Instalasi Jaringan LAN</a>
              <a href="{{ route('services.hardware') }}">Pengadaan Komputer</a>
              <a href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
            </div>
          </div>
          <a class="nav-link" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20paket%20jasa%20SEO%20murah%20ranking%201%20Google." target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20paket%20jasa%20SEO%20murah%20ranking%201%20Google." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Konsultasi Gratis
        </a>
      </div>
    </div>
  </header>

  {{-- Breadcrumb Navigasi --}}
  <div class="breadcrumb-bar">
    <div class="container breadcrumb-inner">
      <a href="{{ route('home') }}">Beranda</a>
      <span class="bc-sep">/</span>
      <a href="{{ route('home') }}#services">Layanan Kami</a>
      <span class="bc-sep">/</span>
      <span class="bc-current">Jasa SEO Murah Bergaransi</span>
    </div>
  </div>

  <main id="main">
    {{-- Hero Section Khusus Layanan SEO --}}
    <section class="service-hero">
      <div class="container service-hero-grid">
        <div class="service-hero-copy">
          <div class="service-promo-badge">
            <span>{{ $servicePage->eyebrow ?? '📈 SPESIALIS RANKING 1 GOOGLE' }}</span>
            <span>Mulai Rp 750.000/bln • 100% White-Hat</span>
          </div>

          <h1 class="service-hero-title">
            @if(!empty($servicePage?->hero_h1))
              {{ $servicePage->hero_h1 }}
            @else
              Jasa SEO Murah & Bergaransi Siap <span>Dominasi Halaman 1 Google</span> & Banjir Orderan
            @endif
          </h1>

          <p class="service-hero-desc">
            {{ $servicePage->hero_lead ?? 'Tingkatkan posisi kata kunci bisnis Anda ke peringkat atas Google secara konsisten. Raih ribuan calon pembeli potensial setiap hari tanpa perlu boncos membayar iklan per klik. 100% teknik aman, organik, dan bergaransi naik posisi.' }}
          </p>

          {{-- Key Highlights List --}}
          <ul class="service-hero-highlights">
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>100% Teknik White-Hat Resmi</strong>
                <p>Mengikuti pedoman Google Webmaster terbaru, aman dari sanksi dan penalti algoritma.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Riset Kata Kunci Niat Beli Tinggi (Buyer Intent)</strong>
                <p>Membidik kata kunci yang langsung dicari calon pembeli siap transaksi, bukan trafik kosong.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Optimasi GEO SEO & Google Bisnis Profil</strong>
                <p>Kuasai pencarian lokal wilayah Bogor, Jabodetabek, hingga pencarian nasional.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Laporan Ranking & Trafik Transparan Bulanan</strong>
                <p>Data grafik performa riil dari Google Search Console & tools rank tracker profesional.</p>
              </div>
            </li>
          </ul>

          <div class="service-hero-actions">
            <a class="btn btn-primary btn-large" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20tertarik%20dengan%20Jasa%20SEO%20Murah%20Ranking%201%20Google.%20Bisa%20bantu%20audit%20website%20saya%3F" target="_blank" rel="noopener">
              <span class="wa-icon">◉</span> Konsultasi SEO Gratis via WhatsApp
            </a>
            <a class="btn btn-secondary btn-large" href="#pricing-seo">
              Pilih Paket SEO (Mulai Rp 750rb) <span>↓</span>
            </a>
          </div>

          <div class="service-hero-trust-row">
            <span class="trust-item">🛡️ Garansi Kenaikan Posisi</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">⚡ 0 Rupiah Biaya Per Klik</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">📍 Spesialis SEO Bogor & Nasional</span>
          </div>
        </div>

        {{-- Visual Image Showcase: Foto Asli Portrait Diskusi SEO Programmer dengan Klien NazwaGraha & Logo NGP --}}
        <div class="service-hero-visual">
          <div class="hero-showcase-wrapper">
            <div class="hero-image-card">
              <picture>
                <source srcset="{{ asset('assets/images/hero-jasa-seo-bogor.webp') }}" type="image/webp">
                <img src="{{ asset('assets/images/hero-jasa-seo-bogor.png') }}" 
                     alt="Jasa SEO Murah Bergaransi Ranking 1 Google - NazwaGraha" 
                     width="896" 
                     height="1200"
                     class="hero-showcase-img"
                     loading="eager"
                     fetchpriority="high">
              </picture>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Komparasi: Fakta & Realita (SEO Abal-Abal vs Standar NazwaGraha) --}}
    <section class="section compare-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">FAKTA & REALITA</span>
          <h2>Bahaya Jasa SEO Abal-Abal vs <span>Standar Aman NazwaGraha</span></h2>
          <p>Banyak jasa SEO murah menggunakan bot otomatis yang berakhir dengan penalti Google (*deindex*). Di NazwaGraha, website Anda dioptimasi secara organik dan aman permanen.</p>
        </div>

        {{-- Desktop Compare Table --}}
        <div class="compare-card desktop-only-table">
          <div class="compare-table-responsive">
            <table class="compare-table">
              <thead>
                <tr>
                  <th style="width: 28%;">Faktor Krusial SEO</th>
                  <th style="width: 36%;" class="col-bad">❌ Jasa SEO Abal-Abal / Bot</th>
                  <th style="width: 36%;" class="col-good">✅ Standar Resmi NazwaGraha</th>
                </tr>
              </thead>
              <tbody>
                @foreach($comparisons as $item)
                  <tr>
                    <td class="feature-col">
                      <strong>{{ $item['feature'] }}</strong>
                    </td>
                    <td class="bad-col">
                      <span class="cross-icon">✕</span>
                      <span>{{ $item['others'] }}</span>
                    </td>
                    <td class="good-col">
                      <span class="check-icon-large">✓</span>
                      <span>{{ $item['nazwa'] }}</span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        {{-- Mobile Friendly Compare Cards --}}
        <div class="compare-cards-mobile mobile-only-block">
          @foreach($comparisons as $item)
            <div class="m-compare-card">
              <div class="m-compare-header">
                <span class="m-badge-factor">FAKTOR SEO</span>
                <h3 class="m-compare-title">{{ $item['feature'] }}</h3>
              </div>
              <div class="m-compare-body">
                <div class="m-box-bad">
                  <div class="m-box-label"><span class="m-cross">✕</span> Jasa SEO Abal-Abal:</div>
                  <p>{{ $item['others'] }}</p>
                </div>
                <div class="m-box-good">
                  <div class="m-box-label"><span class="m-check">✓</span> Standar Resmi NazwaGraha:</div>
                  <p>{{ $item['nazwa'] }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    {{-- Section Paket Harga SEO --}}
    <section class="section pricing-section" id="pricing-seo">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">INVESTASI TERJANGKAU</span>
          <h2>Pilihan Paket <span>Jasa SEO Bergaransi</span></h2>
          <p>Pilih paket SEO yang paling sesuai dengan target pasar dan anggaran pertumbuhan bisnis Anda. Transparan tanpa biaya tersembunyi.</p>
        </div>

        <div class="pricing-grid">
          @foreach($packages as $pkg)
            <div class="pricing-card {{ $pkg->is_popular ? 'popular-card' : '' }}" id="card-{{ $pkg->id }}">
              @if($pkg->is_popular)
                <div class="popular-ribbon">🔥 BEST SELLER • PALING LARIS</div>
              @endif

              <div class="pricing-header">
                <span class="package-badge">{{ $pkg->badge }}</span>
                <h3 class="package-name">{{ $pkg->name }}</h3>
                <p class="package-target">{{ $pkg->target_audience }}</p>

                <div class="price-wrap">
                  <span class="strike-price">{{ $pkg->strike_price }}</span>
                  <div class="main-price">{{ $pkg->price }}</div>
                  <span class="billing-cycle">{{ !empty($pkg->billing_cycle) ? $pkg->billing_cycle : (str_contains($pkg->price, '/ bln') ? 'Biaya langganan bulanan' : 'Biaya satu kali pengerjaan (One-time)') }}</span>
                </div>

                <div class="duration-box">
                  <span>⏱️ Periode Optimasi: <strong>{{ $pkg->duration }}</strong></span>
                </div>
              </div>

              <div class="pricing-body">
                <span class="features-label">Fasilitas & Strategi Optimasi:</span>
                <ul class="package-features-list">
                  @foreach($pkg->features as $feature)
                    <li>
                      <span class="check-dot">✓</span>
                      <span>{{ $feature }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>

              <div class="pricing-footer">
                <a class="btn {{ $pkg->is_popular ? 'btn-primary' : 'btn-outline-primary' }} btn-block" 
                   href="#order-seo"
                   onclick="selectSeoPackage('{{ $pkg->name }}');">
                  {{ $pkg->cta_text }}
                </a>
                <a class="wa-direct-link" 
                   href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20tanya%20{{ urlencode($pkg->name) }}%20(Harga%20{{ urlencode($pkg->price) }}).%20Bisa%20bantu%20analisis%20website%20saya%3F" 
                   target="_blank" 
                   rel="noopener">
                  💬 Tanya paket ini via WhatsApp
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <div class="pricing-note">
          <p>💡 <em>Belum tahu kata kunci apa yang paling tepat untuk bisnis Anda? <a href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20riset%20kata%20kunci%20SEO%20untuk%20website%20saya." target="_blank" rel="noopener">Konsultasikan website dan target pasar Anda dengan tim pakar SEO kami gratis!</a></em></p>
        </div>
      </div>
    </section>

    {{-- Section 6 Pilar Keunggulan SEO NazwaGraha --}}
    <section class="section features-grid-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">STRATEGI TERBUKTI</span>
          <h2>6 Pilar Optimasi SEO Kami untuk <span>Hasil Maksimal</span></h2>
          <p>Kami tidak sekadar memasang kata kunci, melainkan membangun ekosistem website yang disukai oleh mesin pencari Google dan calon konsumen.</p>
        </div>

        <div class="features-columns-grid">
          <div class="feature-item-box">
            <div class="f-icon-circle">🎯</div>
            <h3>Riset Keyword Niat Beli Tinggi</h3>
            <p>Menganalisis kata kunci spesifik yang benar-benar diketik oleh orang yang siap membeli jasa/produk Anda, bukan pencari informasi gratisan.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">⚙️</div>
            <h3>On-Page & Technical SEO</h3>
            <p>Memperbaiki struktur metadata, heading H1-H3, internal links, robots.txt, sitemap XML, dan schema markup Google rich snippets.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">📍</div>
            <h3>GEO SEO & Google Bisnis Profil</h3>
            <p>Mengoptimalkan visibilitas bisnis di Google Maps area Bogor, Ciawi, Jabodetabek & nasional agar mendominasi pencarian lokal (*Local 3-Pack*).</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">✍️</div>
            <h3>Konten Pilar & Kluster Topik</h3>
            <p>Menulis artikel informatif dan relevan berstandar E-E-A-T Google yang membangun otoritas topik (*Topical Authority*) website Anda.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🔗</div>
            <h3>White-Hat Backlink Berkualitas</h3>
            <p>Membangun profil tautan balik alami dari situs bereputasi tinggi (*High Domain Authority*), 100% bebas dari teknik link-farming yang berbahaya.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">📊</div>
            <h3>Laporan Transparan Search Console</h3>
            <p>Laporan berkala berbasis data autentik dari Google Search Console dan Google Analytics 4, lengkap dengan evaluasi kenaikan posisi.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Alur Kerja SEO 4 Langkah --}}
    <section class="section workflow-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">TAHAPAN PENGERJAAN</span>
          <h2>Alur Sistematis Pengerjaan <span>SEO di NazwaGraha</span></h2>
          <p>Proses terukur yang telah terbukti menaikkan peringkat puluhan website di berbagai bidang usaha.</p>
        </div>

        <div class="workflow-grid">
          <div class="workflow-step">
            <div class="step-number">01</div>
            <h3>Audit Website & Riset Keyword</h3>
            <p>Membedah kelemahan teknis website Anda, menganalisis kompetitor, dan menentukan daftar kata kunci potensial berniat beli tinggi.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">02</div>
            <h3>Optimasi On-Page & Speed</h3>
            <p>Memperbaiki tag judul, deskripsi, struktur heading, schema markup, dan memastikan kecepatan loading website di atas skor 90.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">03</div>
            <h3>Produksi Konten & Backlink</h3>
            <p>Membuat artikel pendukung berkualitas tinggi dan menyebarkan backlink alami berotoritas tinggi secara bertahap dan aman.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">04</div>
            <h3>Monitoring & Laporan Bulanan</h3>
            <p>Melacak pergerakan kata kunci setiap minggu dan mengirimkan laporan evaluasi bulanan beserta roadmap perbaikan berikutnya.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Garansi & Keamanan Algoritma --}}
    <section class="section guarantee-section">
      <div class="container">
        <div class="guarantee-box-inner">
          <div class="guarantee-icon-big">🛡️</div>
          <h2>Garansi Kualitas & Keamanan Domain Anda</h2>
          <p>Investasi SEO Anda dilindungi dengan standar keamanan tinggi dan metode teruji.</p>

          <div class="guarantee-points-grid">
            <div class="g-point">
              <h4>Garansi 100% White-Hat</h4>
              <p>Metode alami dan resmi yang tidak akan pernah membuat domain Anda terkena penalti deindex.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Kenaikan Posisi</h4>
              <p>Jika kata kunci tidak menunjukkan kenaikan posisi, kami perpanjang optimasi tanpa biaya tambahan.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Laporan Data Asli</h4>
              <p>Data ranking bersumber murni dari Google Search Console & tools rank tracker independen.</p>
            </div>
            <div class="g-point">
              <h4>Dukungan Strategis Langsung</h4>
              <p>Akses konsultasi langsung via WhatsApp untuk mendiskusikan strategi promosi website Anda.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- FAQ Khusus Jasa SEO --}}
    <section class="section faq-section" id="faq-seo">
      <div class="container faq-grid">
        <div class="faq-intro">
          <span class="eyebrow">TANYA JAWAB SEO</span>
          <h2>Pertanyaan yang Sering Diajukan <span>Seputar SEO</span></h2>
          <p>Masih ragu mengenai cara kerja SEO? Berikut penjelasan transparan atas pertanyaan yang paling sering diajukan calon klien.</p>
          <a class="text-link" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20mau%20tanya%20detail%20tentang%20jasa%20SEO." target="_blank" rel="noopener">
            Tanya Langsung via WhatsApp <span>→</span>
          </a>
        </div>
        <div class="faq-list">
          @foreach($faqs as $faq)
            <details>
              <summary>{{ $faq->question }}</summary>
              <p>{{ $faq->answer }}</p>
            </details>
          @endforeach
        </div>
      </div>
    </section>

    {{-- Formulir Pemesanan & Audit Website Gratis --}}
    <section class="order-section" id="order-seo">
      <div class="container">
        <div class="order-card">
          <div class="order-grid">
            <div>
              <div class="geo-tag">
                <span>📍</span> Melayani Jasa SEO di Ciawi, Bogor, Jabodetabek & Seluruh Indonesia
              </div>
              <h2>Dapatkan <span>Audit SEO Gratis</span> untuk Website Anda</h2>
              <p>Kirimkan alamat website Anda sekarang. Tim kami akan melakukan pengecekan awal secara gratis dan menganalisis potensi kata kunci terbaik untuk bisnis Anda.</p>
              
              <ul class="order-benefits">
                <li><span>✓</span> Audit awal gratis tanpa komitmen apapun</li>
                <li><span>✓</span> Pengecekan posisi kata kunci Anda saat ini di Google</li>
                <li><span>✓</span> Rekomendasi kata kunci yang memiliki niat beli tinggi</li>
                <li><span>✓</span> Konsultasi langsung via WhatsApp dengan tim SEO NazwaGraha</li>
              </ul>
            </div>

            <div>
              <form class="order-form" action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <div class="form-group full-width">
                  <label for="seo_name">Nama Lengkap Anda *</label>
                  <input type="text" id="seo_name" name="name" class="form-control" placeholder="Contoh: Hendra Pratama" required>
                </div>

                <div class="form-group">
                  <label for="seo_whatsapp">Nomor WhatsApp Aktif *</label>
                  <input type="tel" id="seo_whatsapp" name="whatsapp" class="form-control" placeholder="Contoh: 081298506111" required>
                </div>

                <div class="form-group">
                  <label for="seo_company">Nama Usaha / Alamat Website *</label>
                  <input type="text" id="seo_company" name="company_name" class="form-control" placeholder="Contoh: www.tokobogor.com" required>
                </div>

                <div class="form-group full-width">
                  <label for="service_select">Pilihan Paket SEO *</label>
                  <select id="service_select" name="service_name" class="form-control" required>
                    <option value="Paket SEO Bisnis Berkembang (Rp 1.500.000 / bln)" selected>Paket SEO Bisnis Berkembang (Mulai Rp 1.500.000 / bln) — Best Seller</option>
                    <option value="Paket SEO Lokal & UMKM (Rp 750.000 / bln)">Paket SEO Lokal & UMKM (Mulai Rp 750.000 / bln)</option>
                    <option value="Paket SEO Agresif / Korporat (Rp 2.750.000 / bln)">Paket SEO Agresif / Korporat (Mulai Rp 2.750.000 / bln)</option>
                    <option value="Paket Audit SEO & Quick Fix (Rp 499.000)">Paket Audit SEO & Quick Fix (Rp 499.000 Sekali Bayar)</option>
                    <option value="Konsultasi Kebutuhan SEO">Belum Yakin, Ingin Konsultasi Dulu</option>
                  </select>
                </div>

                <div class="form-group full-width">
                  <label for="seo_message">Target Kata Kunci / Wilayah yang Ingin Dibidik</label>
                  <textarea id="seo_message" name="message" class="form-control" rows="3" placeholder="Contoh: Ingin ranking kata kunci 'jasa katering pernikahan bogor' dan 'katering harian ciawi'"></textarea>
                </div>

                <div class="full-width" style="margin-top: 10px;">
                  <button type="submit" class="btn btn-primary btn-block btn-large">
                    <span>Mulai Optimasi SEO & Chat WhatsApp ➔</span>
                  </button>
                  <small style="display:block; text-align:center; color:#788696; margin-top:8px;">
                    🔒 Data Anda 100% aman dan langsung terhubung dengan WhatsApp resmi NazwaGraha
                  </small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Closing Promo Banner --}}
    <section class="contact-cta">
      <div class="container cta-inner">
        <div>
          <span class="eyebrow eyebrow-light">SLOT OPTIMASI TERBATAS</span>
          <h2>Kuasai Halaman 1 Google Sebelum Direbut Kompetitor!</h2>
          <p>Dapatkan bonus eksklusif: <strong>Gratis Riset Analisis 10 Kata Kunci Kompetitor Utama</strong> bagi pemesanan paket SEO minggu ini.</p>
        </div>
        <a class="btn btn-white" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20mau%20klaim%20promo%20Jasa%20SEO%20dan%20bonus%20analisis%20kompetitor." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Klaim Promo SEO via WhatsApp
        </a>
      </div>
    </section>
  </main>

  {{-- Site Footer --}}
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
      <span>© <span id="year">2026</span> NazwaGraha. Hak Cipta Dilindungi Undang-Undang.</span>
      <a href="#top">Kembali ke atas ↑</a>
    </div>
  </footer>

  {{-- Floating Elements --}}
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20jasa%20SEO%20murah%20ranking%201%20Google." target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  {{-- Script Pendukung Interaktif --}}
  <script src="{{ asset('assets/js/main.js') }}" defer></script>
  <script>
    function selectSeoPackage(packageName) {
      const select = document.getElementById('service_select');
      if (select) {
        for (let i = 0; i < select.options.length; i++) {
          if (select.options[i].text.includes(packageName) || select.options[i].value.includes(packageName)) {
            select.selectedIndex = i;
            break;
          }
        }
      }
      const orderSec = document.getElementById('order-seo');
      if (orderSec) {
        orderSec.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>
</body>
</html>
