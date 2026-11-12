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

  {{-- SEO & Metadata Khusus Pengadaan Komputer & Hardware IT --}}
  <title>{{ $settings['meta_title'] ?? 'Jasa Pengadaan Komputer & Laptop Kantor Murah Bogor | NazwaGraha' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? 'Jasa pengadaan komputer PC kantor, laptop bisnis, printer, UPS, dan hardware IT bergaransi resmi distributor di Bogor & Jabodetabek. Siap pakai, diantar & disetting langsung di kantor.' }}">
  <meta name="keywords" content="pengadaan komputer kantor, beli pc kantor murah bogor, pengadaan laptop bisnis, jasa rakit pc kantor ciawi, vendor it kantor bogor, pengadaan printer kantor, distributor komputer resmi bogor">
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
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="Logo NazwaGraha - Pengadaan Komputer Kantor" width="105" height="40">
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
              <a href="{{ route('services.seo') }}">Jasa SEO Murah</a>
              <a href="{{ route('services.network') }}">Instalasi Jaringan LAN</a>
              <a class="active-dropdown-item" href="{{ route('services.hardware') }}">Pengadaan Komputer</a>
              <a href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
            </div>
          </div>
          <a class="nav-link" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20pengadaan%20komputer%20dan%20hardware%20IT%20kantor." target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20pengadaan%20komputer%20dan%20hardware%20IT%20kantor." target="_blank" rel="noopener">
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
      <span class="bc-current">Pengadaan Komputer Kantor</span>
    </div>
  </div>

  <main id="main">
    {{-- Hero Section Khusus Pengadaan Komputer --}}
    <section class="service-hero">
      <div class="container service-hero-grid">
        <div class="service-hero-copy">
          <div class="service-promo-badge">
            <span>{{ $servicePage->eyebrow ?? '💻 UNIT RESMI DISTRIBUTOR' }}</span>
            <span>Mulai Rp 3.850.000 • Siap Pakai Langsung Kerja</span>
          </div>

          <h1 class="service-hero-title">
            @if(!empty($servicePage?->hero_h1))
              {{ $servicePage->hero_h1 }}
            @else
              Jasa Pengadaan Komputer & Laptop Kantor <span>Siap Kerja, Bergaransi Resmi & Hemat</span>
            @endif
          </h1>

          <p class="service-hero-desc">
            {{ $servicePage->hero_lead ?? 'Penyediaan PC kantor administrasi, laptop bisnis, PC workstation render/desain, printer, UPS, dan perangkat IT pendukung. 100% unit baru bergaransi resmi, sudah terinstal OS & Office, diantar dan dirakit langsung di meja kantor Anda.' }}
          </p>

          {{-- Key Highlights List --}}
          <ul class="service-hero-highlights">
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>100% Unit Baru Bergaransi Resmi Distributor</strong>
                <p>Jaminan keaslian komponen resmi Indonesia 1-3 tahun, bebas barang rekondisi.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Terinstal Lengkap: OS & Software Kantor Siap Pakai</strong>
                <p>Karyawan bisa langsung bekerja tanpa perlu pusing install driver atau setting software dasar.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Gratis Pengantaran & Perakitan Langsung di Meja Kantor</strong>
                <p>Teknisi kami antar, rakit, dan hubungkan ke printer serta jaringan lokal kantor Anda.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Mendukung Pembayaran PO & Faktur Pajak Resmi Perusahaan</strong>
                <p>Dokumen legalitas lengkap untuk mempermudah administrasi pembukuan PT/CV Anda.</p>
              </div>
            </li>
          </ul>

          <div class="service-hero-actions">
            <a class="btn btn-primary btn-large" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20tertarik%20dengan%20Jasa%20Pengadaan%20Komputer%20dan%20Hardware%20IT.%20Bisa%20minta%20estimasi%20penawaran%20harga%3F" target="_blank" rel="noopener">
              <span class="wa-icon">◉</span> Minta Penawaran Harga via WA
            </a>
            <a class="btn btn-secondary btn-large" href="#pricing-hardware">
              Lihat Pilihan Paket PC (Mulai Rp 3.85jt) <span>↓</span>
            </a>
          </div>

          <div class="service-hero-trust-row">
            <span class="trust-item">🛡️ Garansi Resmi 1-3 Tahun</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">⚡ Antar & Pasang di Kantor</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">📍 Area Bogor, Ciawi & Jabodetabek</span>
          </div>
        </div>

        {{-- Visual Image Showcase: Foto Asli Portrait Teknisi Hardware NazwaGraha & Logo NGP --}}
        <div class="service-hero-visual">
          <div class="hero-showcase-wrapper">
            <div class="hero-image-card">
              <picture>
                <source srcset="{{ asset('assets/images/hero-pengadaan-komputer-bogor.webp') }}" type="image/webp">
                <img src="{{ asset('assets/images/hero-pengadaan-komputer-bogor.png') }}" 
                     alt="Jasa Pengadaan Komputer PC & Laptop Kantor Murah Bogor - NazwaGraha" 
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

    {{-- Section Komparasi: Fakta & Realita (Toko Biasa vs Standar NazwaGraha) --}}
    <section class="section compare-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">FAKTA & REALITA</span>
          <h2>Beli di Toko Komputer Biasa vs <span>Standar Pengadaan NazwaGraha</span></h2>
          <p>Membeli komputer kantor di sembarang toko sering merepotkan karena tidak ada jasa antar-rakit, barang bekas/rekondisi, dan klaim garansi yang dipersulit.</p>
        </div>

        {{-- Desktop Compare Table --}}
        <div class="compare-card desktop-only-table">
          <div class="compare-table-responsive">
            <table class="compare-table">
              <thead>
                <tr>
                  <th style="width: 28%;">Faktor Pengadaan</th>
                  <th style="width: 36%;" class="col-bad">❌ Toko Komputer Biasa</th>
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

        {{-- Mobile Friendly Compare Cards --}}
        <div class="compare-cards-mobile mobile-only-block">
          @foreach($comparisons as $item)
            <div class="m-compare-card">
              <div class="m-compare-header">
                <span class="m-badge-factor">PENGADAAN</span>
                <h3 class="m-compare-title">{{ $item['feature'] }}</h3>
              </div>
              <div class="m-compare-body">
                <div class="m-box-bad">
                  <div class="m-box-label"><span class="m-cross">✕</span> Toko Komputer Biasa:</div>
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

    {{-- Section Paket Harga Hardware --}}
    <section class="section pricing-section" id="pricing-hardware">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">PILIHAN FLEKSIBEL</span>
          <h2>Pilihan Paket <span>Pengadaan Komputer & Laptop</span></h2>
          <p>Tersedia unit satuan hingga paket bundling lengkap untuk efisiensi anggaran pengadaan perusahaan Anda.</p>
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
                  <span class="billing-cycle">{{ !empty($pkg->billing_cycle) ? $pkg->billing_cycle : 'Unit baru original bergaransi resmi' }}</span>
                </div>

                <div class="duration-box">
                  <span>⏱️ Ketersediaan Unit: <strong>{{ $pkg->duration }}</strong></span>
                </div>
              </div>

              <div class="pricing-body">
                <span class="features-label">Spesifikasi & Kelengkapan:</span>
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
                   href="#order-hardware"
                   onclick="selectHardwarePackage('{{ $pkg->name }}');">
                  {{ $pkg->cta_text }}
                </a>
                <a class="wa-direct-link" 
                   href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20tanya%20{{ urlencode($pkg->name) }}%20({{ urlencode($pkg->price) }}).%20Bisa%20minta%20brosur%20dan%20penawaran%3F" 
                   target="_blank" 
                   rel="noopener">
                  💬 Tanya paket ini via WhatsApp
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <div class="pricing-note">
          <p>💡 <em>Punya daftar spesifikasi khusus atau merek tertentu yang diwajibkan kantor? <a href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ada%20daftar%20spesifikasi%20komputer%20kantor%20khusus%20yang%20ingin%20dihitungkan%20harganya." target="_blank" rel="noopener">Kirimkan daftar kebutuhan Anda via WhatsApp untuk penawaran harga terbaik!</a></em></p>
        </div>
      </div>
    </section>

    {{-- Section 6 Pilar Keunggulan Pengadaan NazwaGraha --}}
    <section class="section features-grid-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">KENAPA PILIH NAZWAGRAHA</span>
          <h2>Keuntungan Pengadaan IT di <span>NazwaGraha</span></h2>
          <p>Bukan sekadar jual beli barang elektronik, kami memberikan solusi terpadu dari pengantaran hingga purna jual.</p>
        </div>

        <div class="features-columns-grid">
          <div class="feature-item-box">
            <div class="f-icon-circle">🏷️</div>
            <h3>100% Produk Original & Bergaransi</h3>
            <p>Seluruh unit didatangkan langsung dari jaringan distributor resmi bergaransi 1-3 tahun. Bebas khawatir barang rekondisi/bekas.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">⚡</div>
            <h3>Terinstal Siap Pakai Langsung</h3>
            <p>Sudah terinstal OS Windows, software office, antivirus, PDF reader, dan setting driver lengkap. Tidak perlu buang waktu teknis di kantor.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🚚</div>
            <h3>Antar & Pasang di Meja Kantor</h3>
            <p>Gratis pengantaran dan perakitan langsung di meja staf kantor untuk area Bogor, Ciawi, dan sekitarnya oleh tim teknisi kami.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">📑</div>
            <h3>Dokumen Faktur Pajak & Invoice Resmi</h3>
            <p>Mendukung prosedur administrasi perusahaan (PT/CV): penerbitan invoice resmi, kwitansi bertanda tangan, dan faktur pajak PPN.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🖨️</div>
            <h3>Setting Printer & Jaringan Kantor</h3>
            <p>Unit langsung disambungkan ke printer sharing bersama dan jaringan LAN/Wi-Fi kantor sehingga karyawan bisa langsung berkoordinasi.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🤝</div>
            <h3>Dukungan Purna Jual & Klaim Garansi</h3>
            <p>Jika ada unit bermasalah, teknisi kami bantu diagnosa awal dan mengurus klaim garansi ke service center resmi distributor.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Alur Kerja Pengadaan 4 Langkah --}}
    <section class="section workflow-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">ALUR PEMESANAN</span>
          <h2>4 Langkah Praktis Pengadaan Komputer <span>Tanpa Ribet</span></h2>
          <p>Prosedur cepat dan transparan, dari konsultasi spesifikasi hingga komputer menyala di kantor Anda.</p>
        </div>

        <div class="workflow-grid">
          <div class="workflow-step">
            <div class="step-number">01</div>
            <h3>Konsultasi Kebutuhan & Spek</h3>
            <p>Ceritakan jumlah unit dan jenis aplikasi yang digunakan (administrasi biasa, desain, atau kasir) agar spesifikasinya tepat sasaran.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">02</div>
            <h3>Penawaran Resmi & Purchase Order</h3>
            <p>Kami kirimkan surat penawaran harga resmi (*quotation*). Setelah disepakati, pemesanan dapat diproses menggunakan PO perusahaan.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">03</div>
            <h3>Instalasi Software & QC Ketat</h3>
            <p>Unit kami siapkan, instalasi OS dan software kerja, serta melalui uji kestabilan (*Quality Control*) sebelum dikirim ke kantor Anda.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">04</div>
            <h3>Pengantaran & Pemasangan On-Site</h3>
            <p>Teknisi kami mengantarkan unit, merakit di meja kerja, menyambungkan ke jaringan, dan melakukan serah terima bersama tim Anda.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Garansi & Keamanan --}}
    <section class="section guarantee-section">
      <div class="container">
        <div class="guarantee-box-inner">
          <div class="guarantee-icon-big">🛡️</div>
          <h2>Jaminan Mutu & Keamanan Pengadaan Perusahaan</h2>
          <p>Investasi aset teknologi kantor Anda terjamin aman dengan unit resmi dan dukungan purna jual terbaik.</p>

          <div class="guarantee-points-grid">
            <div class="g-point">
              <h4>Garansi Distributor Resmi</h4>
              <p>Kartu garansi resmi pabrikan disertakan pada setiap unit yang dikirimkan.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Bebas Barang Bekas</h4>
              <p>Jaminan 100% komponen baru segel pabrik, bukan barang rekondisi atau display.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Terima Beres Siap Pakai</h4>
              <p>Jika ada software atau driver yang kurang, teknisi kami bantu pasangkan gratis.</p>
            </div>
            <div class="g-point">
              <h4>Dukungan Teknisi Lokal Bogor</h4>
              <p>Bantuan teknis cepat langsung ke kantor Anda jika ada kendala pasca-pembelian.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- FAQ Khusus Pengadaan Komputer --}}
    <section class="section faq-section" id="faq-hardware">
      <div class="container faq-grid">
        <div class="faq-intro">
          <span class="eyebrow">TANYA JAWAB PENGADAAN</span>
          <h2>Pertanyaan Seputar <span>Pengadaan Komputer</span></h2>
          <p>Temukan jawaban atas pertanyaan seputar pembelian komputer PC kantor, laptop, garansi, dan sistem pembayaran.</p>
          <a class="text-link" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20ada%20yang%20ingin%20saya%20tanyakan%20seputar%20pengadaan%20komputer." target="_blank" rel="noopener">
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

    {{-- Formulir Pemesanan & Permintaan Penawaran Harga --}}
    <section class="order-section" id="order-hardware">
      <div class="container">
        <div class="order-card">
          <div class="order-grid">
            <div>
              <div class="geo-tag">
                <span>📍</span> Pengadaan Komputer Kantor Wilayah Bogor, Ciawi & Jabodetabek
              </div>
              <h2>Minta <span>Penawaran Harga Resmi</span> (Quotation)</h2>
              <p>Isi formulir kebutuhan unit kantor Anda di bawah ini. Tim pengadaan NazwaGraha akan segera menyusun rincian penawaran harga terbaik dan menghubungi Anda via WhatsApp dalam hitungan menit.</p>
              
              <ul class="order-benefits">
                <li><span>✓</span> Konsultasi racikan spesifikasi paling hemat dan pas</li>
                <li><span>✓</span> Surat penawaran harga resmi (Quotation PDF) siap diajukan ke pimpinan</li>
                <li><span>✓</span> Diskon khusus untuk pemesanan lebih dari 3 unit</li>
                <li><span>✓</span> Gratis pengantaran dan setting di meja kantor untuk area Bogor</li>
              </ul>
            </div>

            <div>
              <form class="order-form" action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <div class="form-group full-width">
                  <label for="hw_name">Nama Lengkap PIC / Pemesan *</label>
                  <input type="text" id="hw_name" name="name" class="form-control" placeholder="Contoh: Rian Anggara" required>
                </div>

                <div class="form-group">
                  <label for="hw_whatsapp">Nomor WhatsApp Aktif *</label>
                  <input type="tel" id="hw_whatsapp" name="whatsapp" class="form-control" placeholder="Contoh: 081298506111" required>
                </div>

                <div class="form-group">
                  <label for="hw_company">Nama Perusahaan / Usaha / Sekolah *</label>
                  <input type="text" id="hw_company" name="company_name" class="form-control" placeholder="Contoh: CV Mega Pratama Abadi" required>
                </div>

                <div class="form-group full-width">
                  <label for="service_select">Pilihan Paket Komputer *</label>
                  <select id="service_select" name="service_name" class="form-control" required>
                    <option value="Paket Laptop Bisnis & Operasional (Rp 5.200.000 / unit)" selected>Paket Laptop Bisnis & Operasional (Mulai Rp 5.200.000 / unit) — Best Seller</option>
                    <option value="Paket PC Kantor & Administrasi (Rp 3.850.000 / unit)">Paket PC Kantor & Administrasi (Mulai Rp 3.850.000 / unit)</option>
                    <option value="Paket PC Desain & Workstation Berat (Rp 8.500.000 / unit)">Paket PC Desain & Workstation Berat (Mulai Rp 8.500.000 / unit)</option>
                    <option value="Paket Pengadaan Bundling Kantor Lengkap">Paket Pengadaan Bundling Kantor Lengkap (Sesuai Anggaran)</option>
                    <option value="Konsultasi Kebutuhan Hardware Lainnya">Kebutuhan Hardware Lainnya (Printer, UPS, Server, dll)</option>
                  </select>
                </div>

                <div class="form-group full-width">
                  <label for="hw_message">Jumlah Unit yang Dibutuhkan & Catatan Khusus</label>
                  <textarea id="hw_message" name="message" class="form-control" rows="3" placeholder="Contoh: Butuh 5 unit PC administrasi dan 2 unit laptop untuk kantor di Ciawi Bogor, anggaran sekitar 35 juta."></textarea>
                </div>

                <div class="full-width" style="margin-top: 10px;">
                  <button type="submit" class="btn btn-primary btn-block btn-large">
                    <span>Minta Penawaran Harga via WhatsApp ➔</span>
                  </button>
                  <small style="display:block; text-align:center; color:#788696; margin-top:8px;">
                    🔒 Data Anda 100% aman dan langsung terhubung dengan tim pengadaan NazwaGraha
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
          <span class="eyebrow eyebrow-light">HARGA PROYEK TERBAIK</span>
          <h2>Lengkapi Komputer Kantor Anda dengan Mudah & Hemat!</h2>
          <p>Dapatkan bonus: <strong>Gratis Perakitan, Instalasi OS/Office, dan Pengantaran Langsung ke Meja Kantor</strong> untuk pemesanan minggu ini.</p>
        </div>
        <a class="btn btn-white" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20mau%20minta%20penawaran%20pengadaan%20komputer%20kantor." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Hubungi Tim Pengadaan WA
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
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20tanya%20pengadaan%20komputer%20kantor." target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  {{-- Script Pendukung Interaktif --}}
  <script src="{{ asset('assets/js/main.js') }}" defer></script>
  <script>
    function selectHardwarePackage(packageName) {
      const select = document.getElementById('service_select');
      if (select) {
        for (let i = 0; i < select.options.length; i++) {
          if (select.options[i].text.includes(packageName) || select.options[i].value.includes(packageName)) {
            select.selectedIndex = i;
            break;
          }
        }
      }
      const orderSec = document.getElementById('order-hardware');
      if (orderSec) {
        orderSec.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>
</body>
</html>
