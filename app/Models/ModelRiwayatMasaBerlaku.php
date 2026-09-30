<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelRiwayatMasaBerlaku extends Model
{
    protected $table = 'riwayatmasaberlaku';

    protected $fillable = [
        'satuanpendidikanid',
        'tanggalmulai',
        'tanggalberakhir',
        'tanggalperpanjangan',
        'keterangan',
        'dibuatoleh',
    ];

    protected $casts = [
        'tanggalmulai' => 'date',
        'tanggalberakhir' => 'date',
        'tanggalperpanjangan' => 'date',
    ];

    public function satuanpendidikan()
    {
        return $this->belongsTo(
            ModelSatuanPendidikan::class,
            'satuanpendidikanid',
            'id'
        );
    }

    public function pembuat()
    {
        return $this->belongsTo(
            ModelUser::class,
            'dibuatoleh',
            'id'
        );
    }
}