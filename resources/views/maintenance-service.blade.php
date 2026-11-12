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

  {{-- SEO & Metadata Khusus Konsultan IT & Maintenance --}}
  <title>{{ $settings['meta_title'] ?? 'Jasa Konsultan IT & Maintenance Komputer Kantor Murah Bogor | NazwaGraha' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? 'Jasa konsultan IT, maintenance komputer kantor rutin, pembersihan virus, backup data, perbaikan jaringan, dan IT support on-site & remote di Bogor & Jabodetabek. Lebih hemat dari staf IT sendiri.' }}">
  <meta name="keywords" content="konsultan it bogor, jasa maintenance komputer kantor, it support outsourcing bogor, service komputer panggilan ciawi, jasa backup data kantor, perbaikan pc kantor lambat, kontrak maintenance it kantor">
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
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="Logo NazwaGraha - Konsultan IT & Maintenance" width="105" height="40">
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
              <a href="{{ route('services.hardware') }}">Pengadaan Komputer</a>
              <a class="active-dropdown-item" href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
            </div>
          </div>
          <a class="nav-link" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20layanan%20konsultan%20IT%20dan%20maintenance%20komputer." target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20layanan%20konsultan%20IT%20dan%20maintenance%20komputer." target="_blank" rel="noopener">
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
      <span class="bc-current">Konsultan IT & Maintenance</span>
    </div>
  </div>

  <main id="main">
    {{-- Hero Section Khusus Konsultan IT & Maintenance --}}
    <section class="service-hero">
      <div class="container service-hero-grid">
        <div class="service-hero-copy">
          <div class="service-promo-badge">
            <span>{{ $servicePage->eyebrow ?? '🛠️ IT SUPPORT KANTOR HANDAL' }}</span>
            <span>Mulai Rp 350.000 • Respon Cepat On-Site & Remote</span>
          </div>

          <h1 class="service-hero-title">
            @if(!empty($servicePage?->hero_h1))
              {{ $servicePage->hero_h1 }}
            @else
              Jasa Konsultan IT & Maintenance Komputer Kantor <span>Cepat, Aman & Lebih Hemat dari Staf Sendiri</span>
            @endif
          </h1>

          <p class="service-hero-desc">
            {{ $servicePage->hero_lead ?? 'Solusi perawatan komputer kantor berkala, pembersihan virus/malware, backup data penting, penanganan printer & jaringan, serta IT support panggilan maupun kontrak bulanan di Bogor & Jabodetabek. Bebas pusing kendala teknologi, operasional bisnis lancar tanpa gaji IT in-house yang mahal.' }}
          </p>

          {{-- Key Highlights List --}}
          <ul class="service-hero-highlights">
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Jauh Lebih Hemat Dibanding Menggaji Staf IT In-House</strong>
                <p>Hemat jutaan rupiah per bulan tanpa beban tunjangan, BPJS, atau pesangon.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Respon Cepat: Remote Support Menit & Teknisi On-Site</strong>
                <p>Kendala ringan selesai via AnyDesk/WA; kendala fisik ditangani teknisi ke lokasi kantor.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Pemeliharaan Proaktif: Backup Terjadwal & Proteksi Ransomware</strong>
                <p>Mencegah kerusakan sebelum terjadi dan memastikan data bisnis Anda tidak hilang.</p>
              </div>
            </li>
            <li>
              <span class="highlight-check">✓</span>
              <div>
                <strong>Perjanjian Kerahasiaan Data Resmi (NDA Terjamin)</strong>
                <p>Jaminan 100% keamanan privasi dan kerahasiaan data internal perusahaan Anda.</p>
              </div>
            </li>
          </ul>

          <div class="service-hero-actions">
            <a class="btn btn-primary btn-large" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20tertarik%20dengan%20Jasa%20Konsultan%20IT%20dan%20Maintenance.%20Bisa%20jadwalkan%20konsultasi%20kantor%20kami%3F" target="_blank" rel="noopener">
              <span class="wa-icon">◉</span> Konsultasi IT Gratis via WhatsApp
            </a>
            <a class="btn btn-secondary btn-large" href="#pricing-maintenance">
              Pilih Paket Maintenance (Mulai Rp 350rb) <span>↓</span>
            </a>
          </div>

          <div class="service-hero-trust-row">
            <span class="trust-item">🛡️ Terikat Perjanjian NDA</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">⚡ Respon Darurat Cepat</span>
            <span class="trust-sep">•</span>
            <span class="trust-item">📍 Teknisi On-Site Bogor & Jabodetabek</span>
          </div>
        </div>

        {{-- Visual Image Showcase: Foto Asli Portrait Konsultan IT NazwaGraha & Logo NGP --}}
        <div class="service-hero-visual">
          <div class="hero-showcase-wrapper">
            <div class="hero-image-card">
              <picture>
                <source srcset="{{ asset('assets/images/hero-konsultan-it-bogor.webp') }}" type="image/webp">
                <img src="{{ asset('assets/images/hero-konsultan-it-bogor.png') }}" 
                     alt="Jasa Konsultan IT Murah & Maintenance Komputer Kantor Profesional Bogor - NazwaGraha" 
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

    {{-- Section Komparasi: Fakta & Realita (Tanpa IT vs Standar NazwaGraha) --}}
    <section class="section compare-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">FAKTA & REALITA</span>
          <h2>Tanpa Tim IT Support vs <span>Layanan Maintenance NazwaGraha</span></h2>
          <p>Banyak perusahaan membiarkan komputer kantor tanpa perawatan hingga data penting lenyap terkena virus atau keluar biaya perbaikan membengkak mendadak.</p>
        </div>

        {{-- Desktop Compare Table --}}
        <div class="compare-card desktop-only-table">
          <div class="compare-table-responsive">
            <table class="compare-table">
              <thead>
                <tr>
                  <th style="width: 28%;">Faktor Pengelolaan IT</th>
                  <th style="width: 36%;" class="col-bad">❌ Tanpa IT / Teknisi Pinggir Jalan</th>
                  <th style="width: 36%;" class="col-good">✅ Standar Maintenance NazwaGraha</th>
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
                <span class="m-badge-factor">PENGELOLAAN IT</span>
                <h3 class="m-compare-title">{{ $item['feature'] }}</h3>
              </div>
              <div class="m-compare-body">
                <div class="m-box-bad">
                  <div class="m-box-label"><span class="m-cross">✕</span> Tanpa Maintenance:</div>
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

    {{-- Section Paket Harga Maintenance --}}
    <section class="section pricing-section" id="pricing-maintenance">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">HEMAT & TRANSPARAN</span>
          <h2>Pilihan Paket <span>Konsultan IT & Maintenance</span></h2>
          <p>Fleksibel sesuai skala kantor Anda: mulai dari panggilan darurat sekali visit hingga paket langganan bulanan terpadu.</p>
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
                  <span class="billing-cycle">{{ !empty($pkg->billing_cycle) ? $pkg->billing_cycle : 'Tanpa biaya siluman & hemat operasional' }}</span>
                </div>

                <div class="duration-box">
                  <span>⏱️ Sistem Layanan: <strong>{{ $pkg->duration }}</strong></span>
                </div>
              </div>

              <div class="pricing-body">
                <span class="features-label">Ruang Lingkup Pemeliharaan:</span>
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
                   href="#order-maintenance"
                   onclick="selectMaintenancePackage('{{ $pkg->name }}');">
                  {{ $pkg->cta_text }}
                </a>
                <a class="wa-direct-link" 
                   href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20tanya%20{{ urlencode($pkg->name) }}%20({{ urlencode($pkg->price) }}).%20Bisa%20bantu%20jelaskan%20mekanisme%20layanannya%3F" 
                   target="_blank" 
                   rel="noopener">
                  💬 Tanya paket ini via WhatsApp
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <div class="pricing-note">
          <p>💡 <em>Ingin menghitung estimasi biaya maintenance sesuai jumlah komputer persis di kantor Anda? <a href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20hitung%20biaya%20paket%20maintenance%20untuk%20komputer%20kantor%20kami." target="_blank" rel="noopener">Diskusikan kebutuhan spesifik kantor Anda dengan tim konsultan IT kami secara gratis!</a></em></p>
        </div>
      </div>
    </section>

    {{-- Section 6 Pilar Keunggulan IT Maintenance NazwaGraha --}}
    <section class="section features-grid-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">KOMITMEN PROFESIONAL</span>
          <h2>Kenapa Menyerahkan Urusan IT ke <span>NazwaGraha</span>?</h2>
          <p>Dukungan teknis menyeluruh yang menjamin kenyamanan kerja seluruh karyawan Anda setiap hari.</p>
        </div>

        <div class="features-columns-grid">
          <div class="feature-item-box">
            <div class="f-icon-circle">💰</div>
            <h3>Hemat Anggaran Hingga 70%</h3>
            <p>Tidak perlu membayar gaji tetap Rp 4-5 juta/bulan per staf IT, biaya pesangon, BPJS, atau tunjangan kerja lainnya. Sangat ramah arus kas usaha.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">⚡</div>
            <h3>Dukungan Cepat Remote & On-Site</h3>
            <p>Kendala ringan dibantu langsung via AnyDesk / WhatsApp dalam hitungan menit; kendala hardware ditangani teknisi ke kantor Anda.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">💾</div>
            <h3>Jaminan Backup Data Terjadwal</h3>
            <p>Menyelamatkan data pembukuan, dokumen hukum, dan file penting dari risiko harddisk rusak atau serangan virus ransomware berbahaya.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🖨️</div>
            <h3>Penanganan Jaringan & Printer</h3>
            <p>Menyelesaikan kendala printer sharing yang macet, internet putus-nyambung, Wi-Fi lambat, dan kendala konektivitas antar komputer kantor.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">🔒</div>
            <h3>Perjanjian Kerahasiaan Data (NDA)</h3>
            <p>Kami terikat kontrak kerahasiaan resmi. Data, dokumen keuangan, dan privasi bisnis Anda dijamin 100% aman dan terlindungi hukum.</p>
          </div>

          <div class="feature-item-box">
            <div class="f-icon-circle">📈</div>
            <h3>Konsultasi Roadmap & Upgrade IT</h3>
            <p>Kami bantu menyusun perencanaan peremajaan perangkat dan anggaran teknologi yang paling efisien untuk pertumbuhan masa depan perusahaan Anda.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Alur Kerja Maintenance 4 Langkah --}}
    <section class="section workflow-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">PROSEDUR SISTEMATIS</span>
          <h2>Alur Penanganan Masalah IT <span>Cepat & Tuntas</span></h2>
          <p>Tanggap darurat dan sistematis demi meminimalkan gangguan operasional di kantor Anda.</p>
        </div>

        <div class="workflow-grid">
          <div class="workflow-step">
            <div class="step-number">01</div>
            <h3>Laporan Kendala / Jadwal Kunjungan</h3>
            <p>Hubungi tim kami via WhatsApp saat ada masalah atau sesuai jadwal rutin bulanan yang telah disepakati.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">02</div>
            <h3>Diagnosa Cepat & Penanganan Remote</h3>
            <p>Teknisi melakukan pengecekan awal langsung ke komputer staf via software remote aman dalam hitungan menit.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">03</div>
            <h3>Kunjungan On-Site (Bila Diperlukan)</h3>
            <p>Jika memerlukan perbaikan fisik, pembersihan debu, atau pergantian komponen, teknisi segera meluncur ke kantor Anda.</p>
          </div>

          <div class="workflow-step">
            <div class="step-number">04</div>
            <h3>Sistem Normal & Laporan Bulanan</h3>
            <p>Komputer dan jaringan kembali berjalan lancar. Laporan riwayat perawatan kami serahkan secara berkala.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Section Garansi & Keamanan --}}
    <section class="section guarantee-section">
      <div class="container">
        <div class="guarantee-box-inner">
          <div class="guarantee-icon-big">🛡️</div>
          <h2>Jaminan Kepuasan & Privasi Data Perusahaan</h2>
          <p>Ketenangan Anda adalah komitmen utama kami dalam setiap pemeliharaan perangkat kantor.</p>

          <div class="guarantee-points-grid">
            <div class="g-point">
              <h4>Perjanjian NDA Resmi</h4>
              <p>Perjanjian tertulis yang menjamin keamanan data dan rahasia perusahaan 100% aman.</p>
            </div>
            <div class="g-point">
              <h4>Garansi Pengerjaan Teknis</h4>
              <p>Bebas biaya perbaikan ulang jika kendala yang sama terulang kembali dalam masa garansi.</p>
            </div>
            <div class="g-point">
              <h4>Respon Cepat Tanggap</h4>
              <p>Tim support yang siap dihubungi saat jam kerja dan respon cepat untuk panggilan darurat.</p>
            </div>
            <div class="g-point">
              <h4>Teknisi Lokal Bogor Terpercaya</h4>
              <p>Jangkauan kunjungan cepat langsung ke area Ciawi, Bogor, Sukabumi & sekitarnya.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- FAQ Khusus Konsultan IT & Maintenance --}}
    <section class="section faq-section" id="faq-maintenance">
      <div class="container faq-grid">
        <div class="faq-intro">
          <span class="eyebrow">TANYA JAWAB MAINTENANCE</span>
          <h2>Pertanyaan Seputar <span>Konsultan IT & Maintenance</span></h2>
          <p>Ketahui bagaimana layanan IT outsourcing kami membantu menghemat jutaan rupiah biaya operasional kantor Anda.</p>
          <a class="text-link" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20ada%20yang%20ingin%20saya%20tanyakan%20seputar%20jasa%20maintenance%20komputer." target="_blank" rel="noopener">
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

    {{-- Formulir Pemesanan & Permintaan Konsultasi IT --}}
    <section class="order-section" id="order-maintenance">
      <div class="container">
        <div class="order-card">
          <div class="order-grid">
            <div>
              <div class="geo-tag">
                <span>📍</span> IT Support Kantor di Ciawi, Bogor, Depok & Seluruh Jabodetabek
              </div>
              <h2>Mulai Lindungi <span>Komputer Kantor Anda</span> Hari Ini</h2>
              <p>Jangan tunggu hingga komputer rusak atau data bisnis Anda hilang. Daftarkan kantor Anda untuk mendapatkan sesi audit awal gratis bersama konsultan IT NazwaGraha.</p>
              
              <ul class="order-benefits">
                <li><span>✓</span> Konsultasi awal gratis untuk mengecek kondisi perangkat kantor</li>
                <li><span>✓</span> Pilihan fleksibel: panggilan darurat atau kontrak bulanan hemat</li>
                <li><span>✓</span> Ditangani teknisi berpengalaman hardware, jaringan, dan keamanan data</li>
                <li><span>✓</span> Garansi pengerjaan dan jaminan kerahasiaan data (NDA)</li>
              </ul>
            </div>

            <div>
              <form class="order-form" action="{{ route('inquiry.store') }}" method="POST">
                @csrf
                <div class="form-group full-width">
                  <label for="mt_name">Nama Lengkap PIC / Kontak *</label>
                  <input type="text" id="mt_name" name="name" class="form-control" placeholder="Contoh: Bagus Wicaksono" required>
                </div>

                <div class="form-group">
                  <label for="mt_whatsapp">Nomor WhatsApp Aktif *</label>
                  <input type="tel" id="mt_whatsapp" name="whatsapp" class="form-control" placeholder="Contoh: 081298506111" required>
                </div>

                <div class="form-group">
                  <label for="mt_company">Nama Perusahaan / Kantor / Usaha *</label>
                  <input type="text" id="mt_company" name="company_name" class="form-control" placeholder="Contoh: PT Graha Prima Nusantara" required>
                </div>

                <div class="form-group full-width">
                  <label for="service_select">Pilihan Paket Maintenance *</label>
                  <select id="service_select" name="service_name" class="form-control" required>
                    <option value="Paket IT Support Bulanan UMKM (Rp 1.250.000 / bln)" selected>Paket IT Support Bulanan UMKM (Mulai Rp 1.250.000 / bln) — Best Seller</option>
                    <option value="Paket Maintenance Panggilan (On-Call) (Rp 350.000 / visit)">Paket Maintenance Panggilan (On-Call) (Mulai Rp 350.000 / visit)</option>
                    <option value="Paket IT Outsourcing Korporasi (Rp 2.750.000 / bln)">Paket IT Outsourcing Korporasi (Mulai Rp 2.750.000 / bln)</option>
                    <option value="Paket Audit & Konsultasi Sistem IT (Rp 1.500.000 / audit)">Paket Audit & Konsultasi Sistem IT (Mulai Rp 1.500.000 / audit)</option>
                    <option value="Konsultasi IT & Maintenance Kantor">Ingin Konsultasi Masalah Komputer Dulu</option>
                  </select>
                </div>

                <div class="form-group full-width">
                  <label for="mt_message">Kendala Komputer yang Sering Dialami & Jumlah Unit PC</label>
                  <textarea id="mt_message" name="message" class="form-control" rows="3" placeholder="Contoh: Kantor ada 8 PC dan 1 printer sharing. Sering kena virus dan printer sering tidak bisa connect."></textarea>
                </div>

                <div class="full-width" style="margin-top: 10px;">
                  <button type="submit" class="btn btn-primary btn-block btn-large">
                    <span>Mulai Konsultasi Maintenance via WA ➔</span>
                  </button>
                  <small style="display:block; text-align:center; color:#788696; margin-top:8px;">
                    🔒 Data Anda 100% aman dan langsung terhubung dengan tim teknisi NazwaGraha
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
          <span class="eyebrow eyebrow-light">SOLUSI HEMAT OPERASIONAL KANTOR</span>
          <h2>Bebaskan Karyawan Anda dari Masalah Komputer Rusak!</h2>
          <p>Dapatkan bonus: <strong>Gratis Audit Pembersihan Virus & Cek Kecepatan Seluruh PC Kantor</strong> untuk pendaftaran paket bulanan minggu ini.</p>
        </div>
        <a class="btn btn-white" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20mau%20konsultasi%20paket%20maintenance%20komputer%20dan%20klaim%20audit%20gratis." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Hubungi Konsultan IT via WA
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
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20maintenance%20komputer%20kantor." target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  {{-- Script Pendukung Interaktif --}}
  <script src="{{ asset('assets/js/main.js') }}" defer></script>
  <script>
    function selectMaintenancePackage(packageName) {
      const select = document.getElementById('service_select');
      if (select) {
        for (let i = 0; i < select.options.length; i++) {
          if (select.options[i].text.includes(packageName) || select.options[i].value.includes(packageName)) {
            select.selectedIndex = i;
            break;
          }
        }
      }
      const orderSec = document.getElementById('order-maintenance');
      if (orderSec) {
        orderSec.scrollIntoView({ behavior: 'smooth' });
      }
    }
  </script>
</body>
</html>
