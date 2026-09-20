@extends('layouts.admin')

@section('title', 'Pesan Masuk & Leads Konsultasi')

@section('content')

<div class="space-y-6">

    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Pesan Masuk</p>
                <p class="text-2xl font-black text-slate-900 mt-1">{{ $totalMessages }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Semua leads tersimpan aman</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center text-xl font-bold">
                📥
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Belum Dibaca (Hot Leads)</p>
                <p class="text-2xl font-black text-amber-600 mt-1">{{ $unreadCount }}</p>
                <p class="text-[10px] text-amber-600 font-semibold mt-0.5">Segera hubungi calon klien</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                🔥
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Target Notifikasi Email</p>
                <p class="text-sm font-black text-emerald-600 mt-1 truncate">nazwagraha@gmail.com</p>
                <p class="text-[10px] text-slate-500 mt-0.5">Terkirim instan saat formulir disubmit</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                ✉️
            </div>
        </div>
    </div>

    <!-- Alert Notifications -->
    @if(session('success'))
    <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2">
        <span>✅</span>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs font-semibold flex items-center gap-2">
        <span>⚠️</span>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs">
        <form method="GET" action="{{ route('admin.contact-messages.index') }}" class="flex flex-col sm:flex-row items-center gap-3 justify-between">
            <div class="flex-1 w-full flex items-center gap-2">
                <div class="relative w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, WhatsApp, email, layanan, atau isi pesan..." class="w-full bg-slate-50 border border-slate-300 rounded-xl pl-10 pr-4 py-2 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
                    <span class="absolute left-3.5 top-2.5 text-slate-400 text-xs">🔍</span>
                </div>
                <select name="status" class="bg-slate-50 border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:border-orange-500">
                    <option value="">Semua Status</option>
                    <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                    <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                </select>
                <button type="submit" class="px-4 py-2 rounded-xl bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold transition">
                    Filter
                </button>
                @if(request('search') || request('status'))
                <a href="{{ route('admin.contact-messages.index') }}" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold transition">
                    Reset
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="p-5 border-b border-slate-200 flex items-center justify-between">
            <div>
                <h3 class="font-bold text-slate-900 text-sm sm:text-base">Daftar Formulir Pesan Calon Klien</h3>
                <p class="text-xs text-slate-500 mt-0.5">Seluruh pesan yang masuk melalui formulir halaman /kontak</p>
            </div>
            <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">
                {{ $messages->total() }} Pesan Ditemukan
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-400 uppercase tracking-wider text-[10px] border-b border-slate-200">
                    <tr>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Nama Pengirim</th>
                        <th class="py-3 px-4">Kontak (WA &amp; Email)</th>
                        <th class="py-3 px-4">Layanan Kebutuhan</th>
                        <th class="py-3 px-4">Waktu Masuk</th>
                        <th class="py-3 px-4 text-center">Aksi Respon</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($messages as $msg)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', (string)$msg->phone);
                        if (str_starts_with($cleanPhone, '0')) {
                            $cleanPhone = '62' . substr($cleanPhone, 1);
                        }
                        $waText = urlencode("Halo Bpk/Ibu " . $msg->name . ", terima kasih telah menghubungi NazwaGraha Pratama perihal " . $msg->service . ". Kami siap membantu proyek Anda.");
                    @endphp
                    <tr class="hover:bg-slate-50/80 transition {{ !$msg->is_read ? 'bg-amber-50/40 font-semibold' : '' }}">
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            @if(!$msg->is_read)
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-extrabold bg-amber-100 text-amber-800 border border-amber-200 animate-pulse">
                                    ● BARU
                                </span>
                            @else
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-slate-100 text-slate-500">
                                    Sudah Dibaca
                                </span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            <a href="{{ route('admin.contact-messages.show', $msg) }}" class="font-bold text-slate-900 hover:text-orange-600 transition block">
                                {{ $msg->name }}
                            </a>
                            <span class="text-[11px] text-slate-500 line-clamp-1 max-w-xs font-normal mt-0.5">
                                "{{ Str::limit($msg->message, 60) }}"
                            </span>
                        </td>
                        <td class="py-3.5 px-4 whitespace-nowrap">
                            <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="text-emerald-600 font-bold hover:underline flex items-center gap-1">
                                <span>💬</span>
                                <span>{{ $msg->phone }}</span>
                            </a>
                            @if($msg->email)
                            <a href="mailto:{{ $msg->email }}" class="text-orange-600 hover:underline text-[11px] block mt-0.5 font-normal">
                                ✉️ {{ $msg->email }}
                            </a>
                            @else
                            <span class="text-slate-400 text-[11px] block mt-0.5 font-normal">Email: -</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2.5 py-1 rounded-lg bg-orange-50 text-orange-700 text-[11px] font-bold border border-orange-100 inline-block">
                                {{ $msg->service }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 whitespace-nowrap text-slate-500 font-normal">
                            {{ $msg->created_at->translatedFormat('d M Y, H:i') }} WIB
                            <span class="block text-[10px] text-slate-400">({{ $msg->created_at->diffForHumans() }})</span>
                        </td>
                        <td class="py-3.5 px-4 whitespace-nowrap text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('admin.contact-messages.show', $msg) }}" class="p-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition" title="Lihat Detail Pesan">
                                    👁️
                                </a>

                                <a href="https://wa.me/{{ $cleanPhone }}?text={{ $waText }}" target="_blank" class="p-1.5 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition" title="Balas via WhatsApp">
                                    💬
                                </a>

                                @if(Auth::user()->canDelete())
                                <form action="{{ route('admin.contact-messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan dari {{ $msg->name }}?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition" title="Hapus Pesan">
                                        🗑️
                                    </button>
                                </form>
                                @else
                                <span class="p-1.5 rounded-lg bg-slate-100 text-slate-400 cursor-not-allowed opacity-60" title="Izin Hapus Hanya untuk Supervisor &amp; Super User">
                                    🔒
                                </span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">
                            <p class="text-3xl mb-2">📭</p>
                            <p class="font-bold text-sm text-slate-600">Belum ada formulir pesan masuk</p>
                            <p class="text-xs text-slate-400 mt-1">Pesan dari halaman formulir kontak website akan otomatis muncul di sini.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
        <div class="p-4 border-t border-slate-200">
            {{ $messages->links() }}
        </div>
        @endif
    </div>

</div>

@endsection
