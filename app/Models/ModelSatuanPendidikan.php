<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSatuanPendidikan extends Model
{
    protected $table = 'satuanpendidikan';

    const CREATED_AT = 'createdat';
    const UPDATED_AT = 'updatedat';

    protected $fillable = [
        'npsn',
        'nama',
        'jenis',
        'yayasan',
        'kepalasekolah',
        'nomorwhatsapp',
        'alamat',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'latitude',
        'longitude',
        'tanggalmulai',
        'tanggalberakhir',
        'aktif',
    ];

    protected $casts = [
        'tanggalmulai' => 'date',
        'tanggalberakhir' => 'date',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'aktif' => 'boolean',
        'createdat' => 'datetime',
        'updatedat' => 'datetime',
    ];

    public function riwayatMasaBerlaku()
    {
        return $this->hasMany(
            ModelRiwayatMasaBerlaku::class,
            'satuanpendidikanid'
        );
    }

    public function riwayatNotifikasi()
    {
        return $this->hasMany(
            ModelRiwayatNotifikasi::class,
            'satuanpendidikanid'
        );
    }

    public function masaBerlakuTerakhir()
    {
        return $this->hasOne(
            ModelRiwayatMasaBerlaku::class,
            'satuanpendidikanid'
        )->latestOfMany();
    }

    public function getStatusMasaBerlakuAttribute()
    {
        if (!$this->tanggalberakhir) {
            return 'Belum Ditentukan';
        }

        $hari = now()->startOfDay()->diffInDays(
            $this->tanggalberakhir,
            false
        );

        if ($hari < 0) {
            return 'Sudah Berakhir';
        }

        if ($hari <= 30) {
            return 'Segera Berakhir';
        }

        return 'Masih Berlaku';
    }
}