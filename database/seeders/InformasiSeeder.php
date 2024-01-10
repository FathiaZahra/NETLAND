<?php

namespace Database\Seeders;

use App\Models\Informasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama_informasi' => 'kawah ratu',
                'isi_informasi' => 'jdhfuuaehufrhbzndbuffdua',
            ]
        ];

        foreach ($userData as $user => $val) {
            Informasi::create($val);
        }
    }
}
