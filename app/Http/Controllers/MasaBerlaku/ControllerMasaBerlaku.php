<?php

namespace App\Http\Controllers\MasaBerlaku;

use App\Http\Controllers\Controller;
use App\Models\ModelRiwayatMasaBerlaku;
use App\Models\ModelSatuanPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControllerMasaBerlaku extends Controller
{
    /**
     * Menampilkan daftar masa berlaku.
     */
    public function index()
    {
        $dataSatuanPendidikan = ModelSatuanPendidikan::orderBy(
            'tanggalberakhir',
            'asc'
        )->get();

        return view(
            'admin.masaberlaku.index',
            compact('dataSatuanPendidikan')
        );
    }


    /**
     * Menampilkan detail masa berlaku.
     */
    public function show($id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        $riwayatMasaBerlaku = ModelRiwayatMasaBerlaku::where(
            'satuanpendidikanid',
            $id
        )
            ->orderBy('tanggalperpanjangan', 'desc')
            ->get();

        return view(
            'admin.masaberlaku.show',
            compact(
                'satuanPendidikan',
                'riwayatMasaBerlaku'
            )
        );
    }


    /**
     * Menampilkan form perpanjangan.
     */
    public function perpanjangan($id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        return view(
            'admin.masaberlaku.perpanjangan',
            compact('satuanPendidikan')
        );
    }


    /**
     * Menyimpan perpanjangan masa berlaku.
     */
    public function simpanPerpanjangan(Request $request, $id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        $request->validate([
            'tanggalmulai' => [
                'required',
                'date',
            ],

            'tanggalberakhir' => [
                'required',
                'date',
                'after_or_equal:tanggalmulai',
            ],

            'tanggalperpanjangan' => [
                'required',
                'date',
            ],

            'keterangan' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ], [
            'tanggalmulai.required' => 'Tanggal mulai wajib diisi.',
            'tanggalmulai.date' => 'Tanggal mulai tidak valid.',

            'tanggalberakhir.required' => 'Tanggal berakhir wajib diisi.',
            'tanggalberakhir.date' => 'Tanggal berakhir tidak valid.',
            'tanggalberakhir.after_or_equal' =>
                'Tanggal berakhir harus sama atau setelah tanggal mulai.',

            'tanggalperpanjangan.required' =>
                'Tanggal perpanjangan wajib diisi.',

            'tanggalperpanjangan.date' =>
                'Tanggal perpanjangan tidak valid.',

            'keterangan.max' =>
                'Keterangan maksimal 1000 karakter.',
        ]);


        DB::transaction(function () use (
            $request,
            $id,
            $satuanPendidikan
        ) {

            /*
             * Simpan histori perpanjangan
             */
            ModelRiwayatMasaBerlaku::create([
                'satuanpendidikanid' => $id,

                'tanggalmulai' =>
                    $request->tanggalmulai,

                'tanggalberakhir' =>
                    $request->tanggalberakhir,

                'tanggalperpanjangan' =>
                    $request->tanggalperpanjangan,

                'keterangan' =>
                    $request->keterangan,

                'dibuatoleh' =>
                    Auth::id(),
            ]);


            /*
             * Update masa berlaku aktif
             * pada tabel satuanpendidikan
             */
            $satuanPendidikan->tanggalmulai =
                $request->tanggalmulai;

            $satuanPendidikan->tanggalberakhir =
                $request->tanggalberakhir;

            $satuanPendidikan->save();
        });


        return redirect()
            ->route(
                'admin.masaberlaku.show',
                $id
            )
            ->with(
                'success',
                'Masa berlaku berhasil diperpanjang.'
            );
    }
}