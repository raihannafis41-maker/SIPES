<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ModelSatuanPendidikan;
use Illuminate\Http\Request;

class ControllerAuthSatuanPendidikan extends Controller
{
    public function showLogin()
    {
        return view('auth.loginnpsn');
    }

    public function login(Request $request)
    {
        $request->validate([
            'npsn' => [
                'required',
                'digits:8',
            ],
        ], [
            'npsn.required' => 'NPSN wajib diisi.',
            'npsn.digits' => 'NPSN harus terdiri dari 8 angka.',
        ]);

        $satuanPendidikan = ModelSatuanPendidikan::where(
            'npsn',
            $request->npsn
        )
        ->where('aktif', true)
        ->first();

        if (!$satuanPendidikan) {
            return back()
                ->withInput()
                ->with('error', 'NPSN tidak ditemukan atau tidak aktif.');
        }

        $request->session()->regenerate();

        session([
            'satuanpendidikan_id' => $satuanPendidikan->id,
            'satuanpendidikan_npsn' => $satuanPendidikan->npsn,
        ]);

        return redirect()->route('satuanpendidikan.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'satuanpendidikan_id',
            'satuanpendidikan_npsn',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.satuanpendidikan');
    }
}