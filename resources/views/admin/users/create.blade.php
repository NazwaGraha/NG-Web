@extends('layouts.admin')

@section('title', 'Tambah Pengguna Baru')

@section('content')

<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-base font-black text-slate-900">Form Pendaftaran Pengguna Baru</h2>
            <p class="text-xs text-slate-500 mt-0.5">Buat akun akses untuk Supervisor atau Administrator internal.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs flex items-center gap-1.5 transition">
            <span>←</span>
            <span>Kembali ke Daftar</span>
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xs">
        
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Foto Profil / Avatar -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Foto Profil Pengguna (Opsional)
                </label>
                <div class="flex items-center gap-4">
                    <div id="avatarPreviewContainer" class="w-16 h-16 rounded-full bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden flex-shrink-0">
                        <span id="avatarPlaceholder" class="text-2xl text-slate-400">👤</span>
                        <img id="avatarPreviewImg" src="" alt="Pratinjau" class="w-full h-full object-cover hidden">
                    </div>
                    <div class="flex-1">
                        <input type="file" name="avatar" id="avatarInput" accept="image/jpeg,image/png,image/jpg,image/webp" class="block w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 transition cursor-pointer">
                        <p class="text-[10px] text-slate-400 mt-1">Format: JPG, PNG, WEBP. Maksimal 3MB. Disarankan foto persegi 1:1.</p>
                    </div>
                </div>
                @error('avatar')
                    <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Lengkap -->
            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Contoh: Rian Pratama, S.Kom" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-hidden transition">
                @error('name')
                    <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alamat Email -->
            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                    Alamat Email (Digunakan untuk Login) <span class="text-red-500">*</span>
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="nama@nazwagraha.com" required class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-hidden transition">
                @error('email')
                    <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe Pengguna / Role -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">
                    Pilih Tipe / Peran Pengguna <span class="text-red-500">*</span>
                </label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Option: Supervisor -->
                    <label class="relative flex flex-col p-4 rounded-2xl border-2 cursor-pointer transition {{ old('role') === 'supervisor' ? 'border-blue-500 bg-blue-50/40' : 'border-slate-200 hover:border-blue-200 bg-white' }}">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">🛡️</span>
                                <span class="text-xs font-black text-slate-900">Supervisor</span>
                            </div>
                            <input type="radio" name="role" value="supervisor" {{ old('role') === 'supervisor' ? 'checked' : '' }} class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                        </div>
                        <p class="text-[11px] text-slate-600 leading-relaxed">
                            <strong>Full Privilege:</strong> Akses penuh membuat, mengedit, dan <strong>menghapus</strong> artikel, kategori, galeri, serta mengelola user lain.
                        </p>
                    </label>

                    <!-- Option: Admin -->
                    <label class="relative flex flex-col p-4 rounded-2xl border-2 cursor-pointer transition {{ old('role', 'admin') === 'admin' ? 'border-emerald-500 bg-emerald-50/40' : 'border-slate-200 hover:border-emerald-200 bg-white' }}">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">✍️</span>
                                <span class="text-xs font-black text-slate-900">Admin</span>
                            </div>
                            <input type="radio" name="role" value="admin" {{ old('role', 'admin') === 'admin' ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">
                        </div>
                        <p class="text-[11px] text-slate-600 leading-relaxed">
                            <strong>Akses Terbatas:</strong> Dapat membuat dan mengedit konten secara lengkap, <strong>TETAPI DILARANG MENGHAPUS</strong> data apapun di sistem.
                        </p>
                    </label>
                </div>
                @error('role')
                    <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2 border-t border-slate-100">
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Kata Sandi (Password) <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password" id="password" required minlength="8" placeholder="Minimal 8 karakter" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-hidden transition">
                    @error('password')
                        <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Ulangi Kata Sandi <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required minlength="8" placeholder="Konfirmasi kata sandi" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-hidden transition">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl orange-gradient hover:opacity-95 text-white font-bold text-xs flex items-center gap-2 shadow-sm transition">
                    <span>💾 Simpan & Daftarkan Akun</span>
                </button>
            </div>

        </form>

    </div>

</div>

@push('scripts')
<script>
    const avatarInput = document.getElementById('avatarInput');
    const avatarPreviewImg = document.getElementById('avatarPreviewImg');
    const avatarPlaceholder = document.getElementById('avatarPlaceholder');

    if (avatarInput) {
        avatarInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    avatarPreviewImg.src = e.target.result;
                    avatarPreviewImg.classList.remove('hidden');
                    avatarPlaceholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                avatarPreviewImg.src = '';
                avatarPreviewImg.classList.add('hidden');
                avatarPlaceholder.classList.remove('hidden');
            }
        });
    }
</script>
@endpush

@endsection
