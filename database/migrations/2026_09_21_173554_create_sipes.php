<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Tabel User
        |--------------------------------------------------------------------------
        | Untuk Admin dan Petugas
        */
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');

            $table->enum('role', [
                'admin',
                'petugas'
            ]);

            $table->string('nomorwhatsapp')->nullable();
            $table->boolean('aktif')->default(true);

            $table->timestamp('createdat')->nullable();
            $table->timestamp('updatedat')->nullable();
        });


        /*
        |--------------------------------------------------------------------------
        | Tabel Satuan Pendidikan
        |--------------------------------------------------------------------------
        */
        Schema::create('satuanpendidikan', function (Blueprint $table) {
            $table->id();

            $table->string('npsn')->unique();
            $table->string('nama');
            $table->string('jenis');
            $table->string('yayasan')->nullable();
            $table->string('kepalasekolah');
            $table->string('nomorwhatsapp')->nullable();

            $table->text('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();

            // Lokasi Google Maps
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Masa berlaku
            $table->date('tanggalmulai');
            $table->date('tanggalberakhir');

            $table->boolean('aktif')->default(true);

            $table->timestamp('createdat')->nullable();
            $table->timestamp('updatedat')->nullable();
        });


        /*
        |--------------------------------------------------------------------------
        | Tabel Riwayat Masa Berlaku
        |--------------------------------------------------------------------------
        */
        Schema::create('riwayatmasaberlaku', function (Blueprint $table) {
            $table->id();

            $table->foreignId('satuanpendidikanid')
                ->constrained('satuanpendidikan')
                ->cascadeOnDelete();

            $table->date('tanggalmulai');
            $table->date('tanggalberakhir');
            $table->date('tanggalperpanjangan')->nullable();

            $table->text('keterangan')->nullable();

            $table->foreignId('dibuatoleh')
                ->nullable()
                ->constrained('user')
                ->nullOnDelete();

            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | Tabel Riwayat Notifikasi WhatsApp
        |--------------------------------------------------------------------------
        */
        Schema::create('riwayatnotifikasi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('satuanpendidikanid')
                ->constrained('satuanpendidikan')
                ->cascadeOnDelete();

            $table->string('jenisnotifikasi');

            $table->string('nomortujuan');

            $table->dateTime('tanggalkirim')->nullable();

            $table->enum('status', [
                'menunggu',
                'terkirim',
                'gagal'
            ])->default('menunggu');

            $table->text('pesan')->nullable();

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('riwayatnotifikasi');
        Schema::dropIfExists('riwayatmasaberlaku');
        Schema::dropIfExists('satuanpendidikan');
        Schema::dropIfExists('user');
    }
};
