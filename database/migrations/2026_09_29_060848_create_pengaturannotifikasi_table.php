<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturannotifikasi', function (Blueprint $table) {
            $table->id();

            $table->boolean('aktif')->default(true);

            $table->unsignedInteger('harisebelum')->default(30);

            $table->time('jamkirim')->default('08:00:00');

            $table->string('jenisnotifikasi')->default('pengingat');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturannotifikasi');
    }
};