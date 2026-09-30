<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// ✅ Import seeder dengan nama class yang BENAR
use Database\Seeders\namaseederssipes;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder utama
        $this->call(namaseederssipes::class);
    }
}