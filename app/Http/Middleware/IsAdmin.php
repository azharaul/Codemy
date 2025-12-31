<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah user sudah login (sebenarnya sudah dicover middleware 'auth', tapi untuk jaga-jaga)
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Ambil user yang sedang login
        $user = Auth::user();

        // 3. Cek Role: Jika BUKAN teacher, maka tendang
        if ($user->role !== 'teacher') {
            // Option A: Tampilkan error 403 Forbidden
            abort(403, 'ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI.');

            // Option B: Redirect paksa ke home (pilih salah satu, saya pakai abort biar tegas)
            // return redirect('/'); 
        }

        // 4. Jika lolos pengecekan, silakan lanjut ke controller
        return $next($request);
    }
}
