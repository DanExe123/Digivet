<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperadminManageAccount;
class SuperAdminWelcomeController extends Controller
{
    public function index()
    {
        $vetClinics = SuperadminManageAccount::all();

        // Return a view with the vet clinics data
        return view('SuperAdmin.SuperAdminWelcome', compact('vetClinics'));
    }
}
