@extends('layouts.admin')

@section('title', 'Kelola Galeri Foto Portofolio')

@section('content')

<div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 pb-4 border-b border-slate-100">
        <div>
            <h2 class="text-sm font-black text-slate-900">
                Daftar Foto Galeri ({{ $galleries->total() }})
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">Kelola dokumentasi visual pengerjaan website, instalasi LAN, dan pengadaan hardware.</p>
        </div>

        <a href="{{ route('admin.galleries.create') }}" class="px-5 py-2.5 rounded-xl orange-gradient text-white text-xs font-bold shadow-md hover:shadow-orange-500/30 transition flex items-center gap-2">
            <span>+ Upload Foto Baru</span>
        </a>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('admin.galleries.index') }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition {{ !request('kategori') ? 'orange-gradient text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
            Semua
        </a>
        @foreach($categories as $key => $label)
        <a href="{{ route('admin.galleries.index', ['kategori' => $key]) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold transition {{ request('kategori') == $key ? 'orange-gradient text-white shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($galleries as $gal)
        <div class="rounded-2xl overflow-hidden border border-slate-200 bg-slate-50 flex flex-col justify-between group">
            <div>
                <div class="relative h-48 overflow-hidden bg-slate-900">
                    <img src="{{ asset($gal->image_path) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover">
                    <span class="absolute top-2.5 left-2.5 bg-white/90 backdrop-blur-md text-slate-800 text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow">
                        {{ $categories[$gal->category] ?? ucfirst($gal->category) }}
                    </span>
                    @if($gal->is_featured)
                    <span class="absolute top-2.5 right-2.5 bg-orange-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow">
                        ★ Unggulan
                    </span>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-xs text-slate-900 line-clamp-1 mb-1">{{ $gal->title }}</h3>
                    <p class="text-[11px] text-slate-500 line-clamp-2">{{ $gal->description ?? '-' }}</p>
                </div>
            </div>

            <div class="p-4 pt-0 border-t border-slate-200 flex items-center justify-between text-xs">
                <span class="text-[10px] text-slate-400">Urutan: {{ $gal->sort_order }}</span>
                <div class="space-x-1">
                    <a href="{{ route('admin.galleries.edit', $gal->id) }}" class="p-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold inline-block text-[11px]">
                        ✏️ Edit
                    </a>
                    @if(Auth::user()->canDelete())
                    <form action="{{ route('admin.galleries.destroy', $gal->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus foto ini dari galeri?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 font-bold text-[11px]" title="Hapus Foto">
                            🗑️
                        </button>
                    </form>
                    @else
                    <span class="p-1.5 rounded-lg bg-slate-100 text-slate-400 cursor-not-allowed text-xs font-bold inline-block opacity-60" title="Akun tipe Admin tidak memiliki izin menghapus galeri">
                        🔒
                    </span>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-12 text-slate-400">
            Belum ada foto dalam galeri.
        </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $galleries->links() }}
    </div>

</div>

@endsection
