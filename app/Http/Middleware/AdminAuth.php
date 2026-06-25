<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('is_admin')) {
            return redirect()->route('dashboard.login')->with('error', 'Silakan login terlebih dahulu untuk mengakses dashboard.');
        }

        return $next($request);
    }
}
