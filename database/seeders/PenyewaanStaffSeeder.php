<?php

namespace Database\Seeders;

use App\Models\PenyewaanStaff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyewaanStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_akun' => 4,
                'nama_penyewaanstaff' => 'fathia'
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            PenyewaanStaff::create($val);
        }
    }
}
