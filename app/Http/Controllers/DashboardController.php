<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Pass the user's name and profile photo path to the view
        return view('dashboard', [
            'name' => $user->name,
            'profile_photo_path' => $user->profile_photo_path, // Path to the profile photo
        ]);
    }
}
