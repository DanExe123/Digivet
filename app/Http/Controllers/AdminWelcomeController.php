<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch users associated with the logged-in user's clinic
        $users = User::where('clinicname', Auth::user()->clinicname)->get();

        // Fetch appointments for the logged-in user
        $appointments = Appointment::where('user_id', Auth::id())->get(); 
        $cancelledAppointments = $appointments->where('status', 'cancelled');
        $appointmentCount = $appointments->count();

        return view('admin.AdminWelcome', compact('users', 'appointments', 'cancelledAppointments', 'appointmentCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cancelAppointment()
    {
        // Fetch appointments for the logged-in user
        $appointments = Appointment::where('user_id', Auth::id())->get(); 
        $cancelledAppointments = $appointments->where('status', 'cancelled'); 

        return view('admin.AdminWelcome', compact('appointments', 'cancelledAppointments'));
    }
}
