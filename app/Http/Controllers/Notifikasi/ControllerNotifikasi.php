<?php

namespace App\Http\Controllers\Notifikasi;

use App\Http\Controllers\Controller;
use App\Models\ModelPengaturanNotifikasi;
use App\Models\ModelRiwayatNotifikasi;
use App\Models\ModelSatuanPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerNotifikasi extends Controller
{
    /**
     * Halaman utama notifikasi
     */
    public function index()
    {
        $pengaturan = ModelPengaturanNotifikasi::first();

        $riwayatNotifikasi = ModelRiwayatNotifikasi::with(
            'satuanpendidikan'
        )
            ->orderBy('tanggalkirim', 'desc')
            ->get();

        return view(
            'admin.notifikasi.index',
            compact(
                'pengaturan',
                'riwayatNotifikasi'
            )
        );
    }


    /**
     * Simpan pengaturan notifikasi
     */
    public function simpanPengaturan(Request $request)
    {
        $request->validate([
            'aktif' => ['nullable', 'boolean'],

            'harisebelum' => [
                'required',
                'integer',
                'min:1',
                'max:365',
            ],

            'jamkirim' => [
                'required',
                'date_format:H:i',
            ],

            'jenisnotifikasi' => [
                'required',
                'string',
                'max:100',
            ],
        ], [
            'harisebelum.required' =>
                'Jumlah hari sebelum masa berlaku berakhir wajib diisi.',

            'harisebelum.integer' =>
                'Jumlah hari harus berupa angka.',

            'harisebelum.min' =>
                'Jumlah hari minimal 1 hari.',

            'harisebelum.max' =>
                'Jumlah hari maksimal 365 hari.',

            'jamkirim.required' =>
                'Jam pengiriman wajib diisi.',

            'jamkirim.date_format' =>
                'Format jam pengiriman tidak valid.',

            'jenisnotifikasi.required' =>
                'Jenis notifikasi wajib diisi.',
        ]);

        ModelPengaturanNotifikasi::updateOrCreate(
            ['id' => 1],
            [
                'aktif' => $request->boolean('aktif'),
                'harisebelum' => $request->harisebelum,
                'jamkirim' => $request->jamkirim,
                'jenisnotifikasi' => $request->jenisnotifikasi,
            ]
        );

        return redirect()
            ->route('admin.notifikasi.index')
            ->with(
                'success',
                'Pengaturan notifikasi berhasil disimpan.'
            );
    }


    /**
     * Kirim notifikasi manual
     */
    public function kirim($id)
    {
        $satuanPendidikan = ModelSatuanPendidikan::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Untuk sementara kita buat data riwayat terlebih dahulu.
        | Pengiriman WhatsApp asli akan kita sambungkan setelah fitur
        | WhatsApp ditentukan.
        |--------------------------------------------------------------------------
        */

        $nomorTujuan = $satuanPendidikan->nomorwhatsapp
            ?? null;

        if (!$nomorTujuan) {
            return redirect()
                ->route('admin.notifikasi.index')
                ->with(
                    'error',
                    'Nomor WhatsApp kepala sekolah belum tersedia.'
                );
        }

        $pesan = $this->buatPesan(
            $satuanPendidikan
        );

        ModelRiwayatNotifikasi::create([
            'satuanpendidikanid' => $satuanPendidikan->id,
            'jenisnotifikasi' => 'manual',
            'nomortujuan' => $nomorTujuan,
            'tanggalkirim' => now(),
            'status' => 'menunggu',
            'pesan' => $pesan,
            'keterangan' => 'Pengiriman manual oleh admin.',
        ]);

        return redirect()
            ->route('admin.notifikasi.index')
            ->with(
                'success',
                'Notifikasi berhasil dimasukkan ke riwayat pengiriman.'
            );
    }


    /**
     * Kirim ulang notifikasi
     */
    public function kirimUlang($id)
    {
        $riwayat = ModelRiwayatNotifikasi::findOrFail($id);

        $satuanPendidikan = $riwayat->satuanpendidikan;

        if (!$satuanPendidikan) {
            return redirect()
                ->route('admin.notifikasi.index')
                ->with(
                    'error',
                    'Data satuan pendidikan tidak ditemukan.'
                );
        }

        $nomorTujuan = $riwayat->nomortujuan;

        if (!$nomorTujuan) {
            return redirect()
                ->route('admin.notifikasi.index')
                ->with(
                    'error',
                    'Nomor tujuan tidak tersedia.'
                );
        }

        ModelRiwayatNotifikasi::create([
            'satuanpendidikanid' => $satuanPendidikan->id,
            'jenisnotifikasi' => $riwayat->jenisnotifikasi,
            'nomortujuan' => $nomorTujuan,
            'tanggalkirim' => now(),
            'status' => 'menunggu',
            'pesan' => $riwayat->pesan,
            'keterangan' => 'Pengiriman ulang oleh admin.',
        ]);

        return redirect()
            ->route('admin.notifikasi.index')
            ->with(
                'success',
                'Notifikasi berhasil dimasukkan kembali ke antrean pengiriman.'
            );
    }


    /**
     * Membuat isi pesan notifikasi
     */
    private function buatPesan($satuanPendidikan)
    {
        $tanggalBerakhir = $satuanPendidikan->tanggalberakhir
            ? \Carbon\Carbon::parse(
                $satuanPendidikan->tanggalberakhir
            )->translatedFormat('d F Y')
            : '-';

        return
            "Assalamu'alaikum.\n\n" .
            "Yth. Kepala {$satuanPendidikan->nama},\n\n" .
            "Kami mengingatkan bahwa masa berlaku satuan pendidikan " .
            "akan berakhir pada {$tanggalBerakhir}.\n\n" .
            "Mohon melakukan perpanjangan masa berlaku sebelum tanggal tersebut.\n\n" .
            "Terima kasih.\n\n" .
            "SIPES - Sistem Informasi Masa Berlaku Satuan Pendidikan";
    }
}