@extends('layouts.app')

@section('title', 'Jasa Pembuatan Website Perusahaan & Toko Online Profesional - NazwaGraha Pratama')
@section('meta_description', 'Jasa pembuatan website bisnis kilat di Bogor & Jabodetabek: Desain elegan, loading super cepat (skor 95+), gratis domain .COM & hosting cloud, garansi maintenance 1 tahun.')
@section('meta_keywords', 'jasa pembuatan website, jasa buat web bogor, jasa pembuatan website ciawi, jasa web company profile, jasa bikin toko online, nazwa graha pratama')

@section('preload')
<link rel="preload" as="image" href="{{ asset('images/commercial_hero_workspace.webp') }}" type="image/webp" fetchpriority="high">
@endsection

@section('content')

<!-- BREADCRUMB -->
<div class="bg-slate-100 border-b border-slate-200 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold text-slate-500 gap-2 items-center">
            <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Beranda</a>
            <span>/</span>
            <span class="text-slate-400">Layanan IT</span>
            <span>/</span>
            <span class="text-orange-600 font-bold">Pembuatan Website</span>
        </nav>
    </div>
</div>

<!-- HERO SECTION: JASA PEMBUATAN WEBSITE -->
<section class="py-14 sm:py-20 bg-gradient-to-b from-orange-50/60 via-white to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-100 border border-orange-200 text-orange-700 text-xs font-bold">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
                    <span>Layanan Unggulan NazwaGraha Pratama</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                    Jasa Pembuatan Website Bisnis <span class="text-orange-600">Mewah, Cepat &amp; Siap Jualan</span>
                </h1>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Tingkatkan kepercayaan klien dan lipatgandakan omset usaha Anda dengan website profesional. Dibuat dengan standar performa tinggi (skor Google PageSpeed 95+), optimasi SEO &amp; GEO agar nangkring di halaman 1 Google, gratis domain .COM, cloud hosting, dan tombol pemesanan WhatsApp otomatis.
                </p>

                <!-- Value Badges -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2 text-xs font-bold text-slate-700">
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Gratis Domain .COM &amp; Cloud SSD</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Garansi Maintenance 1 Tahun</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Lolos Skor Google 95+</span>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20Jasa%20Pembuatan%20Website" target="_blank" class="w-full sm:w-auto px-8 py-4 rounded-xl orange-gradient text-white font-black text-sm shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Konsultasi Pembuatan Website via WhatsApp</span>
                        <span>→</span>
                    </a>
                    <a href="#paket-harga" class="w-full sm:w-auto px-6 py-4 rounded-xl bg-white border-2 border-slate-200 hover:border-orange-500 text-slate-800 font-bold text-sm transition text-center">
                        Lihat Paket &amp; Biaya
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 relative group">
                    <img src="{{ asset('images/web_mockup_showcase.webp') }}" 
                         alt="Mockup Website NazwaGraha Pratama" 
                         width="1376" 
                         height="768" 
                         loading="eager" 
                         decoding="async" 
                         class="w-full h-auto object-cover transform group-hover:scale-102 transition duration-500">
                    <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md p-4 rounded-2xl border border-slate-200/80 shadow-lg">
                        <div class="flex items-center justify-between text-xs">
                            <span class="font-black text-slate-900">Google PageSpeed Score</span>
                            <span class="font-extrabold text-emerald-600 bg-emerald-100 px-2 py-0.5 rounded-full">98 / 100</span>
                        </div>
                        <div class="w-full bg-slate-200 h-1.5 rounded-full mt-2 overflow-hidden">
                            <div class="bg-emerald-500 h-full w-[98%]"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- JENIS WEBSITE YANG KAMI KERJAKAN -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Solusi Spesifik</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3">Jenis Website yang Siap Kami Bangun</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Dari profil usaha UMKM, toko online otomatis, hingga aplikasi sistem informasi operasional kantor berfitur lengkap.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-2xl">
                    🏢
                </div>
                <h3 class="font-black text-slate-900 text-lg">Company Profile Perusahaan</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Meningkatkan kredibilitas legalitas bisnis di mata calon investor dan klien korporat dengan tata letak profesional dan mewah.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-2xl">
                    🛒
                </div>
                <h3 class="font-black text-slate-900 text-lg">Toko Online &amp; E-Commerce</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Katalog produk elegan, manajemen stok, hitung ongkir otomatis, dan alur checkout langsung ke WhatsApp admin toko Anda.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-2xl">
                    🎯
                </div>
                <h3 class="font-black text-slate-900 text-lg">Landing Page Iklan (High-CR)</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Dirancang khusus untuk kampanye Google Ads, TikTok Ads, dan Meta Ads untuk menghasilkan rasio konversi leads tertinggi.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-2xl">
                    ⚙️
                </div>
                <h3 class="font-black text-slate-900 text-lg">Custom Web &amp; Dashboard</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Aplikasi web kustom berbasis Laravel (CRM, sistem stok, portal absensi, billing invoice, dan dashboard analitik manajemen).
                </p>
            </div>

        </div>

    </div>
</section>

<!-- STANDAR FITUR UNGGULAN -->
<section class="py-16 bg-[#F8FAFC] border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-6 space-y-5">
                <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Kualitas Tanpa Kompromi</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">
                    Mengapa Website Buatan NazwaGraha <span class="text-orange-600">Jauh Lebih Unggul?</span>
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Banyak website murah tapi lambat dan tidak mendatangkan penjualan. Di NazwaGraha Pratama, setiap baris kode dioptimalkan untuk kecepatan kilat, keamanan ketat, dan konversi order.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs">
                        <div class="text-orange-600 font-black text-sm mb-1">⚡ Super Cepat &lt; 1 Detik</div>
                        <p class="text-xs text-slate-500">Optimasi WebP dan minifikasi aset membuat pengunjung betah tanpa menunggu.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs">
                        <div class="text-orange-600 font-black text-sm mb-1">📱 100% Responsif HP</div>
                        <p class="text-xs text-slate-500">Tampilan sempurna di iPhone, Android, tablet, laptop, dan layar komputer.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs">
                        <div class="text-orange-600 font-black text-sm mb-1">🔍 Siap Ranking 1 Google</div>
                        <p class="text-xs text-slate-500">Pemasangan Schema.org lengkap dan struktur SEO On-Page yang disukai search engine.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-xs">
                        <div class="text-orange-600 font-black text-sm mb-1">🛡️ Garansi 1 Tahun Penuh</div>
                        <p class="text-xs text-slate-500">Perlindungan dari malware, backup mingguan, dan bantuan teknis gratis 24/7.</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="{{ asset('images/commercial_hero_workspace.webp') }}" 
                         alt="Tim Web Developer NazwaGraha Pratama" 
                         width="1376" 
                         height="768" 
                         loading="lazy" 
                         decoding="async" 
                         class="w-full h-auto object-cover">
                </div>
            </div>

        </div>

    </div>
</section>

<!-- PAKET HARGA WEBSITE -->
<section class="py-16 bg-white border-t border-slate-200" id="paket-harga">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Transparan &amp; Resmi</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3">Pilihan Paket Pembuatan Website</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Biaya jelas tanpa biaya tersembunyi. Sudah mencakup domain resmi, cloud hosting, dan pemeliharaan penuh.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Paket 1 -->
            <div class="rounded-3xl p-8 bg-slate-50 border border-slate-200 card-shadow flex flex-col justify-between">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-500">UMKM &amp; Bisnis Baru</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">Company Profile Pro</h3>
                    <p class="text-xs text-slate-500 mt-1">Untuk Profil Usaha, Kantor Jasa, &amp; Lembaga</p>

                    <div class="my-6">
                        <span class="text-xs text-slate-400 line-through">Rp 3.500.000</span>
                        <div class="flex items-baseline gap-1 mt-1">
                            <span class="text-3xl sm:text-4xl font-black text-slate-900">Rp 1.950.000</span>
                        </div>
                        <span class="inline-block mt-1 text-[11px] font-bold text-emerald-600 bg-emerald-100 px-2.5 py-0.5 rounded-full">Hemat 45% Bulan Ini</span>
                    </div>

                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 mb-8">
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Desain Eksklusif (1-5 Halaman)</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span><strong>Gratis Domain .COM</strong> 1 Tahun</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span><strong>Gratis Cloud Hosting SSD</strong> Cepat</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Integrasi Tombol WhatsApp</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Lolos Skor Google 90+</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Garansi Maintenance 1 Tahun</span></li>
                    </ul>
                </div>

                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha,%20saya%20mau%20order%20Paket%20Company%20Profile%20Pro" target="_blank" class="w-full py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs sm:text-sm text-center transition">
                    Pilih Paket Company Profile →
                </a>
            </div>

            <!-- Paket 2: E-Commerce (BEST SELLER) -->
            <div class="rounded-3xl p-8 bg-white border-2 border-orange-500 card-shadow flex flex-col justify-between relative transform md:-translate-y-2">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-orange-600 text-white text-[11px] font-black uppercase px-4 py-1.5 rounded-full shadow-md tracking-wider">
                    ★ BEST SELLER &amp; REKOMENDASI
                </div>

                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-orange-600">Solusi Penjualan</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">E-Commerce &amp; Katalog</h3>
                    <p class="text-xs text-slate-500 mt-1">Untuk Toko Online, Distributor &amp; Brand</p>

                    <div class="my-6">
                        <span class="text-xs text-slate-400 line-through">Rp 6.500.000</span>
                        <div class="flex items-baseline gap-1 mt-1">
                            <span class="text-sm font-bold text-slate-700">Mulai</span>
                            <span class="text-3xl sm:text-4xl font-black text-orange-600">Rp 3.850.000</span>
                        </div>
                        <span class="inline-block mt-1 text-[11px] font-bold text-emerald-600 bg-emerald-100 px-2.5 py-0.5 rounded-full">Paket Komplit Siap Jualan</span>
                    </div>

                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 mb-8">
                        <li class="flex items-center gap-2.5"><span class="text-orange-600 font-bold">✔</span> <span><strong>Semua Fitur Company Profile</strong></span></li>
                        <li class="flex items-center gap-2.5"><span class="text-orange-600 font-bold">✔</span> <span>Manajemen Produk &amp; Kategori Tanpa Batas</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-orange-600 font-bold">✔</span> <span>Keranjang Belanja &amp; Checkout WhatsApp</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-orange-600 font-bold">✔</span> <span>Integrasi Hitung Ongkir Otomatis</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-orange-600 font-bold">✔</span> <span>Optimasi SEO Google &amp; GEO AI Search</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-orange-600 font-bold">✔</span> <span>Panduan Video Penggunaan Sistem</span></li>
                    </ul>
                </div>

                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha,%20saya%20mau%20order%20Paket%20E-Commerce%20dan%20Katalog" target="_blank" class="w-full py-4 rounded-xl orange-gradient text-white font-black text-xs sm:text-sm text-center shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 transition">
                    Pesan Paket E-Commerce Sekarang →
                </a>
            </div>

            <!-- Paket 3: Custom -->
            <div class="rounded-3xl p-8 bg-slate-50 border border-slate-200 card-shadow flex flex-col justify-between">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-500">Skala Perusahaan</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1">Custom Web &amp; App</h3>
                    <p class="text-xs text-slate-500 mt-1">Sistem Informasi, Portal Berita, &amp; Web Khusus</p>

                    <div class="my-6">
                        <span class="text-xs text-slate-400">Investasi Fleksibel Sesuai Kebutuhan</span>
                        <div class="flex items-baseline gap-1 mt-1">
                            <span class="text-2xl sm:text-3xl font-black text-slate-900">Custom / Nego</span>
                        </div>
                        <span class="inline-block mt-1 text-[11px] font-bold text-blue-600 bg-blue-100 px-2.5 py-0.5 rounded-full">Proposal &amp; Demo Gratis</span>
                    </div>

                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 mb-8">
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Aplikasi Web Kustom Framework Laravel</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Multi User &amp; Role Permission Admin</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Integrasi RESTful API &amp; Payment Gateway</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Skalabilitas Cloud Server Dedicated</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Dedicated Senior Fullstack Engineer</span></li>
                    </ul>
                </div>

                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha,%20saya%20ingin%20konsultasi%20Aplikasi%20Web%20Custom" target="_blank" class="w-full py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs sm:text-sm text-center transition">
                    Konsultasikan Sistem Kustom →
                </a>
            </div>

        </div>

    </div>
</section>

<!-- BUKTI PORTOFOLIO WEBSITE TERBARU -->
<section class="py-16 bg-[#F8FAFC] border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
            <div>
                <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Hasil Karya Riil</span>
                <h2 class="text-3xl font-black text-slate-900 mt-2">Portofolio Website Terbaru</h2>
            </div>
            <a href="{{ route('gallery.index', ['kategori' => 'website']) }}" class="text-sm font-bold text-orange-600 hover:text-orange-700 transition flex items-center gap-1">
                <span>Lihat Semua Portofolio Website</span>
                <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($portfolios as $item)
            <div class="rounded-3xl overflow-hidden bg-white border border-slate-200 card-shadow flex flex-col justify-between group hover:border-orange-300 transition">
                <div>
                    <div class="relative h-48 overflow-hidden bg-slate-900">
                        <img src="{{ asset($item->image_path) }}" alt="{{ $item->title }}" width="600" height="400" loading="lazy" decoding="async" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-white/95 text-slate-900 text-[10px] font-black px-2.5 py-1 rounded-full shadow uppercase">
                            Website
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-black text-slate-900 text-base leading-snug group-hover:text-orange-600 transition mb-2">
                            {{ $item->title }}
                        </h3>
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">
                            {{ $item->description }}
                        </p>
                    </div>
                </div>
                <div class="p-5 pt-0">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha,%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($item->title) }}" target="_blank" class="block w-full py-2.5 text-center rounded-xl bg-slate-50 hover:bg-orange-500 hover:text-white text-slate-700 font-bold text-xs border border-slate-200 hover:border-orange-500 transition">
                        Pesan Proyek Serupa via WA →
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-8 text-slate-400">
                Belum ada portofolio khusus website.
            </div>
            @endforelse
        </div>

    </div>
</section>

<!-- FAQ KHUSUS PEMBUATAN WEBSITE -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-10">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Tanya Jawab</span>
            <h2 class="text-3xl font-black text-slate-900 mt-2">Pertanyaan Seputar Jasa Website</h2>
        </div>

        <div class="space-y-4">
            <details class="group bg-slate-50 rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs" open>
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>Berapa lama proses pembuatan website hingga selesai dan online?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-200">
                    Untuk Landing Page dan Company Profile, estimasi waktu adalah <strong>3 sampai 5 hari kerja</strong> setelah seluruh materi konten kami terima. Untuk Toko Online (E-Commerce) berkisar <strong>7 sampai 14 hari kerja</strong>.
                </p>
            </details>

            <details class="group bg-slate-50 rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>Apakah saya bisa memperbarui isi konten website sendiri setelah jadi?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-200">
                    Tentu saja! Setiap website yang kami buat dilengkapi panel Dashboard Admin yang sangat mudah digunakan (user-friendly) untuk mengupdate artikel, foto galeri, produk, maupun informasi kontak. Kami juga menyediakan panduan penggunaan.
                </p>
            </details>

            <details class="group bg-slate-50 rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>Apakah ada garansi jika website error atau mengalami kendala teknis?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-200">
                    Ya, kami memberikan <strong>Garansi Maintenance 1 Tahun Penuh</strong>. Tim support kami siap membantu perbaikan kendala teknis, update keamanan, dan backup berkala melalui WhatsApp di 081298506111.
                </p>
            </details>
        </div>

    </div>
</section>

<!-- CALL TO ACTION BANNER -->
<section class="py-16 orange-gradient text-white text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">
        <h2 class="text-3xl sm:text-4xl font-black">Mulai Bangun Website Impian Bisnis Anda Hari Ini</h2>
        <p class="text-sm sm:text-base text-orange-100 max-w-2xl mx-auto">
            Konsultasikan ide dan kebutuhan bisnis Anda bersama tim web developer NazwaGraha Pratama secara gratis tanpa komitmen.
        </p>
        <div class="pt-2">
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20order%20website%20sekarang" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white text-orange-600 hover:bg-orange-50 font-black text-sm sm:text-base shadow-2xl transition transform hover:scale-105">
                <span>Hubungi Kami via WhatsApp (081298506111)</span>
                <span>→</span>
            </a>
        </div>
    </div>
</section>

@push('schema')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Service",
    "serviceType": "Jasa Pembuatan Website",
    "provider": {
        "@@type": "LocalBusiness",
        "name": "NazwaGraha Pratama",
        "telephone": "081298506111",
        "email": "nazwagraha@gmail.com",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor",
            "addressLocality": "Bogor",
            "addressRegion": "Jawa Barat",
            "addressCountry": "ID"
        }
    },
    "areaServed": ["Bogor", "Ciawi", "Jakarta", "Depok", "Tangerang", "Bekasi", "Indonesia"],
    "offers": {
        "@@type": "AggregateOffer",
        "priceCurrency": "IDR",
        "lowPrice": "1950000",
        "highPrice": "6500000"
    }
}
</script>
@endpush

@endsection
