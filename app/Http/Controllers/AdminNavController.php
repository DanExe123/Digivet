<?php

namespace App\Http\Controllers;

use App\Models\Appointment; 
use Illuminate\Http\Request;

class AdminNavController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all(); // Fetch all appointments
        $appointmentCount = $appointments->count(); // Get the count of appointments
    
        return view('AdminNav.admin-nav', compact('appointments', 'appointmentCount')); // Pass appointments and count to the view
    }
    
}
