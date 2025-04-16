<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MustPerusahaan
{
    /**
     * Middleware ini digunakan untuk membatasi akses hanya untuk user 
     * yang login sebagai perusahaan (guard 'perusahaan').
     *
     * Jika tidak terautentikasi sebagai perusahaan, maka akan diarahkan
     * ke halaman utama publik (route 'guest.index').
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user login sebagai perusahaan
        if (!Auth::guard('perusahaan')->check()) {
            // Jika tidak, redirect ke halaman utama untuk tamu
            return redirect()->route('guest.index');
        }

        // Jika sudah login sebagai perusahaan, lanjutkan request
        return $next($request);
    }
}
