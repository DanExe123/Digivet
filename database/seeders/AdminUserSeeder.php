<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin123',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);
    }
}
