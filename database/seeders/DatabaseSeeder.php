<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Akun;
use App\Models\Pengunjung;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AkunSeeder::class);
        $this->call(PengunjungSeeder::class);
        $this->call(PenyewaanStaffSeeder::class);
        $this->call(PeminjamanSeeder::class);
        $this->call(BarangSeeder::class);
    }
}
