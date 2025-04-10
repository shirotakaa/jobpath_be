<?php

// GA KEPAKE

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
            // Cek guard yang sedang dipakai
            $guard = $request->route()?->middleware() ?? [];
    
            if (in_array('auth:admin', $guard)) {
                return route('sign-in'); // login admin
            }
    
            if (in_array('auth:company', $guard) || in_array('auth:perusahaan', $guard)) {
                return route('guest.index'); // login perusahaan
            }
    
            if (in_array('auth:siswa', $guard)) {
                return route('guest.index'); // login siswa
            }
    
            // Fallback 
            return route('guest.index');
        }
    }
}
