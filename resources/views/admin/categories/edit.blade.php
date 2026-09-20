@extends('layouts.admin')

@section('title', 'Edit Kategori: ' . $category->name)

@section('content')

<div class="max-w-xl mx-auto bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
    <div class="flex items-center justify-between mb-6 pb-3 border-b border-slate-100">
        <h2 class="text-base font-black text-slate-900">Edit Kategori</h2>
        <a href="{{ route('admin.categories.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            ← Kembali
        </a>
    </div>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-4 text-xs">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1">Nama Kategori *</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">
        </div>

        <div>
            <label class="block font-bold uppercase tracking-wider text-slate-700 mb-1">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-xs text-slate-900 focus:outline-none focus:border-orange-500 focus:bg-white transition">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="flex-1 py-3 rounded-xl orange-gradient text-white font-extrabold text-xs shadow-md hover:shadow-orange-500/30 transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.categories.index') }}" class="px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
