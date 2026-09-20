@extends('layouts.app')

@section('title', 'Tentang Kami - NazwaGraha Pratama | Partner IT & Web Development Terpercaya')
@section('meta_description', 'Kenali NazwaGraha Pratama: Penyedia solusi rekayasa web performa tinggi, optimasi SEO & GEO, instalasi jaringan LAN kantor, dan pengadaan IT terpercaya di Indonesia.')

@section('content')

<!-- BREADCRUMB & HERO -->
<section class="bg-gradient-to-b from-orange-50/70 via-white to-[#F8FAFC] pt-10 pb-16 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Beranda</a>
            <span>/</span>
            <span class="text-orange-600 font-bold">Tentang Kami</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-5">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-100 text-orange-700 text-xs font-bold">
                    <span>🏢 Profil Resmi Perusahaan</span>
                </div>
                
                <h1 class="text-3xl sm:text-5xl font-black text-slate-950 tracking-tight leading-tight">
                    Partner Solusi IT &amp; Rekayasa Website <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-amber-600">Terpercaya di Indonesia</span>
                </h1>

                <p class="text-slate-600 text-base sm:text-lg leading-relaxed">
                    <strong>NazwaGraha Pratama</strong> adalah perusahaan penyedia solusi teknologi informasi terpadu yang berdedikasi membantu para pemilik bisnis, korporasi, UMKM, dan institusi meningkatkan omset, produktivitas, serta efisiensi operasional melalui teknologi modern.
                </p>

                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi%20layanan" target="_blank" class="px-7 py-3.5 rounded-xl orange-gradient text-white font-extrabold text-sm shadow-lg shadow-orange-500/25 hover:shadow-orange-500/40 transition">
                        Konsultasi dengan Tim Kami →
                    </a>
                    <a href="{{ route('contact.index') }}" class="px-6 py-3.5 rounded-xl bg-white border border-slate-200 text-slate-800 font-bold text-sm hover:bg-slate-50 transition">
                        Kunjungi Kantor Kami
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="{{ asset('images/commercial_hero_workspace.jpg') }}" alt="Tim NazwaGraha Pratama" class="w-full h-auto object-cover">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- NILAI UTAMA & VISI MISI -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xl">
                    🎯
                </div>
                <h3 class="text-lg font-black text-slate-900">Visi Kami</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    Menjadi partner digital &amp; infrastruktur IT nomor 1 di Indonesia yang paling dipercaya dalam menghadirkan solusi teknologi handal, berdampak nyata terhadap penjualan, dan bebas masalah teknis bagi mitra bisnis kami.
                </p>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xl">
                    ⚡
                </div>
                <h3 class="text-lg font-black text-slate-900">Misi Kami</h3>
                <ul class="text-slate-600 text-xs sm:text-sm space-y-2 leading-relaxed">
                    <li>• Menghadirkan website komersial cepat dengan skor Google 90+ dan strategi SEO/GEO yang mendatangkan order.</li>
                    <li>• Membangun jaringan LAN kantor yang tertata rapi, cepat, dan aman.</li>
                    <li>• Menyediakan perangkat keras IT berkualitas dengan garansi dan servis teknisi tanggap.</li>
                </ul>
            </div>

            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xl">
                    🛡️
                </div>
                <h3 class="text-lg font-black text-slate-900">Komitmen &amp; Nilai</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    Integritas, transparansi biaya, ketepatan waktu, dan garansi purna jual. Kami tidak sekadar menyelesaikan proyek, namun membangun kemitraan jangka panjang yang mendukung keberhasilan bisnis klien.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- LEGALITAS & KANTOR RESMI -->
<section class="py-16 bg-[#F8FAFC] border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm space-y-8">
            <div class="text-center space-y-2">
                <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Legalitas &amp; Lokasi Kantor</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900">Identitas Resmi NazwaGraha Pratama</h2>
                <p class="text-xs sm:text-sm text-slate-500">Transparan, memiliki kantor fisik yang dapat dikunjungi, dan siap melayani kerja sama formal.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs sm:text-sm">
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="font-black text-slate-900 block text-sm">📍 Alamat Kantor Operasional:</span>
                    <p class="text-slate-600 leading-relaxed">
                        Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor, Jawa Barat 16720
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="font-black text-slate-900 block text-sm">📞 Layanan Kontak Cepat:</span>
                    <p class="text-slate-600">
                        Telepon &amp; WhatsApp: <strong class="text-slate-900">081298506111</strong><br>
                        Email Resmi: <strong class="text-slate-900">nazwagraha@gmail.com</strong>
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="font-black text-slate-900 block text-sm">⏰ Jam Kerja Teknisi:</span>
                    <p class="text-slate-600">
                        Senin - Sabtu: 08.00 - 18.00 WIB<br>
                        Layanan On-Call Darurat: 24/7 untuk Mitra Kontrak Maintenance (SLA)
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="font-black text-slate-900 block text-sm">💼 Ruang Lingkup Layanan:</span>
                    <p class="text-slate-600">
                        Website Dev, E-Commerce, SEO &amp; GEO Google, Jaringan LAN, Pengadaan Komputer Kantor &amp; Servis On-Site.
                    </p>
                </div>
            </div>

            <div class="text-center pt-4">
                <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20berkonsultasi%20mengenai%20layanan%20IT" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl orange-gradient text-white font-extrabold text-sm shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 transition">
                    <span>Hubungi Kami via WhatsApp Sekarang</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
