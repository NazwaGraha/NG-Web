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

  <title>Hubungi Kami - Jasa Website & Konsultan IT Murah Bogor | NazwaGraha</title>
  <meta name="description" content="Hubungi tim NazwaGraha untuk konsultasi gratis jasa pembuatan website murah, jasa SEO bergaransi, instalasi LAN, dan konsultan IT di Bogor & Ciawi. Respon cepat < 15 menit!">
  <meta name="keywords" content="kontak nazwagraha, hubungi konsultan it bogor, alamat kantor nazwagraha ciawi, nomor whatsapp jasa website bogor, konsultasi website murah">
  <meta name="robots" content="index, follow, max-image-preview:large">
  <link rel="canonical" href="{{ route('contact.index') }}">

  {{-- GEO Targeting Meta Tags --}}
  <meta name="geo.region" content="ID-JB">
  <meta name="geo.placename" content="Bogor, Jawa Barat">
  <meta name="geo.position" content="-6.678759;106.858094">
  <meta name="ICBM" content="-6.678759, 106.858094">

  {{-- OpenGraph & Social Media --}}
  <meta property="og:locale" content="id_ID">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NazwaGraha">
  <meta property="og:title" content="Hubungi Kami - Jasa Website & Konsultan IT Murah Bogor | NazwaGraha">
  <meta property="og:description" content="Hubungi tim NazwaGraha untuk konsultasi gratis jasa pembuatan website murah, jasa SEO, instalasi LAN, dan konsultan IT di Bogor & Ciawi.">
  <meta property="og:url" content="{{ route('contact.index') }}">
  <meta property="og:image" content="{{ asset('assets/images/hero-technology.webp') }}">

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Hubungi Kami - NazwaGraha Bogor">
  <meta name="twitter:description" content="Konsultasi gratis jasa website murah dan solusi IT handal di Bogor. Respon cepat & bergaransi.">
  <meta name="twitter:image" content="{{ asset('assets/images/hero-technology.webp') }}">

  <link rel="icon" type="image/webp" href="{{ asset('assets/images/logo-nazwagraha.webp') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

  {{-- Google Analytics 4 & Google Tag Manager --}}
  @include('partials.analytics')

  {{-- Structured Data (Schema.org) --}}
  <script type="application/ld+json">
  {!! json_encode($schemaContactPage, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaBreadcrumb, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaLocalBusiness, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>

  <style>
    /* Scoped Styles for Contact Us Page */
    .contact-hero {
      background: linear-gradient(112deg, #0e1626 0%, #162a42 55%, #0b1522 100%);
      color: #fff;
      padding: 70px 0 60px;
      position: relative;
      overflow: hidden;
      border-bottom: 3px solid var(--orange);
    }
    .contact-hero-content {
      max-width: 780px;
      margin: 0 auto;
      text-align: center;
      position: relative;
      z-index: 2;
    }
    .contact-hero h1 {
      font-size: clamp(32px, 4.2vw, 48px);
      font-weight: 800;
      line-height: 1.15;
      margin: 14px 0 16px;
      letter-spacing: -1px;
    }
    .contact-hero h1 span {
      color: #ff831e;
    }
    .contact-hero p {
      color: #d1d9e6;
      font-size: clamp(14.5px, 1.8vw, 17px);
      line-height: 1.6;
      margin: 0 auto 24px;
      max-width: 640px;
    }
    .contact-badges-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 12px;
      margin-top: 18px;
    }
    .hero-pill-badge {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(6px);
      color: #f1f5f9;
      font-size: 12.5px;
      font-weight: 700;
      padding: 6px 14px;
      border-radius: 50px;
    }
    .hero-pill-badge span.dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #22c55e;
      box-shadow: 0 0 8px #22c55e;
    }

    /* Main Contact Layout */
    .contact-main-section {
      padding: 70px 0 80px;
      background: #f8fafc;
    }
    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1.25fr;
      gap: 36px;
      align-items: start;
    }

    /* Left Column: Contact Cards */
    .contact-info-list {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }
    .contact-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      padding: 22px 24px;
      box-shadow: 0 4px 18px rgba(15, 23, 42, 0.04);
      display: flex;
      align-items: flex-start;
      gap: 18px;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
    }
    .contact-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
      border-color: rgba(244, 119, 18, 0.35);
    }
    .contact-card-icon {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      display: grid;
      place-items: center;
      font-size: 24px;
      flex-shrink: 0;
    }
    .icon-wa {
      background: #dcfce7;
      color: #16a34a;
    }
    .icon-email {
      background: #ffedd5;
      color: #ea580c;
    }
    .icon-address {
      background: #e0f2fe;
      color: #0284c7;
    }
    .icon-hours {
      background: #f1f5f9;
      color: #475569;
    }
    .contact-card-body h3 {
      font-size: 15px;
      font-weight: 800;
      color: #0f172a;
      margin: 0 0 4px;
    }
    .contact-card-body p {
      font-size: 13.5px;
      color: #64748b;
      margin: 0 0 10px;
      line-height: 1.5;
    }
    .contact-card-link {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 13px;
      font-weight: 800;
      color: var(--orange);
      text-decoration: none;
      transition: color 0.2s ease, gap 0.2s ease;
    }
    .contact-card-link:hover {
      color: var(--orange-dark);
      gap: 8px;
    }

    /* Trust Review Box in Left Column */
    .contact-trust-card {
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
      color: #ffffff;
      border-radius: 18px;
      padding: 24px;
      box-shadow: 0 8px 24px rgba(15, 23, 42, 0.12);
      border-left: 4px solid var(--orange);
    }
    .contact-trust-stars {
      color: #fbbf24;
      font-size: 18px;
      margin-bottom: 6px;
    }
    .contact-trust-card h4 {
      font-size: 15px;
      font-weight: 800;
      margin: 0 0 6px;
      color: #ffffff;
    }
    .contact-trust-card p {
      font-size: 12.5px;
      color: #cbd5e1;
      margin: 0;
      line-height: 1.55;
    }

    /* Right Column: Contact & Inquiry Form */
    .contact-form-box {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 20px;
      padding: 36px 32px;
      box-shadow: 0 8px 30px rgba(15, 23, 42, 0.06);
    }
    .contact-form-header {
      margin-bottom: 24px;
    }
    .contact-form-header h2 {
      font-size: 24px;
      font-weight: 800;
      color: #0f172a;
      margin: 0 0 8px;
    }
    .contact-form-header p {
      font-size: 13.5px;
      color: #64748b;
      margin: 0;
      line-height: 1.5;
    }
    .form-group-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 16px;
    }
    .form-field {
      margin-bottom: 16px;
    }
    .form-field label {
      display: block;
      font-size: 13px;
      font-weight: 700;
      color: #1e293b;
      margin-bottom: 6px;
    }
    .form-field label span.req {
      color: #ef4444;
    }
    .form-control-custom {
      width: 100%;
      height: 48px;
      padding: 10px 16px;
      font-size: 14px;
      color: #0f172a;
      background: #f8fafc;
      border: 1.5px solid #cbd5e1;
      border-radius: 12px;
      transition: border-color 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
      font-family: inherit;
    }
    .form-control-custom:focus {
      outline: none;
      border-color: var(--orange);
      background: #ffffff;
      box-shadow: 0 0 0 3px rgba(244, 119, 18, 0.15);
    }
    textarea.form-control-custom {
      height: auto;
      min-height: 120px;
      resize: vertical;
    }
    .form-submit-btn {
      width: 100%;
      min-height: 52px;
      background: var(--orange);
      color: #ffffff;
      border: none;
      border-radius: 12px;
      font-size: 15px;
      font-weight: 800;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      box-shadow: 0 8px 20px rgba(244, 119, 18, 0.25);
      transition: background 0.2s ease, transform 0.2s ease;
    }
    .form-submit-btn:hover {
      background: var(--orange-dark);
      transform: translateY(-2px);
    }
    .form-note {
      text-align: center;
      font-size: 12px;
      color: #94a3b8;
      margin-top: 14px;
    }

    /* Flash Messages */
    .alert-success-custom {
      background: #ecfdf5;
      border: 1.5px solid #a7f3d0;
      color: #065f46;
      border-radius: 12px;
      padding: 16px 18px;
      margin-bottom: 22px;
      font-size: 14px;
      line-height: 1.55;
    }
    .alert-danger-custom {
      background: #fef2f2;
      border: 1.5px solid #fecaca;
      color: #991b1b;
      border-radius: 12px;
      padding: 14px 18px;
      margin-bottom: 22px;
      font-size: 13.5px;
    }

    /* Google Maps Section */
    .contact-map-section {
      padding: 0 0 80px;
      background: #f8fafc;
    }
    .map-wrapper-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(15, 23, 42, 0.05);
    }
    .map-header {
      padding: 24px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;
      border-bottom: 1px solid #f1f5f9;
    }
    .map-header-info h3 {
      font-size: 18px;
      font-weight: 800;
      color: #0f172a;
      margin: 0 0 4px;
    }
    .map-header-info p {
      font-size: 13px;
      color: #64748b;
      margin: 0;
    }
    .map-iframe-container {
      width: 100%;
      height: 420px;
      position: relative;
      background: #e2e8f0;
    }
    .map-iframe-container iframe {
      width: 100%;
      height: 100%;
      border: 0;
      display: block;
    }

    /* Responsive Queries */
    @media (max-width: 992px) {
      .contact-grid {
        grid-template-columns: 1fr;
        gap: 30px;
      }
      .contact-info-list {
        display: grid;
        grid-template-columns: 1fr 1fr;
      }
      .contact-trust-card {
        grid-column: 1 / -1;
      }
    }
    @media (max-width: 640px) {
      .contact-hero {
        padding: 50px 0 45px;
      }
      .contact-main-section {
        padding: 45px 0 55px;
      }
      .contact-info-list {
        grid-template-columns: 1fr;
      }
      .form-group-row {
        grid-template-columns: 1fr;
        gap: 0;
      }
      .contact-form-box {
        padding: 26px 20px;
      }
      .map-iframe-container {
        height: 320px;
      }
      .map-header {
        padding: 18px 20px;
      }
    }
  </style>
</head>
<body>
  {{-- Google Tag Manager (noscript) --}}
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFR9ZXF"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <a class="skip-link" href="#main">Langsung ke konten utama</a>

  {{-- Topbar --}}
  <header class="topbar">
    <div class="container topbar-inner">
      <div>
        <span>📍 {{ $settings['address'] }}</span>
        <span class="top-sep">|</span>
        <span>⏱ {{ $settings['opening_hours'] }}</span>
      </div>
      <div>
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}">{{ $settings['phone'] }}</a>
        <span class="top-sep">|</span>
        <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a>
      </div>
    </div>
  </header>

  {{-- Navigation Header --}}
  <header class="site-header">
    <div class="container nav-wrap">
      <a class="brand" href="{{ route('home') }}" aria-label="NazwaGraha Beranda">
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="NazwaGraha Logo" width="105" height="42" fetchpriority="high">
      </a>

      <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="Buka navigasi">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <nav class="primary-nav" id="primary-nav" aria-label="Navigasi Utama">
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
              <a href="{{ route('services.network') }}">Instalasi Jaringan LAN</a>
              <a href="{{ route('services.hardware') }}">Pengadaan Komputer</a>
              <a href="{{ route('services.maintenance') }}">Konsultan IT & Maintenance</a>
            </div>
          </div>
          <a class="nav-link" href="{{ route('home') }}#portfolio">Portofolio</a>
          <a class="nav-link" href="{{ route('home') }}#testimoni">Testimoni</a>
          <a class="nav-link" href="{{ route('articles.index') }}">News & Events</a>
          <a class="nav-link active" href="{{ route('contact.index') }}">Contact Us</a>
        </div>
        <div class="mobile-cta-wrap">
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'], '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20pembuatan%20website%20atau%20solusi%20IT." target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>

      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'], '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20pembuatan%20website%20atau%20solusi%20IT." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Konsultasi Gratis
        </a>
      </div>
    </div>
  </header>

  <main id="main">
    {{-- Hero Section --}}
    <section class="contact-hero">
      <div class="container contact-hero-content">
        <span class="eyebrow" style="color: var(--orange); font-size: 12px; font-weight: 800; letter-spacing: 2px;">HUBUNGI KAMI • CONTACT US</span>
        <h1>Konsultasi Gratis Bersama <span>Tim IT NazwaGraha</span></h1>
        <p>
          Diskusikan rencana pembuatan website murah, optimasi SEO ranking 1 Google, perbaikan jaringan LAN, hingga pengadaan PC kantor. Kami siap mendengarkan dan memberikan solusi paling efisien.
        </p>
        <div class="contact-badges-row">
          <span class="hero-pill-badge">
            <span class="dot"></span> Respon Cepat &lt; 15 Menit
          </span>
          <span class="hero-pill-badge">
            <span class="dot"></span> Konsultasi Ramah &amp; Gratis
          </span>
          <span class="hero-pill-badge">
            <span class="dot"></span> Layanan Bergaransi Resmi
          </span>
        </div>
      </div>
    </section>

    {{-- Main Contact & Form Section --}}
    <section class="contact-main-section">
      <div class="container">
        <div class="contact-grid">

          {{-- Left Column: Direct Contact Info --}}
          <div class="contact-info-list">
            {{-- WhatsApp & Phone --}}
            <div class="contact-card">
              <div class="contact-card-icon icon-wa">
                💬
              </div>
              <div class="contact-card-body">
                <h3>WhatsApp &amp; Telepon Hotline</h3>
                <p>Konsultasi langsung dengan konsultan IT kami via chat atau panggilan suara.</p>
                <div style="font-weight: 800; font-size: 16px; color: #0f172a; margin-bottom: 6px;">
                  {{ $settings['phone'] }}
                </div>
                <a class="contact-card-link" href="https://wa.me/62{{ ltrim($settings['whatsapp'], '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20layanan%20IT." target="_blank" rel="noopener">
                  Chat WhatsApp Sekarang <span>→</span>
                </a>
              </div>
            </div>

            {{-- Email Resmi --}}
            <div class="contact-card">
              <div class="contact-card-icon icon-email">
                ✉️
              </div>
              <div class="contact-card-body">
                <h3>Email Resmi NazwaGraha</h3>
                <p>Kirimkan permohonan penawaran harga (RFP), proposal, atau kerja sama resmi.</p>
                <div style="font-weight: 800; font-size: 15px; color: #0f172a; margin-bottom: 6px;">
                  {{ $settings['email'] }}
                </div>
                <a class="contact-card-link" href="mailto:{{ $settings['email'] }}">
                  Kirim Email Resmi <span>→</span>
                </a>
              </div>
            </div>

            {{-- Alamat Kantor --}}
            <div class="contact-card">
              <div class="contact-card-icon icon-address">
                📍
              </div>
              <div class="contact-card-body">
                <h3>Alamat Kantor Operasional</h3>
                <p style="margin-bottom: 8px;">
                  {{ $settings['address'] }}
                </p>
                <a class="contact-card-link" href="{{ $settings['maps_direct_url'] }}" target="_blank" rel="noopener">
                  Lihat di Google Maps <span>→</span>
                </a>
              </div>
            </div>

            {{-- Jam Kerja --}}
            <div class="contact-card">
              <div class="contact-card-icon icon-hours">
                ⏱️
              </div>
              <div class="contact-card-body">
                <h3>Jam Operasional</h3>
                <p style="margin-bottom: 0;">
                  {{ $settings['opening_hours'] }}<br>
                  <small class="text-muted">Layanan darurat maintenance server tetap siaga 24/7 bagi klien kontrak.</small>
                </p>
              </div>
            </div>

            {{-- Social Proof Card --}}
            <div class="contact-trust-card">
              <div class="contact-trust-stars">★★★★★</div>
              <h4>Kepuasan Klien 4.9 / 5.0</h4>
              <p>Dipercaya lebih dari 120+ UMKM, klinik medis, sekolah, hingga perusahaan logistik di Bogor, Ciawi, Sukabumi, dan Jabodetabek.</p>
            </div>
          </div>

          {{-- Right Column: Interactive Form --}}
          <div class="contact-form-box">
            <div class="contact-form-header">
              <h2>Kirim Pertanyaan / Pesan</h2>
              <p>Isi formulir di bawah ini. Pesan Anda akan langsung diteruskan ke email tim NazwaGraha.</p>
            </div>

            @if(session('success'))
              <div class="alert-success-custom">
                <strong>✓ Berhasil Terkirim!</strong><br>
                {{ session('success') }}
                @if(session('whatsapp_url'))
                  <div style="margin-top: 10px;">
                    <a href="{{ session('whatsapp_url') }}" target="_blank" rel="noopener" class="btn btn-primary" style="font-size: 13px; min-height: 40px; padding: 0 18px;">
                      <span>💬 Juga Chat via WhatsApp</span>
                    </a>
                  </div>
                @endif
              </div>
            @endif

            @if($errors->any())
              <div class="alert-danger-custom">
                <strong>Perhatian:</strong> Silakan lengkapi kolom yang wajib diisi:
                <ul style="margin: 6px 0 0; padding-left: 20px;">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" id="contact-form">
              @csrf

              <div class="form-group-row">
                <div class="form-field">
                  <label for="name">Nama Lengkap <span class="req">*</span></label>
                  <input type="text" id="name" name="name" class="form-control-custom" placeholder="Contoh: Hendra Wijaya" required value="{{ old('name') }}">
                </div>

                <div class="form-field">
                  <label for="whatsapp">No. WhatsApp / HP <span class="req">*</span></label>
                  <input type="tel" id="whatsapp" name="whatsapp" class="form-control-custom" placeholder="Contoh: 081298506111" required value="{{ old('whatsapp') }}">
                </div>
              </div>

              <div class="form-group-row">
                <div class="form-field">
                  <label for="email">Alamat Email <span class="req">*</span></label>
                  <input type="email" id="email" name="email" class="form-control-custom" placeholder="nama@perusahaan.com" required value="{{ old('email') }}">
                </div>

                <div class="form-field">
                  <label for="service_name">Layanan yang Ditanyakan</label>
                  <select id="service_name" name="service_name" class="form-control-custom">
                    <option value="Jasa Pembuatan Website Murah" {{ old('service_name') == 'Jasa Pembuatan Website Murah' ? 'selected' : '' }}>Jasa Pembuatan Website Murah</option>
                    <option value="Jasa SEO Murah Bergaransi" {{ old('service_name') == 'Jasa SEO Murah Bergaransi' ? 'selected' : '' }}>Jasa SEO Murah Bergaransi</option>
                    <option value="Instalasi Jaringan LAN & Wi-Fi" {{ old('service_name') == 'Instalasi Jaringan LAN & Wi-Fi' ? 'selected' : '' }}>Instalasi Jaringan LAN &amp; Wi-Fi</option>
                    <option value="Pengadaan Komputer Kantor" {{ old('service_name') == 'Pengadaan Komputer Kantor' ? 'selected' : '' }}>Pengadaan Komputer Kantor</option>
                    <option value="Konsultan IT & Maintenance" {{ old('service_name') == 'Konsultan IT & Maintenance' ? 'selected' : '' }}>Konsultan IT &amp; Maintenance</option>
                    <option value="Pertanyaan / Konsultasi Lainnya" {{ old('service_name') == 'Pertanyaan / Konsultasi Lainnya' ? 'selected' : '' }}>Pertanyaan / Konsultasi Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="form-field">
                <label for="subject">Subjek / Topik Pertanyaan</label>
                <input type="text" id="subject" name="subject" class="form-control-custom" placeholder="Contoh: Estimasi Biaya Pembuatan Website Company Profile" value="{{ old('subject') }}">
              </div>

              <div class="form-field">
                <label for="message">Isi Pesan / Kebutuhan Anda <span class="req">*</span></label>
                <textarea id="message" name="message" class="form-control-custom" rows="4" placeholder="Ceritakan secara singkat kebutuhan Anda, jenis usaha, fitur yang diinginkan, atau pertanyaan teknis..." required>{{ old('message') }}</textarea>
              </div>

              <button type="submit" class="form-submit-btn" id="btn-submit-contact">
                <span>Kirim Pesan Sekarang</span>
                <span>➔</span>
              </button>

              <div class="form-note">
                🔒 Data dan privasi Anda 100% terjaga. Pesan langsung dikirim ke email tim <strong>nazwagraha@gmail.com</strong>.
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>

    {{-- Interactive Google Maps Embed Section --}}
    <section class="contact-map-section">
      <div class="container">
        <div class="map-wrapper-card">
          <div class="map-header">
            <div class="map-header-info">
              <h3>📍 Lokasi Kantor Kami di Google Maps</h3>
              <p>{{ $settings['address'] }}</p>
            </div>
            <a href="{{ $settings['maps_direct_url'] }}" target="_blank" rel="noopener" class="btn btn-primary" style="font-size: 13px; min-height: 44px; padding: 0 20px;">
              <span>Buka Petunjuk Arah di Google Maps ↗</span>
            </a>
          </div>
          <div class="map-iframe-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.742749130914!2d106.85809447538949!3d-6.678759265294222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c9d0f298daa1%3A0x54b04c9a934c6352!2sNazwaGraha%20-%20Jasa%20Pembuatan%20Website%20Bogor%20%26%20Solusi%20IT!5e0!3m2!1sid!2sid!4v1794401102409!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" title="Peta Lokasi Kantor NazwaGraha Ciawi Bogor"></iframe>
          </div>
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
        <p><strong>NazwaGraha</strong> — Jasa Pembuatan Website Murah &amp; Konsultan IT Murah. Mendukung pertumbuhan digital dan kehandalan infrastruktur teknologi bisnis Anda di era modern.</p>
        <div class="footer-geo-box">
          <strong>📍 Lokasi Kantor Resmi:</strong><br>
          {{ $settings['address'] }}
          <a href="{{ $settings['maps_direct_url'] }}" target="_blank" rel="noopener" class="geo-map-link"><span>🗺️</span> Buka Petunjuk Arah di Google Maps →</a>
        </div>
      </div>
      <div>
        <h3>Menu Utama</h3>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('home') }}#about">About Us</a>
        <a href="{{ route('home') }}#services">Layanan Kami</a>
        <a href="{{ route('home') }}#portfolio">Portofolio</a>
        <a href="{{ route('home') }}#testimoni">Testimoni Klien</a>
        <a href="{{ route('articles.index') }}">News &amp; Events</a>
        <a href="{{ route('contact.index') }}">Contact Us</a>
      </div>
      <div>
        <h3>Layanan Kami</h3>
        <a href="{{ route('services.website') }}">Jasa Pembuatan Website Murah</a>
        <a href="{{ route('services.seo') }}">Jasa SEO Murah Bergaransi</a>
        <a href="{{ route('services.network') }}">Instalasi Jaringan LAN &amp; Wi-Fi</a>
        <a href="{{ route('services.hardware') }}">Pengadaan Komputer Kantor</a>
        <a href="{{ route('services.maintenance') }}">Konsultan IT &amp; Maintenance</a>
      </div>
      <div class="footer-contact">
        <h3>Hubungi Kami</h3>
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}">☎ {{ $settings['phone'] }}</a>
        <a href="mailto:{{ $settings['email'] }}">✉ {{ $settings['email'] }}</a>
        <a href="https://wa.me/62{{ ltrim($settings['whatsapp'], '0') }}">◉ WhatsApp: {{ $settings['phone'] }}</a>
        <p style="margin-top: 8px;"><strong>Cakupan Layanan:</strong><br>Ciawi, Bogor, Sukabumi, Depok, Jakarta, Tangerang, Bekasi, Jawa Barat &amp; Seluruh Indonesia.</p>
      </div>
    </div>
    <div class="container footer-bottom">
      <span>© <span id="year">2026</span> NazwaGraha. Hak Cipta Dilindungi Undang-Undang.</span>
      <a href="#top">Kembali ke atas ↑</a>
    </div>
  </footer>

  {{-- Floating WhatsApp button --}}
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'], '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20layanan%20IT." target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>

  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  <script src="{{ asset('assets/js/main.js') }}" defer></script>
</body>
</html>
