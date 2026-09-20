@extends('layouts.app')

@section('title', 'Jasa Servis Komputer Kantor & Maintenance Rutin Bogor - NazwaGraha Pratama')
@section('meta_description', 'Jasa servis komputer kantor panggilan di Bogor & Ciawi: Perbaikan PC lemot, bluescreen, malware, pembersihan hardware, dan kontrak maintenance IT bulanan (SLA).')
@section('meta_keywords', 'servis komputer bogor, service pc kantor ciawi, teknisi komputer panggilan, maintenance it kantor bogor, data recovery bogor, nazwagraha pratama')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-slate-100 border-b border-slate-200 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold text-slate-500 gap-2 items-center">
            <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Beranda</a>
            <span>/</span>
            <span class="text-slate-400">Layanan IT</span>
            <span>/</span>
            <span class="text-orange-600 font-bold">Servis &amp; Troubleshooting</span>
        </nav>
    </div>
</div>

<!-- HERO SECTION: SERVIS & TROUBLESHOOTING -->
<section class="py-14 sm:py-20 bg-gradient-to-b from-orange-50/60 via-white to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-100 border border-orange-200 text-orange-700 text-xs font-bold">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
                    <span>Teknisi Respons Cepat Panggilan Kantor</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                    Jasa Servis Komputer &amp; <span class="text-orange-600">Kontrak Maintenance IT Kantor</span>
                </h1>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Jangan biarkan kendala komputer mogok atau internet putus menghentikan roda operasional bisnis Anda. NazwaGraha Pratama melayani perbaikan komputer PC kantor, instalasi ulang OS berlisensi, pembersihan virus, ganti sparepart rusak, hingga <strong>kontrak pemeliharaan rutin bulanan (SLA)</strong> tanpa perusahaan Anda perlu mengeluarkan biaya tinggi untuk menggaji staf IT in-house.
                </p>

                <!-- Value Badges -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2 text-xs font-bold text-slate-700">
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Teknisi Datang Langsung ke Kantor</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Garansi Hasil Perbaikan</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Paket Hemat Maintenance Bulanan</span>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20butuh%20servis%20komputer%20kantor%20panggilan" target="_blank" class="w-full sm:w-auto px-8 py-4 rounded-xl orange-gradient text-white font-black text-sm shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Panggil Teknisi Komputer via WhatsApp</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 relative">
                    <img src="{{ asset('images/commercial_hero_workspace.webp') }}" 
                         alt="Servis Komputer Kantor NazwaGraha Pratama" 
                         width="1376" 
                         height="768" 
                         loading="lazy" 
                         decoding="async" 
                         class="w-full h-auto object-cover">
                    <div class="p-4 bg-white border-t border-slate-200">
                        <div class="text-xs font-black text-slate-800">Troubleshooting Kilat &amp; Penyelamatan Data</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Diagnostik menyeluruh pada hardware, memori, SSD, dan sistem pendingin prosesor.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- MASALAH YANG KAMI SELESAIKAN -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Solusi Masalah IT</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3">Kendala IT Kantor yang Sering Kami Tangani</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Respon cepat untuk mengembalikan kelancaran kerja tim Anda dalam hitungan jam.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">⚡</div>
                <h3 class="font-black text-slate-900 text-lg">PC Lemot &amp; Hang</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Pembersihan file sampah, upgrade RAM/SSD NVMe, dan optimalisasi sistem operasi agar komputer kembali kencang.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">💻</div>
                <h3 class="font-black text-slate-900 text-lg">Bluescreen &amp; Mati Total</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Perbaikan crash Windows, penggantian power supply/motherboard rusak, serta pembersihan debu sirkulasi kipas.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">🦠</div>
                <h3 class="font-black text-slate-900 text-lg">Infeksi Virus &amp; Malware</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Pembersihan tuntas spyware dan proteksi dari ancaman ransomware yang membahayakan dokumen rahasia perusahaan.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">📋</div>
                <h3 class="font-black text-slate-900 text-lg">Kontrak Servis Berkala (SLA)</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Pemeriksaan bulanan rutin terhadap seluruh unit komputer kantor, backup data terjadwal, dan respon prioritas.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- CALL TO ACTION BANNER -->
<section class="py-16 orange-gradient text-white text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">
        <h2 class="text-3xl sm:text-4xl font-black">Komputer Kantor Anda Bermasalah Hari Ini?</h2>
        <p class="text-sm sm:text-base text-orange-100 max-w-2xl mx-auto">
            Hubungi teknisi kami sekarang, jelaskan kendala yang dialami, dan teknisi kami siap meluncur ke lokasi kantor Anda di Bogor &amp; sekitarnya.
        </p>
        <div class="pt-2">
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20ada%20komputer%20kantor%20bermasalah%20butuh%20servis" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white text-orange-600 hover:bg-orange-50 font-black text-sm sm:text-base shadow-2xl transition transform hover:scale-105">
                <span>Hubungi Teknisi via WhatsApp (081298506111)</span>
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
    "serviceType": "Jasa Servis Komputer & Maintenance IT Kantor",
    "provider": {
        "@@type": "LocalBusiness",
        "name": "NazwaGraha Pratama",
        "telephone": "081298506111",
        "email": "nazwagraha@gmail.com"
    },
    "areaServed": ["Bogor", "Ciawi", "Sukabumi", "Depok", "Jakarta", "Indonesia"]
}
</script>
@endpush

@endsection
