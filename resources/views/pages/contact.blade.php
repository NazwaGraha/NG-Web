@extends('layouts.app')

@section('title', 'Hubungi Kami - NazwaGraha Pratama Bogor')
@section('meta_description', 'Hubungi kantor resmi NazwaGraha Pratama di Ciawi Bogor untuk konsultasi pembuatan website, optimasi SEO & GEO, instalasi jaringan LAN, dan pengadaan hardware IT.')

@section('content')

<!-- Header Banner -->
<section class="py-12 bg-gradient-to-b from-orange-50/60 to-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="text-orange-600 font-bold text-xs uppercase tracking-widest bg-orange-100 px-3 py-1 rounded-full">
            Layanan Pelanggan & Konsultasi
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-slate-900 mt-3 leading-tight">
            Hubungi Tim Ahli NazwaGraha Pratama
        </h1>
        <p class="text-slate-600 text-sm sm:text-base mt-2">
            Kami siap membantu menjawab kebutuhan teknologi kantor dan bisnis Anda. Silakan hubungi kami via WhatsApp, telepon, email, atau kunjungi kantor kami.
        </p>
    </div>
</section>

<!-- Contact Form & Info Grid -->
<section class="py-16 bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Contact Details Cards (5 Cols) -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Office Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 card-shadow space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center font-black text-xl">
                            📍
                        </div>
                        <div>
                            <span class="text-xs font-bold text-orange-600 uppercase">Kantor Resmi</span>
                            <h3 class="text-base font-black text-slate-900">Alamat Perusahaan</h3>
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        <strong>{{ $contactInfo['company'] }}</strong><br>
                        {{ $contactInfo['address'] }}
                    </p>
                </div>

                <!-- Phone & WA Card -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 card-shadow space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-black text-xl">
                            📞
                        </div>
                        <div>
                            <span class="text-xs font-bold text-emerald-600 uppercase">WhatsApp & Telepon</span>
                            <h3 class="text-base font-black text-slate-900">Respon Cepat 24 Jam</h3>
                        </div>
                    </div>
                    <p class="text-sm font-bold text-slate-900">
                        {{ $contactInfo['phone'] }}
                    </p>
                    <a href="https://wa.me/{{ $contactInfo['phone_intl'] }}?text=Halo%20NazwaGraha%20Pratama,%20saya%20ingin%20konsultasi" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl orange-gradient text-white text-xs font-bold shadow-md hover:shadow-orange-500/30 transition">
                        <span>Chat WhatsApp Langsung</span>
                        <span>→</span>
                    </a>
                </div>

                <!-- Email & Operational Hours -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 card-shadow space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center font-black text-xl">
                            ✉️
                        </div>
                        <div>
                            <span class="text-xs font-bold text-blue-600 uppercase">Email & Jam Operasional</span>
                            <h3 class="text-base font-black text-slate-900">Kirim Penawaran / Dokumen</h3>
                        </div>
                    </div>
                    <div class="text-xs sm:text-sm text-slate-600 space-y-1">
                        <p><strong>Email:</strong> {{ $contactInfo['email'] }}</p>
                        <p><strong>Jam Kerja:</strong> {{ $contactInfo['hours'] }}</p>
                    </div>
                </div>

            </div>

            <!-- Right: Interactive Inquiry Form (7 Cols) -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 card-shadow">
                    
                    @if(session('success'))
                    <div class="mb-6 p-5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 shadow-sm animate-fade-in">
                        <div class="flex items-start gap-3">
                            <span class="text-2xl leading-none">✅</span>
                            <div class="space-y-2">
                                <h4 class="font-extrabold text-sm sm:text-base text-emerald-950">Pesan Berhasil Terkirim ke Email NazwaGraha!</h4>
                                <p class="text-xs sm:text-sm text-emerald-800 leading-relaxed">
                                    {{ session('success') }}
                                </p>
                                @if(session('whatsapp_url'))
                                <div class="pt-2">
                                    <a href="{{ session('whatsapp_url') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition shadow-sm">
                                        <span>💬 Hubungkan Langsung via WhatsApp (Opsi Cepat)</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="mb-8">
                        <span class="text-xs font-bold uppercase tracking-wider text-orange-600">Formulir Pesan</span>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">Kirim Rincian Kebutuhan Proyek</h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">
                            Isi formulir di bawah ini. Pesan Anda akan langsung dikirimkan ke email resmi <strong class="text-slate-700">nazwagraha@gmail.com</strong>.
                        </p>
                    </div>

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                        @csrf
                        
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Lengkap / Nama Perusahaan *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Bpk. Budi Santoso (PT. Cipta Solusi)" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nomor WhatsApp Aktif *</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="Contoh: 0812xxxxxxxx" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Alamat Email Pengirim (Opsional)</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@perusahaan.com" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Pilih Layanan Utama *</label>
                            <select name="service" required class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">
                                <option value="Pembuatan Website Company Profile / Bisnis" {{ old('service') == 'Pembuatan Website Company Profile / Bisnis' ? 'selected' : '' }}>Pembuatan Website Company Profile / Bisnis</option>
                                <option value="Pembuatan Website Toko Online / E-Commerce" {{ old('service') == 'Pembuatan Website Toko Online / E-Commerce' ? 'selected' : '' }}>Pembuatan Website Toko Online / E-Commerce</option>
                                <option value="Aplikasi Web Kustom / Sistem ERP" {{ old('service') == 'Aplikasi Web Kustom / Sistem ERP' ? 'selected' : '' }}>Aplikasi Web Kustom / Sistem ERP</option>
                                <option value="Optimasi SEO & GEO Ranking 1 Google & AI Search" {{ old('service') == 'Optimasi SEO & GEO Ranking 1 Google & AI Search' ? 'selected' : '' }}>Optimasi SEO & GEO Ranking 1 Google & AI Search</option>
                                <option value="Instalasi & Penataan Jaringan LAN Kantor" {{ old('service') == 'Instalasi & Penataan Jaringan LAN Kantor' ? 'selected' : '' }}>Instalasi & Penataan Jaringan LAN Kantor</option>
                                <option value="Pengadaan Perangkat Komputer & Hardware IT" {{ old('service') == 'Pengadaan Perangkat Komputer & Hardware IT' ? 'selected' : '' }}>Pengadaan Perangkat Komputer & Hardware IT</option>
                                <option value="Troubleshooting & Service Komputer Panggilan" {{ old('service') == 'Troubleshooting & Service Komputer Panggilan' ? 'selected' : '' }}>Troubleshooting & Service Komputer Panggilan</option>
                                <option value="Kontrak Maintenance IT Kantor Bulanan (SLA)" {{ old('service') == 'Kontrak Maintenance IT Kantor Bulanan (SLA)' ? 'selected' : '' }}>Kontrak Maintenance IT Kantor Bulanan (SLA)</option>
                            </select>
                            @error('service')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Detail Kebutuhan / Pertanyaan *</label>
                            <textarea name="message" rows="4" required placeholder="Ceritakan secara singkat rencana proyek atau kendala IT yang Anda hadapi..." class="w-full bg-slate-50 border border-slate-300 rounded-xl p-4 text-xs sm:text-sm text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full py-4 rounded-xl orange-gradient text-white font-extrabold text-sm sm:text-base shadow-xl shadow-orange-500/30 hover:shadow-orange-500/50 hover:scale-[1.01] active:scale-[0.99] transition flex items-center justify-center gap-2">
                            <span>✉️ Kirim Pesan ke Email NazwaGraha</span>
                            <span>&rarr;</span>
                        </button>
                        <p class="text-[11px] text-center text-slate-400 mt-2">
                            Formulir ini dikirim langsung ke kotak masuk <span class="font-medium text-slate-600">nazwagraha@gmail.com</span>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
