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
                'username' => 'pengelola',
                'role' => 'pengelola',
                'password' => Hash::make('admin')
            ],
        ];

        foreach ($userData as $user => $val) {
            Akun::create($val);
        }
    }
}
