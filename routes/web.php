<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| COMMAND SCHEDULER
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Controller Authentication
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\ControllerAuthAdmin;
use App\Http\Controllers\Auth\ControllerAuthPetugas;
use App\Http\Controllers\Auth\ControllerAuthSatuanPendidikan;

/*
|--------------------------------------------------------------------------
| Controller Dashboard
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Dashboard\ControllerDashboardAdmin;
use App\Http\Controllers\Dashboard\ControllerDashboardPetugas;
use App\Http\Controllers\Dashboard\ControllerDashboardSatuanPendidikan;

/*
|--------------------------------------------------------------------------
| Controller Master
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Master\ControllerSatuanPendidikan;


/*
|--------------------------------------------------------------------------
| Controller Masa Berlaku
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\MasaBerlaku\ControllerMasaBerlaku;
use App\Http\Controllers\MasaBerlaku\ControllerMasaBerlakuPetugas;

/*
|--------------------------------------------------------------------------
| Controller Notifikasi
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Notifikasi\ControllerNotifikasi;

/*
|--------------------------------------------------------------------------
| Scheduler Notifikasi
|--------------------------------------------------------------------------
*/

Schedule::command('notifikasi:masa-berlaku')
    ->everyMinute();

/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing.index');
})->name('landing');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('login')->group(function () {

    Route::get('/admin', [
        ControllerAuthAdmin::class,
        'showLogin'
    ])->name('login.admin');

    Route::post('/admin', [
        ControllerAuthAdmin::class,
        'login'
    ])->name('login.admin.proses');
});

Route::post('/logout/admin', [
    ControllerAuthAdmin::class,
    'logout'
])->name('logout.admin');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION PETUGAS
|--------------------------------------------------------------------------
*/

Route::prefix('login')->group(function () {

    Route::get('/petugas', [
        ControllerAuthPetugas::class,
        'showLogin'
    ])->name('login.petugas');

    Route::post('/petugas', [
        ControllerAuthPetugas::class,
        'login'
    ])->name('login.petugas.proses');
});

Route::post('/logout/petugas', [
    ControllerAuthPetugas::class,
    'logout'
])->name('logout.petugas');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION SATUAN PENDIDIKAN
|--------------------------------------------------------------------------
*/

Route::prefix('login')->group(function () {

    Route::get('/satuan-pendidikan', [
        ControllerAuthSatuanPendidikan::class,
        'showLogin'
    ])->name('login.satuanpendidikan');

    Route::post('/satuan-pendidikan', [
        ControllerAuthSatuanPendidikan::class,
        'login'
    ])->name('login.satuanpendidikan.proses');
});

Route::post('/logout/satuan-pendidikan', [
    ControllerAuthSatuanPendidikan::class,
    'logout'
])->name('logout.satuanpendidikan');


/*
|--------------------------------------------------------------------------
| ZONA ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('admin')
    ->prefix('admin')
    ->group(function () {

        /*
        |------------------------------------------------------------------
        | Dashboard Admin
        |------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            ControllerDashboardAdmin::class,
            'index'
        ])->name('admin.dashboard');


        /*
        |------------------------------------------------------------------
        | Satuan Pendidikan
        |------------------------------------------------------------------
        */

        Route::prefix('satuanpendidikan')->group(function () {

            /*
            | Daftar Satuan Pendidikan
            */

            Route::get('/', [
                ControllerSatuanPendidikan::class,
                'index'
            ])->name('admin.satuanpendidikan.index');


            /*
            | Detail Satuan Pendidikan
            */

            Route::get('/{id}', [
                ControllerSatuanPendidikan::class,
                'show'
            ])->name('admin.satuanpendidikan.detail');
        });
        /*
/*
|--------------------------------------------------------------------------
| Masa Berlaku
|--------------------------------------------------------------------------
*/

        Route::prefix('masaberlaku')->group(function () {

            /*
    | Daftar Masa Berlaku
    */

            Route::get('/', [
                ControllerMasaBerlaku::class,
                'index'
            ])->name('admin.masaberlaku.index');


            /*
    | Form Perpanjangan
    */

            Route::get('/{id}/perpanjangan', [
                ControllerMasaBerlaku::class,
                'perpanjangan'
            ])->name('admin.masaberlaku.perpanjangan');


            /*
    | Proses Perpanjangan
    */

            Route::post('/{id}/perpanjangan', [
                ControllerMasaBerlaku::class,
                'simpanPerpanjangan'
            ])->name('admin.masaberlaku.simpan');


            /*
    | Detail Masa Berlaku
    */

            Route::get('/{id}', [
                ControllerMasaBerlaku::class,
                'show'
            ])->name('admin.masaberlaku.show');
        });

        /*
    |--------------------------------------------------------------------------
    | NOTIFIKASI
    |--------------------------------------------------------------------------
    */

        Route::prefix('notifikasi')->group(function () {

            Route::get('/', [
                ControllerNotifikasi::class,
                'index'
            ])->name('admin.notifikasi.index');

            Route::post('/pengaturan', [
                ControllerNotifikasi::class,
                'simpanPengaturan'
            ])->name('admin.notifikasi.pengaturan.simpan');

            Route::post('/kirim/{id}', [
                ControllerNotifikasi::class,
                'kirim'
            ])->name('admin.notifikasi.kirim');

            Route::post('/kirimulang/{id}', [
                ControllerNotifikasi::class,
                'kirimUlang'
            ])->name('admin.notifikasi.kirimulang');
        });
    });


/*
|--------------------------------------------------------------------------
| ZONA PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware('petugas')
    ->prefix('petugas')
    ->group(function () {

        /*
        |------------------------------------------------------------------
        | Dashboard Petugas
        |------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            ControllerDashboardPetugas::class,
            'index'
        ])->name('petugas.dashboard');
    });


/*
|--------------------------------------------------------------------------
| ZONA SATUAN PENDIDIKAN
|--------------------------------------------------------------------------
*/

Route::middleware('satuanpendidikan')
    ->prefix('satuanpendidikan')
    ->group(function () {

        /*
        |------------------------------------------------------------------
        | Dashboard Satuan Pendidikan
        |------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            ControllerDashboardSatuanPendidikan::class,
            'index'
        ])->name('satuanpendidikan.dashboard');
    });
/*
|--------------------------------------------------------------------------
| ZONA PETUGAS
|--------------------------------------------------------------------------
*/
Route::prefix('satuanpendidikan')->group(function () {

    Route::get(
        '/',
        [ControllerSatuanPendidikan::class, 'indexPetugas']
    )->name('petugas.satuanpendidikan.index');

    Route::get(
        '/tambah',
        [ControllerSatuanPendidikan::class, 'createPetugas']
    )->name('petugas.satuanpendidikan.create');

    Route::post(
        '/tambah',
        [ControllerSatuanPendidikan::class, 'storePetugas']
    )->name('petugas.satuanpendidikan.store');

    Route::get(
        '/{id}/edit',
        [ControllerSatuanPendidikan::class, 'editPetugas']
    )->name('petugas.satuanpendidikan.edit');

    Route::put(
        '/{id}',
        [ControllerSatuanPendidikan::class, 'updatePetugas']
    )->name('petugas.satuanpendidikan.update');

    Route::get(
        '/{id}',
        [ControllerSatuanPendidikan::class, 'showPetugas']
    )->name('petugas.satuanpendidikan.show');
});

/*
|--------------------------------------------------------------------------
| Masa Berlaku
|--------------------------------------------------------------------------
*/

Route::middleware('petugas')->group(function () {

    Route::get(
        '/masa-berlaku',
        [ControllerMasaBerlakuPetugas::class, 'index']
    )->name('petugas.masaberlaku.index');

    Route::get(
        '/masa-berlaku/{id}',
        [ControllerMasaBerlakuPetugas::class, 'show']
    )->name('petugas.masaberlaku.show');
    Route::get('/masa-berlaku/{id}/perpanjangan',
     [ControllerMasaBerlakuPetugas::class, 'perpanjangan']
     )->name('petugas.masaberlaku.perpanjangan');
});
