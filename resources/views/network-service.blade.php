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

  {{-- SEO & Metadata Khusus Instalasi Jaringan LAN --}}
  <title>{{ $settings['meta_title'] ?? 'Jasa Instalasi Jaringan LAN & Wi-Fi Kantor Murah Bogor | NazwaGraha' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? 'Jasa instalasi jaringan LAN, penarikan kabel UTP/STP Cat6, setting Router Mikrotik & Cisco, Wi-Fi kantor, server rack & troubleshooting di Bogor & Jabodetabek. Bergaransi & rapi.' }}">
  <meta name="keywords" content="jasa instalasi jaringan lan, jasa pasang lan bogor, jasa tarik kabel utp ciawi, setting mikrotik kantor, instalasi wifi kantor, jasa rapihin kabel server, teknisi jaringan komputer bogor, pasang rack server">
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
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="Logo NazwaGraha - Jasa Instalasi Jaringan LAN" width="105" height="40">
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
              <a class="active-dropdown-item" href="{{ route('services.network') }}">Instalasi Jaringan LAN</a>
              <a href="{{ route('services.hardware') }}">Pengadaan Komputer</a>
              <a href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
            </div>
          </div>
          <a class="nav-link" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20jasa%20instalasi%20jaringan%20LAN%20dan%20Wi-Fi%20kantor." target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20jasa%20instalasi%20jaringan%20LAN%20dan%20Wi-Fi%20kantor." target="_blank" rel="noopener">
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
      <span class="bc-current">Instalasi Jaringan LAN & Wi-Fi</span>
    </div>
  </div>

  <main id="main">
    {{-- Hero Section Khusus Layanan Jaringan --}}
    <section class="service-hero">
      <div class="container service-hero-grid">
        <div class="service-hero-copy">
          <div class="service-promo-badge">
            <span>{{ $servicePage->eyebrow ?? '⚡ KONEKSI STABIL & RAPI' }}</span>
            <span>Mulai Rp 650.000 • Gratis Survei Ciawi-Bogor</span>
          </div>

          <h1 class="service-hero-title">
            @if(!empty($servicePage?->hero_h1))
              {{ $servicePage->hero_h1 }}
            @else
              Jasa Instalasi Jaringan LAN & Wi-Fi Kantor <span>Stabil, Cepat & Rapi Bergaransi</span>
            @endif
          </h1>

          <p class="service-hero-desc">
            {{ $servicePage->hero_lead ?? 'Solusi profesional penarikan kabel LAN UTP/STP Cat6, konfigurasi Router Mikrotik & Cisco, Access Point roaming tanpa putus, penataan rack server, dan perbaikan kabel semrawut. Internet lancar tanpa rebutan bandwidth, aman, dan interior kantor tetap estetik.' }}
          </p>

          {{-- Key Highlights List --}}
          <ul class="service-hero-highlights">
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Instalasi Rapi Berpelindung Pipa Conduit / Ducting</strong>
                <p>Kabel tertata rapi, tersembunyi elegan, terproteksi dari gigitan hama tikus & gesekan.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Manajemen Bandwidth Mikrotik Cerdas</strong>
                <p>Internet stabil adil untuk semua staf, meeting online (Zoom/Meet) prioritas bebas buffering.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Wi-Fi Kantor Roaming Tanpa Putus (Seamless Mesh)</strong>
                <p>Pindah lantai atau ruangan tetap terkoneksi lancar dengan nama Wi-Fi (SSID) yang sama.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Gratis Survei Lokasi & Garansi On-Site Resmi</strong>
                <p>Teknisi siap datang ke kantor Anda di Ciawi, Bogor, Sukabumi, Depok & sekitarnya.</p>
              </div>
            </li>
          </ul>

          <div class="service-hero-actions">
            <a class="btn btn-primary btn-large" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20tertarik%20dengan%20Jasa%20Instalasi%20Jaringan%20LAN%20dan%20Wi-Fi.%20Bisa%20jadwalkan%20survei%20lokasi%20kantor%3F" target="_blank" rel="noopener">
              <span class="wa-icon">◉</span> Jadwalkan Survei / Konsultasi WA
            </a>
            <a class="btn btn-secondary btn-large" href="#pricing-network">
              Pilih Paket Jaringan (Mulai Rp 650rb) <span>↓</span>
            </a>
          </div>

          <div class="service-hero-trust-row">
            <span class="trust-item">🛡️ Garansi Instalasi Resmi</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">⚡ Gigabit Throughput 1000 Mbps</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">📍 Teknisi On-Site Bogor & Jabodetabek</span>
          </div>
        </div>

        {{-- Visual Image Showcase: Foto Asli Portrait Teknisi Jaringan NazwaGraha & Logo NGP --}}
        <div class="service-hero-visual">
          <div class="hero-showcase-wrapper">
            <div class="hero-image-card">
              <picture>
                <source srcset="{{ asset('assets/images/hero-jasa-lan-bogor.webp') }}" type="image/webp">
                <img src="{{ asset('assets/images/hero-jasa-lan-bogor.png') }}" 
                     alt="Jasa Instalasi Jaringan LAN & Wi-Fi Kantor Murah Bogor - NazwaGraha" 
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

    {{-- Section Komparasi: Fakta & Realita (Pasang Kabel Asal vs Standar NazwaGraha) --}}
    <section class="section compare-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">FAKTA & REALITA</span>
          <h2>Bahaya Pasang Kabel Asal-asalan vs <span>Standar Rapi NazwaGraha</span></h2>
          <p>Kabel yang dipasang sembarangan sering menjadi biang kerok internet mati mendadak, korsleting, dan membuat kantor terlihat kumuh. Pastikan instalasi Anda ditangani ahlinya.</p>
        </div>

        {{-- Desktop Compare Table --}}
        <div class="compare-card desktop-only-table">
          <div class="compare-table-responsive">
            <table class="compare-table">
              <thead>
                <tr>
                  <th style="width: 28%;">Faktor Mutu Jaringan</th>
                  <th style="width: 36%;" class="col-bad">❌ Tukang Pasang Asal-asalan</th>
                  <th style="width: 36%;" class="col-good">✅ Standar Jaringan NazwaGraha</th>
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
                <span class="m-badge-factor">MUTU JARINGAN</span>
                <h3 class="m-compare-title">{{ $item['feature'] }}</h3>
              </div>
              <div class="m-compare-body">
                <div class="m-box-bad">
                  <div class="m-box-label"><span class="m-cross">✕</span> Tukang Pasang Asal:</div>
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

    {{-- Section Paket Harga Jaringan --}}
    <section class="section pricing-section" id="pricing-network">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">INVESTASI TERJANGKAU</span>
          <h2>Pilihan Paket <span>Instalasi Jaringan & Wi-Fi</span></h2>
          <p>Fleksibel dan transparan: pilih paket sesuai jumlah titik dan kebutuhan infrastruktur kantor Anda. Tanpa biaya siluman.</p>
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
                  <span class="billing-cycle">{{ !empty($pkg->billing_cycle) ? $pkg->billing_cycle : 'Estimasi biaya instalasi profesional' }}</span>
                </div>

                <div class="duration-box">
                  <span>⏱️ Estimasi Waktu: <strong>{{ $pkg->duration }}</strong></span>
                </div>
              </div>

              <div class="pricing-body">
                <span class="features-label">Fasilitas & Ruang Lingkup Kerja:</span>
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
                   href="#order-network"
                   onclick="selectNetworkPackage('{{ $pkg->name }}');">
                  {{ $pkg->cta_text }}
                </a>
                <a class="wa-direct-link" 
                   href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20tanya%20{{ urlencode($pkg->name) }}%20(Harga%20{{ urlencode($pkg->price) }}).%20Bisa%20bantu%20estimasi%20titik%20kabel%20kantor%20saya%3F" 
                   target="_blank" 
                   rel="noopener">
                  💬 Tanya paket ini via WhatsApp
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <div class="pricing-note">
          <p>💡 <em>Belum tahu persis berapa jumlah titik kabel yang dibutuhkan di kantor Anda? <a href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20jadwalkan%20survei%20lokasi%20kantor%20untuk%20cek%20kebutuhan%20jaringan%20LAN." target="_blank" rel="noopener">Klaim survei lokasi gratis area Ciawi & Bogor bersama teknisi kami sekarang!</a></em></p>
        </div>
      </div>
    </section>

    {{-- Section 6 Pilar Keunggulan Jaringan NazwaGraha --}}
    <section class="section features-grid-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">STANDAR TEKNIS TINGGI</span>
          <h2>Infrastruktur Jaringan Kokoh untuk <span>Kelancaran Kerja</span></h2>
          <p>Didukung oleh perangkat berstandar industri dan teknisi berpengalaman di bidang IT networking perusahaan.</p>
        </div>

        <div class="features-columns-grid">
          <div class="feature-item-box">
            <div class="f-icon-circle">🛡️</div>
            <h3>Kabel Cat6 Berkualitas & Terlindungi</h3>
            <p>Menggunakan kabel UTP/STP Cat6 standar Gigabit (1000 Mbps) berpelindung pipa conduit tebal, anti interferensi listrik dan bebas gangguan tikus.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">⚖️</div>
            <h3>Manajemen Bandwidth Mikrotik Cerdas</h3>
            <p>Pengaturan pembagian kuota internet adil per divisi. Tidak ada lagi komputer lemot hanya karena satu staf sedang download atau nonton video.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">📶</div>
            <h3>Wi-Fi Enterprise Tanpa Putus (Seamless Mesh)</h3>
            <p>Menggunakan Access Point kelas bisnis (UniFi / Ruijie) dengan teknologi roaming. Berpindah ruangan tetap terhubung tanpa reconnect ulang.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🏷️</div>
            <h3>Labeling & Port Mapping Terstruktur</h3>
            <p>Setiap kabel diberi nomor titik rapi di ujung meja kerja dan di patch panel rack server. Sangat memudahkan maintenance jika ada pergantian posisi kerja.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🖨️</div>
            <h3>Integrasi Printer & File Server Lokal (NAS)</h3>
            <p>Semua staf dapat berbagi pakai printer bersama dan mengakses folder data bersama secara cepat, aman, dan tanpa perlu colok-cabut flashdisk.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🧑‍🔧</div>
            <h3>Garansi Penuh & Panggilan Cepat On-Site</h3>
            <p>Garansi instalasi resmi dengan tim teknisi berbasis lokal di Bogor yang siap merespons cepat jika terjadi kendala pada jaringan kantor Anda.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Alur Kerja Instalasi Jaringan 4 Langkah --}}
    <section class="section workflow-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">LANGKAH PENGERJAAN</span>
          <h2>4 Tahapan Mudah Pemasangan <span>Jaringan di NazwaGraha</span></h2>
          <p>Alur kerja rapi, tepat waktu, dan tidak mengganggu jam operasional aktivitas kantor Anda.</p>
        </div>

        <div class="workflow-grid">
          <div class="workflow-step">
            <div class="step-number">01</div>
            <h3>Survei Lokasi & Perhitungan Titik</h3>
            <p>Tim kami mengunjungi kantor Anda untuk mengukur denah, menghitung jumlah titik kabel, mengecek jalur plafon, dan memberikan penawaran harga pasti.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">02</div>
            <h3>Desain Topologi & Persiapan Alat</h3>
            <p>Menyiapkan rancangan jalur kabel pipa conduit, pemilihan tipe Switch/Router yang tepat, serta jadwal eksekusi instalasi (bisa saat akhir pekan).</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">03</div>
            <h3>Penarikan Kabel & Terminasi Rapi</h3>
            <p>Proses penarikan kabel melalui jalur tersembunyi, pemasangan faceplate di meja kerja, terminasi patch panel, dan penataan rapi di rack server.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">04</div>
            <h3>Setting, Testing & Serah Terima</h3>
            <p>Konfigurasi router Mikrotik, pengetesan throughput gigabit di semua titik kabel, serah terima denah port, dan aktivasi masa garansi resmi.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Garansi & Keamanan --}}
    <section class="section guarantee-section">
      <div class="container">
        <div class="guarantee-box-inner">
          <div class="guarantee-icon-big">🛡️</div>
          <h2>Garansi Mutu Pemasangan & Kestabilan Koneksi</h2>
          <p>Kenyamanan dan kelancaran kerja operasional perusahaan Anda adalah prioritas utama kami.</p>

          <div class="guarantee-points-grid">
            <div class="g-point">
              <h4>Garansi Instalasi & Terminasi</h4>
              <p>Perbaikan gratis jika ada konektor RJ45 atau kabel yang mengalami kendala transmisi.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Kerapian Estetika</h4>
              <p>Jaminan pemasangan pipa conduit dan ducting rapi tanpa merusak keindahan interior kantor.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Kecepatan Gigabit</h4>
              <p>Setiap titik kabel diuji dengan LAN cable tester dan throughput gigabit sebelum serah terima.</p>
            </div>
            <div class="g-point">
              <h4>Respon Cepat On-Site Bogor</h4>
              <p>Teknisi lokal siap datang ke lokasi kantor Anda di area Bogor dan Jabodetabek.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- FAQ Khusus Instalasi Jaringan --}}
    <section class="section faq-section" id="faq-network">
      <div class="container faq-grid">
        <div class="faq-intro">
          <span class="eyebrow">TANYA JAWAB JARINGAN</span>
          <h2>Pertanyaan Seputar <span>Instalasi LAN & Wi-Fi</span></h2>
          <p>Rangkuman jawaban atas pertanyaan teknis seputar pemasangan dan perbaikan jaringan kantor.</p>
          <a class="text-link" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20ada%20yang%20ingin%20saya%20tanyakan%20seputar%20instalasi%20jaringan%20LAN." target="_blank" rel="noopener">
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

    {{-- Formulir Pemesanan & Survei Lokasi Gratis --}}
    <section class="order-section" id="order-network">
      <div class="container">
        <div class="order-card">
          <div class="order-grid">
            <div>
              <div class="geo-tag">
                <span>📍</span> Layanan Instalasi On-Site di Ciawi, Bogor & Seluruh Jabodetabek
              </div>
              <h2>Jadwalkan <span>Survei Lokasi Gratis</span> Sekarang</h2>
              <p>Konsultasikan kebutuhan jaringan kantor Anda. Tim teknisi NazwaGraha siap melakukan pengecekan denah dan memberikan estimasi rancangan jaringan paling efisien dan hemat biaya.</p>
              
              <ul class="order-benefits">
                <li><span>✓</span> Survei lokasi gratis untuk wilayah Ciawi & Bogor</li>
                <li><span>✓</span> Estimasi kebutuhan kabel dan perangkat pasti tanpa biaya siluman</li>
                <li><span>✓</span> Waktu pengerjaan fleksibel (bisa dikerjakan saat libur kantor)</li>
                <li><span>✓</span> Dilengkapi teknisi bersertifikasi dan peralatan modern</li>
              </ul>
            </div>

            <div>
              <form class="order-form" action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <div class="form-group full-width">
                  <label for="net_name">Nama Lengkap PIC / Kontak *</label>
                  <input type="text" id="net_name" name="name" class="form-control" placeholder="Contoh: Dedi Kurniawan" required>
                </div>

                <div class="form-group">
                  <label for="net_whatsapp">Nomor WhatsApp Aktif *</label>
                  <input type="tel" id="net_whatsapp" name="whatsapp" class="form-control" placeholder="Contoh: 081298506111" required>
                </div>

                <div class="form-group">
                  <label for="net_company">Nama Perusahaan / Kantor / Usaha *</label>
                  <input type="text" id="net_company" name="company_name" class="form-control" placeholder="Contoh: PT Surya Kencana Logistik" required>
                </div>

                <div class="form-group full-width">
                  <label for="service_select">Pilihan Paket Jaringan *</label>
                  <select id="service_select" name="service_name" class="form-control" required>
                    <option value="Paket LAN & Wi-Fi Bisnis Terpadu (Rp 2.500.000)" selected>Paket LAN & Wi-Fi Bisnis Terpadu (Mulai Rp 2.500.000) — Best Seller</option>
                    <option value="Paket LAN Kantor Skala Kecil (Rp 1.250.000)">Paket LAN Kantor Skala Kecil (Mulai Rp 1.250.000)</option>
                    <option value="Paket Enterprise & Server Rack (Rp 4.500.000+)">Paket Enterprise & Server Rack (Mulai Rp 4.500.000+)</option>
                    <option value="Paket Perapian & Troubleshooting (Rp 650.000)">Paket Perapian & Troubleshooting (Mulai Rp 650.000)</option>
                    <option value="Survei Lokasi & Konsultasi Jaringan">Ingin Survei Lokasi Kantor Terlebih Dahulu</option>
                  </select>
                </div>

                <div class="form-group full-width">
                  <label for="net_message">Alamat Kantor & Estimasi Jumlah Titik Komputer / Ruangan</label>
                  <textarea id="net_message" name="message" class="form-control" rows="3" placeholder="Contoh: Kantor 2 lantai di Ciawi Bogor, butuh sekitar 15 titik kabel PC dan Wi-Fi di lantai 1 dan 2."></textarea>
                </div>

                <div class="full-width" style="margin-top: 10px;">
                  <button type="submit" class="btn btn-primary btn-block btn-large">
                    <span>Ajukan Jadwal Survei via WhatsApp ➔</span>
                  </button>
                  <small style="display:block; text-align:center; color:#788696; margin-top:8px;">
                    🔒 Data Anda 100% aman dan langsung terhubung dengan WhatsApp teknisi NazwaGraha
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
          <span class="eyebrow eyebrow-light">KONEKSI LANCAR OPERASIONAL SUKSES</span>
          <h2>Atasi Internet Kantor Lemot & Kabel Kusut Sekarang!</h2>
          <p>Dapatkan bonus: <strong>Gratis Konfigurasi Bandwidth Management Mikrotik & Pemisahan Wi-Fi Tamu</strong> untuk pemesanan paket bisnis minggu ini.</p>
        </div>
        <a class="btn btn-white" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20mau%20klaim%20promo%20instalasi%20jaringan%20LAN%20dan%20gratis%20survei." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Hubungi Teknisi via WhatsApp
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
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20instalasi%20jaringan%20LAN%20dan%20Wi-Fi." target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  {{-- Script Pendukung Interaktif --}}
  <script src="{{ asset('assets/js/main.js') }}" defer></script>
  <script>
    function selectNetworkPackage(packageName) {
      const select = document.getElementById('service_select');
      if (select) {
        for (let i = 0; i < select.options.length; i++) {
          if (select.options[i].text.includes(packageName) || select.options[i].value.includes(packageName)) {
            select.selectedIndex = i;
            break;
          }
        }
      }
      const orderSec = document.getElementById('order-network');
      if (orderSec) {
        orderSec.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>
</body>
</html>
