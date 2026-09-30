<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelRiwayatNotifikasi extends Model
{
    protected $table = 'riwayatnotifikasi';

    protected $fillable = [
        'satuanpendidikanid',
        'jenisnotifikasi',
        'nomortujuan',
        'tanggalkirim',
        'status',
        'pesan',
        'keterangan',
    ];

    protected $casts = [
        'tanggalkirim' => 'datetime',
    ];

    public function satuanpendidikan()
    {
        return $this->belongsTo(
            ModelSatuanPendidikan::class,
            'satuanpendidikanid',
            'id'
        );
    }
}