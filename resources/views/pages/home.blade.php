@extends('layouts.app')

@section('title', 'Jasa Pembuatan Website di Bogor: Desain Mewah, Cepat & Banjir Orderan - NazwaGraha Pratama')
@section('meta_description', 'Jasa pembuatan website murah, cepat & bergaransi di Bogor & Jabodetabek: Desain mewah profesional, gratis domain .COM & cloud server SSD, optimasi SEO & GEO Google ranking 1, instalasi jaringan LAN kantor.')
@section('meta_keywords', 'jasa pembuatan website bogor, jasa pembuatan website ciawi, jasa buat web perusahaan, jasa web bogor, web developer bogor, jasa pasang lan bogor, vendor it kantor, nazwa graha pratama')

@section('preload')
<link rel="preload" as="image" href="{{ asset('images/commercial_hero_workspace_mobile.webp') }}" media="(max-width: 768px)" type="image/webp" fetchpriority="high">
<link rel="preload" as="image" href="{{ asset('images/commercial_hero_workspace.webp') }}" media="(min-width: 769px)" type="image/webp" fetchpriority="high">
<link rel="preload" as="image" href="{{ asset('images/hero_device_showcase_3d.webp') }}" type="image/webp">
@endsection

@section('content')

<!-- HERO SECTION: VISUAL DEVICE SHOWCASE V2 & HIGH CONVERSION -->
<section class="pt-8 pb-14 md:pt-14 md:pb-20 bg-gradient-to-b from-orange-50/50 via-white to-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Left Column: High Conversion Headline & CTA -->
            <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
                
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-100 border border-orange-200 text-orange-800 text-xs font-extrabold">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#F58220] animate-pulse"></span>
                    <span>Jasa Website Bogor No. 1 &amp; Solusi IT Kantor</span>
                    <span class="bg-white/90 px-2 py-0.5 rounded text-[10px] text-slate-800 font-black">⭐ Rating 5.0 (250+ Ulasan)</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-5xl font-black text-slate-950 tracking-tight leading-[1.14] font-heading">
                    Jasa Pembuatan Website Murah, Profesional &amp; <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F58220] to-amber-600">IT Konsultan Terpercaya di Bogor</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed font-normal">
                    Tingkatkan omzet bisnis Anda dengan website berkecepatan tinggi, ranking 1 Google, dan infrastruktur IT jaringan kantor yang stabil tanpa kendala bersama PT Nazwa Graha Pratama.
                </p>

                <!-- Value Props Checks -->
                <div class="grid grid-cols-2 gap-3 pt-1 text-left max-w-lg mx-auto lg:mx-0">
                    <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-800">
                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0">✓</span>
                        <span>Gratis Domain .COM &amp; Cloud Server SSD</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-800">
                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0">✓</span>
                        <span>Garansi Maintenance &amp; Support 1 Tahun</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-800">
                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0">✓</span>
                        <span>Optimasi SEO Google &amp; GEO AI Overviews</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs sm:text-sm font-semibold text-slate-800">
                        <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs shrink-0">✓</span>
                        <span>Aman: Bisa Bayar Bertahap (DP Fleksibel)</span>
                    </div>
                </div>

                <!-- Dual CTA Buttons (Matching Mockup V4) -->
                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20website%20dan%20solusi%20IT" target="_blank" class="w-full sm:w-auto px-8 py-4 rounded-xl orange-gradient text-white font-black text-base shadow-xl shadow-orange-500/30 hover:shadow-orange-500/50 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-3">
                        <span>💬 Mulai Konsultasi Projek (Fast Response)</span>
                    </a>
                    
                    <a href="#harga" class="w-full sm:w-auto px-7 py-4 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-base transition flex items-center justify-center gap-2 shadow-md">
                        <span>Lihat Portofolio &amp; Harga Paket</span>
                        <span class="text-[#F58220]">↓</span>
                    </a>
                </div>

                <!-- Trust Badges & Social Proof -->
                <div class="pt-3 flex items-center justify-center lg:justify-start gap-4 text-xs text-slate-500 border-t border-slate-200">
                    <div class="flex -space-x-2 shrink-0">
                        <div class="w-7 h-7 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-[10px] font-bold text-slate-800">PT</div>
                        <div class="w-7 h-7 rounded-full bg-orange-200 border-2 border-white flex items-center justify-center text-[10px] font-bold text-slate-800">CV</div>
                        <div class="w-7 h-7 rounded-full bg-amber-200 border-2 border-white flex items-center justify-center text-[10px] font-bold text-slate-800">UD</div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="flex text-amber-500 text-xs">★★★★★</div>
                        <span class="text-slate-400">•</span>
                        <span><strong class="text-slate-900 font-extrabold">250+ Klien Terbantu</strong> di Bogor, Ciawi &amp; Jabodetabek</span>
                    </div>
                </div>

            </div>

            <!-- Right Column: 3D Visual Device Showcase (MacBook Pro + Smartphone + Floating Trust Badges) -->
            <div class="lg:col-span-6 relative">
                <div class="relative bg-slate-900 rounded-3xl p-3 sm:p-5 shadow-2xl border-4 border-white glow-orange overflow-hidden">
                    
                    <!-- Mac Window Top Bar -->
                    <div class="flex items-center justify-between pb-3 px-1 border-b border-slate-800 text-slate-400 text-xs">
                        <div class="flex gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        </div>
                        <div class="bg-slate-800 px-3.5 py-1 rounded-md text-[10px] sm:text-[11px] text-slate-300 font-mono flex items-center gap-1.5">
                            <span>🔒</span>
                            <span>https://perusahaan-klien.com</span>
                        </div>
                        <span class="text-[10px] text-emerald-400 font-bold hidden sm:inline">● LIVE DEMO</span>
                    </div>

                    <!-- 3D Showcase Image -->
                    <div class="relative rounded-2xl overflow-hidden mt-3 bg-slate-950">
                        <picture>
                            <source srcset="{{ asset('images/hero_device_showcase_3d.webp') }}" type="image/webp">
                            <img src="{{ asset('images/hero_device_showcase_3d.png') }}" 
                                 alt="Visual Showcase Website &amp; Mobile E-Commerce NazwaGraha Pratama" 
                                 width="1376" 
                                 height="768" 
                                 fetchpriority="high" 
                                 loading="eager" 
                                 decoding="async" 
                                 class="w-full h-auto object-cover transform hover:scale-102 transition duration-700">
                        </picture>
                    </div>

                    <!-- Floating Badge 1: PageSpeed 99 -->
                    <div class="absolute top-14 left-6 sm:left-8 bg-white/95 backdrop-blur-md rounded-2xl p-2.5 sm:p-3 shadow-2xl border border-slate-100 flex items-center gap-2.5 sm:gap-3">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-black text-sm sm:text-base">
                            99
                        </div>
                        <div>
                            <span class="text-[9px] sm:text-[10px] font-black text-slate-400 block uppercase tracking-wider">Google PageSpeed</span>
                            <strong class="text-xs sm:text-xs font-black text-slate-900">Loading Kilat &lt; 1 Detik</strong>
                        </div>
                    </div>

                    <!-- Floating Badge 2: Notifikasi Orderan WhatsApp -->
                    <div class="absolute bottom-6 right-6 sm:right-8 bg-white/95 backdrop-blur-md rounded-2xl p-2.5 sm:p-3 shadow-2xl border border-slate-100 flex items-center gap-2.5 sm:gap-3">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-base sm:text-lg">
                            📈
                        </div>
                        <div>
                            <span class="text-[9px] sm:text-[10px] font-black text-emerald-600 block uppercase tracking-wider">Notifikasi Penjualan</span>
                            <strong class="text-xs font-black text-slate-900">Orderan Masuk via Google</strong>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- QUICK ESTIMATION BAR (INTERAKTIF & RINGKAS DI BAWAH HERO) -->
<section class="bg-white py-6 px-4 sm:px-6 lg:px-8 border-b border-slate-200" id="estimasi-cepat">
    <div class="max-w-7xl mx-auto bg-slate-50 rounded-3xl p-5 sm:p-6 border-2 border-orange-200 card-shadow flex flex-col lg:flex-row items-center justify-between gap-5">
        <div class="space-y-1 text-center lg:text-left">
            <span class="text-[10px] font-black uppercase text-orange-600 bg-orange-100 px-2.5 py-0.5 rounded-full">Hitung Estimasi Cepat 1 Menit</span>
            <h3 class="text-base sm:text-lg font-black text-slate-900">Ingin Tahu Biaya Pembuatan Website untuk Bisnis Anda?</h3>
            <p class="text-xs text-slate-500">Pilih kebutuhan Anda dan dapatkan proposal penawaran resmi gratis langsung via WhatsApp:</p>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
            <select id="quick-calc-select" class="text-xs px-4 py-3 rounded-xl border border-slate-300 bg-white font-bold text-slate-700 focus:outline-none w-full sm:w-auto">
                <option value="Paket Company Profile Pro (Mulai Rp 1,95 Juta)">🌐 Company Profile Pro (Mulai Rp 1,95 Jt)</option>
                <option value="Paket Website Toko Online / E-Commerce (Mulai Rp 3,85 Juta)">🛒 Toko Online / E-Commerce (Mulai Rp 3,85 Jt)</option>
                <option value="Instalasi & Rapikan Kabel Jaringan LAN Kantor">🔌 Pasang / Rapikan Kabel LAN Kantor</option>
                <option value="Pengadaan Komputer Kantor & Maintenance Rutin (SLA)">💻 Pengadaan PC &amp; IT Support Kantor</option>
            </select>

            <button type="button" onclick="kirimQuickCalcWA()" class="w-full sm:w-auto px-6 py-3 rounded-xl orange-gradient text-white font-black text-xs uppercase tracking-wider shadow-md shadow-orange-500/30 flex items-center justify-center gap-2 whitespace-nowrap hover:shadow-orange-500/50 transition">
                <span>Dapatkan Estimasi via WhatsApp →</span>
            </button>
        </div>
    </div>
</section>

<!-- SOCIAL PROOF / CLIENT TRUST BAR -->
<div class="border-b border-slate-200 bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs font-black uppercase tracking-widest text-slate-400 mb-5">
            TELAH DIPERCAYA 250+ PERUSAHAAN TERNAMA, BISNIS RETAIL, UMKM &amp; INSTANSI DI INDONESIA
        </p>
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3 max-w-5xl mx-auto font-bold text-slate-700 text-xs">
            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-center gap-2">
                <span class="text-base text-orange-500">🚚</span> <span>Logistik &amp; Kargo</span>
            </div>
            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-center gap-2">
                <span class="text-base text-orange-500">👗</span> <span>Fashion &amp; Skincare</span>
            </div>
            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-center gap-2">
                <span class="text-base text-orange-500">⚖️</span> <span>Advokat &amp; Notaris</span>
            </div>
            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-center gap-2">
                <span class="text-base text-orange-500">🏭</span> <span>Distributor &amp; Pabrik</span>
            </div>
            <div class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-center gap-2 col-span-2 sm:col-span-1">
                <span class="text-base text-orange-500">🏥</span> <span>Klinik &amp; Yayasan</span>
            </div>
        </div>
    </div>
</div>

<script>
function kirimQuickCalcWA() {
    const pilihan = document.getElementById('quick-calc-select').value;
    const pesan = `Halo Tim NazwaGraha Pratama,%0A%0ASaya ingin konsultasi dan mendapatkan estimasi biaya penawaran resmi dari website:%0A• Layanan: ${encodeURIComponent(pilihan)}%0A%0AMohon informasi ketersediaan slot dan proses pengerjaannya. Terima kasih!`;
    window.open(`https://wa.me/6281298506111?text=${pesan}`, '_blank');
}
</script>

<!-- SECTION 3: VALUE PROPOSITION & PROFIL BISNIS (LOCAL SEO & GEO ALIGNMENT) -->
<section class="py-14 bg-white border-b border-slate-200" id="keunggulan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-r from-slate-900 to-[#1E2124] rounded-3xl p-6 sm:p-10 text-white shadow-2xl relative overflow-hidden mb-12">
            <!-- Background Glow Decor -->
            <div class="absolute -right-16 -top-16 w-64 h-64 bg-orange-500/15 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-3">
                    <div class="inline-flex items-center gap-2 bg-orange-500/20 text-[#F58220] px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider border border-orange-500/30">
                        📍 Profil Bisnis Resmi Google
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading tracking-tight leading-snug">
                        NazwaGraha - Jasa Pembuatan Website Bogor &amp; Solusi IT
                    </h2>
                    <p class="text-slate-300 text-xs sm:text-sm leading-relaxed max-w-3xl">
                        PT Nazwa Graha Pratama merupakan partner resmi rekayasa website dan infrastruktur IT yang berbasis di Banjarwangi, Ciawi, Bogor. Kami memadukan website kencang, strategi SEO lokal, Generative Engine Optimization (GEO AI Overviews), dan instalasi hardware jaringan kantor on-site.
                    </p>
                </div>
                <div class="lg:col-span-4 bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 text-center space-y-2">
                    <div class="text-3xl font-black text-amber-400 font-heading">5.0 / 5.0</div>
                    <div class="flex justify-center text-amber-400 text-sm">★★★★★</div>
                    <p class="text-xs font-bold text-white">Google Bisnis Profile Verified</p>
                    <p class="text-[11px] text-slate-300">250+ Ulasan Positif Pemilik Bisnis &amp; Korporat</p>
                </div>
            </div>
        </div>

        <!-- 3 Poin Keunggulan Utama (Why Choose Us) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="p-6 rounded-2xl bg-[#FAFAFA] border border-slate-200 card-shadow space-y-3 hover:border-orange-300 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#F58220] flex items-center justify-center text-2xl font-black">
                    💰
                </div>
                <h3 class="text-lg font-black text-slate-900 font-heading">Harga Transparan &amp; Terjangkau</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Solusi ramah untuk UMKM mulai Rp 1.250.000 hingga sistem korporat. Tanpa biaya tersembunyi, sudah termasuk hosting SSD cepat dan domain resmi.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-[#FAFAFA] border border-slate-200 card-shadow space-y-3 hover:border-orange-300 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#F58220] flex items-center justify-center text-2xl font-black">
                    📈
                </div>
                <h3 class="text-lg font-black text-slate-900 font-heading">Terbukti Naik ke Halaman 1 Google &amp; GEO</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Struktur kode dirancang agar mendominasi Google Search Bogor serta direkomendasikan oleh mesin AI (ChatGPT &amp; Google AI Overviews).
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-[#FAFAFA] border border-slate-200 card-shadow space-y-3 hover:border-orange-300 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#F58220] flex items-center justify-center text-2xl font-black">
                    ⚡
                </div>
                <h3 class="text-lg font-black text-slate-900 font-heading">Full-Stack Hardware &amp; Software</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                    Bukan cuma bikin web, kami menguasai setting Mikrotik, instalasi kabel LAN rapi, dan pengadaan PC/server kantor langsung ke lokasi Anda.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- SECTION 4: 6 PILAR LAYANAN UNGGULAN (SERVICES GRID) -->
<section class="py-16 bg-[#FAFAFA] border-b border-slate-200" id="layanan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-[#F58220] font-black text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full font-heading">
                6 Pilar Layanan Unggulan
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3 font-heading">
                Solusi IT Menyeluruh untuk Pertumbuhan Bisnis Anda
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Tidak perlu mencari vendor terpisah. Dari rekayasa website penjualan, SEO, hingga penataan jaringan kantor ditangani dalam satu atap profesional.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Card 1: Jasa Pembuatan Website Murah & Berkelas -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 hover:border-orange-300 card-shadow flex flex-col justify-between group transition">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl orange-gradient text-white flex items-center justify-center text-2xl shadow-md shadow-orange-500/20 group-hover:scale-105 transition-transform">
                        🌐
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-slate-900 font-heading group-hover:text-[#F58220] transition">
                            Jasa Pembuatan Website Murah &amp; Berkelas
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            Landing page, Company Profile perusahaan, Web E-Commerce, dan Toko Online terintegrasi checkout WhatsApp.
                        </p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Desain Mewah &amp; Responsif Mobile-First</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Gratis Domain .COM &amp; Cloud Server SSD</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Kecepatan Loading di Bawah 1 Detik</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20tertarik%20dengan%20Jasa%20Pembuatan%20Website" target="_blank" class="w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#F58220] text-white font-bold text-xs flex items-center justify-center gap-1.5 transition shadow-sm">
                        <span>Pesan Layanan Website →</span>
                    </a>
                </div>
            </div>

            <!-- Card 2: IT Konsultan & Solusi Bisnis -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 hover:border-orange-300 card-shadow flex flex-col justify-between group transition">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center text-2xl shadow-md group-hover:scale-105 transition-transform">
                        💼
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-slate-900 font-heading group-hover:text-[#F58220] transition">
                            IT Konsultan &amp; Solusi Bisnis
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            Audit sistem, arsitektur aplikasi, efisiensi operasional IT, dan transformasi digital menyeluruh.
                        </p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Analisis Alur Kerja &amp; Efisiensi Biaya</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Arsitektur Database &amp; Cloud Scalable</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Pendampingan Implementasi Sistem</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20butuh%20layanan%20IT%20Konsultan" target="_blank" class="w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#F58220] text-white font-bold text-xs flex items-center justify-center gap-1.5 transition shadow-sm">
                        <span>Pesan Layanan Konsultasi →</span>
                    </a>
                </div>
            </div>

            <!-- Card 3: Jasa Pengadaan Komputer & Perangkat Kantor -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 hover:border-orange-300 card-shadow flex flex-col justify-between group transition">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-[#F58220] flex items-center justify-center text-2xl group-hover:scale-105 transition-transform">
                        💻
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-slate-900 font-heading group-hover:text-[#F58220] transition">
                            Jasa Pengadaan Komputer &amp; Perangkat Kantor
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            Penyediaan PC Kantor, Workstation, Server, Laptop bisnis, printer, dan aksesoris bergaransi resmi.
                        </p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Unit Baru Bergaransi Distributor Resmi</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Siap Rakit &amp; Install Software Siap Pakai</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Pengiriman &amp; Setup On-site di Lokasi</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20butuh%20Pengadaan%20Komputer%20Kantor" target="_blank" class="w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#F58220] text-white font-bold text-xs flex items-center justify-center gap-1.5 transition shadow-sm">
                        <span>Pesan Pengadaan PC →</span>
                    </a>
                </div>
            </div>

            <!-- Card 4: Instalasi Jaringan & Network Security -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 hover:border-orange-300 card-shadow flex flex-col justify-between group transition">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-800 flex items-center justify-center text-2xl group-hover:scale-105 transition-transform">
                        🔌
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-slate-900 font-heading group-hover:text-[#F58220] transition">
                            Instalasi Jaringan &amp; Network Security
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            Setting Mikrotik, Switch, Router, File Server, NAS Synology/OMV, serta penataan kabel LAN &amp; WiFi kantor.
                        </p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Manajemen Bandwidth Bebas Lemot</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Penataan Rack Server Rapi &amp; Standar Industri</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Proteksi Firewall &amp; Keamanan Data</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20butuh%20Instalasi%20Jaringan%20LAN%20Mikrotik" target="_blank" class="w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#F58220] text-white font-bold text-xs flex items-center justify-center gap-1.5 transition shadow-sm">
                        <span>Pesan Pemasangan LAN →</span>
                    </a>
                </div>
            </div>

            <!-- Card 5: Instalasi & Troubleshooting Hardware/Software -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 hover:border-orange-300 card-shadow flex flex-col justify-between group transition">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-[#F58220] flex items-center justify-center text-2xl group-hover:scale-105 transition-transform">
                        🛠️
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-slate-900 font-heading group-hover:text-[#F58220] transition">
                            Instalasi &amp; Troubleshooting Hardware/Software
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            Maintenance rutin, perbaikan PC/laptop, instalasi OS resmi, dan sistem backup data anti-hilang.
                        </p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Penanganan Cepat Komputer Lemot &amp; Virus</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Kontrak Pemeliharaan Rutin Bulanan (SLA)</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Backup Otomatis &amp; Pemulihan Data</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20butuh%20Maintenance%20dan%20Servis%20IT" target="_blank" class="w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#F58220] text-white font-bold text-xs flex items-center justify-center gap-1.5 transition shadow-sm">
                        <span>Pesan Servis &amp; Maintenance →</span>
                    </a>
                </div>
            </div>

            <!-- Card 6: Jasa SEO & GEO -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 hover:border-orange-300 card-shadow flex flex-col justify-between group transition">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl orange-gradient text-white flex items-center justify-center text-2xl shadow-md shadow-orange-500/20 group-hover:scale-105 transition-transform">
                        🚀
                    </div>
                    <div>
                        <h3 class="text-lg font-black text-slate-900 font-heading group-hover:text-[#F58220] transition">
                            Jasa SEO &amp; GEO (Generative Engine Optimization)
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            Optimasi mesin pencari generasi baru agar direkomendasikan ChatGPT &amp; Google AI Overviews.
                        </p>
                    </div>
                    <ul class="space-y-2 text-xs text-slate-600 pt-2 border-t border-slate-100">
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Riset Keyword Komersial Berkonversi Tinggi</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Schema.org JSON-LD &amp; GEO AI Citation</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-500 font-bold">✓</span> Banjir Orderan Organik Berkelanjutan</li>
                    </ul>
                </div>
                <div class="pt-6">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20tertarik%20dengan%20Jasa%20SEO%20dan%20GEO" target="_blank" class="w-full py-2.5 rounded-xl orange-gradient text-white font-bold text-xs flex items-center justify-center gap-1.5 transition shadow-md shadow-orange-500/20">
                        <span>Pesan Optimasi SEO &amp; GEO →</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- PORTOFOLIO SHOWCASE (BUKTI NYATA WEBSITE & IT - INPUT DARI DATABASE/BACKOFFICE) -->
<section class="py-16 bg-[#F8FAFC] border-t border-slate-200" id="portofolio">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-10">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Portofolio & Bukti Hasil</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3">Bukti Nyata Karya & Kepuasan Klien Kami</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Dokumentasi riil pengerjaan website berkinerja tinggi, instalasi kabel jaringan server kantor rapi, dan pengadaan hardware terpercaya.
            </p>

            <!-- Filter Kategori Cepat (Interaktif) -->
            <div class="mt-6 flex flex-wrap items-center justify-center gap-2">
                <button type="button" onclick="filterHomePortofolio('all')" id="home-port-tab-all" class="px-4 py-2 rounded-xl text-xs font-bold transition orange-gradient text-white shadow-md">
                    Semua Portofolio
                </button>
                <button type="button" onclick="filterHomePortofolio('website')" id="home-port-tab-website" class="px-4 py-2 rounded-xl text-xs font-bold transition bg-white border border-slate-200 text-slate-700 hover:border-orange-300">
                    🌐 Website & App
                </button>
                <button type="button" onclick="filterHomePortofolio('jaringan')" id="home-port-tab-jaringan" class="px-4 py-2 rounded-xl text-xs font-bold transition bg-white border border-slate-200 text-slate-700 hover:border-orange-300">
                    🔌 Jaringan LAN
                </button>
                <button type="button" onclick="filterHomePortofolio('hardware')" id="home-port-tab-hardware" class="px-4 py-2 rounded-xl text-xs font-bold transition bg-white border border-slate-200 text-slate-700 hover:border-orange-300">
                    💻 Hardware IT
                </button>
            </div>
        </div>

        <!-- GRID PORTOFOLIO DINAMIS (DARI DATABASE BACKOFFICE) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            @forelse($galleries as $gallery)
            <div class="home-port-card item-{{ $gallery->category }} rounded-3xl overflow-hidden bg-white border border-slate-200 hover:border-orange-300 card-shadow flex flex-col justify-between group transition duration-300">
                <div>
                    <!-- Thumbnail Container -->
                    <div class="relative h-52 overflow-hidden bg-slate-900">
                        <img src="{{ asset($gallery->image_path) }}" 
                             alt="{{ $gallery->title }}" 
                             width="600" 
                             height="400" 
                             loading="lazy" 
                             decoding="async" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-md text-slate-900 text-[10px] font-black px-3 py-1 rounded-full shadow-sm uppercase tracking-wider">
                            {{ $galleryCategories[$gallery->category] ?? ucfirst($gallery->category) }}
                        </span>
                    </div>

                    <!-- Details -->
                    <div class="p-6">
                        <h3 class="font-black text-slate-900 text-base leading-snug mb-2 group-hover:text-orange-600 transition">
                            {{ $gallery->title }}
                        </h3>
                        @if($gallery->description)
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                            {{ $gallery->description }}
                        </p>
                        @endif
                    </div>
                </div>

                <!-- Action Button ke WhatsApp -->
                <div class="p-6 pt-0">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($gallery->title) }}%20dan%20ingin%20konsultasi" target="_blank" class="block w-full py-2.5 text-center rounded-xl bg-slate-50 hover:bg-orange-500 hover:text-white text-slate-700 font-bold text-xs border border-slate-200 hover:border-orange-500 transition">
                        Pesan Proyek Serupa via WhatsApp →
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-12 bg-white rounded-3xl border border-slate-200 p-8">
                <p class="text-slate-500 text-sm">Belum ada portofolio yang ditampilkan di beranda.</p>
            </div>
            @endforelse
        </div>

        <!-- Tombol Tautan ke Galeri Lengkap -->
        <div class="text-center pt-2">
            <a href="{{ route('gallery.index') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs sm:text-sm font-bold shadow-md transition">
                <span>Lihat Seluruh Galeri Foto Dokumentasi Proyek</span>
                <span>→</span>
            </a>
            <p class="text-[11px] text-slate-400 mt-2">
                *Foto-foto portofolio di atas dikelola langsung melalui Backoffice Admin.
            </p>
        </div>

        <!-- Custom Inspiration CTA Box (Pemicu Orderan Kustom) -->
        <div class="max-w-5xl mx-auto mt-10 bg-white rounded-3xl p-6 sm:p-7 border-2 border-orange-200 flex flex-col sm:flex-row items-center justify-between gap-5 card-shadow">
            <div class="flex items-center gap-4 text-center sm:text-left">
                <span class="text-3xl sm:text-4xl">💡</span>
                <div>
                    <h4 class="text-sm sm:text-base font-black text-slate-900">Punya Referensi Desain Website Sendiri?</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Kirimkan link contoh website impian Anda ke WhatsApp kami, tim NazwaGraha siap membuatkan persis sesuai kebutuhan bisnis Anda!</p>
                </div>
            </div>
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20punya%20referensi%20desain%20website%20sendiri%20dan%20ingin%20konsultasi" target="_blank" class="px-6 py-3.5 rounded-xl orange-gradient text-white font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-orange-500/30 transition whitespace-nowrap">
                Kirim Referensi Desain →
            </a>
        </div>

    </div>
</section>

<!-- Script Filter Kategori Portofolio Beranda -->
<script>
    function filterHomePortofolio(category) {
        const cards = document.querySelectorAll('.home-port-card');
        const categories = ['all', 'website', 'jaringan', 'hardware'];

        // Reset styling tombol tab
        categories.forEach(cat => {
            const btn = document.getElementById('home-port-tab-' + cat);
            if (btn) {
                btn.className = "px-4 py-2 rounded-xl text-xs font-bold transition bg-white border border-slate-200 text-slate-700 hover:border-orange-300";
            }
        });

        // Aktifkan tab yang dipilih
        const activeBtn = document.getElementById('home-port-tab-' + category);
        if (activeBtn) {
            activeBtn.className = "px-4 py-2 rounded-xl text-xs font-bold transition orange-gradient text-white shadow-md";
        }

        // Tampilkan/Sembunyikan kartu proyek
        cards.forEach(card => {
            if (category === 'all') {
                card.style.display = 'flex';
            } else if (card.classList.contains('item-' + category)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<!-- TABEL PAKET HARGA TRANSPARAN (KUNCI BANJIR ORDERAN!) -->
<section class="py-16 bg-white border-t border-slate-200" id="harga">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-[#F58220] font-black text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full font-heading">
                Paket Harga Transparan
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3 font-heading">
                Investasi Terbaik untuk Melejitkan Omzet Bisnis Anda
            </h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Tanpa biaya tersembunyi. Semua paket sudah termasuk domain .COM, Cloud Server SSD super kencang, dan garansi maintenance penuh.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Paket 1: Web Starter / UMKM -->
            <div class="rounded-3xl p-8 bg-[#FAFAFA] border border-slate-200 card-shadow flex flex-col justify-between">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-500 font-heading">Paling Terjangkau</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1 font-heading">Web Starter / UMKM</h3>
                    <p class="text-xs text-slate-500 mt-1">Solusi Jasa Pembuatan Website Murah &amp; Kilat</p>

                    <div class="my-6">
                        <span class="text-xs text-slate-400 line-through">Rp 2.500.000</span>
                        <div class="flex items-baseline gap-1 mt-1">
                            <span class="text-sm font-bold text-slate-700">Mulai</span>
                            <span class="text-3xl sm:text-4xl font-black text-slate-900 font-heading">Rp 1.250.000</span>
                        </div>
                        <span class="inline-block mt-1 text-[11px] font-bold text-emerald-600 bg-emerald-100 px-2.5 py-0.5 rounded-full">Hemat 50% Bulan Ini</span>
                    </div>

                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 mb-8">
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Desain Modern Mobile-First (1 Halaman Landing Page)</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span><strong>Gratis Domain .COM / .ID</strong> 1 Tahun</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span><strong>Cloud Hosting SSD Cepat &amp; SSL HTTPS</strong></span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Integrasi Tombol WhatsApp Otomatis</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Setup Google Bisnis Profile (Maps)</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Garansi Penuh Maintenance</span></li>
                    </ul>
                </div>

                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20mau%20order%20Paket%20Web%20Starter%20UMKM" target="_blank" class="w-full py-3.5 rounded-xl bg-slate-900 hover:bg-[#F58220] text-white font-bold text-xs sm:text-sm text-center transition shadow-md">
                    Pilih Paket Starter UMKM →
                </a>
            </div>

            <!-- Paket 2: Web Bisnis Pro & SEO Booster (BEST SELLER) -->
            <div class="rounded-3xl p-8 bg-white border-2 border-[#F58220] card-shadow flex flex-col justify-between relative transform md:-translate-y-2 shadow-xl">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 orange-gradient text-white text-[11px] font-black uppercase px-4 py-1.5 rounded-full shadow-md tracking-wider whitespace-nowrap font-heading">
                    ★ PALING POPULER &amp; REKOMENDASI UTAMA
                </div>

                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-[#F58220] font-heading">Mesin Penjualan</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1 font-heading">Web Bisnis Pro &amp; SEO Booster</h3>
                    <p class="text-xs text-slate-500 mt-1">Untuk Toko Online, Distributor, &amp; Company Profile</p>

                    <div class="my-6">
                        <span class="text-xs text-slate-400 line-through">Rp 5.500.000</span>
                        <div class="flex items-baseline gap-1 mt-1">
                            <span class="text-sm font-bold text-slate-700">Mulai</span>
                            <span class="text-3xl sm:text-4xl font-black text-[#F58220] font-heading">Rp 2.750.000</span>
                        </div>
                        <span class="inline-block mt-1 text-[11px] font-bold text-emerald-600 bg-emerald-100 px-2.5 py-0.5 rounded-full">Paket Komplit Siap Banjir Order</span>
                    </div>

                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 mb-8">
                        <li class="flex items-center gap-2.5"><span class="text-[#F58220] font-bold">✔</span> <span><strong>Semua Fitur Paket Starter</strong></span></li>
                        <li class="flex items-center gap-2.5"><span class="text-[#F58220] font-bold">✔</span> <span>Multi-halaman Eksklusif (Hingga 5-10 Halaman)</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-[#F58220] font-bold">✔</span> <span>Katalog Produk &amp; Checkout Otomatis WhatsApp</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-[#F58220] font-bold">✔</span> <span><strong>Optimasi SEO On-Page Ranking 1 Google</strong></span></li>
                        <li class="flex items-center gap-2.5"><span class="text-[#F58220] font-bold">✔</span> <span><strong>Optimasi GEO AI Search (ChatGPT/Gemini)</strong></span></li>
                        <li class="flex items-center gap-2.5"><span class="text-[#F58220] font-bold">✔</span> <span>Prioritas Dukungan Teknis 24/7 (1 Tahun)</span></li>
                    </ul>
                </div>

                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20mau%20order%20Paket%20Web%20Bisnis%20Pro" target="_blank" class="w-full py-4 rounded-xl orange-gradient text-white font-black text-xs sm:text-sm text-center shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 transition">
                    Pesan Paket Bisnis Pro Sekarang →
                </a>
            </div>

            <!-- Paket 3: Enterprise & Retainer IT Konsultan -->
            <div class="rounded-3xl p-8 bg-[#FAFAFA] border border-slate-200 card-shadow flex flex-col justify-between">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-slate-500 font-heading">Skala Korporat</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-1 font-heading">Enterprise &amp; Retainer IT</h3>
                    <p class="text-xs text-slate-500 mt-1">Maintenance Jaringan, Hardware &amp; Sistem Bulanan</p>

                    <div class="my-6">
                        <span class="text-xs text-slate-400">Kontrak Pemeliharaan Rutin Kantor (SLA)</span>
                        <div class="flex items-baseline gap-1 mt-1">
                            <span class="text-sm font-bold text-slate-700">Mulai</span>
                            <span class="text-3xl sm:text-4xl font-black text-slate-900 font-heading">Rp 4.500.000</span>
                        </div>
                        <span class="inline-block mt-1 text-[11px] font-bold text-blue-600 bg-blue-100 px-2.5 py-0.5 rounded-full">Survey &amp; Proposal Gratis</span>
                    </div>

                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700 mb-8">
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Aplikasi Web Kustom (ERP/Dashboard/Portal)</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Instalasi &amp; Setting Jaringan LAN/Mikrotik</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Pengadaan PC &amp; Servis Hardware On-Site</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Kontrak Maintenance Bulanan Resmi (SLA)</span></li>
                        <li class="flex items-center gap-2.5"><span class="text-emerald-500 font-bold">✔</span> <span>Dedicated Senior IT Engineer Siap Panggilan</span></li>
                    </ul>
                </div>

                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20Paket%20Enterprise%20dan%20Retainer%20IT" target="_blank" class="w-full py-3.5 rounded-xl bg-slate-900 hover:bg-[#F58220] text-white font-bold text-xs sm:text-sm text-center transition shadow-md">
                    Konsultasikan Kebutuhan Korporat →
                </a>
            </div>

        </div>

    </div>
</section>

<!-- SECTION JARINGAN LAN & HARDWARE (REAL SERVER IMAGE) -->
<section class="py-16 bg-[#F8FAFC] border-t border-slate-200" id="jaringan-lan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-6 space-y-5">
                <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Infrastruktur & Hardware</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">
                    Kabel LAN Semrawut & Wi-Fi Sering Putus? <span class="text-orange-600">Kami Rapikan Total!</span>
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Jangan biarkan internet lambat mengganggu produktivitas kantor. Tim teknisi NazwaGraha Pratama siap datang langsung ke kantor Anda untuk instalasi kabel Cat6 rapi, setting router Mikrotik anti-lag, setup server lokal, dan pengadaan PC baru.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                        <div class="text-orange-600 font-black text-base mb-1">🔌 Instalasi LAN Rapi</div>
                        <p class="text-xs text-slate-500">Penataan kabel Cat6 terstruktur pada patch panel & server rack.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                        <div class="text-orange-600 font-black text-base mb-1">💻 Pengadaan Hardware</div>
                        <p class="text-xs text-slate-500">PC, laptop kerja, printer, dan UPS kantor bergaransi resmi.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                        <div class="text-orange-600 font-black text-base mb-1">⚡ Service Troubleshooting</div>
                        <p class="text-xs text-slate-500">Solusi kilat PC lemot, infeksi malware, & recovery data.</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                        <div class="text-orange-600 font-black text-base mb-1">📋 Kontrak Servis (SLA)</div>
                        <p class="text-xs text-slate-500">Perawatan rutin bulanan tanpa perlu menggaji IT in-house.</p>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha,%20saya%20butuh%20survey%20jaringan%20LAN%20atau%20pengadaan%20hardware" target="_blank" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl orange-gradient text-white text-xs sm:text-sm font-bold shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 transition">
                        <span>Undang Teknisi Survey Lokasi Kantor</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <picture>
                        <source srcset="{{ asset('images/lan_server_infrastructure.webp') }}" type="image/webp">
                        <img src="{{ asset('images/lan_server_infrastructure.jpg') }}" 
                             alt="Teknisi Jaringan & Server Rack NazwaGraha Pratama" 
                             width="1376" 
                             height="768" 
                             loading="lazy" 
                             decoding="async" 
                             class="w-full h-auto object-cover">
                    </picture>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- KALKULATOR INTERAKTIF ESTIMASI KEBUTUHAN (LEAD MAGNET KE WHATSAPP) -->
<section class="py-16 bg-white border-t border-slate-200" id="kalkulator">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl p-6 sm:p-10 bg-slate-50 border-2 border-orange-200 shadow-xl relative">
            
            <div class="text-center max-w-xl mx-auto mb-8">
                <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-600 font-extrabold text-xs uppercase tracking-wider">Hitung Cepat 1 Menit</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 mt-2">Simulasi Kebutuhan & Estimasi Proyek Anda</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Pilih kebutuhan Anda di bawah ini, pesan resmi penawaran harga akan otomatis terisi siap dikirim via WhatsApp!
                </p>
            </div>

            <div class="space-y-6">
                
                <!-- Category Choice -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">1. Pilih Kategori Solusi:</label>
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" onclick="setKalkulatorTab('web')" id="calc-tab-web" class="p-4 rounded-xl border-2 border-orange-500 bg-orange-50 text-orange-700 font-bold text-xs sm:text-sm flex items-center justify-center gap-2 transition">
                            <span>🌐 Website & SEO Growth</span>
                        </button>
                        <button type="button" onclick="setKalkulatorTab('it')" id="calc-tab-it" class="p-4 rounded-xl border-2 border-slate-200 bg-white text-slate-600 font-bold text-xs sm:text-sm flex items-center justify-center gap-2 hover:border-slate-300 transition">
                            <span>🛠️ LAN & Hardware IT Kantor</span>
                        </button>
                    </div>
                </div>

                <!-- Sub-options Web -->
                <div id="calc-sub-web" class="space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">2. Pilih Jenis Website / Layanan:</label>
                    <select id="calc-select-web" class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-800 focus:outline-none focus:border-orange-500">
                        <option value="Paket Company Profile Pro (Landing Page Cepat + Free Domain .COM + Hosting)">Website Profil Perusahaan (Company Profile Cepat + Free Domain .COM)</option>
                        <option value="Paket Website Toko Online / E-Commerce Lengkap Keranjang & Ongkir">Website Toko Online (E-Commerce Lengkap Keranjang & Ongkir)</option>
                        <option value="Aplikasi Web Kustom / Sistem Informasi & Dashboard Operasional">Aplikasi Web Kustom / Sistem Informasi Operasional Bisnis</option>
                        <option value="Optimasi SEO & GEO Khusus (Dominasi Halaman 1 Google & AI Search)">Optimasi SEO & GEO Khusus (Ranking 1 Google & AI Search)</option>
                        <option value="Maintenance & Pemeliharaan Keamanan Website Rutin">Maintenance & Pemeliharaan Keamanan Website Rutin</option>
                    </select>
                </div>

                <!-- Sub-options IT -->
                <div id="calc-sub-it" class="space-y-2 hidden">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">2. Pilih Lingkup Layanan IT & Jaringan:</label>
                    <select id="calc-select-it" class="w-full bg-white border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-800 focus:outline-none focus:border-orange-500">
                        <option value="Instalasi & Penataan Jaringan LAN Kantor Baru (Kabel Cat6 + Router Mikrotik)">Instalasi & Penataan Jaringan LAN Kantor Baru (Kabel Cat6 + Mikrotik)</option>
                        <option value="Pengadaan Komputer, Laptop Kerja, Printer & Peralatan Kantor">Pengadaan Komputer, Laptop Kerja, Printer & Peralatan Kantor</option>
                        <option value="Troubleshooting / Perbaikan Komputer & Jaringan Kantor Bermasalah">Troubleshooting / Perbaikan Komputer & Jaringan Kantor Bermasalah</option>
                        <option value="Kontrak Servis Rutin Pemeliharaan IT Kantor Bulanan (SLA)">Kontrak Servis Rutin Pemeliharaan IT Kantor Bulanan (SLA)</option>
                    </select>
                </div>

                <!-- Scale Option -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">3. Skala Usaha / Kebutuhan:</label>
                    <div class="grid grid-cols-3 gap-2 text-center text-xs">
                        <label class="cursor-pointer">
                            <input type="radio" name="calc_scale" value="UMKM / Bisnis Baru" checked class="peer sr-only">
                            <div class="p-3 rounded-xl bg-white border border-slate-200 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 font-bold transition">
                                UMKM / Bisnis Baru
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="calc_scale" value="Kantor Menengah (10 - 40 Karyawan)" class="peer sr-only">
                            <div class="p-3 rounded-xl bg-white border border-slate-200 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 font-bold transition">
                                Kantor Menengah
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="calc_scale" value="Korporat / Pabrik / Skala Besar" class="peer sr-only">
                            <div class="p-3 rounded-xl bg-white border border-slate-200 peer-checked:border-orange-500 peer-checked:bg-orange-50 peer-checked:text-orange-700 font-bold transition">
                                Korporat / Besar
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Submit WhatsApp Button -->
                <div class="pt-2">
                    <button type="button" onclick="kirimSimulasiWA()" class="w-full py-4 rounded-xl orange-gradient text-white font-black text-sm sm:text-base shadow-xl shadow-orange-500/30 hover:shadow-orange-500/50 transition flex items-center justify-center gap-2 transform active:scale-95">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.19.014.305-.058.115-.087.187-.173.289l-.26.309c-.087.094-.179.196-.077.371.101.174.45 1.743 1.95 2.072.193.042.361.026.495-.038.159-.076.694-.808.88-1.084.188-.276.375-.231.625-.138.25.092 1.587.748 1.86.885.274.137.456.205.522.319.066.114.066.662-.078 1.067z"/></svg>
                        <span>Dapatkan Estimasi Biaya via WhatsApp NazwaGraha</span>
                    </button>
                    <p class="text-center text-[11px] text-slate-500 mt-2">
                        🔒 Konsultasi dan estimasi biaya 100% gratis tanpa komitmen.
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- SECTION: ARTIKEL & EDUKASI TERBARU (MEMBANGUN OTORITAS SEO & GEO) -->
<section class="py-16 bg-[#F8FAFC] border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
            <div>
                <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Wawasan & Tips IT</span>
                <h2 class="text-3xl font-black text-slate-900 mt-2">Artikel Terkini Seputar Website & Teknologi</h2>
            </div>
            <a href="{{ route('articles.index') }}" class="text-sm font-bold text-orange-600 hover:text-orange-700 transition flex items-center gap-1">
                <span>Lihat Semua Artikel</span>
                <span>→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <div class="rounded-2xl overflow-hidden bg-white border border-slate-200 card-shadow flex flex-col justify-between">
                <div>
                    <a href="{{ route('articles.show', $article->slug) }}" class="block relative h-48 overflow-hidden">
                        <img src="{{ asset($article->featured_image ?? 'images/portfolio_web_collection.webp') }}" alt="{{ $article->title }}" width="600" height="400" loading="lazy" decoding="async" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-white/95 text-slate-900 text-[10px] font-bold px-2.5 py-1 rounded-full shadow">
                            {{ $article->category->name }}
                        </span>
                    </a>
                    <div class="p-6">
                        <div class="text-[11px] text-slate-400 mb-2">
                            {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : $article->created_at->translatedFormat('d F Y') }} • 👁️ {{ $article->views }} views
                        </div>
                        <h3 class="font-bold text-slate-900 text-base leading-snug hover:text-orange-600 transition mb-2">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-2 border-t border-slate-100">
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-bold text-orange-600 hover:underline flex items-center gap-1">
                        <span>Baca Selengkapnya</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-8 text-slate-400">
                Belum ada artikel terbaru.
            </div>
            @endforelse
        </div>

    </div>
</section>

<!-- SECTION TESTIMONI ASLI -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Testimoni Klien</span>
            <h2 class="text-3xl font-black text-slate-900 mt-3">Dipercaya oleh Bisnis yang Terus Bertumbuh</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 card-shadow space-y-3">
                <div class="text-amber-500 text-sm">★★★★★</div>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic">
                    "Website company profile kami selesai hanya dalam 4 hari! Loadingnya luar biasa cepat, dan dalam 2 minggu sudah mulai masuk leads dari Google. Tim NazwaGraha sangat komunikatif."
                </p>
                <div class="pt-2 border-t border-slate-200">
                    <strong class="block text-xs font-bold text-slate-900">Bpk. Hendra Gunawan</strong>
                    <span class="text-[11px] text-slate-500">Direktur PT. Samudera Logistik Prima</span>
                </div>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 card-shadow space-y-3">
                <div class="text-amber-500 text-sm">★★★★★</div>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic">
                    "Kantor kami pindah gedung dan butuh instalasi 35 titik LAN mendesak. NazwaGraha mengirim teknisi dalam 2 jam, kabel server sangat rapi, dan internet kantor stabil tanpa kendala."
                </p>
                <div class="pt-2 border-t border-slate-200">
                    <strong class="block text-xs font-bold text-slate-900">Ibu Maya Anggraini</strong>
                    <span class="text-[11px] text-slate-500">General Affair & HR Manager</span>
                </div>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 card-shadow space-y-3">
                <div class="text-amber-500 text-sm">★★★★★</div>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic">
                    "Jasa SEO & GEO mereka terbukti ampuh. Saat calon pembeli mencari produk kami di Google dan ChatGPT, nama toko online kami langsung muncul di rekomendasi teratas!"
                </p>
                <div class="pt-2 border-t border-slate-200">
                    <strong class="block text-xs font-bold text-slate-900">Rian Pratama</strong>
                    <span class="text-[11px] text-slate-500">Founder & Owner Brand Retail</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- SECTION FAQ (FREQUENTLY ASKED QUESTIONS) - KUNCI UTAMA RANKING 1 GOOGLE & GEO AI CITATION -->
<section class="py-16 bg-slate-50/70 border-t border-slate-200" id="faq">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Tanya Jawab Seputar Layanan</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3">Pertanyaan yang Sering Diajukan (FAQ)</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Jawaban lengkap seputar biaya, proses pengerjaan website, instalasi jaringan LAN kantor, serta garansi resmi NazwaGraha Pratama.
            </p>
        </div>

        <div class="space-y-4">
            
            <details class="group bg-white rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs" open>
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>1. Berapa biaya jasa pembuatan website di NazwaGraha Pratama?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-100">
                    Biaya jasa pembuatan website di <strong>NazwaGraha Pratama</strong> mulai dari <strong>Rp 1.250.000</strong> untuk paket Landing Page dan Web Bisnis Kilat. Biaya ini sudah mencakup <strong>GRATIS Domain (.COM/Web.id)</strong>, Cloud Server SSD kecepatan tinggi, Sertifikat SSL HTTPS resmi, integrasi tombol WhatsApp, optimasi SEO &amp; GEO dasar, serta <strong>Garansi Penuh Maintenance selama 1 tahun</strong>.
                </p>
            </details>

            <details class="group bg-white rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>2. Berapa lama proses pembuatan website hingga siap online?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-100">
                    Untuk paket Landing Page atau Profil Perusahaan (Company Profile), proses pengerjaan rata-rata selesai dalam <strong>3 sampai 5 hari kerja</strong> setelah materi diterima. Untuk toko online (e-commerce) atau aplikasi custom, waktu pengerjaan berkisar antara <strong>7 hingga 14 hari kerja</strong>.
                </p>
            </details>

            <details class="group bg-white rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>3. Apakah NazwaGraha Pratama melayani instalasi jaringan LAN dan setting server kantor di Bogor?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-100">
                    Ya, teknisi tersertifikasi kami siap datang langsung (<strong>On-Site</strong>) ke lokasi kantor Anda di wilayah <strong>Ciawi, Bogor Kota, Kabupaten Bogor, Sukabumi, Depok, dan seluruh area Jabodetabek</strong>. Layanan mencakup penarikan kabel LAN UTP/STP rapi dengan pelindung/labeling, crimping, instalasi router Mikrotik, setup Wi-Fi kantor terpusat, hingga penataan rack server korporat.
                </p>
            </details>

            <details class="group bg-white rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>4. Apa itu optimasi SEO &amp; GEO, dan bagaimana cara membuat website ranking 1 Google?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-100">
                    <strong>SEO (Search Engine Optimization)</strong> adalah teknik optimasi agar website Anda menempati halaman 1 Google pada kata kunci pencarian bisnis potensial. Sedangkan <strong>GEO (Generative Engine Optimization)</strong> adalah optimasi standar masa depan agar profil dan produk Anda direkomendasikan secara akurat oleh mesin pencari kecerdasan buatan seperti <strong>ChatGPT, Perplexity AI, Claude, dan Google Gemini</strong>. NazwaGraha Pratama menerapkan kedua metode ini secara komprehensif.
                </p>
            </details>

            <details class="group bg-white rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>5. Apakah ada garansi jika website mengalami down, bug, atau kendala teknis?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-100">
                    Kami memberikan <strong>Garansi Maintenance 1 Tahun Penuh</strong> tanpa biaya tambahan untuk setiap website yang kami buat. Jika terjadi error, website down, atau Anda membutuhkan panduan update konten, tim support kami siap membantu dengan respon cepat via WhatsApp di <strong>081298506111</strong>.
                </p>
            </details>

            <details class="group bg-white rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>6. Bagaimana sistem pembayaran di NazwaGraha Pratama?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-100">
                    Kami sangat mengutamakan keamanan dan kenyamanan klien. Pembayaran dapat dilakukan secara bertahap: <strong>Down Payment (DP) 50%</strong> saat proyek dimulai, dan pelunasan 50% setelah website selesai diuji coba serta disetujui oleh Anda. Kami menerima pembayaran via Transfer Bank resmi maupun QRIS.
                </p>
            </details>

            <details class="group bg-white rounded-2xl border border-slate-200 p-5 transition hover:border-orange-300 shadow-xs">
                <summary class="flex justify-between items-center font-bold text-slate-900 cursor-pointer list-none select-none text-sm sm:text-base">
                    <span>7. Di mana alamat kantor operasional NazwaGraha Pratama?</span>
                    <span class="transition-transform group-open:rotate-180 text-orange-600 font-black shrink-0 ml-3">▼</span>
                </summary>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-3 pt-3 border-t border-slate-100">
                    Kantor resmi NazwaGraha Pratama beralamat di <strong>Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi, Kec. Ciawi, Kabupaten Bogor, Jawa Barat 16720</strong>. Anda dapat berkonsultasi langsung via WhatsApp di <strong>081298506111</strong> atau email <strong>nazwagraha@gmail.com</strong>.
                </p>
            </details>

        </div>

    </div>
</section>

<!-- GARANSI & FINAL CALL TO ACTION (CLOSING DEAL) -->
<section class="py-16 orange-gradient text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="bg-black/20 text-white text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-wider">Garansi Kepuasan 100%</span>
        <h2 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
            Siap Melejitkan Bisnis Anda Bersama NazwaGraha?
        </h2>
        <p class="text-sm sm:text-base text-orange-100 max-w-2xl mx-auto leading-relaxed">
            Konsultasikan kebutuhan website dan IT kantor Anda secara gratis. Tim NazwaGraha Pratama siap memberikan proposal dan penawaran terbaik hari ini juga.
        </p>

        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20sekarang" target="_blank" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-white text-orange-600 hover:bg-orange-50 font-black text-base shadow-2xl transition transform hover:scale-105 flex items-center justify-center gap-2">
                <span>Hubungi via WhatsApp: 081298506111</span>
                <span>→</span>
            </a>
        </div>
        <p class="text-xs text-orange-200">⚡ Tim kami aktif merespon dalam hitungan menit.</p>
    </div>
</section>

<!-- SCRIPT KALKULATOR -->
<script>
    let activeCalcType = 'web';

    function setKalkulatorTab(type) {
        activeCalcType = type;
        const btnWeb = document.getElementById('calc-tab-web');
        const btnIt = document.getElementById('calc-tab-it');
        const subWeb = document.getElementById('calc-sub-web');
        const subIt = document.getElementById('calc-sub-it');

        if (type === 'web') {
            btnWeb.className = "p-4 rounded-xl border-2 border-orange-500 bg-orange-50 text-orange-700 font-bold text-xs sm:text-sm flex items-center justify-center gap-2 transition";
            btnIt.className = "p-4 rounded-xl border-2 border-slate-200 bg-white text-slate-600 font-bold text-xs sm:text-sm flex items-center justify-center gap-2 hover:border-slate-300 transition";
            subWeb.classList.remove('hidden');
            subIt.classList.add('hidden');
        } else {
            btnIt.className = "p-4 rounded-xl border-2 border-orange-500 bg-orange-50 text-orange-700 font-bold text-xs sm:text-sm flex items-center justify-center gap-2 transition";
            btnWeb.className = "p-4 rounded-xl border-2 border-slate-200 bg-white text-slate-600 font-bold text-xs sm:text-sm flex items-center justify-center gap-2 hover:border-slate-300 transition";
            subIt.classList.remove('hidden');
            subWeb.classList.add('hidden');
        }
    }

    function kirimSimulasiWA() {
        let layanan = '';
        if (activeCalcType === 'web') {
            layanan = document.getElementById('calc-select-web').value;
        } else {
            layanan = document.getElementById('calc-select-it').value;
        }
        const skalaEl = document.querySelector('input[name="calc_scale"]:checked');
        const skala = skalaEl ? skalaEl.value : 'UMKM / Bisnis Baru';

        const pesan = `Halo Tim NazwaGraha Pratama,%0A%0ASaya ingin konsultasi dan mendapatkan estimasi penawaran resmi dari website:%0A• Kategori: ${activeCalcType === 'web' ? 'Solusi Website & SEO' : 'Infrastruktur Jaringan LAN & IT Kantor'}%0A• Kebutuhan Layanan: ${layanan}%0A• Skala Usaha: ${skala}%0A%0AMohon info ketersediaan dan proses konsultasinya. Terima kasih!`;

        window.open(`https://wa.me/6281298506111?text=${pesan}`, '_blank');
    }
</script>

@push('schema')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        {
            "@@type": "Question",
            "name": "Berapa biaya jasa pembuatan website di NazwaGraha Pratama?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Biaya jasa pembuatan website di NazwaGraha Pratama mulai dari Rp 1.250.000 untuk paket Landing Page dan Web Bisnis Kilat. Biaya ini sudah mencakup GRATIS Domain (.COM/Web.id), Cloud Server SSD kecepatan tinggi, Sertifikat SSL HTTPS resmi, integrasi tombol WhatsApp, optimasi SEO & GEO dasar, serta Garansi Penuh Maintenance selama 1 tahun."
            }
        },
        {
            "@@type": "Question",
            "name": "Berapa lama proses pembuatan website hingga siap online?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Untuk paket Landing Page atau Profil Perusahaan (Company Profile), proses pengerjaan rata-rata selesai dalam 3 sampai 5 hari kerja setelah materi diterima. Untuk toko online (e-commerce) atau aplikasi custom, waktu pengerjaan berkisar antara 7 hingga 14 hari kerja."
            }
        },
        {
            "@@type": "Question",
            "name": "Apakah NazwaGraha Pratama melayani instalasi jaringan LAN dan setting server kantor di Bogor?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Ya, teknisi tersertifikasi kami siap datang langsung (On-Site) ke lokasi kantor Anda di wilayah Ciawi, Bogor Kota, Kabupaten Bogor, Sukabumi, Depok, dan seluruh area Jabodetabek. Layanan mencakup penarikan kabel LAN UTP/STP rapi dengan pelindung/labeling, crimping, instalasi router Mikrotik, setup Wi-Fi kantor terpusat, hingga penataan rack server korporat."
            }
        },
        {
            "@@type": "Question",
            "name": "Apa itu optimasi SEO & GEO, dan bagaimana cara membuat website ranking 1 Google?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "SEO (Search Engine Optimization) adalah teknik optimasi agar website Anda menempati halaman 1 Google pada kata kunci pencarian bisnis potensial. Sedangkan GEO (Generative Engine Optimization) adalah optimasi standar masa depan agar profil dan produk Anda direkomendasikan secara akurat oleh mesin pencari kecerdasan buatan seperti ChatGPT, Perplexity AI, Claude, dan Google Gemini. NazwaGraha Pratama menerapkan kedua metode ini secara komprehensif."
            }
        },
        {
            "@@type": "Question",
            "name": "Apakah ada garansi jika website mengalami down, bug, atau kendala teknis?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Kami memberikan Garansi Maintenance 1 Tahun Penuh tanpa biaya tambahan untuk setiap website yang kami buat. Jika terjadi error, website down, atau Anda membutuhkan panduan update konten, tim support kami siap membantu dengan respon cepat via WhatsApp di 081298506111."
            }
        },
        {
            "@@type": "Question",
            "name": "Bagaimana sistem pembayaran di NazwaGraha Pratama?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Kami sangat mengutamakan keamanan dan kenyamanan klien. Pembayaran dapat dilakukan secara bertahap: Down Payment (DP) 50% saat proyek dimulai, dan pelunasan 50% setelah website selesai diuji coba serta disetujui oleh Anda. Kami menerima pembayaran via Transfer Bank resmi maupun QRIS."
            }
        },
        {
            "@@type": "Question",
            "name": "Di mana alamat kantor operasional NazwaGraha Pratama?",
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Kantor resmi NazwaGraha Pratama beralamat di Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi, Kec. Ciawi, Kabupaten Bogor, Jawa Barat 16720. Anda dapat berkonsultasi langsung via WhatsApp di 081298506111 atau email nazwagraha@gmail.com."
            }
        }
    ]
}
</script>
@endpush

@endsection
