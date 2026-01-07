<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat User Penting
        User::create([
            'name' => 'Azhar Aulia Priatna',
            'email' => 'azharaulia@gmail.com',
            'password' => bcrypt('admin123'),
            'occupation' => 'Admin Codemy',
            'role' => 'teacher',
        ]);

        User::create([
            'name' => 'Askhabul Nur Ardhiansyakh',
            'email' => 'ardhi@gmail.com',
            'password' => bcrypt('admin123'),
            'occupation' => 'Admin Codemy',
            'role' => 'teacher',
        ]);
        
        User::create([
            'name' => 'Muhammad Rafi',
            'email' => 'mhrf@gmail.com',
            'password' => bcrypt('admin123'),
            'occupation' => 'Admin Codemy',
            'role' => 'teacher',
        ]);
    }
}
