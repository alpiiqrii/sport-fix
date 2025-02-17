<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login dan memiliki role 'kasir' atau 'admin'
        if (Auth::check() && (Auth::user()->role === 'Kasir' || Auth::user()->role === 'Admin')) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman lain atau berikan response error
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
