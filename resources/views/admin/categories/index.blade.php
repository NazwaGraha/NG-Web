@extends('layouts.admin')

@section('title', 'Kelola Kategori Artikel')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left: Table Categories (7 Cols) -->
    <div class="lg:col-span-7 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
        <h2 class="text-sm font-black text-slate-900 mb-4 pb-2 border-b border-slate-100">
            Daftar Kategori Topik ({{ $categories->total() }})
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-slate-400 border-b border-slate-100 uppercase tracking-wider">
                        <th class="py-3 px-2">Nama Kategori</th>
                        <th class="py-3 px-2">Slug URL</th>
                        <th class="py-3 px-2 text-center">Jumlah Artikel</th>
                        <th class="py-3 px-2 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $cat)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-3 px-2 font-bold text-slate-900">
                            {{ $cat->name }}
                        </td>
                        <td class="py-3 px-2 font-mono text-[11px] text-slate-500">
                            {{ $cat->slug }}
                        </td>
                        <td class="py-3 px-2 text-center">
                            <span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-700 font-bold text-[10px]">
                                {{ $cat->articles_count }}
                            </span>
                        </td>
                        <td class="py-3 px-2 text-right space-x-1">
                            <a href="{{ route('admin.categories.edit', $cat->id) }}" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs inline-block">
                                ✏️ Edit
                            </a>
                            @if(Auth::user()->canDelete())
                            <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kategori ini? Seluruh artikel di dalamnya juga akan terhapus!');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 font-bold text-xs" title="Hapus Kategori">
                                    🗑️
                                </button>
                            </form>
                            @else
                            <span class="p-1.5 rounded-lg bg-slate-100 text-slate-400 cursor-not-allowed text-xs font-bold inline-block opacity-60" title="Akun tipe Admin tidak memiliki izin menghapus kategori">
                                🔒
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-6 text-center text-slate-400">Belum ada kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>

    <!-- Right: Add Form (5 Cols) -->
    <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200 shadow-sm h-fit">
        <h3 class="text-sm font-black text-slate-900 mb-4 pb-2 border-b border-slate-100">
            Tambah Kategori Baru
        </h3>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4 text-xs">
            @csrf

            <div>
                <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1">Nama Kategori *</label>
                <input type="text" name="name" required placeholder="Contoh: Optimasi Server" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">
            </div>

            <div>
                <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1">Deskripsi Singkat</label>
                <textarea name="description" rows="3" placeholder="Jelaskan cakupan topik kategori ini..." class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition"></textarea>
            </div>

            <button type="submit" class="w-full py-3 rounded-xl orange-gradient text-white font-extrabold text-xs shadow-md hover:shadow-orange-500/30 transition">
                + Simpan Kategori
            </button>
        </form>
    </div>

</div>

@endsection
