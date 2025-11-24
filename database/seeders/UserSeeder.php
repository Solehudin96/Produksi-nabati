<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password1'),
            'role' => 'admin',
        ]);

        // Atasan
        User::create([
            'name' => 'Atasan Produksi',
            'email' => 'atasan@example.com',
            'password' => Hash::make('password2'),
            'role' => 'atasan',
        ]);

        // Karyawan
        User::create([
            'name' => 'Karyawan Nabati',
            'email' => 'karyawan@example.com',
            'password' => Hash::make('password3'),
            'role' => 'karyawan',
        ]);
    }
}
