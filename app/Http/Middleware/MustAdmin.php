<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MustAdmin
{
    /**
     * Middleware ini berfungsi untuk membatasi akses hanya untuk admin.
     * 
     * Jika pengguna bukan admin (belum login sebagai guard 'admin'),
     * maka akan diarahkan ke halaman guest.index (misal halaman utama publik).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user login sebagai admin
        if (!Auth::guard('admin')->check()) {
            // Jika tidak, arahkan ke halaman umum (guest)
            return redirect()->route('guest.index');
        }

        // Jika admin, lanjutkan request ke halaman yang diminta
        return $next($request);
    }
}
