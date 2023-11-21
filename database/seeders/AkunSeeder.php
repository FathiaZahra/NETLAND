<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'super_admin',
                'role' => 'super_admin',
                'password' => Hash::make('super_admin')
            ],
            [
                'username' => 'pengelola',
                'role' => 'pengelola',
                'password' => Hash::make('git')
            ],
            [
                'username' => 'staff_ticketing',
                'role' => 'staff_ticketing',
                'password' => Hash::make('staff_ticketing')
            ],
            [
                'username' => 'staff_penyewaan',
                'role' => 'staff_penyewaan',
                'password' => Hash::make('staff_penyewaan')
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Akun::create($val);
        }
    }
}
