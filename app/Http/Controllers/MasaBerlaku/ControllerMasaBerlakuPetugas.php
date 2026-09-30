<?php

namespace App\Http\Controllers\MasaBerlaku;

use App\Http\Controllers\Controller;
use App\Models\ModelRiwayatMasaBerlaku;
use App\Models\ModelSatuanPendidikan;
use Illuminate\Http\Request;

class ControllerMasaBerlakuPetugas extends Controller
{
    /**
     * Menampilkan daftar masa berlaku satuan pendidikan.
     */
    public function index(Request $request)
    {
        $query = ModelSatuanPendidikan::query();

        // Pencarian
        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'like', '%' . $cari . '%')
                    ->orWhere('npsn', 'like', '%' . $cari . '%')
                    ->orWhere('kepalasekolah', 'like', '%' . $cari . '%');
            });
        }

        // Filter status masa berlaku
        if ($request->filled('status')) {

            switch ($request->status) {

                case 'masihberlaku':

                    $query->whereNotNull('tanggalberakhir')
                        ->whereDate(
                            'tanggalberakhir',
                            '>',
                            now()->addDays(30)->startOfDay()
                        );

                    break;

                case 'segeraberakhir':

                    $query->whereNotNull('tanggalberakhir')
                        ->whereDate(
                            'tanggalberakhir',
                            '>=',
                            now()->startOfDay()
                        )
                        ->whereDate(
                            'tanggalberakhir',
                            '<=',
                            now()->addDays(30)->endOfDay()
                        );

                    break;

                case 'sudahberakhir':

                    $query->whereNotNull('tanggalberakhir')
                        ->whereDate(
                            'tanggalberakhir',
                            '<',
                            now()->startOfDay()
                        );

                    break;

                case 'belumditentukan':

                    $query->whereNull('tanggalberakhir');

                    break;
            }
        }

        $dataSatuanPendidikan = $query
            ->orderByRaw(
                'CASE
                    WHEN tanggalberakhir IS NULL THEN 2
                    WHEN tanggalberakhir < CURDATE() THEN 1
                    ELSE 0
                 END'
            )
            ->orderBy('tanggalberakhir', 'asc')
            ->orderBy('nama', 'asc')
            ->get();

        return view(
            'petugas.masaberlaku.index',
            compact('dataSatuanPendidikan')
        );
    }


    /**
     * Menampilkan detail masa berlaku.
     */
    public function show($id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        $riwayatMasaBerlaku = ModelRiwayatMasaBerlaku::with('pembuat')
            ->where('satuanpendidikanid', $id)
            ->orderBy('tanggalperpanjangan', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'petugas.masaberlaku.show',
            compact(
                'satuanPendidikan',
                'riwayatMasaBerlaku'
            )

        );
    }
    /** * Menampilkan form perpanjangan masa berlaku. */ public function perpanjangan($id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);
        return view('petugas.masaberlaku.perpanjangan', compact('satuanPendidikan'));
    }
}
