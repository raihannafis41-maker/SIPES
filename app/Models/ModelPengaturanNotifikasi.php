<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPengaturanNotifikasi extends Model
{
    protected $table = 'pengaturannotifikasi';

    protected $fillable = [
        'aktif',
        'harisebelum',
        'jamkirim',
        'jenisnotifikasi',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'harisebelum' => 'integer',
    ];
}