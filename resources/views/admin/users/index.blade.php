@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')

<div class="space-y-6">

    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Pengguna Terdaftar</p>
                <p class="text-2xl font-black text-slate-900 mt-1">{{ $totalUsers }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Kelola akun internal</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center text-xl font-bold">
                👥
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Supervisor</p>
                <p class="text-2xl font-black text-blue-600 mt-1">{{ $totalSupervisors }}</p>
                <p class="text-[10px] text-blue-500 font-semibold mt-0.5">Full Privilege (Hapus Aktif)</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold">
                🛡️
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Admin</p>
                <p class="text-2xl font-black text-emerald-600 mt-1">{{ $totalAdmins }}</p>
                <p class="text-[10px] text-emerald-600 font-semibold mt-0.5">Input & Edit (Tanpa Hapus)</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                ✍️
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Hak Akses Anda</p>
                <div class="mt-1 flex items-center gap-1.5">
                    @if(Auth::user()->isSuperUser())
                        <span class="px-2 py-0.5 rounded-lg text-xs font-black bg-purple-100 text-purple-700 border border-purple-200">Super User</span>
                    @elseif(Auth::user()->isSupervisor())
                        <span class="px-2 py-0.5 rounded-lg text-xs font-black bg-blue-100 text-blue-700 border border-blue-200">Supervisor</span>
                    @else
                        <span class="px-2 py-0.5 rounded-lg text-xs font-black bg-emerald-100 text-emerald-700 border border-emerald-200">Admin</span>
                    @endif
                </div>
                <p class="text-[10px] text-slate-500 mt-0.5">
                    {{ Auth::user()->canDelete() ? '✅ Izin Hapus: Aktif' : '🔒 Izin Hapus: Terkunci' }}
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl {{ Auth::user()->canDelete() ? 'bg-purple-50 text-purple-600' : 'bg-slate-100 text-slate-600' }} flex items-center justify-center text-xl font-bold">
                {{ Auth::user()->canDelete() ? '🔑' : '🔒' }}
            </div>
        </div>
    </div>

    <!-- Security Information Banner for Super User -->
    <div class="bg-indigo-50/70 border border-indigo-200/80 rounded-2xl p-4 flex items-start gap-3">
        <span class="text-xl leading-none mt-0.5">🛡️</span>
        <div class="text-xs text-indigo-900 leading-relaxed">
            <span class="font-bold">Keamanan Akun Super User:</span>
            Akun <strong>Super User Root</strong> secara otomatis disembunyikan dari tabel manajemen pengguna ini demi mematuhi standar keamanan tingkat tinggi sistem (*root isolation policy*). Akun Super User tetap aktif dan memiliki hak akses penuh mutlak.
        </div>
    </div>

    <!-- Main Table Container -->
    <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-xs">
        
        <!-- Header & Action Bar -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 pb-4 border-b border-slate-100">
            <div>
                <h2 class="text-base font-black text-slate-900 flex items-center gap-2">
                    <span>Daftar Pengguna Sistem</span>
                    <span class="text-xs px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 font-bold">
                        {{ $users->total() }} User
                    </span>
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    Kelola hak akses akun Supervisor dan Admin NazwaGraha Pratama.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('admin.users.create') }}" class="px-4 py-2.5 rounded-xl orange-gradient hover:opacity-95 text-white font-bold text-xs flex items-center gap-1.5 shadow-sm transition">
                    <span>+</span>
                    <span>Tambah Pengguna Baru</span>
                </a>
            </div>
        </div>

        <!-- Search & Filter Controls -->
        <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 mb-6">
            <div class="sm:col-span-8 relative">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama atau email pengguna..." class="w-full pl-9 pr-4 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-hidden transition">
                <span class="absolute left-3 top-2.5 text-xs text-slate-400">🔍</span>
            </div>

            <div class="sm:col-span-3">
                <select name="role" class="w-full px-3 py-2 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-orange-500 focus:outline-hidden transition bg-white" onchange="this.form.submit()">
                    <option value="">Semua Tipe Pengguna</option>
                    <option value="supervisor" {{ request('role') === 'supervisor' ? 'selected' : '' }}>Supervisor (Full Privilege)</option>
                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin (Tanpa Izin Hapus)</option>
                </select>
            </div>

            <div class="sm:col-span-1 flex gap-1">
                @if(request('q') || request('role'))
                    <a href="{{ route('admin.users.index') }}" class="w-full py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs flex items-center justify-center transition" title="Reset Filter">
                        ✕
                    </a>
                @endif
            </div>
        </form>

        <!-- Table Listing -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="text-slate-400 border-b border-slate-100 uppercase tracking-wider text-[11px]">
                        <th class="py-3 px-3">Pengguna</th>
                        <th class="py-3 px-3">Email Akun</th>
                        <th class="py-3 px-3">Tipe / Role</th>
                        <th class="py-3 px-3">Hak Akses Penghapusan</th>
                        <th class="py-3 px-3">Terdaftar Sejak</th>
                        <th class="py-3 px-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-3 px-3 font-bold text-slate-900">
                            <div class="flex items-center gap-2.5">
                                @if($user->avatar)
                                    <div class="w-9 h-9 rounded-full overflow-hidden border border-slate-200 flex-shrink-0 shadow-xs">
                                        <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="w-9 h-9 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-xs text-slate-700 flex-shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span>{{ $user->name }}</span>
                                        @if($user->id === Auth::id())
                                            <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-orange-100 text-orange-700">Anda</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-3 font-mono text-[11px] text-slate-600">
                            {{ $user->email }}
                        </td>
                        <td class="py-3 px-3">
                            @if($user->isSupervisor())
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black bg-blue-100 text-blue-700 border border-blue-200 inline-flex items-center gap-1">
                                    <span>🛡️</span> Supervisor
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black bg-emerald-100 text-emerald-700 border border-emerald-200 inline-flex items-center gap-1">
                                    <span>✍️</span> Admin
                                </span>
                            @endif
                        </td>
                        <td class="py-3 px-3">
                            @if($user->canDelete())
                                <span class="text-emerald-700 font-semibold inline-flex items-center gap-1">
                                    <span class="text-xs">✅</span> Diizinkan (Full Privilege)
                                </span>
                            @else
                                <span class="text-slate-500 font-medium inline-flex items-center gap-1">
                                    <span class="text-xs">🔒</span> Tidak Boleh Menghapus
                                </span>
                            @endif
                        </td>
                        <td class="py-3 px-3 text-slate-500 text-[11px]">
                            {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                        </td>
                        <td class="py-3 px-3 text-right space-x-1 whitespace-nowrap">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs inline-block transition" title="Edit Data Pengguna">
                                ✏️ Edit
                            </a>

                            <!-- Delete Button (Only for Super User & Supervisor) -->
                            @if(Auth::user()->canDelete())
                                @if($user->id !== Auth::id())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ $user->name }} ({{ $user->email }})? Tindakan ini tidak dapat dibatalkan.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 font-bold text-xs transition" title="Hapus Pengguna">
                                            🗑️
                                        </button>
                                    </form>
                                @else
                                    <button type="button" disabled class="p-1.5 rounded-lg bg-slate-100 text-slate-400 font-bold text-xs cursor-not-allowed opacity-50" title="Tidak dapat menghapus akun Anda sendiri">
                                        🗑️
                                    </button>
                                @endif
                            @else
                                <span class="p-1.5 rounded-lg bg-slate-100 text-slate-400 cursor-not-allowed text-xs font-bold inline-block opacity-60" title="Akun tipe Admin tidak memiliki izin untuk menghapus pengguna atau data lainnya">
                                    🔒
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-slate-400">
                            Tidak ada data pengguna ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $users->links() }}
        </div>

    </div>

</div>

@endsection
