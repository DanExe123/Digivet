<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles
        Role::firstOrCreate(['name' => 'superadmin']);
       Role::firstOrCreate(['name' => 'vetclinic']);
        Role::firstOrCreate(['name' => 'client']);
       

        // Assign roles to users (example)
        $superadmin = User::find(1); // Fetch user with ID 1
        $superadmin->assignRole('superadmin');

        $vetclinic = User::find(2); // Fetch user with ID 2
        $vetclinic->assignRole('vetclinic');

        $client = User::find(3); // Fetch user with ID 3
        $client->assignRole('client');
    }
}

