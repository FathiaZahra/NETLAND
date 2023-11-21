<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_ticketingstaff' => 1,
                'id_pengunjung' => 3,
                'tanggal_pemesanan' => '2023-11-10',
                'jumlah_ticket' => 1,
                'harga_ticket' => 25000,
                'pembayaran_ticket' => 50000,
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Ticket::create($val);
        }
    }
}
