<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MustUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('siswa')->check()) {
            return redirect()->route('guest.index');
        }

        // Jika sudah login dan membuka "/", arahkan ke /index
        if ($request->path() === '/') {
            return redirect()->route('user.index');
        }

        return $next($request);
    }
}
