<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminWelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all appointments
        $appointments = Appointment::all(); 
        $cancelledAppointments = $appointments->where('status', 'cancelled');
        $appointmentCount = $appointments->count();

        // Fetch users associated with the logged-in user's clinic
        // Uncomment this line if needed
        // $users = User::where('clinicname', Auth::user()->clinicname)->get();

        return view('admin.AdminWelcome', compact('appointments', 'cancelledAppointments', 'appointmentCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cancelAppointment()
    {
        // Fetch all appointments
        $appointments = Appointment::all(); 
        $cancelledAppointments = $appointments->where('status', 'cancelled'); 

        return view('admin.AdminWelcome', compact('appointments', 'cancelledAppointments'));
    }
}
