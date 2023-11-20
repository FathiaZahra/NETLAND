<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_peminjaman' => 1,
                'id_pengunjung' => 3,
                'nama_barang' => 'karpet',
                'harga_barang' => 20000,
                'stok_barang' => 10,
                'pembayaran_sewabarang' => 20000,
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Barang::create($val);
        }
    }
}
