<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        // PETUGAS
        User::create([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'petugas'
        ]);

        // MASYARAKAT
        User::create([
            'name' => 'Masyarakat',
            'email' => 'masyarakat@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'masyarakat'
        ]);
    }
}
