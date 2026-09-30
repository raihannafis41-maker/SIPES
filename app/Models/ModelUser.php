<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ModelUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    const CREATED_AT = 'createdat';
    const UPDATED_AT = 'updatedat';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'role',
        'nomorwhatsapp',
        'aktif',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        'createdat' => 'datetime',
        'updatedat' => 'datetime',
    ];

    public function riwayatMasaBerlaku()
    {
        return $this->hasMany(
            ModelRiwayatMasaBerlaku::class,
            'dibuatoleh'
        );
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPetugas()
    {
        return $this->role === 'petugas';
    }
}