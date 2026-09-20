<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCanDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->canDelete()) {
            if ($request->expectsJson() || $request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Akses ditolak: Akun tipe Admin tidak memiliki izin untuk menghapus data.',
                ], 403);
            }

            abort(403, 'Akses ditolak: Tipe pengguna Admin tidak memiliki izin untuk menghapus data.');
        }

        return $next($request);
    }
}
