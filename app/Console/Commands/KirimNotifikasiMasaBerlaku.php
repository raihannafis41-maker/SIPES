<?php

namespace App\Console\Commands;

use App\Models\ModelPengaturanNotifikasi;
use App\Models\ModelRiwayatNotifikasi;
use App\Models\ModelSatuanPendidikan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class KirimNotifikasiMasaBerlaku extends Command
{
    protected $signature = 'notifikasi:masa-berlaku';

    protected $description = 'Mengecek masa berlaku dan membuat notifikasi otomatis';

    public function handle()
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL PENGATURAN NOTIFIKASI
        |--------------------------------------------------------------------------
        */

        $pengaturan = ModelPengaturanNotifikasi::first();

        /*
        |--------------------------------------------------------------------------
        | CEK PENGATURAN
        |--------------------------------------------------------------------------
        */

        if (!$pengaturan) {
            $this->warn(
                'Pengaturan notifikasi belum tersedia.'
            );

            return self::SUCCESS;
        }

        if (!$pengaturan->aktif) {
            $this->info(
                'Notifikasi otomatis sedang tidak aktif.'
            );

            return self::SUCCESS;
        }

        /*
        |--------------------------------------------------------------------------
        | CEK JAM PENGIRIMAN
        |--------------------------------------------------------------------------
        |
        | Command nantinya akan dijalankan Scheduler setiap menit.
        | Sistem hanya akan memproses notifikasi ketika jam sekarang
        | sama dengan jam yang telah diatur oleh Admin.
        |
        */

        $jamSekarang = now()->format('H:i');

        $jamPengaturan = Carbon::parse(
            $pengaturan->jamkirim
        )->format('H:i');

        if ($jamSekarang !== $jamPengaturan) {
            return self::SUCCESS;
        }

        /*
        |--------------------------------------------------------------------------
        | TANGGAL TARGET
        |--------------------------------------------------------------------------
        |
        | Contoh:
        | Hari ini 29-09-2026
        | Pengaturan H-30
        | Maka target tanggal berakhir = 29-10-2026
        |
        */

        $tanggalTarget = Carbon::today()->addDays(
            $pengaturan->harisebelum
        );

        $this->info(
            'Mengecek sekolah dengan masa berlaku pada: ' .
                $tanggalTarget->format('d-m-Y')
        );

        /*
        |--------------------------------------------------------------------------
        | CARI SATUAN PENDIDIKAN
        |--------------------------------------------------------------------------
        */

        $dataSatuanPendidikan = ModelSatuanPendidikan::where(
            'aktif',
            true
        )
            ->whereDate(
                'tanggalberakhir',
                $tanggalTarget->format('Y-m-d')
            )
            ->get();

        /*
        |--------------------------------------------------------------------------
        | JIKA TIDAK ADA DATA
        |--------------------------------------------------------------------------
        */

        if ($dataSatuanPendidikan->isEmpty()) {

            $this->info(
                'Tidak ada satuan pendidikan yang masuk jadwal notifikasi.'
            );

            return self::SUCCESS;
        }

        /*
        |--------------------------------------------------------------------------
        | PROSES SETIAP SATUAN PENDIDIKAN
        |--------------------------------------------------------------------------
        */

        foreach ($dataSatuanPendidikan as $satuanPendidikan) {

            /*
            |--------------------------------------------------------------------------
            | CEK NOMOR WHATSAPP
            |--------------------------------------------------------------------------
            */

            if (!$satuanPendidikan->nomorwhatsapp) {

                $this->warn(
                    "Nomor WhatsApp {$satuanPendidikan->nama} belum tersedia."
                );

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | CEK DUPLIKAT NOTIFIKASI
            |--------------------------------------------------------------------------
            |
            | Mencegah notifikasi yang sama dibuat lebih dari satu kali
            | pada hari yang sama.
            |
            */

            $sudahAda = ModelRiwayatNotifikasi::where(
                'satuanpendidikanid',
                $satuanPendidikan->id
            )
                ->where(
                    'jenisnotifikasi',
                    $pengaturan->jenisnotifikasi
                )
                ->whereDate(
                    'tanggalkirim',
                    Carbon::today()
                )
                ->exists();

            if ($sudahAda) {

                $this->line(
                    "Lewati {$satuanPendidikan->nama} - " .
                        "notifikasi hari ini sudah dibuat."
                );

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | BUAT PESAN
            |--------------------------------------------------------------------------
            */

            $pesan = $this->buatPesan(
                $satuanPendidikan,
                $pengaturan->harisebelum
            );

            /*
            |--------------------------------------------------------------------------
            | SIMPAN RIWAYAT NOTIFIKASI
            |--------------------------------------------------------------------------
            |
            | Status "menunggu" berarti notifikasi sudah dibuat oleh
            | SIPES tetapi belum dikirim melalui WhatsApp.
            |
            */

            ModelRiwayatNotifikasi::create([
                'satuanpendidikanid' => $satuanPendidikan->id,
                'jenisnotifikasi' => $pengaturan->jenisnotifikasi,
                'nomortujuan' => $satuanPendidikan->nomorwhatsapp,
                'tanggalkirim' => now(),
                'status' => 'menunggu',
                'pesan' => $pesan,
                'keterangan' => 'Notifikasi otomatis dari sistem.',
            ]);

            $this->info(
                "Notifikasi dibuat untuk: {$satuanPendidikan->nama}"
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SELESAI
        |--------------------------------------------------------------------------
        */

        $this->info(
            'Proses notifikasi selesai.'
        );

        return self::SUCCESS;
    }

    /**
     * Membuat pesan notifikasi.
     */
    private function buatPesan(
        ModelSatuanPendidikan $satuanPendidikan,
        int $hariSebelum
    ): string {
        $tanggalBerakhir = $satuanPendidikan->tanggalberakhir
            ? Carbon::parse(
                $satuanPendidikan->tanggalberakhir
            )->translatedFormat('d F Y')
            : '-';

        return
            "Assalamu'alaikum.\n\n" .

            "Yth. Bapak/Ibu {$satuanPendidikan->kepalasekolah},\n" .

            "Kepala {$satuanPendidikan->nama}.\n\n" .

            "Kami mengingatkan bahwa masa berlaku " .
            "satuan pendidikan {$satuanPendidikan->nama} " .
            "akan berakhir dalam {$hariSebelum} hari.\n\n" .

            "Tanggal berakhir: {$tanggalBerakhir}\n\n" .

            "Mohon melakukan perpanjangan masa berlaku " .
            "sebelum masa berlaku tersebut berakhir.\n\n" .

            "Terima kasih.\n\n" .

            "SIPES\n" .
            "Sistem Informasi Masa Berlaku Satuan Pendidikan";
    }
}
