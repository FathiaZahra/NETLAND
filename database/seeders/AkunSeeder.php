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
                'username' => 'super',
                'role' => 'super_admin',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'pengelola',
                'role' => 'pengelola',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'ticketing',
                'role' => 'staff_ticketing',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'penyewaan',
                'role' => 'staff_penyewaan',
                'password' => Hash::make('123')
            ]
        ];

        // Melakukan looping data dengan foreach
        foreach ($userData as $user => $val) {
            Akun::create($val);
        }
    }
}
