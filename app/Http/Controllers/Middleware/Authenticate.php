<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request)
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin') || $request->is('dashboard') || $request->is('admin/*')) {
                return route('sign-in'); // login admin
            }

            if ($request->is('company*') || $request->is('perusahaan*')) {
                return route('guest.index'); // login perusahaan
            }

            if ($request->is('index') || $request->is('lamaran') || $request->is('siswa/*') || $request->is('detail-pekerjaan*')) {
                return route('guest.index'); // login siswa
            }

            // Default fallback
            return route('guest.index');
        }
    }
}
