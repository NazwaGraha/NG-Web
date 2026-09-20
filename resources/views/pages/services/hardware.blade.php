@extends('layouts.app')

@section('title', 'Jasa Pengadaan Hardware IT, Komputer & Laptop Kantor Bogor - NazwaGraha Pratama')
@section('meta_description', 'Supplier & jasa pengadaan komputer kantor, PC rakitan bergaransi resmi, laptop bisnis, printer, dan UPS untuk perusahaan & instansi di Bogor dan Jabodetabek.')
@section('meta_keywords', 'pengadaan komputer kantor bogor, supplier hardware it ciawi, beli pc kantor, laptop karyawan, printer kantor, nazwagraha pratama')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-slate-100 border-b border-slate-200 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold text-slate-500 gap-2 items-center">
            <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Beranda</a>
            <span>/</span>
            <span class="text-slate-400">Layanan IT</span>
            <span>/</span>
            <span class="text-orange-600 font-bold">Pengadaan Hardware IT</span>
        </nav>
    </div>
</div>

<!-- HERO SECTION: PENGADAAN HARDWARE -->
<section class="py-14 sm:py-20 bg-gradient-to-b from-orange-50/60 via-white to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-100 border border-orange-200 text-orange-700 text-xs font-bold">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
                    <span>Supplier Terpercaya Perusahaan &amp; Instansi</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                    Pengadaan Komputer &amp; <span class="text-orange-600">Hardware IT Kantor Bergaransi</span>
                </h1>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Solusi belanja perangkat IT kantor tanpa repot. NazwaGraha Pratama menyediakan unit PC kerja rakitan berspesifikasi tinggi, laptop bisnis branded, printer multifungsi, UPS backup daya, dan switch jaringan bergaransi resmi dari distributor utama. Unit dikirim dan dirakit langsung di kantor Anda dalam kondisi <strong>siap pakai</strong>.
                </p>

                <!-- Value Badges -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2 text-xs font-bold text-slate-700">
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Garansi Resmi 1 - 3 Tahun</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Siap Pakai (OS &amp; Software Terinstal)</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Faktur &amp; Invoice Resmi Perusahaan</span>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20minta%20penawaran%20pengadaan%20hardware%20komputer" target="_blank" class="w-full sm:w-auto px-8 py-4 rounded-xl orange-gradient text-white font-black text-sm shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Minta Proposal Penawaran Harga via WhatsApp</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 relative">
                    <img src="{{ asset('images/it_hardware_procurement.webp') }}" 
                         alt="Pengadaan Hardware Komputer NazwaGraha Pratama" 
                         width="1376" 
                         height="768" 
                         loading="lazy" 
                         decoding="async" 
                         class="w-full h-auto object-cover">
                    <div class="p-4 bg-white border-t border-slate-200">
                        <div class="text-xs font-black text-slate-800">Unit Baru &amp; Komponen Bersegel Resmi</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Pengetesan stabilitas dan uji performa sebelum unit diserahterimakan ke klien.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- KATEGORI PERANGKAT YANG KAMI SEDIAKAN -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Katalog Pengadaan</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3">Perangkat IT Kantor yang Kami Sediakan</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Sesuaikan spesifikasi komputasi dengan alur kerja masing-masing divisi perusahaan Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">🖥️</div>
                <h3 class="font-black text-slate-900 text-lg">PC Desktop Rakitan &amp; Built-Up</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Spesifikasi Core i3/i5/i7 atau Ryzen dengan SSD NVMe cepat untuk divisi admin, keuangan, maupun workstation desain grafis.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">💻</div>
                <h3 class="font-black text-slate-900 text-lg">Laptop Bisnis Karyawan</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Laptop kerja ringkas dan kokoh (Asus, Lenovo, HP, Dell) dengan baterai tahan lama untuk menunjang mobilitas tim kerja Anda.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">🖨️</div>
                <h3 class="font-black text-slate-900 text-lg">Printer &amp; Scanner Scanner</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Printer multifungsi ink-tank ekonomis atau laserjet cepat untuk kebutuhan pencetakan dokumen legal dan invoice harian kantor.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">🔋</div>
                <h3 class="font-black text-slate-900 text-lg">UPS &amp; Perangkat Server</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Sistem baterai cadangan (UPS) untuk mencegah PC mati mendadak saat listrik padam serta switch hub gigabit berkinerja tinggi.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- CALL TO ACTION BANNER -->
<section class="py-16 orange-gradient text-white text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">
        <h2 class="text-3xl sm:text-4xl font-black">Mau Belanja Perangkat IT Kantor Tanpa Pusing?</h2>
        <p class="text-sm sm:text-base text-orange-100 max-w-2xl mx-auto">
            Kirimkan daftar kebutuhan unit PC dan perangkat kantor Anda, tim NazwaGraha Pratama akan membuatkan surat penawaran harga resmi terbaik hari ini.
        </p>
        <div class="pt-2">
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20minta%20penawaran%20pengadaan%20hardware" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white text-orange-600 hover:bg-orange-50 font-black text-sm sm:text-base shadow-2xl transition transform hover:scale-105">
                <span>Chat Penawaran Harga via WhatsApp: 081298506111</span>
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
    "serviceType": "Jasa Pengadaan Hardware IT & Komputer Kantor",
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
