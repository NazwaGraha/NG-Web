<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Handle an authentication attempt with rate limiting protection.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Security: Rate Limiting by IP and Email (max 5 attempts per minute)
        $throttleKey = Str::transliterate(Str::lower($request->input('email')) . '|' . $request->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            throw ValidationException::withMessages([
                'email' => "Terlalu banyak percobaan login gagal. Demi keamanan, akun dikunci sementara selama {$seconds} detik.",
            ]);
        }

        $remember = $request->boolean('remember');

        // 1. Check Master Backoffice Admin (Persistent & Database-Independent)
        $masterEmail = config('auth.master_admin.email', 'nazwagraha@gmail.com');
        $masterPasswordHash = config('auth.master_admin.password_hash', '$2y$10$DdPmbCK70TK2IdxVaaENs.AbXOStbIsrIwDEYNICb2fuQti.Q7yUi');

        $isMaster = (strtolower(trim($credentials['email'])) === strtolower(trim($masterEmail))) &&
                    Hash::check($credentials['password'], $masterPasswordHash);

        if ($isMaster) {
            RateLimiter::clear($throttleKey);

            // Self-Healing bootstrap:
            // Walaupun database kosong atau baru saja di-migrate:fresh,
            // sistem otomatis me-restore data admin secara instan untuk sesi login.
            $user = User::where('email', $masterEmail)->first();
            if (!$user) {
                $user = new User();
                $user->name = config('auth.master_admin.name', 'NazwaGraha Administrator');
                $user->email = $masterEmail;
                $user->password = $credentials['password'];
                $user->email_verified_at = now();
                $user->save();
            } elseif (!Hash::check($credentials['password'], $user->password)) {
                $user->password = $credentials['password'];
                $user->save();
            }

            Auth::login($user, $remember);

            // Security: Regenerate session ID to prevent Session Fixation attacks
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang di Dashboard Backoffice NazwaGraha!');
        }

        // 2. Fallback to standard database credentials check
        if (Auth::attempt($credentials, $remember)) {
            RateLimiter::clear($throttleKey);

            // Security: Regenerate session ID to prevent Session Fixation attacks
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
        }

        // Increment failed attempt counter with 60 seconds decay
        RateLimiter::hit($throttleKey, 60);

        throw ValidationException::withMessages([
            'email' => 'Email atau kata sandi yang Anda masukkan tidak cocok.',
        ]);
    }

    /**
     * Log the user out of the application safely.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Security: Invalidate current session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('info', 'Anda telah berhasil keluar dari sistem dashboard.');
    }
}
