<?php

namespace Database\Seeders;

use App\Models\Pengunjung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengunjungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_akun' => 1,
                'nama_pengunjung' => 'super_admin',
                'email' => 'qwerty@gmail'
            ],
            [
                'id_akun' => 2,
                'nama_pengunjung' => 'pengelola',
                'email' => 'qwerty@gmail'
            ],
            [
                'id_akun' => 3,
                'nama_pengunjung' => 'staff_ticketing',
                'email' => 'qwerty@gmail'
            ],
            [
                'id_akun' => 4,
                'nama_pengunjung' => 'staff_penyewaan',
                'email' => 'qwerty@gmail'
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Pengunjung::create($val);
        }
    }
}
