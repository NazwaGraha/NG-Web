@extends('layouts.app')

@section('title', 'Jasa Instalasi Jaringan LAN & Server Rack Kantor Bogor - NazwaGraha Pratama')
@section('meta_description', 'Jasa instalasi jaringan LAN kantor, penataan kabel Cat6 rapi, setting router Mikrotik, setup Wi-Fi kantor, dan penataan rack server bergaransi di Bogor & Jabodetabek.')
@section('meta_keywords', 'jasa instalasi lan bogor, jasa pasang jaringan kantor ciawi, setting mikrotik kantor, server rack bogor, teknisi lan bogor, nazwagraha pratama')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-slate-100 border-b border-slate-200 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold text-slate-500 gap-2 items-center">
            <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Beranda</a>
            <span>/</span>
            <span class="text-slate-400">Layanan IT</span>
            <span>/</span>
            <span class="text-orange-600 font-bold">Jaringan LAN &amp; Server</span>
        </nav>
    </div>
</div>

<!-- HERO SECTION: JARINGAN LAN & SERVER -->
<section class="py-14 sm:py-20 bg-gradient-to-b from-orange-50/60 via-white to-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-orange-100 border border-orange-200 text-orange-700 text-xs font-bold">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500 animate-pulse"></span>
                    <span>Teknisi Jaringan On-Site Siap Datang</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                    Jasa Instalasi Jaringan LAN &amp; <span class="text-orange-600">Server Rack Kantor Rapi</span>
                </h1>

                <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Kabel internet semrawut di lantai kantor membahayakan keselamatan kerja dan memperlambat produktivitas tim. Tim teknisi berpengalaman NazwaGraha Pratama siap datang langsung ke lokasi kantor Anda di <strong>Ciawi, Bogor, Sukabumi, Depok, dan Jabodetabek</strong> untuk penataan kabel Cat6 rapi, konfigurasi Mikrotik, setup Wi-Fi, dan server rack profesional.
                </p>

                <!-- Value Badges -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2 text-xs font-bold text-slate-700">
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Survey Lokasi Kantor Gratis</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Kabel Cat6 Berpelindung Rapi</span>
                    </div>
                    <div class="flex items-center gap-1.5 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-xs">
                        <span class="text-emerald-500 text-base">✔</span>
                        <span>Setting Mikrotik Anti-Lag</span>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20butuh%20survey%20instalasi%20jaringan%20LAN%20kantor" target="_blank" class="w-full sm:w-auto px-8 py-4 rounded-xl orange-gradient text-white font-black text-sm shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>Undang Teknisi Survey Lokasi via WhatsApp</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 relative">
                    <img src="{{ asset('images/lan_server_infrastructure.webp') }}" 
                         alt="Instalasi Server Rack dan LAN NazwaGraha Pratama" 
                         width="1376" 
                         height="768" 
                         loading="lazy" 
                         decoding="async" 
                         class="w-full h-auto object-cover">
                    <div class="p-4 bg-white border-t border-slate-200">
                        <div class="text-xs font-black text-slate-800">Manajemen Kabel Patch Panel 24U/42U</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Penataan kabel terstruktur, labeling nomor port jelas, dan sirkulasi udara dingin server.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- LINGKUP PEKERJAAN JARINGAN KAMI -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">Layanan Lengkap</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-3">Solusi Komprehensif Jaringan Kantor</h2>
            <p class="text-slate-600 text-sm sm:text-base mt-2">
                Dari penarikan titik kabel LAN baru, setting router anti lelet, hingga perapihan kabel server lama yang berantakan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">🔌</div>
                <h3 class="font-black text-slate-900 text-lg">Instalasi Kabel LAN Baru</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Penarikan kabel UTP Cat6 berkualitas dengan conduit/pelindung rapi dari ruang server ke setiap meja staf.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">📡</div>
                <h3 class="font-black text-slate-900 text-lg">Setup Router &amp; Wi-Fi Kantor</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Konfigurasi Mikrotik, pembagian bandwidth proporsional, pemisahan jaringan tamu vs staf, dan load balancing 2 provider internet.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">🗄️</div>
                <h3 class="font-black text-slate-900 text-lg">Penataan Server Rack (Re-cable)</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Merapikan kabel server semrawut menjadi rapi menggunakan patch panel berlabel, cable organizer, dan switch gigabit.
                </p>
            </div>

            <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200 hover:border-orange-300 card-shadow transition space-y-3">
                <div class="text-3xl">🛡️</div>
                <h3 class="font-black text-slate-900 text-lg">Keamanan Jaringan &amp; Firewall</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Proteksi data perusahaan dari serangan siber, pemblokiran situs tidak produktif, dan konfigurasi VPN kantor remote.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- CALL TO ACTION BANNER -->
<section class="py-16 orange-gradient text-white text-center">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">
        <h2 class="text-3xl sm:text-4xl font-black">Butuh Teknisi Datang ke Kantor Anda?</h2>
        <p class="text-sm sm:text-base text-orange-100 max-w-2xl mx-auto">
            Jadwalkan survey lokasi bersama tim teknisi NazwaGraha Pratama untuk mendapatkan skema denah jaringan dan estimasi penawaran resmi.
        </p>
        <div class="pt-2">
            <a href="https://wa.me/6281298506111?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20jadwalkan%20survey%20jaringan%20kantor" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-white text-orange-600 hover:bg-orange-50 font-black text-sm sm:text-base shadow-2xl transition transform hover:scale-105">
                <span>Chat Teknisi via WhatsApp: 081298506111</span>
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
    "serviceType": "Jasa Instalasi Jaringan LAN & Server Rack Kantor",
    "provider": {
        "@@type": "LocalBusiness",
        "name": "NazwaGraha Pratama",
        "telephone": "081298506111",
        "email": "nazwagraha@gmail.com"
    },
    "areaServed": ["Bogor", "Ciawi", "Sukabumi", "Depok", "Jakarta", "Jabodetabek"]
}
</script>
@endpush

@endsection
