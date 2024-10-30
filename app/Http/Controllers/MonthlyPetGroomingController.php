<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;



class MonthlyPetGroomingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.MonthlyPetGrooming');
    }

    public function getGroomingData()

    
    {
        $appointments = Appointment::all(); // Fetch all appointments
        $appointmentCount = $appointments->count(); // Get the count of appointments

        
        // Fetch only the appointments where the status is 'done' and service type is 'grooming'
        $GroomingAppointments = Appointment::with('user') // Assuming the 'user' relationship exists
            ->where('status', 'done')
            ->where('services', 'Pet Grooming') // Only fetch grooming appointments
            ->where(function ($query) {
                $query->whereDate('appointment_date', '<=', now()); // Past and current appointments
            })
            ->get();
    
        // Count the total number of grooming appointments
        $totalGrooming = $GroomingAppointments->count();
    
        // Optionally, calculate monthly grooming data for charting purposes
        $monthlyGrooming = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyGrooming[] = Appointment::where('status', 'done')
                ->where('services', 'Pet Grooming') // Ensure this matches the grooming service type
                ->whereMonth('appointment_date', $month)
                ->whereYear('appointment_date', Carbon::now()->year)
                ->count();
        }
    
        // Pass the data to the MonthlyGrooming view
        return view('admin.MonthlyPetGrooming', compact('GroomingAppointments', 'totalGrooming', 'monthlyGrooming','appointments', 'appointmentCount'));
    }
    
}
