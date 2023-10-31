<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna saat ini memiliki role 'user'
        if (auth()->check() && auth()->user()->hasRole('user')) {
            return $next($request); // Lanjutkan ke rute jika pengguna adalah user
        }

        abort(403); // Jika pengguna tidak memiliki role 'user', abort dengan kode status 403
    }
}
