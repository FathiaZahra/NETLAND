<?php

namespace Database\Seeders;

use App\Models\TicketingStaff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketingStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id_akun' => 3,
                'nama_ticketingstaff' => 'erlia'
            ],
            [
                'id_akun' => 3,
                'nama_ticketingstaff' => 'fathia'
            ],
            [
                'id_akun' => 3,
                'nama_ticketingstaff' => 'kesya'
            ],
            [
                'id_akun' => 3,
                'nama_ticketingstaff' => 'nia'
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            TicketingStaff::create($val);
        }
    }
}
