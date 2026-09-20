@extends('layouts.admin')

@section('title', 'Detail Pesan Calon Klien')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">

    <!-- Top Action Navigation -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.contact-messages.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-orange-600 transition">
            <span>&larr;</span>
            <span>Kembali ke Daftar Pesan Masuk</span>
        </a>

        <div class="flex items-center gap-2">
            <form action="{{ route('admin.contact-messages.toggle-read', $contactMessage) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="px-3 py-1.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-700 hover:bg-slate-100 transition">
                    {{ $contactMessage->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}
                </button>
            </form>

            @if(Auth::user()->canDelete())
            <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1.5 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 text-xs font-bold transition">
                    🗑️ Hapus Pesan
                </button>
            </form>
            @endif
        </div>
    </div>

    @if(session('success'))
    <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2">
        <span>✅</span>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <!-- Main Message Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        
        <!-- Header Strip -->
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 p-6 sm:p-8 text-white flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b-4 border-orange-500">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-0.5 rounded-md bg-orange-500 text-white font-extrabold text-[10px] uppercase tracking-wider">
                        {{ $contactMessage->service }}
                    </span>
                    <span class="text-xs text-slate-400">ID Pesan #{{ $contactMessage->id }}</span>
                </div>
                <h1 class="text-xl sm:text-2xl font-black text-white">
                    {{ $contactMessage->name }}
                </h1>
                <p class="text-xs text-slate-400">
                    Diterima pada: {{ $contactMessage->created_at->translatedFormat('l, d F Y - H:i') }} WIB ({{ $contactMessage->created_at->diffForHumans() }})
                </p>
            </div>

            <!-- Quick Action Reply Buttons -->
            @php
                $cleanPhone = preg_replace('/[^0-9]/', '', (string)$contactMessage->phone);
                if (str_starts_with($cleanPhone, '0')) {
                    $cleanPhone = '62' . substr($cleanPhone, 1);
                }
                $waText = urlencode("Halo Bpk/Ibu " . $contactMessage->name . ", terima kasih telah menghubungi NazwaGraha Pratama mengenai " . $contactMessage->service . ". Kami siap memberikan solusi dan penawaran terbaik untuk Anda.");
            @endphp
            <div class="flex items-center gap-2">
                <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition shadow flex items-center gap-1.5">
                    <span>💬 Hubungi via WhatsApp</span>
                </a>
                @if($contactMessage->email)
                <a href="mailto:{{ $contactMessage->email }}?subject=Re: Konsultasi {{ urlencode($contactMessage->service) }} - NazwaGraha Pratama" class="px-4 py-2.5 rounded-xl bg-orange-600 hover:bg-orange-500 text-white text-xs font-bold transition shadow flex items-center gap-1.5">
                    <span>✉️ Balas Email</span>
                </a>
                @endif
            </div>
        </div>

        <!-- Detail Information Grid -->
        <div class="p-6 sm:p-8 space-y-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nomor WhatsApp Pengirim</p>
                    <div class="mt-1 flex items-center gap-2">
                        <span class="text-base font-extrabold text-slate-900">{{ $contactMessage->phone }}</span>
                        <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="text-xs text-emerald-600 hover:underline font-bold">
                            Buka Chat ↗
                        </a>
                    </div>
                </div>

                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alamat Email Pengirim</p>
                    <div class="mt-1">
                        @if($contactMessage->email)
                        <a href="mailto:{{ $contactMessage->email }}" class="text-base font-extrabold text-orange-600 hover:underline">
                            {{ $contactMessage->email }}
                        </a>
                        @else
                        <span class="text-sm text-slate-400 italic">Pengirim tidak mencantumkan email</span>
                        @endif
                    </div>
                </div>

                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Layanan yang Dibutuhkan</p>
                    <p class="text-base font-extrabold text-slate-900 mt-1">
                        {{ $contactMessage->service }}
                    </p>
                </div>

                <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200">
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Alamat IP &amp; Status</p>
                    <div class="mt-1 flex items-center gap-3">
                        <span class="text-xs font-mono text-slate-600">{{ $contactMessage->ip_address ?? '127.0.0.1' }}</span>
                        <span class="text-xs font-bold text-emerald-600">● Telah Dikirim ke Email nazwagraha@gmail.com</span>
                    </div>
                </div>
            </div>

            <!-- Message Detail Box -->
            <div>
                <p class="text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                  Detail Kebutuhan Proyek / Pertanyaan:
                </p>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 text-slate-800 text-sm leading-relaxed whitespace-pre-wrap">
{{ $contactMessage->message }}
                </div>
            </div>

            <!-- Follow-up Tips -->
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 flex items-start gap-3 text-xs text-amber-900">
                <span class="text-lg leading-none">💡</span>
                <div class="space-y-1">
                    <strong class="font-bold">Tips Memaksimalkan Penjualan (Banjir Orderan):</strong>
                    <p class="text-amber-800 leading-normal">
                        Riset menunjukkan respon cepat di bawah <strong>15 menit</strong> meningkatkan peluang closing hingga <strong>700%</strong>. Gunakan tombol WhatsApp di atas untuk menyapa calon klien dengan ramah dan segera kirimkan estimasi biaya atau proposal.
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
