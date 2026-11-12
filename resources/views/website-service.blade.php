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

  {{-- SEO & Metadata Khusus Jasa Pembuatan Website Murah --}}
  <title>{{ $settings['meta_title'] ?? 'Jasa Pembuatan Website Murah, Profesional & Bergaransi | NazwaGraha' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? 'Jasa pembuatan website murah terbaik di Bogor, Ciawi & seluruh Indonesia. Desain modern, loading super cepat PageSpeed 95+, gratis domain (.com) & SSL, SEO friendly, dan 100% hak milik aset.' }}">
  <meta name="keywords" content="jasa pembuatan website murah, jasa website bogor, bikin website murah ciawi, jasa web company profile, bikin toko online whatsapp, jasa landing page murah, harga pembuatan website 2026, web developer murah bogor">
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
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="Logo NazwaGraha - Jasa Pembuatan Website Murah" width="105" height="40">
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
              <a class="active-dropdown-item" href="{{ route('services.website') }}">Jasa Pembuatan Website Murah</a>
              <a href="{{ route('services.seo') }}">Jasa SEO Murah</a>
              <a href="{{ route('services.network') }}">Instalasi Jaringan LAN</a>
              <a href="{{ route('services.hardware') }}">Pengadaan Komputer</a>
              <a href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
            </div>
          </div>
          <a class="nav-link" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20paket%20jasa%20pembuatan%20website%20murah." target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20paket%20jasa%20pembuatan%20website%20murah." target="_blank" rel="noopener">
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
      <span class="bc-current">Jasa Pembuatan Website Murah</span>
    </div>
  </div>

  <main id="main">
    {{-- Hero Section Khusus Layanan Website --}}
    <section class="service-hero">
      <div class="container service-hero-grid">
        <div class="service-hero-copy">
          <div class="service-promo-badge">
            <span>{{ $servicePage->eyebrow ?? '🔥 PROMO KHUSUS BULAN INI' }}</span>
            <span>Mulai Rp 499.000 • Selesai 3-5 Hari</span>
          </div>

          <h1 class="service-hero-title">
            @if(!empty($servicePage?->hero_h1))
              {{ $servicePage->hero_h1 }}
            @else
              Jasa Pembuatan Website <span>Murah, Elegan & Bergaransi</span> Siap Naikkan Omset Bisnis Anda
            @endif
          </h1>

          <p class="service-hero-desc">
            {{ $servicePage->hero_lead ?? 'Bantu bisnis Anda tampil berkelas, dipercaya pelanggan, dan kebanjiran orderan di Google. Solusi website modern, super responsif di semua smartphone, gratis domain (.com) + SSL, dan 100% hak milik aset tanpa biaya siluman.' }}
          </p>

          {{-- Key Highlights List --}}
          <ul class="service-hero-highlights">
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>100% Hak Milik Penuh</strong>
                <p>Akses cPanel, domain, dan kode website sepenuhnya milik Anda.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Loading Secepat Kilat (PageSpeed 95+)</strong>
                <p>Website ringan, bebas lemot, ramah kuota, dan disenangi Google.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Mobile-First & Auto Order WhatsApp</strong>
                <p>Pengunjung bisa langsung klik beli atau konsultasi via WhatsApp otomatis.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Gratis Domain, SSD Hosting & SSL 1 Tahun</strong>
                <p>Siap pakai, tanpa pusing beli server atau setting teknis yang rumit.</p>
              </div>
            </li>
          </ul>

          <div class="service-hero-actions">
            <a class="btn btn-primary btn-large" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20tertarik%20dengan%20Jasa%20Pembuatan%20Website%20Murah.%20Bisa%20bantu%20jelaskan%20paketnya%3F" target="_blank" rel="noopener">
              <span class="wa-icon">◉</span> Konsultasi Gratis via WhatsApp
            </a>
            <a class="btn btn-secondary btn-large" href="#pricing-packages">
              Pilih Paket Harga (Mulai Rp 499rb) <span>↓</span>
            </a>
          </div>

          <div class="service-hero-trust-row">
            <span class="trust-item">🔒 Bergaransi Revisi</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">⚡ Pengerjaan 3 - 5 Hari</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">📍 Support Lokal Ciawi & Bogor</span>
          </div>
        </div>

        {{-- Visual Image Showcase: Foto Asli Portrait Model Web Developer dengan Logo NGP --}}
        <div class="service-hero-visual">
          <div class="hero-showcase-wrapper">
            <div class="hero-image-card">
              <picture>
                <source srcset="{{ asset('assets/images/hero-jasa-website-bogor.webp') }}" type="image/webp">
                <img src="{{ asset('assets/images/hero-jasa-website-bogor.png') }}" 
                     alt="Jasa Pembuatan Website Murah, Profesional & Bergaransi di Bogor - NazwaGraha" 
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

    {{-- Section Komparasi: Fakta & Realita (Menghilangkan Ketakutan Calon Klien) --}}
    <section class="section compare-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">FAKTA & REALITA</span>
          <h2>Kenapa Harus Waspada Website Murahan di Luar vs <span>Standar NazwaGraha</span>?</h2>
          <p>Banyak pengusaha tergiur harga murah namun akhirnya merugi karena website bermasalah. Di NazwaGraha, harga terjangkau tetap menjaga standar profesionalitas tinggi.</p>
        </div>

        {{-- Desktop Compare Table --}}
        <div class="compare-card desktop-only-table">
          <div class="compare-table-responsive">
            <table class="compare-table">
              <thead>
                <tr>
                  <th style="width: 28%;">Faktor Krusial</th>
                  <th style="width: 36%;" class="col-bad">❌ Jasa Web Murahan Lainnya</th>
                  <th style="width: 36%;" class="col-good">✅ Standar NazwaGraha</th>
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

        {{-- Mobile Friendly Compare Cards (Super Nyaman & Enak Dibaca di Layar HP) --}}
        <div class="compare-cards-mobile mobile-only-block">
          @foreach($comparisons as $item)
            <div class="m-compare-card">
              <div class="m-compare-header">
                <span class="m-badge-factor">FAKTOR</span>
                <h3 class="m-compare-title">{{ $item['feature'] }}</h3>
              </div>
              <div class="m-compare-body">
                <div class="m-box-bad">
                  <div class="m-box-label"><span class="m-cross">✕</span> Jasa Web Murahan Lainnya:</div>
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

    {{-- Section Paket Harga (Pricing Tiers) --}}
    <section class="section pricing-section" id="pricing-packages">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">INVESTASI TERJANGKAU</span>
          <h2>Pilihan Paket <span>Jasa Pembuatan Website</span></h2>
          <p>Semua paket sudah termasuk domain, hosting berkecepatan tinggi, SSL, dan panduan lengkap. Tanpa biaya tersembunyi.</p>
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
                  @if($pkg->strike_price !== 'Hubungi Kami' && $pkg->strike_price !== 'Sesuai Kebutuhan')
                    <span class="strike-price">{{ $pkg->strike_price }}</span>
                  @endif
                  <div class="main-price">{{ $pkg->price }}</div>
                  <span class="billing-cycle">{{ !empty($pkg->billing_cycle) ? $pkg->billing_cycle : 'Biaya pembuatan awal (Sudah termasuk domain & hosting 1 thn)' }}</span>
                </div>

                <div class="duration-box">
                  <span>⏱️ Estimasi Selesai: <strong>{{ $pkg->duration }}</strong></span>
                </div>
              </div>

              <div class="pricing-body">
                <span class="features-label">Fitur & Fasilitas Lengkap:</span>
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
                   href="#order-website"
                   onclick="selectWebsitePackage('{{ $pkg->name }}');">
                  {{ $pkg->cta_text }}
                </a>
                <a class="wa-direct-link" 
                   href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20pesan%20{{ urlencode($pkg->name) }}%20(Harga%20{{ urlencode($pkg->price) }}).%20Bisa%20bantu%20mulai%20prosesnya%3F" 
                   target="_blank" 
                   rel="noopener">
                  💬 Tanya paket ini via WhatsApp
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <div class="pricing-note">
          <p>💡 <em>Butuh spesifikasi khusus atau sistem aplikasi custom di luar paket di atas? <a href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20butuh%20website%20custom%20dengan%20spesifikasi%20khusus." target="_blank" rel="noopener">Diskusikan kebutuhan khusus Anda dengan tim developer kami secara gratis!</a></em></p>
        </div>
      </div>
    </section>

    {{-- Section Fitur Unggulan (Why NazwaGraha) --}}
    <section class="section features-grid-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">STANDAR KUALITAS TINGGI</span>
          <h2>Setiap Website Kami Dibekali <span>Fitur Terbaik</span></h2>
          <p>Bukan sekadar website biasa yang hanya bisa dilihat, melainkan alat pemasaran digital yang bekerja 24 jam mencari calon pembeli.</p>
        </div>

        <div class="features-columns-grid">
          <div class="feature-item-box">
            <div class="f-icon-circle">📱</div>
            <h3>100% Responsif & Mobile-First</h3>
            <p>Rapi dan proporsional di semua layar: iPhone, Android, iPad, hingga monitor PC widescreen. Tidak berantakan dan nyaman dijelajahi calon konsumen.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">⚡</div>
            <h3>Super Fast Loading Speed</h3>
            <p>Dioptimasi dengan kompresi gambar modern (WebP), caching cerdas, dan script bersih sehingga website terbuka dalam hitungan detik.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🔍</div>
            <h3>SEO Friendly & Siap Google</h3>
            <p>Ditanamkan meta description, heading terstruktur, sitemap XML otomatis, dan schema markup agar disukai mesin pencari Google.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">💬</div>
            <h3>Integrasi WhatsApp 1-Klik</h3>
            <p>Memudahkan pelanggan menghubungi Anda seketika melalui tombol WhatsApp melayang yang terhubung langsung ke ponsel CS/Admin Anda.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🛡️</div>
            <h3>Keamanan SSL & Backup Terjadwal</h3>
            <p>Gembok hijau HTTPS aktif, data pengunjung aman dari pencurian, dan database website dibackup secara rutin untuk menghindari resiko kehilangan data.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🤝</div>
            <h3>Panduan Lengkap & Dukungan Ramah</h3>
            <p>Diberikan video panduan mudah mengelola website sendiri. Jika menemui kendala teknis, tim kami selalu siap membantu via WhatsApp.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Industri yang Cocok --}}
    <section class="section industry-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">COCOK UNTUK BERBAGAI SEKTOR USAHA</span>
          <h2>Website Disesuaikan dengan <span>Karakter Industri Anda</span></h2>
          <p>Kami merancang tata letak dan nuansa visual yang sesuai dengan target pasar bisnis Anda.</p>
        </div>

        <div class="industry-pills-wrap">
          <span class="ind-pill">🏢 Perusahaan PT / CV / Kontraktor</span>
          <span class="ind-pill">👗 Toko Online Fashion & Busana</span>
          <span class="ind-pill">🍔 Restoran, Cafe & Kuliner F&B</span>
          <span class="ind-pill">🔧 Bengkel Mobil/Motor & Jasa Servis</span>
          <span class="ind-pill">🏡 Properti, Agen & Pengembang Perumahan</span>
          <span class="ind-pill">🩺 Klinik Medis, Dokter & Apotek</span>
          <span class="ind-pill">⚖️ Kantor Hukum, Notaris & Akuntan</span>
          <span class="ind-pill">🎓 Sekolah, Bimbingan Belajar & Yayasan</span>
          <span class="ind-pill">✈️ Tour & Travel / Sewa Mobil</span>
          <span class="ind-pill">📦 Ekspedisi, Logistik & Pengiriman</span>
        </div>
      </div>
    </section>

    {{-- Section Alur Kerja 4 Langkah (Simple Workflow) --}}
    <section class="section workflow-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">ALUR PRAKTIS & CEPAT</span>
          <h2>Hanya 4 Langkah Mudah Hingga <span>Website Anda Online</span></h2>
          <p>Anda tidak perlu repot dengan istilah teknis yang memusingkan. Serahkan semuanya kepada tim kami.</p>
        </div>

        <div class="workflow-grid">
          <div class="workflow-step">
            <div class="step-number">01</div>
            <h3>Konsultasi & Pilih Paket</h3>
            <p>Diskusikan nama domain yang diinginkan (.com/.id) serta pilih paket yang sesuai dengan kebutuhan dan anggaran usaha Anda.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">02</div>
            <h3>Kirim Materi & Konten</h3>
            <p>Kirimkan logo, foto produk/kegiatan, dan profil usaha Anda. Jika belum lengkap, tim kami siap mendampingi dan membantu merapikannya.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">03</div>
            <h3>Pengerjaan & Review Revisi</h3>
            <p>Website mulai dikerjakan dalam 2-5 hari. Kami kirimkan link preview untuk Anda uji coba dan koreksi jika ada bagian yang ingin disesuaikan.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">04</div>
            <h3>Peluncuran & Serah Terima</h3>
            <p>Website resmi online dan siap disebarkan ke calon pelanggan. Akun akses domain, cPanel, dan video tutorial kami serahkan secara lengkap.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Garansi & Keamanan Pembeli --}}
    <section class="section guarantee-section">
      <div class="container">
        <div class="guarantee-box-inner">
          <div class="guarantee-icon-big">🛡️</div>
          <h2>Jaminan Kepuasan & Keamanan Pemesanan di NazwaGraha</h2>
          <p>Kami menjamin setiap sen investasi Anda menghasilkan website berkualitas nyata yang tahan lama.</p>

          <div class="guarantee-points-grid">
            <div class="g-point">
              <h4>Garansi Revisi Sampai Cocok</h4>
              <p>Desain kami sesuaikan hingga Anda puas dan sesuai dengan estetika yang disepakati.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Server Stabil & SSL Aktif</h4>
              <p>Menggunakan infrastruktur hosting SSD NVMe modern yang menjamin website selalu online 24 jam.</p>
            </div>
            <div class="g-point">
              <h4>Garansi 100% Hak Milik Aset</h4>
              <p>Domain terdaftar atas nama Anda, cPanel dapat diakses kapan saja, dan tanpa ikatan vendor lock-in.</p>
            </div>
            <div class="g-point">
              <h4>Transparansi Biaya Perpanjangan</h4>
              <p>Bebas biaya siluman di tahun berikutnya. Anda hanya membayar biaya modal domain dan server.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- FAQ Khusus Jasa Pembuatan Website --}}
    <section class="section faq-section" id="faq-website">
      <div class="container faq-grid">
        <div class="faq-intro">
          <span class="eyebrow">PERTANYAAN UMUM</span>
          <h2>Semua yang Perlu Anda Ketahui Seputar <span>Pembuatan Website</span></h2>
          <p>Masih ada yang belum jelas? Berikut rangkuman jawaban yang paling sering ditanyakan oleh calon klien kami.</p>
          <a class="text-link" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20ada%20yang%20ingin%20saya%20tanyakan%20seputar%20pembuatan%20website." target="_blank" rel="noopener">
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

    {{-- Formulir Pemesanan Cepat & Hitung Kebutuhan --}}
    <section class="order-section" id="order-website">
      <div class="container">
        <div class="order-card">
          <div class="order-grid">
            <div>
              <div class="geo-tag">
                <span>📍</span> Melayani Pembuatan Website di Ciawi, Bogor & Seluruh Indonesia
              </div>
              <h2>Mulai Buat Website Anda <span>Hari Ini</span></h2>
              <p>Isi formulir singkat di bawah ini. Tim kami akan segera meninjau kebutuhan bisnis Anda dan menghubungi Anda via WhatsApp dalam hitungan menit.</p>
              
              <ul class="order-benefits">
                <li><span>✓</span> Konsultasi gratis tanpa komitmen apapun</li>
                <li><span>✓</span> Pengecekan nama domain gratis (.com / .id)</li>
                <li><span>✓</span> Estimasi harga pasti tanpa biaya tersembunyi</li>
                <li><span>✓</span> Panduan pemilihan paket yang paling tepat untuk omset bisnis</li>
              </ul>
            </div>

            <div>
              <form class="order-form" action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <div class="form-group full-width">
                  <label for="web_name">Nama Lengkap Anda *</label>
                  <input type="text" id="web_name" name="name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                </div>

                <div class="form-group">
                  <label for="web_whatsapp">Nomor WhatsApp Aktif *</label>
                  <input type="tel" id="web_whatsapp" name="whatsapp" class="form-control" placeholder="Contoh: 081298506111" required>
                </div>

                <div class="form-group">
                  <label for="web_company">Nama Usaha / Toko / Perusahaan</label>
                  <input type="text" id="web_company" name="company_name" class="form-control" placeholder="Contoh: Berkah Mandiri Tech">
                </div>

                <div class="form-group full-width">
                  <label for="service_select">Pilihan Paket Website *</label>
                  <select id="service_select" name="service_name" class="form-control" required>
                    <option value="Paket Company Profile Bisnis (Rp 899.000)" selected>Paket Company Profile Bisnis (Mulai Rp 899.000) — Best Seller</option>
                    <option value="Paket Landing Page Promo (Rp 499.000)">Paket Landing Page Promo (Mulai Rp 499.000)</option>
                    <option value="Paket Toko Online & Katalog WhatsApp (Rp 1.490.000)">Paket Toko Online & Katalog WhatsApp (Mulai Rp 1.490.000)</option>
                    <option value="Paket Custom Web & Portal Bisnis (Rp 2.500.000+)">Paket Custom Web & Portal Bisnis (Mulai Rp 2.500.000+)</option>
                    <option value="Konsultasi Kebutuhan Website">Belum Yakin, Ingin Konsultasi Dulu</option>
                  </select>
                </div>

                <div class="form-group full-width">
                  <label for="web_message">Kebutuhan / Rencana Nama Domain yang Diinginkan</label>
                  <textarea id="web_message" name="message" class="form-control" rows="3" placeholder="Contoh: Saya butuh website untuk jasa katering di Bogor, rencana nama domain kateringbogor.com"></textarea>
                </div>

                <div class="full-width" style="margin-top: 10px;">
                  <button type="submit" class="btn btn-primary btn-block btn-large">
                    <span>Kirim & Terhubung ke WhatsApp ➔</span>
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
          <span class="eyebrow eyebrow-light">SLOT TERBATAS BULAN INI</span>
          <h2>Jangan Tunda Lagi, Onlinekan Bisnis Anda Sekarang!</h2>
          <p>Dapatkan bonus eksklusif: <strong>Gratis Pendaftaran Google Bisnis Profil & Pembuatan Email Bisnis Resmi</strong> khusus bagi pemesan minggu ini.</p>
        </div>
        <a class="btn btn-white" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20mau%20klaim%20promo%20pembuatan%20website%20murah%20dan%20bonus%20Google%20Bisnis." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Klaim Promo via WhatsApp
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
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20pembuatan%20website%20murah." target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  {{-- Script Pendukung Interaktif --}}
  <script src="{{ asset('assets/js/main.js') }}" defer></script>
  <script>
    function selectWebsitePackage(packageName) {
      const select = document.getElementById('service_select');
      if (select) {
        for (let i = 0; i < select.options.length; i++) {
          if (select.options[i].text.includes(packageName) || select.options[i].value.includes(packageName)) {
            select.selectedIndex = i;
            break;
          }
        }
      }
      const orderSec = document.getElementById('order-website');
      if (orderSec) {
        orderSec.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>
</body>
</html>
