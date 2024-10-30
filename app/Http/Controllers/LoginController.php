<?php

namespace App\Http\Controllers;  // Ensure this matches

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\SuperadminManageAccount; 
use Spatie\Permission\Traits\HasRoles;


class LoginController extends Controller
{
    use AuthorizesRequests;

    public function authorize($ability, $arguments = []): bool
    {
        // Your authorization logic here
        return parent::authorize($ability, $arguments); // If you want to call the parent method
    }


    public function authenticate(Request $request) {
        // Validate the request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Redirect based on the user's role
            if ($user->hasRole('superadmin')) {
                return redirect()->route('SuperAdmin.SuperAdminWelcome');


            } elseif ($user->hasRole('vetclinic')) {
                // Check if the vet clinic is confirmed
                $vetClinics = SuperadminManageAccount::where('user_id', $user->id)->first();
            
                if ($vetClinics && $vetClinics->status === 'Complete') {
                    return redirect()->route('admin.AdminWelcome');
                }
            
                // If not confirmed, redirect to a "waiting for confirmation" page
                return redirect()->route('confirmation'); // Make sure this route exists
          





            } elseif ($user->hasRole('client')) {
                return redirect()->route('dashboard');
            }
    
            // Default redirect if no specific role matches
            return redirect()->route('login');
        }
    

        // If authentication fails, redirect back with input and errors
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
