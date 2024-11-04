<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class MonthlyDewormingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.MonthlyDeworming');
    }


    public function getDewormingData()
    {
        $appointments = Appointment::all(); // Fetch all appointments
        $appointmentCount = $appointments->count(); // Get the count of appointments


        // Fetch only the appointments where the status is 'done' and service type is 'consultation'
        $DewormingnAppointments = Appointment::with('user') // Assuming the 'user' relationship exists
            ->where('status', 'done')
            ->where('services', 'Deworming') // Only fetch consultations
            ->where(function ($query) {
                $query->whereDate('appointment_date', '<=', now()); // Past and current appointments
            })
            ->get();


           


        // Count the total number of consultation appointments
        $totalDeworming = $DewormingnAppointments->count();
    
        // Optionally, calculate monthly consultation data for charting purposes
        $monthlyDeworming = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyDeworming[] = Appointment::where('status', 'done')
                ->where('services', 'Deworming') // Ensure this matches the consultation service type
                ->whereMonth('appointment_date', $month)
                ->whereYear('appointment_date', Carbon::now()->year)
                ->count();
        }
    
        // Pass the data to the MonthlyConsultation view
        return view('admin.MonthlyDeworming', compact('DewormingnAppointments', 'totalDeworming', 'monthlyDeworming','appointments', 'appointmentCount'));
    }
   
}
