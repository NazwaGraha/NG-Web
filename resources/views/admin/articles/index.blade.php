@extends('layouts.admin')

@section('title', 'Kelola Artikel & SEO')

@section('content')

<div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 pb-4 border-b border-slate-100">
        <div>
            <h2 class="text-sm font-black text-slate-900">
                Daftar Artikel ({{ $articles->total() }})
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">Kelola artikel edukasi untuk mendominasi ranking 1 Google & AI Search (GEO).</p>
        </div>

        <a href="{{ route('admin.articles.create') }}" class="px-5 py-2.5 rounded-xl orange-gradient text-white text-xs font-bold shadow-md hover:shadow-orange-500/30 transition flex items-center gap-2">
            <span>+ Buat Artikel Baru</span>
        </a>
    </div>

    <!-- Filters & Search -->
    <div class="flex flex-col sm:flex-row gap-3 mb-6 justify-between">
        <form action="{{ route('admin.articles.index') }}" method="GET" class="flex flex-wrap items-center gap-2 w-full sm:w-auto">
            <select name="kategori" onchange="this.form.submit()" class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:border-orange-500">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('kategori') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
                @endforeach
            </select>

            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul..." class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
            
            <button type="submit" class="px-4 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold">
                Cari
            </button>
            @if(request('kategori') || request('q'))
            <a href="{{ route('admin.articles.index') }}" class="text-xs text-slate-500 hover:text-orange-600 underline">
                Reset
            </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="text-slate-400 border-b border-slate-100 uppercase tracking-wider">
                    <th class="py-3 px-3">Thumbnail</th>
                    <th class="py-3 px-3">Judul Artikel</th>
                    <th class="py-3 px-3">Kategori</th>
                    <th class="py-3 px-3 text-center">Status</th>
                    <th class="py-3 px-3 text-center">Pembaca</th>
                    <th class="py-3 px-3">Tanggal</th>
                    <th class="py-3 px-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($articles as $art)
                <tr class="hover:bg-slate-50 transition">
                    <td class="py-3 px-3 w-16">
                        <div class="w-14 h-10 rounded-lg overflow-hidden bg-slate-100">
                            <img src="{{ asset($art->featured_image ?? 'images/portfolio_web_collection.jpg') }}" alt="" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="py-3 px-3 max-w-xs">
                        <a href="{{ route('articles.show', $art->slug) }}" target="_blank" class="font-bold text-slate-900 hover:text-orange-600 line-clamp-1">
                            {{ $art->title }} ↗
                        </a>
                        <span class="text-[10px] text-slate-400 font-mono">{{ $art->slug }}</span>
                    </td>
                    <td class="py-3 px-3">
                        <span class="px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-700 font-bold text-[10px]">
                            {{ $art->category->name }}
                        </span>
                    </td>
                    <td class="py-3 px-3 text-center">
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black {{ $art->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ $art->is_published ? 'Terbit' : 'Draft' }}
                        </span>
                    </td>
                    <td class="py-3 px-3 text-center font-semibold text-slate-700">
                        {{ number_format($art->views) }}
                    </td>
                    <td class="py-3 px-3 text-slate-500 text-[11px]">
                        {{ $art->published_at ? $art->published_at->format('d/m/Y') : '-' }}
                    </td>
                    <td class="py-3 px-3 text-right space-x-1 whitespace-nowrap">
                        <a href="{{ route('admin.articles.edit', $art->id) }}" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs inline-block">
                            ✏️ Edit
                        </a>
                        @if(Auth::user()->canDelete())
                        <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus artikel ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 font-bold text-xs" title="Hapus Artikel">
                                🗑️
                            </button>
                        </form>
                        @else
                        <span class="p-1.5 rounded-lg bg-slate-100 text-slate-400 cursor-not-allowed text-xs font-bold inline-block opacity-60" title="Akun tipe Admin tidak memiliki izin menghapus artikel">
                            🔒
                        </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-slate-400">Belum ada artikel ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $articles->links() }}
    </div>

</div>

@endsection
