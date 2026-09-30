<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ModelSatuanPendidikan;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareSatuanPendidikan
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $id = session('satuanpendidikan_id');

        if (!$id) {
            return redirect()->route('login.satuanpendidikan')
                ->with(
                    'error',
                    'Silakan masuk menggunakan NPSN terlebih dahulu.'
                );
        }

        $satuanPendidikan = ModelSatuanPendidikan::where(
            'id',
            $id
        )
        ->where('aktif', true)
        ->first();

        if (!$satuanPendidikan) {
            session()->forget([
                'satuanpendidikan_id',
                'satuanpendidikan_npsn',
            ]);

            return redirect()->route('login.satuanpendidikan')
                ->with(
                    'error',
                    'Data satuan pendidikan tidak ditemukan atau tidak aktif.'
                );
        }

        return $next($request);
    }
}