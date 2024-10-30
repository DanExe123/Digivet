<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon; // Import Carbon

class MonthlyCancelledController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all(); 
        // Initialize an empty array for cancellation counts per month
        $monthlyCancellations = [];
    
        // Loop through each month (1 to 12) and count the canceled appointments
        for ($month = 1; $month <= 12; $month++) {
            $monthlyCancellations[] = Appointment::where('status', 'cancelled')
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', Carbon::now()->year) // Get cancellations for the current year
                ->count();
        }
    
        // Fetch cancelled appointments for the current month for detailed view
        $cancelledAppointments = Appointment::with('user')
            ->where('status', 'cancelled')
            ->whereMonth('created_at', Carbon::now()->month) // Get current month
            ->whereYear('created_at', Carbon::now()->year)   // Get current year
            ->get();
    
        // Count the total number of cancelled appointments for the current month
        $cancelledCount = $cancelledAppointments->count();
        $appointmentCount = $appointments->count();
    
        // Pass the monthly cancellation data and other relevant data to the view
        return view('Admin.MonthlyCancelled', compact('monthlyCancellations', 'cancelledAppointments', 'cancelledCount','appointments','appointmentCount'));
    }
    
    // You can remove the other resource methods if they're not needed
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
