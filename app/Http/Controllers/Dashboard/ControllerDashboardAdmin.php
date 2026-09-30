<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ModelSatuanPendidikan;
use App\Models\ModelUser;
use App\Models\ModelRiwayatNotifikasi;

class ControllerDashboardAdmin extends Controller
{
    public function index()
    {
        $jumlahUser = ModelUser::count();

        $jumlahAdmin = ModelUser::where('role', 'admin')->count();

        $jumlahPetugas = ModelUser::where('role', 'petugas')->count();

        $jumlahSatuanPendidikan = ModelSatuanPendidikan::count();

        $jumlahAktif = ModelSatuanPendidikan::where('aktif', true)->count();

        $jumlahSudahBerakhir = ModelSatuanPendidikan::where(
            'tanggalberakhir',
            '<',
            now()->startOfDay()
        )->count();

        $jumlahSegeraBerakhir = ModelSatuanPendidikan::whereBetween(
            'tanggalberakhir',
            [
                now()->startOfDay(),
                now()->addDays(30)->endOfDay()
            ]
        )->count();

        $jumlahNotifikasiTerkirim = ModelRiwayatNotifikasi::where(
            'status',
            'terkirim'
        )->count();

        return view('admin.dashboard', compact(
            'jumlahUser',
            'jumlahAdmin',
            'jumlahPetugas',
            'jumlahSatuanPendidikan',
            'jumlahAktif',
            'jumlahSudahBerakhir',
            'jumlahSegeraBerakhir',
            'jumlahNotifikasiTerkirim'
        ));
    }
}