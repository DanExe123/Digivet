<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        // Check for specific roles instead of a generic is_admin
        if ($user->hasRole('superadmin')) {
            return redirect()->route('superadmin.superadminwelcome');
      
      
        } elseif ($user->hasRole('vetclinic')) {
            return redirect()->route('admin.AdminWelcome'); // Replace with your route name for vetclinic dashboard
      


        } elseif ($user->hasRole('client')) {

            return redirect()->route('client.dashboard'); // Replace with your route name for client dashboard
        }

        // Default redirect if no specific role matches
        return redirect()->route('login'); // Replace with your default route if needed
    }
}