@extends('layouts.admin')

@section('title', 'Upload Foto Galeri Baru')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
    
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
        <div>
            <h2 class="text-base font-black text-slate-900">Tambah Foto Portofolio</h2>
            <p class="text-xs text-slate-500 mt-0.5">Unggah foto hasil pengerjaan proyek untuk ditampilkan pada galeri publik.</p>
        </div>
        <a href="{{ route('admin.galleries.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            ← Kembali
        </a>
    </div>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-xs">
        @csrf

        <div>
            <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Pilih Berkas Foto / Gambar *</label>
            <input type="file" name="image" required accept="image/*" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs text-slate-600 file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-orange-100 file:text-orange-700 hover:file:bg-orange-200">
            <p class="text-[10px] text-slate-400 mt-1">Format: JPG, PNG, WEBP. Maksimal 5 MB.</p>
        </div>

        <div>
            <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Judul Foto / Nama Proyek *</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Instalasi Server Rack Kantor PT. Jaya" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-orange-500 font-bold transition">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Kategori Portofolio *</label>
                <select name="category" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
                    @foreach($categories as $key => $label)
                    <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Urutan Tampil (Sort Order)</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-800 focus:outline-none focus:border-orange-500">
            </div>
        </div>

        <div>
            <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1.5">Deskripsi Singkat Proyek</label>
            <textarea name="description" rows="3" placeholder="Ceritakan lingkup pengerjaan proyek ini..." class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs text-slate-800 focus:outline-none focus:border-orange-500">{{ old('description') }}</textarea>
        </div>

        <div class="pt-1">
            <label class="flex items-center gap-2 cursor-pointer font-semibold text-slate-700">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded border-slate-300 text-orange-600 focus:ring-0">
                <span>Tandai sebagai Foto Unggulan (Tampil di Beranda)</span>
            </label>
        </div>

        <div class="flex items-center gap-3 pt-3">
            <button type="submit" class="flex-1 py-3.5 rounded-xl orange-gradient text-white font-extrabold text-xs shadow-md hover:shadow-orange-500/30 transition">
                + Upload ke Galeri
            </button>
            <a href="{{ route('admin.galleries.index') }}" class="px-6 py-3.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition">
                Batal
            </a>
        </div>

    </form>

</div>

@endsection
