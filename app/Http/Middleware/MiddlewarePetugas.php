<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MiddlewarePetugas
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        if (!Auth::check()) {
            return redirect()->route('login.petugas')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        if ($user->role !== 'petugas') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        if (!$user->aktif) {
            Auth::logout();

            return redirect()->route('login.petugas')
                ->with('error', 'Akun Anda sudah tidak aktif.');
        }

        return $next($request);
    }
}