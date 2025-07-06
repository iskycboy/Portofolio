<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('is_admin_logged_in') || session('is_admin_logged_in') !== true) {
            return redirect()->route('admin.login')->with('error', 'Anda harus login sebagai admin.');
        }

        return $next($request);
    }
}
