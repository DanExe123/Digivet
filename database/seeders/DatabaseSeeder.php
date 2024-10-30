<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
//use Database\Seeders\RoleSeeder; // Corrected namespace for RoleSeeder


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
        RoleSeeder::class,
        UserSeeder::class,
      ]);
    }
}