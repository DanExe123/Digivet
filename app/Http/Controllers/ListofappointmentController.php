<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth; 
class ListofappointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Fetch appointments that belong to the authenticated user
        $appointments = Appointment::where('user_id', Auth::id())->get(); // Get user's appointments 
        return view('Appointment.Listofappointment', compact('appointments')); // Pass appointments to the view
    }

    
    public function cancelAppointment(Request $request)
    {
        // Validate the request
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'reason' => 'required|string|max:255',
        ]);
    
        // Find the appointment and update its status or add a cancellation reason
        $appointment = Appointment::find($request->appointment_id);
       $appointment->status = 'cancelled'; // Assuming you have a status column
        $appointment->cancellation_reason = $request->reason; // Add this column in your appointments table if not existing
        $appointment->save();
    
        return redirect()->back()->with('success', 'Appointment cancelled successfully.');
    }
}