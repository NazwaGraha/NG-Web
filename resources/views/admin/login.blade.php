<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Backoffice - NazwaGraha Pratama</title>
    <link rel="icon" type="image/webp" href="{{ asset('images/ngp-logo.webp') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .orange-gradient {
            background: linear-gradient(135deg, #FF6A00 0%, #EA580C 100%);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl space-y-6">
        
        <!-- Logo Header -->
        <div class="text-center space-y-3">
            <div class="inline-block h-14 w-32 bg-slate-950 rounded-2xl p-2 border border-slate-800">
                <img src="{{ asset('images/ngp-logo.webp') }}" alt="Logo NazwaGraha Pratama" class="max-h-full max-w-full object-contain mx-auto">
            </div>
            <div>
                <h1 class="text-xl font-black text-white tracking-wide">NAZWAGRAHA PRATAMA</h1>
                <p class="text-xs text-orange-400 font-bold uppercase tracking-wider mt-0.5">Login Backoffice Admin</p>
            </div>
        </div>

        @if(session('info'))
        <div class="p-3.5 rounded-xl bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs text-center">
            {{ session('info') }}
        </div>
        @endif

        @if($errors->any())
        <div class="p-3.5 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-xs text-center">
            {{ $errors->first() }}
        </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Email Administrator</label>
                <input type="email" name="email" value="{{ old('email', 'admin@nazwagraha.com') }}" required class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-orange-500 transition">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Kata Sandi</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-orange-500 transition">
            </div>

            <div class="flex items-center justify-between text-xs text-slate-400">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded bg-slate-950 border-slate-800 text-orange-600 focus:ring-0">
                    <span>Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl orange-gradient text-white font-extrabold text-xs shadow-xl shadow-orange-500/25 hover:shadow-orange-500/40 transition">
                Masuk ke Dashboard
            </button>
        </form>

        <div class="pt-4 border-t border-slate-800 text-center">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-white transition">
                ← Kembali ke Website Publik
            </a>
        </div>

    </div>

</body>
</html>
