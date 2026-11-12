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

  {{-- SEO & Metadata Utama --}}
  <title>{{ $settings['meta_title'] ?? 'Jasa Pembuatan Website Murah & Konsultan IT Murah Bogor | NazwaGraha' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? 'Jasa pembuatan website murah & konsultan IT murah terpercaya di Bogor, Ciawi, Jabodetabek & seluruh Indonesia. Solusi web profesional, SEO ranking 1 Google, jaringan LAN, & IT support bergaransi.' }}">
  <meta name="keywords" content="{{ $settings['meta_keywords'] ?? 'jasa pembuatan website murah, konsultan it murah, jasa website bogor, jasa website ciawi, konsultan it bogor, jasa seo murah, maintenance komputer kantor, pasang jaringan lan murah' }}">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <link rel="canonical" href="{{ $settings['canonical_url'] ?? url()->current() }}">

  {{-- Webmaster Verification Tags (Google, Bing, Yandex) --}}
  <meta name="google-site-verification" content="uHDngeaGQvCWK_LPHY9BChUoJ4W5Frj7unpi0SJOmUs" />
  <meta name="msvalidate.01" content="0BEF9D5BD1E3BAB2B08A85DFD9D47F85" />
  <meta name="yandex-verification" content="9081680e1da867cc" />

  {{-- GEO Tagging Lanjutan (Local SEO Bogor, Ciawi, Jawa Barat, Indonesia) --}}
  <meta name="geo.region" content="{{ $settings['geo_region'] ?? 'ID-JB' }}">
  <meta name="geo.placename" content="{{ $settings['geo_placename'] ?? 'Bogor, Jawa Barat' }}">
  <meta name="geo.position" content="{{ $settings['geo_latitude'] ?? '-6.6698' }};{{ $settings['geo_longitude'] ?? '106.8532' }}">
  <meta name="ICBM" content="{{ $settings['geo_latitude'] ?? '-6.6698' }}, {{ $settings['geo_longitude'] ?? '106.8532' }}">

  {{-- Open Graph / Facebook / WhatsApp --}}
  <meta property="og:locale" content="id_ID">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NazwaGraha">
  <meta property="og:title" content="{{ $settings['meta_title'] ?? 'Jasa Pembuatan Website Murah & Konsultan IT Murah Bogor | NazwaGraha' }}">
  <meta property="og:description" content="{{ $settings['meta_description'] ?? 'Jasa pembuatan website murah & konsultan IT murah terpercaya. Desain responsif, super cepat, dan ramah SEO.' }}">
  <meta property="og:url" content="{{ $settings['canonical_url'] ?? url()->current() }}">
  <meta property="og:image" content="{{ asset('assets/images/hero-technology.webp') }}">
  <meta property="og:image:width" content="764">
  <meta property="og:image:height" content="1024">
  <meta property="og:image:alt" content="NazwaGraha - Jasa Pembuatan Website Murah & Konsultan IT Murah">

  {{-- Twitter Card --}}
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $settings['meta_title'] ?? 'Jasa Pembuatan Website Murah & Konsultan IT Murah' }}">
  <meta name="twitter:description" content="{{ $settings['meta_description'] ?? 'Solusi digital dan IT terbaik untuk mendongkrak omset dan ranking 1 Google.' }}">
  <meta name="twitter:image" content="{{ asset('assets/images/hero-technology.webp') }}">

  {{-- Core Web Vitals Optimization (Preload LCP & Styles) --}}
  <link rel="preload" as="image" href="{{ asset('assets/images/hero-technology.webp') }}" fetchpriority="high">
  <link rel="icon" type="image/webp" href="{{ asset('assets/images/logo-nazwagraha.webp') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

  {{-- Structured Data (JSON-LD) Multi-Schema for Google Rich Snippets --}}
  <script type="application/ld+json">
  {!! json_encode($schemaLocalBusiness, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaFaq, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
  </script>
  <script type="application/ld+json">
  {!! json_encode($schemaWebSite, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
      <a class="brand" href="#home" aria-label="NazwaGraha - Beranda">
        <img src="{{ asset('assets/images/logo-nazwagraha.webp') }}" alt="Logo NazwaGraha - Jasa Pembuatan Website Murah & Konsultan IT Murah" width="105" height="40">
      </a>
      <button class="menu-toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="primary-nav">
        <span></span><span></span><span></span>
      </button>
      <nav class="primary-nav" id="primary-nav" aria-label="Navigasi utama">
        <div class="nav-links-center">
          <a class="nav-link active" href="#home">Home</a>
          <a class="nav-link" href="#about">About Us</a>
          <div class="nav-dropdown">
            <button class="nav-link dropdown-toggle" type="button" aria-expanded="false">Layanan Kami <span class="chevron">⌄</span></button>
            <div class="dropdown-menu">
              <a href="#services">Semua Layanan</a>
              <a href="{{ route('services.website') }}">Jasa Pembuatan Website Murah</a>
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
          <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20pembuatan%20website%20murah%20atau%20konsultan%20IT." target="_blank" rel="noopener">
            <span class="wa-icon">◉</span> Konsultasi Gratis
          </a>
        </div>
      </nav>
      <div class="header-action">
        <a class="btn btn-primary nav-cta" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20pembuatan%20website%20murah%20atau%20konsultan%20IT." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Konsultasi Gratis
        </a>
      </div>
    </div>
  </header>

  <main id="main">
    {{-- Hero Section --}}
    <section class="hero" id="home">
      <div class="hero-pattern"></div>
      <div class="container hero-grid">
        <div class="hero-copy">
          <span class="eyebrow eyebrow-light"><i></i> {{ $settings['hero_eyebrow'] ?? 'PARTNER TEKNOLOGI BISNIS ANDA • BOGOR & NASIONAL' }}</span>
          <h1>Jasa Pembuatan <span>Website Murah &</span> Konsultan IT Murah</h1>
          <p class="hero-lead">{{ $settings['hero_lead'] ?? 'Solusi teknologi terpercaya dan terjangkau untuk membantu bisnis Anda bekerja lebih efisien, tampil profesional, ranking 1 di Google, dan banjir orderan di era digital.' }}</p>
          <ul class="hero-points">
            <li><span>✓</span> Website modern, mobile-first & skor 95+ di PageSpeed Insights</li>
            <li><span>✓</span> Optimasi SEO bergaransi untuk target ranking 1 Google & banjir order</li>
            <li><span>✓</span> Konsultan IT & maintenance berpengalaman (Remote & Kunjungan On-Site)</li>
          </ul>
          <div class="hero-actions">
            <a class="btn btn-primary" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20tertarik%20dengan%20jasa%20pembuatan%20website%20murah%20dan%20konsultan%20IT." target="_blank" rel="noopener">
              <span class="wa-icon">◉</span> Konsultasi WhatsApp
            </a>
            <a class="btn btn-outline-light" href="#order">Hitung Biaya / Order <span>→</span></a>
          </div>
          <p class="hero-note">⚡ Respon Cepat: Konsultasikan kebutuhan website dan kendala IT kantor Anda hari ini secara gratis!</p>
        </div>
        <div class="hero-visual">
          <div class="visual-glow"></div>
          <img src="{{ asset('assets/images/hero-technology.webp') }}" alt="Jasa Pembuatan Website Murah dan Konsultan IT Murah NazwaGraha" width="764" height="1024" fetchpriority="high">
          <div class="floating-chip chip-one">
            <span class="chip-icon">⌘</span>
            <span><b>Digital Solution</b><small>Website Murah & SEO Rank 1</small></span>
          </div>
          <div class="floating-chip chip-two">
            <span class="chip-icon">⌁</span>
            <span><b>IT Support Murah</b><small>Jaringan LAN & Maintenance</small></span>
          </div>
        </div>
      </div>
      <div class="hero-bottom-shape"></div>
    </section>

    {{-- Trust Strip --}}
    <section class="trust-strip" aria-label="Komitmen layanan">
      <div class="container trust-grid">
        <div class="trust-item">
          <span class="trust-icon">✦</span>
          <div><b>Solusi Terintegrasi</b><small>Website hingga infrastruktur IT</small></div>
        </div>
        <div class="trust-item">
          <span class="trust-icon">◷</span>
          <div><b>Harga Hemat & Transparan</b><small>Mulai ratusan ribu tanpa jebakan</small></div>
        </div>
        <div class="trust-item">
          <span class="trust-icon">◇</span>
          <div><b>Target Ranking 1 Google</b><small>SEO on-page & GEO lokal tepat sasaran</small></div>
        </div>
        <div class="trust-item">
          <span class="trust-icon">◎</span>
          <div><b>Garansi & Support Berkelanjutan</b><small>Dukungan teknis siap sedia</small></div>
        </div>
      </div>
    </section>

    {{-- About Us Section --}}
    <section class="section about-section" id="about">
      <div class="container about-grid">
        <div class="about-copy">
          <div class="geo-tag"><span>📍</span> Berpusat di Banjarwangi, Ciawi - Bogor</div>
          <span class="eyebrow">TENTANG NAZWAGRAHA</span>
          <h2>Mitra Teknologi Terbaik untuk <span>Bisnis yang Siap Melejit</span></h2>
          <p><strong>NazwaGraha</strong> hadir sebagai jawaban bagi pelaku usaha, UMKM, korporat, dan instansi yang membutuhkan <strong>jasa pembuatan website murah</strong> dan <strong>konsultan IT murah</strong> namun dengan standar kualitas tinggi, keamanan terjamin, dan kecepatan akses luar biasa.</p>
          <p>Berlokasi strategis di <strong>Jl. Banjarwangi 1 Blok A2 no.9, Ciawi, Bogor</strong>, kami melayani klien di wilayah Bogor, Ciawi, Jabodetabek, hingga seluruh Indonesia secara profesional baik melalui konsultasi jarak jauh (online) maupun pendampingan langsung (on-site visit).</p>
          <p>Kami meyakini bahwa teknologi yang baik tidak harus mahal, melainkan harus fungsional, mudah digunakan, dan terbukti menghasilkan <em>return of investment</em> nyata bagi kelancaran operasional dan omset bisnis Anda.</p>
          <a class="text-link" href="#order">Konsultasikan Kebutuhan Anda <span>→</span></a>
        </div>
        <div class="about-image">
          <img src="{{ asset('assets/images/about-building.webp') }}" alt="Gedung representasi kantor dan profesional IT NazwaGraha Ciawi Bogor" width="900" height="330" loading="lazy" decoding="async">
          <div class="image-caption">
            <b>Teknologi yang Bekerja Nyata untuk Bisnis Anda</b>
            <span>Praktis • Hemat Biaya • Bergaransi</span>
          </div>
        </div>
      </div>
    </section>

    {{-- Services Section --}}
    <section class="section services-section" id="services">
      <div class="container services-container">
        <div class="section-heading centered">
          <span class="eyebrow">LAYANAN UNGGULAN KAMI</span>
          <h2>Solusi Lengkap: <span>Website Murah & Dukungan IT Handal</span></h2>
          <p>Pilih paket layanan yang paling sesuai dengan target pertumbuhan dan anggaran perusahaan Anda.</p>
        </div>

        <div class="service-grid">
          @foreach($services as $service)
            <article class="service-card" id="{{ $service->slug ?? 'service-'.$loop->iteration }}">
              <div class="service-card-top">
                @if(!empty($service->badge))
                  <span class="badge-service {{ $loop->first ? 'badge-popular' : '' }}">{{ $service->badge }}</span>
                @else
                  <span class="badge-service">Layanan IT</span>
                @endif
                <div class="service-icon" aria-hidden="true">
                  {!! $service->icon_svg !!}
                </div>
              </div>

              <div class="service-card-body">
                <h3 class="service-title">{{ $service->name }}</h3>
                
                <div class="service-price-box">
                  <span class="service-price-label">{{ str_contains($service->price_starting_from, 'Rp') ? 'Biaya Mulai Dari' : 'Estimasi Biaya' }}</span>
                  <span class="service-price-value">{{ $service->price_starting_from }}</span>
                </div>

                <p class="service-desc">{{ $service->short_description }}</p>

                @if(!empty($service->features) && is_array($service->features))
                  <ul class="service-features">
                    @foreach(array_slice($service->features, 0, 4) as $feat)
                      <li>
                        <span class="check-icon">✓</span>
                        <span>{{ $feat }}</span>
                      </li>
                    @endforeach
                  </ul>
                @endif
              </div>

              <div class="service-card-action">
                @if(str_contains($service->slug ?? '', 'website'))
                  <a class="btn-service" href="{{ route('services.website') }}">
                    <span>Lihat Detail & Paket</span>
                    <span class="btn-service-arrow">→</span>
                  </a>
                @elseif(str_contains($service->slug ?? '', 'seo'))
                  <a class="btn-service" href="{{ route('services.seo') }}">
                    <span>Lihat Detail & Paket</span>
                    <span class="btn-service-arrow">→</span>
                  </a>
                @elseif(str_contains($service->slug ?? '', 'jaringan'))
                  <a class="btn-service" href="{{ route('services.network') }}">
                    <span>Lihat Detail & Paket</span>
                    <span class="btn-service-arrow">→</span>
                  </a>
                @elseif(str_contains($service->slug ?? '', 'pengadaan-komputer'))
                  <a class="btn-service" href="{{ route('services.hardware') }}">
                    <span>Lihat Detail & Paket</span>
                    <span class="btn-service-arrow">→</span>
                  </a>
                @elseif(str_contains($service->slug ?? '', 'konsultan-it'))
                  <a class="btn-service" href="{{ route('services.maintenance') }}">
                    <span>Lihat Detail & Paket</span>
                    <span class="btn-service-arrow">→</span>
                  </a>
                @else
                  <a class="btn-service" href="#order" onclick="document.getElementById('service_select').value='{{ $service->name }}';">
                    <span>Pesan / Konsultasi</span>
                    <span class="btn-service-arrow">→</span>
                  </a>
                @endif
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>

    {{-- Fast Order & Consultation Form (Banjir Orderan Section) --}}
    <section class="order-section" id="order">
      <div class="container">
        <div class="order-card">
          <div class="order-grid">
            <div>
              <span class="eyebrow">FORMULIR CEPAT</span>
              <h2>Siap Banjir Orderan? <span>Mulai Konsultasi Gratis Sekarang!</span></h2>
              <p>Isi data singkat di bawah ini. Tim ahli NazwaGraha akan segera menghubungi Anda dengan rekomendasi spesifikasi terbaik dan penawaran harga paling hemat.</p>
              
              <ul class="order-benefits">
                <li><span>✓</span> Gratis Audit & Konsultasi Kebutuhan Website / IT</li>
                <li><span>✓</span> Estimasi Biaya Transparan Tanpa Biaya Tersembunyi</li>
                <li><span>✓</span> Garansi Pengerjaan Tepat Waktu & Bergaransi Resmi</li>
                <li><span>✓</span> Langsung Terhubung ke WhatsApp untuk Diskusi Instan</li>
              </ul>
            </div>

            <div>
              <form action="{{ route('inquiry.store') }}" method="POST" class="order-form">
                @csrf
                <div class="form-group">
                  <label for="name">Nama Lengkap *</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Bpk. Rian" required>
                </div>

                <div class="form-group">
                  <label for="whatsapp">Nomor WhatsApp Aktif *</label>
                  <input type="tel" id="whatsapp" name="whatsapp" class="form-control" placeholder="Contoh: 081298506111" required>
                </div>

                <div class="form-group full-width">
                  <label for="service_select">Pilihan Layanan yang Dibutuhkan</label>
                  <select id="service_select" name="service_name" class="form-control">
                    <option value="Jasa Pembuatan Website Murah">Jasa Pembuatan Website Murah</option>
                    <option value="Jasa SEO Murah Bergaransi Ranking 1">Jasa SEO Murah Bergaransi Ranking 1</option>
                    <option value="Instalasi Jaringan (LAN) & Wi-Fi">Instalasi Jaringan (LAN) & Wi-Fi</option>
                    <option value="Pengadaan Komputer & Hardware IT">Pengadaan Komputer & Hardware IT</option>
                    <option value="Konsultan IT Murah & Maintenance">Konsultan IT Murah & Maintenance</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="company_name">Nama Usaha / Perusahaan (Opsional)</label>
                  <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Nama brand / kantor">
                </div>

                <div class="form-group">
                  <label for="budget_range">Estimasi Budget</label>
                  <select id="budget_range" name="budget_range" class="form-control">
                    <option value="Di bawah 1 Juta">Di bawah 1 Juta (Hemat)</option>
                    <option value="1 Juta - 3 Juta">1 Juta - 3 Juta (Standar)</option>
                    <option value="3 Juta - 5 Juta">3 Juta - 5 Juta (Bisnis)</option>
                    <option value="Di atas 5 Juta">Di atas 5 Juta (Custom / Enterprise)</option>
                  </select>
                </div>

                <div class="form-group full-width">
                  <label for="message">Ceritakan Kebutuhan Anda Singkat</label>
                  <textarea id="message" name="message" class="form-control" placeholder="Contoh: Saya butuh website company profile murah untuk usaha di Bogor, dilengkapi tombol WhatsApp..."></textarea>
                </div>

                <div class="full-width" style="margin-top: 8px;">
                  <button type="submit" class="btn btn-primary" style="width: 100%; min-height: 52px; font-size: 15px;">
                    <span class="wa-icon">◉</span> Kirim & Lanjut Chat WhatsApp Sekarang
                  </button>
                  <small style="display:block; text-align:center; color:#888; margin-top:8px; font-size:11px;">
                    🔒 Data Anda aman & kami prioritaskan respon cepat dalam hitungan menit.
                  </small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="why-section">
      <div class="container why-grid">
        <div class="why-intro">
          <span class="eyebrow eyebrow-light">KENAPA MEMILIH NAZWAGRAHA</span>
          <h2>Teknologi Canggih & Hemat <span>Bersama Mitra yang Tepat</span></h2>
          <p>Kami memadukan keahlian teknis tingkat tinggi dengan efisiensi biaya agar usaha Anda mendapatkan website berkelas dan infrastruktur IT stabil tanpa membebani keuangan operasional.</p>
          <a class="btn btn-primary" href="#order">Diskusikan Kebutuhan Anda <span>→</span></a>
        </div>
        <div class="why-list">
          <div class="why-item">
            <span>01</span>
            <div>
              <b>Fokus pada Hasil & Penjualan</b>
              <p>Website dirancang khusus untuk mengubah pengunjung menjadi pembeli aktif (*high conversion rate*).</p>
            </div>
          </div>
          <div class="why-item">
            <span>02</span>
            <div>
              <b>Solusi Terarah & Hemat Biaya</b>
              <p>Rekomendasi spesifikasi yang jujur, efisien, dan disesuaikan tepat dengan anggaran bisnis Anda.</p>
            </div>
          </div>
          <div class="why-item">
            <span>03</span>
            <div>
              <b>Komunikasi Transparan</b>
              <p>Ruang lingkup kerja, jadwal penyelesaian, dan rincian biaya disepakati bersama sejak awal.</p>
            </div>
          </div>
          <div class="why-item">
            <span>04</span>
            <div>
              <b>Garansi & Support Penuh</b>
              <p>Kami senantiasa mendampingi Anda setelah pengerjaan selesai dengan garansi maintenance dan bantuan teknis.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- Workflow Process --}}
    <section class="section process-section">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">ALUR KERJA MUDAH</span>
          <h2>4 Langkah Mudah Menuju <span>Website Sukses & IT Stabil</span></h2>
          <p>Transparan, cepat, dan terukur sejak hari pertama konsultasi.</p>
        </div>
        <div class="process-grid">
          <div class="process-step">
            <span class="step-number">01</span>
            <div class="step-symbol">☏</div>
            <h3>1. Konsultasi Gratis</h3>
            <p>Sampaikan kebutuhan, target bisnis, atau kendala IT yang sedang Anda hadapi.</p>
          </div>
          <div class="process-step">
            <span class="step-number">02</span>
            <div class="step-symbol">⌕</div>
            <h3>2. Penawaran & Solusi</h3>
            <p>Kami buatkan rencana kerja, estimasi waktu, serta penawaran harga termurah dan transparan.</p>
          </div>
          <div class="process-step">
            <span class="step-number">03</span>
            <div class="step-symbol">⚙</div>
            <h3>3. Pengerjaan Cepat</h3>
            <p>Website atau instalasi IT dikerjakan dengan standar mutu tinggi dan pengujian menyeluruh.</p>
          </div>
          <div class="process-step">
            <span class="step-number">04</span>
            <div class="step-symbol">✓</div>
            <h3>4. Serah Terima & Garansi</h3>
            <p>Pemeriksaan hasil bersama, serah terima akun, dan pendampingan garansi resmi.</p>
          </div>
        </div>
      </div>
    </section>

    {{-- Portfolio Section (Only rendered if portfolios exist in MySQL database) --}}
    @if(isset($portfolios) && $portfolios->isNotEmpty())
    <section class="section portfolio-section" id="portfolio">
      <div class="container">
        <div class="section-heading section-heading-row">
          <div>
            <span class="eyebrow">PORTOFOLIO & PROYEK NYATA</span>
            <h2>Hasil Karya <span>Solusi Digital, Website & IT</span></h2>
            <p>Implementasi nyata yang telah terbukti meningkatkan omset, efisiensi operasional, dan ranking 1 Google bagi para klien kami.</p>
          </div>
          <span class="sample-label">100% Terverifikasi & Aktif</span>
        </div>
        <div class="portfolio-grid">
          @foreach($portfolios as $item)
            <article class="portfolio-card">
              <div class="portfolio-thumb">
                <img src="{{ asset($item->image ?? 'assets/images/portfolio-1.webp') }}" alt="{{ $item->title }}" loading="lazy" decoding="async" width="680" height="360">
                @if(!empty($item->badge))
                  <span class="portfolio-badge">{{ $item->badge }}</span>
                @endif
              </div>
              <div class="portfolio-body">
                <span class="portfolio-category">{{ $item->category }}</span>
                <h3 class="portfolio-title">{{ $item->title }}</h3>
                <p class="portfolio-desc">{{ $item->description }}</p>
                <div class="portfolio-footer">
                  <span class="portfolio-client">📍 {{ $item->client ?? 'Klien NazwaGraha' }}</span>
                  <a class="portfolio-action" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text={{ urlencode('Halo NazwaGraha, saya tertarik konsultasi proyek seperti: ' . $item->title . ' (' . $item->category . ')') }}" target="_blank" rel="noopener">
                    Konsultasi Serupa <span>→</span>
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    {{-- Testimonials Section (Social Proof & Review Snippets) --}}
    <section class="section testimonial-section" id="testimoni">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">TESTIMONI & KISAH SUKSES KLIEN</span>
          <h2>Dipercaya Puluhan Bisnis di <span>Bogor, Ciawi & Jabodetabek</span></h2>
          <div class="rating-summary-bar">
            <span class="rating-stars">★★★★★</span>
            <span><strong>5.0 / 5.0</strong> dari 48+ Ulasan Klien Puas</span>
            <span style="color:#94a3b8">•</span>
            <span style="color:#16a34a; font-weight:700;">100% Kepuasan Terjamin</span>
          </div>
          <p>Kepuasan dan peningkatan omset bisnis Anda adalah komitmen utama kami di NazwaGraha.</p>
        </div>
        <div class="testimonial-grid">
          @foreach($testimonials as $t)
            <div class="testimonial-card">
              <div class="testimonial-header">
                <span class="testimonial-service-tag">{{ $t->service }}</span>
                <span class="testimonial-verified">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                  Terverifikasi
                </span>
              </div>
              <div class="rating-stars" style="margin-bottom: 10px;">★★★★★</div>
              <p class="testimonial-quote">“{{ $t->quote }}”</p>
              <div class="testimonial-author">
                <div class="testimonial-avatar">{{ $t->avatar }}</div>
                <div class="testimonial-info">
                  <b>{{ $t->name }}</b>
                  <span>{{ $t->role }}, {{ $t->company }}</span>
                  <div class="testimonial-location">📍 {{ $t->location }}</div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    {{-- News & SEO Articles (Only rendered if articles exist in MySQL database) --}}
    @if(isset($articles) && $articles->isNotEmpty())
    <section class="section news-section" id="news">
      <div class="container">
        <div class="section-heading centered">
          <span class="eyebrow">NEWS & EDUKASI TEKNOLOGI</span>
          <h2>Wawasan & Tips untuk <span>Kemajuan Bisnis Anda</span></h2>
          <p>Pelajari strategi digital dan manajemen IT untuk meningkatkan profitabilitas perusahaan.</p>
        </div>
        <div class="news-grid">
          @foreach($articles as $art)
            <article class="news-card">
              <a class="news-thumb-link" href="{{ !empty($art->slug) ? route('articles.show', $art->slug) : '#order' }}" aria-label="{{ $art->title }}">
                <img src="{{ asset($art->image ?? 'assets/images/article-1.webp') }}" alt="{{ $art->image_alt ?? $art->title }}" loading="lazy" decoding="async" width="600" height="360">
                <span class="news-category-badge">{{ $art->category ?? 'Umum' }}</span>
              </a>
              <div class="news-content">
                <div class="news-meta">
                  <span class="news-date">📅 {{ !empty($art->published_at) ? \Carbon\Carbon::parse($art->published_at)->translatedFormat('d M Y') : 'Terbaru' }}</span>
                  <span class="news-read-time">⏱ {{ $art->reading_time ?? '4 Menit Baca' }}</span>
                </div>
                <h3 class="news-title">
                  <a href="{{ !empty($art->slug) ? route('articles.show', $art->slug) : '#order' }}">
                    {{ $art->title }}
                  </a>
                </h3>
                <p class="news-excerpt">{{ Str::limit($art->excerpt, 120) }}</p>
                <div class="news-footer">
                  <span class="news-geo">📍 {{ $art->geo_target ?? 'Bogor & Ciawi' }}</span>
                  <a class="news-read-more" href="{{ !empty($art->slug) ? route('articles.show', $art->slug) : '#order' }}">
                    Baca Selengkapnya <span>→</span>
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>

        {{-- Section CTA Button: Jelajahi Semua Artikel --}}
        <div class="news-more-wrap">
          <a href="{{ route('articles.index') }}" class="btn btn-news-explore">
            <span>Lihat Semua Artikel & Edukasi ({{ !empty($totalArticlesCount) && $totalArticlesCount > 3 ? $totalArticlesCount . ' Artikel' : 'Lihat Semua' }})</span>
            <span class="news-arrow">→</span>
          </a>
        </div>
      </div>
    </section>
    @endif

    {{-- FAQ Section (Rich Snippets Eligible) --}}
    <section class="section faq-section" id="faq">
      <div class="container faq-grid">
        <div class="faq-intro">
          <span class="eyebrow">FAQ</span>
          <h2>Pertanyaan yang <span>Sering Ditanyakan</span></h2>
          <p>Temukan jawaban cepat atas pertanyaan seputar jasa pembuatan website murah, konsultasi IT, dan instalasi jaringan.</p>
          <a class="text-link" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20mau%20tanya%20seputar%20layanan%20IT." target="_blank" rel="noopener">
            Tanyakan langsung via WhatsApp <span>→</span>
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

    {{-- Contact CTA Banner --}}
    <section class="contact-cta" id="contact">
      <div class="container cta-inner">
        <div>
          <span class="eyebrow eyebrow-light">KONSULTASI GRATIS SEKARANG</span>
          <h2>Siap Mengembangkan Bisnis & Melejitkan Penjualan?</h2>
          <p>Ceritakan kebutuhan pembuatan website atau permasalahan IT kantor Anda. Tim NazwaGraha siap memberikan solusi terbaik dan hemat.</p>
        </div>
        <a class="btn btn-white" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20konsultasi%20layanan%20website%20dan%20IT." target="_blank" rel="noopener">
          <span class="wa-icon">◉</span> Hubungi Kami via WhatsApp
        </a>
      </div>
    </section>
  </main>

  {{-- Site Footer --}}
  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand">
        <a href="#home">
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
        <a href="#home">Home</a>
        <a href="#about">About Us</a>
        <a href="#services">Layanan Kami</a>
        <a href="#portfolio">Portofolio</a>
        <a href="#testimoni">Testimoni Klien</a>
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
  <a class="floating-wa" href="https://wa.me/62{{ ltrim($settings['whatsapp'] ?? '081298506111', '0') }}?text=Halo%20NazwaGraha%2C%20saya%20ingin%20bertanya%20tentang%20jasa%20website%20murah%20dan%20konsultan%20IT." target="_blank" rel="noopener" aria-label="Hubungi NazwaGraha melalui WhatsApp">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display:inline-block; vertical-align:middle; flex-shrink:0;"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.23 8.23 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24-1.48 0-2.93-.4-4.2-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.2 8.2 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24m4.52 11.66c-.25-.13-1.47-.72-1.7-.81-.23-.08-.39-.13-.56.13-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.13-1.06-.39-2.02-1.24a7.58 7.58 0 0 1-1.4-1.74c-.15-.25-.02-.39.11-.51.11-.11.25-.29.37-.44.13-.14.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.13-.56-1.35-.77-1.85-.2-.49-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.13.17 1.77 2.7 4.29 3.79.6.26 1.07.41 1.43.53.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.07-.11-.23-.17-.48-.29z"/></svg><b>Hubungi Kami</b>
  </a>
  <button class="back-to-top" type="button" aria-label="Kembali ke atas">↑</button>

  {{-- Deferred Scripts --}}
  <script src="{{ asset('assets/js/main.js') }}" defer></script>
</body>
</html>
