<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_penyewaanstaff' => 1,
                'id_pengunjung' => 3,
                'jumlah_sewa' => 2,
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Peminjaman::create($val);
        }
    }
}
