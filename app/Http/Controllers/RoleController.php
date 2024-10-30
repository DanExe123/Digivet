<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\User;

class RoleController extends Controller
{
   

    public function assignRoles()
    {
        $user = User::find(1); // Fetch the user
        $user->assignRole('superadmin'); // Assign 'superadmin' role
    
        $user = User::find(2); // Fetch the user
        $user->assignRole('vetclinic'); // Assign 'superadmin' role

        $user = User::find(3); // Fetch the user
        $user->assignRole('client'); // Assign 'superadmin' role
        // Repeat for other users and roles as needed
    }
}
