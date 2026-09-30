<?php

use App\Models\ModelUser;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Pengaturan default autentikasi aplikasi SIPES.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'user'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Guard digunakan untuk menangani proses login Admin dan Petugas.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'user',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | SIPES menggunakan ModelUser dan tabel user.
    |
    */

    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => ModelUser::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Pengaturan reset password.
    |
    */

    'passwords' => [
        'user' => [
            'provider' => 'user',
            'table' => env(
                'AUTH_PASSWORD_RESET_TOKEN_TABLE',
                'password_reset_tokens'
            ),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Waktu berlaku konfirmasi password.
    |
    */

    'password_timeout' => env(
        'AUTH_PASSWORD_TIMEOUT',
        10800
    ),

];
