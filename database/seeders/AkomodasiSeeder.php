<?php

namespace Database\Seeders;

use App\Models\Akomodasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkomodasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama_akomodasi' => 'Bogor',
                'isi_akomodasi' => 'jalannnnnn',
            ]
        ];

        foreach ($userData as $user => $val) {
            Akomodasi::create($val);
        }
    }
}
