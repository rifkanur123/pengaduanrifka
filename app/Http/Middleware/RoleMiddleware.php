<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // cek sudah login belum
        if (!session('login')) {
            return redirect('/login');
        }

        // cek role sesuai atau tidak
        if (session('role') != $role) {
            abort(403, 'AKSES DITOLAK');
        }

        return $next($request);
    }
}