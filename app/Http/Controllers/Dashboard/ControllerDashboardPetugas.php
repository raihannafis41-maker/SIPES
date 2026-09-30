<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelSatuanPendidikan;
use App\Models\ModelRiwayatNotifikasi;

class ControllerDashboardPetugas extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA UTAMA
        |--------------------------------------------------------------------------
        */

        $jumlahSatuanPendidikan =
            ModelSatuanPendidikan::count();

        $jumlahAktif =
            ModelSatuanPendidikan::where(
                'aktif',
                true
            )->count();

        $jumlahSudahBerakhir =
            ModelSatuanPendidikan::where(
                'tanggalberakhir',
                '<',
                now()->startOfDay()
            )->count();

        $jumlahSegeraBerakhir =
            ModelSatuanPendidikan::whereBetween(
                'tanggalberakhir',
                [
                    now()->startOfDay(),
                    now()->addDays(30)->endOfDay()
                ]
            )->count();

        /*
        |--------------------------------------------------------------------------
        | DATA NOTIFIKASI
        |--------------------------------------------------------------------------
        */

        $jumlahNotifikasiTerkirim =
            ModelRiwayatNotifikasi::where(
                'status',
                'terkirim'
            )->count();

        $jumlahNotifikasiMenunggu =
            ModelRiwayatNotifikasi::where(
                'status',
                'menunggu'
            )->count();

        $jumlahNotifikasiGagal =
            ModelRiwayatNotifikasi::where(
                'status',
                'gagal'
            )->count();

        /*
        |--------------------------------------------------------------------------
        | DATA PERLU PERHATIAN
        |--------------------------------------------------------------------------
        */

        $jumlahTanpaWhatsApp =
            ModelSatuanPendidikan::where(function ($query) {
                $query->whereNull('nomorwhatsapp')
                    ->orWhere('nomorwhatsapp', '');
            })->count();

        /*
        |--------------------------------------------------------------------------
        | MASA BERLAKU TERDEKAT
        |--------------------------------------------------------------------------
        */

        $masaBerlakuTerdekat =
            ModelSatuanPendidikan::where(
                'aktif',
                true
            )
                ->whereNotNull('tanggalberakhir')
                ->orderBy(
                    'tanggalberakhir',
                    'asc'
                )
                ->limit(10)
                ->get();

        /*
        |--------------------------------------------------------------------------
        | SUDAH BERAKHIR
        |--------------------------------------------------------------------------
        */

        $sudahBerakhir =
            ModelSatuanPendidikan::where(
                'aktif',
                true
            )
                ->where(
                    'tanggalberakhir',
                    '<',
                    now()->startOfDay()
                )
                ->orderBy(
                    'tanggalberakhir',
                    'asc'
                )
                ->limit(10)
                ->get();

        return view(
            'petugas.dashboard',
            compact(
                'jumlahSatuanPendidikan',
                'jumlahAktif',
                'jumlahSudahBerakhir',
                'jumlahSegeraBerakhir',
                'jumlahNotifikasiTerkirim',
                'jumlahNotifikasiMenunggu',
                'jumlahNotifikasiGagal',
                'jumlahTanpaWhatsApp',
                'masaBerlakuTerdekat',
                'sudahBerakhir'
            )
        );
    }
}