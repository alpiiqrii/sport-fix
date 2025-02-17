<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login dan memiliki role 'admin'
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return $next($request);
        }

        // Jika tidak, kirim pesan error ke session
        return redirect('/kasir')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}