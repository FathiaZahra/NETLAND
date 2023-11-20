<?php

namespace Database\Seeders;

use App\Models\Pengelola;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengelolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_akun' => 1,
                'nama_pengelola' => 'pengelola',
                'no_telp' => '0812121',
            ],
        ];

        foreach ($userData as $user => $val) {
            Pengelola::create($val);
        }
    }
}
