<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MustUser
{
    /**
     * Middleware ini digunakan untuk memastikan bahwa hanya user yang 
     * login sebagai siswa (guard 'siswa') yang bisa mengakses rute tertentu.
     *
     * Jika belum login sebagai siswa, user akan diarahkan ke halaman tamu ('guest.index').
     * Jika sudah login dan membuka rute "/", maka akan diarahkan ke halaman utama user ('user.index').
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah siswa sudah login
        if (!Auth::guard('siswa')->check()) {
            return redirect()->route('guest.index');
        }

        // Jika sudah login dan mengakses root ("/"), redirect ke halaman utama user
        if ($request->path() === '/') {
            return redirect()->route('user.index');
        }

        // Lanjutkan ke proses berikutnya
        return $next($request);
    }
}
