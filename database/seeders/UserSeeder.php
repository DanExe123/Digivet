<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles if they don't exist
        Role::firstOrCreate(['name' => 'superadmin']);
        Role::firstOrCreate(['name' => 'vetclinic']);
         Role::firstOrCreate(['name' => 'client']);
        
 

        // Create the superadmin user
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'), 
            'clinicname' => 'Super Admin Clinic',
        ]);
        $superadmin->assignRole('superadmin');

        // Create a veterinary clinic user
        $vetclinic = User::create([
            'name' => 'Vet Clinic User',
            'email' => 'vetclinic@example.com',
            'password' => bcrypt('password'),
            'clinicname' => 'Vet Clinic Name', // Set the clinic name
        ]);
        $vetclinic->assignRole('vetclinic');

        // Create a client user
        $client = User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => bcrypt('password'),
            'clinicname' => null, // No clinic name for client
        ]);
        $client->assignRole('client');
    }
}
