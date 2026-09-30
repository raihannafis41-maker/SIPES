<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class namaseederssipes extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USER ADMIN
        |--------------------------------------------------------------------------
        */

        DB::table('user')->insert([
            'nama' => 'Administrator SIPES',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'nomorwhatsapp' => '081234567890',
            'aktif' => true,
            'createdat' => now(),
            'updatedat' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | USER PETUGAS
        |--------------------------------------------------------------------------
        */

        DB::table('user')->insert([
            'nama' => 'Petugas SIPES',
            'username' => 'petugas',
            'password' => Hash::make('petugas123'),
            'role' => 'petugas',
            'nomorwhatsapp' => '081234567891',
            'aktif' => true,
            'createdat' => now(),
            'updatedat' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA SATUAN PENDIDIKAN
        |--------------------------------------------------------------------------
        */

        DB::table('satuanpendidikan')->insert([
            [
                'npsn' => '69828479',
                'nama' => 'KB ALIFAH',
                'jenis' => 'Kelompok Bermain (KB)',
                'yayasan' => 'Nurul Hikmah Tamiang',
                'kepalasekolah' => 'SURYA NINGSIH,S.Pd.I',
                'nomorwhatsapp' => '081234567892',
                'alamat' => 'Dusun Nusa Indah Kampung Suka Mulia',
                'desa' => 'Suka Mulia',
                'kecamatan' => 'Suka Mulia',
                'kabupaten' => 'Aceh Tamiang',
                'provinsi' => 'Aceh',
                'latitude' => null,
                'longitude' => null,
                'tanggalmulai' => '2024-01-03',
                'tanggalberakhir' => '2026-01-03',
                'aktif' => true,
                'createdat' => now(),
                'updatedat' => now(),
            ],

            [
                'npsn' => '69828596',
                'nama' => 'KB BUAH HATI',
                'jenis' => 'Kelompok Bermain (KB)',
                'yayasan' => 'Buah Hati Putri Tamiang',
                'kepalasekolah' => 'SURANIDA',
                'nomorwhatsapp' => '081234567893',
                'alamat' => 'Dusun Suka Maju Kampung Tenggulun',
                'desa' => 'Tenggulun',
                'kecamatan' => 'Tenggulun',
                'kabupaten' => 'Aceh Tamiang',
                'provinsi' => 'Aceh',
                'latitude' => null,
                'longitude' => null,
                'tanggalmulai' => '2023-12-19',
                'tanggalberakhir' => '2025-12-19',
                'aktif' => true,
                'createdat' => now(),
                'updatedat' => now(),
            ],

            [
                'npsn' => '69871042',
                'nama' => 'KB AR-RASYAD',
                'jenis' => 'Kelompok Bermain (KB)',
                'yayasan' => 'Lembaga PAUD AR-RASYAD',
                'kepalasekolah' => 'AFRIDA',
                'nomorwhatsapp' => '081234567894',
                'alamat' => 'Kampung Ingin Jaya',
                'desa' => 'Ingin Jaya',
                'kecamatan' => 'Rantau',
                'kabupaten' => 'Aceh Tamiang',
                'provinsi' => 'Aceh',
                'latitude' => null,
                'longitude' => null,
                'tanggalmulai' => '2023-12-12',
                'tanggalberakhir' => '2025-12-12',
                'aktif' => true,
                'createdat' => now(),
                'updatedat' => now(),
            ],

            [
                'npsn' => '69912890',
                'nama' => 'TK MAJU JAYA',
                'jenis' => 'Taman Kanak-Kanak (TK)',
                'yayasan' => 'Buah Hati Bunda',
                'kepalasekolah' => 'YUSNIATI, S.Pd',
                'nomorwhatsapp' => '081234567895',
                'alamat' => 'Kampung Rantau Bintang',
                'desa' => 'Rantau Bintang',
                'kecamatan' => 'Bandar Pusaka',
                'kabupaten' => 'Aceh Tamiang',
                'provinsi' => 'Aceh',
                'latitude' => null,
                'longitude' => null,
                'tanggalmulai' => '2023-12-20',
                'tanggalberakhir' => '2025-12-20',
                'aktif' => true,
                'createdat' => now(),
                'updatedat' => now(),
            ],

            [
                'npsn' => '69912909',
                'nama' => 'TPA QUROTUL AYUN',
                'jenis' => 'Taman Penitipan Anak (TPA)',
                'yayasan' => "Qurotul A'Yun",
                'kepalasekolah' => 'SALAMIAH',
                'nomorwhatsapp' => '081234567896',
                'alamat' => 'Dusun Kenanga Kampung Bukit Tempurung',
                'desa' => 'Bukit Tempurung',
                'kecamatan' => 'Kota Kualasimpang',
                'kabupaten' => 'Aceh Tamiang',
                'provinsi' => 'Aceh',
                'latitude' => null,
                'longitude' => null,
                'tanggalmulai' => '2024-10-06',
                'tanggalberakhir' => '2026-10-06',
                'aktif' => true,
                'createdat' => now(),
                'updatedat' => now(),
            ],
        ]);
    }
}