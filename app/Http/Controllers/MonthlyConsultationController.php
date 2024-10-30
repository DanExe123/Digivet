<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class MonthlyConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This can render the initial view if needed
       // return view('admin.MonthlyConsultation'); // You may modify this as necessary
    }

    public function getConsultationData()

    
    {

        $appointments = Appointment::all(); // Fetch all appointments
        $appointmentCount = $appointments->count(); // Get the count of appointments

        // Fetch only the appointments where the status is 'done' and service type is 'consultation'
        $consultationAppointments = Appointment::with('user') // Assuming the 'user' relationship exists
            ->where('status', 'done')
            ->where('services', 'consultation') // Only fetch consultations
            ->where(function ($query) {
                $query->whereDate('appointment_date', '<=', now()); // Past and current appointments
            })
            ->get();
    
        // Count the total number of consultation appointments
        $totalConsultation = $consultationAppointments->count();
    
        // Optionally, calculate monthly consultation data for charting purposes
        $monthlyConsultations = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyConsultations[] = Appointment::where('status', 'done')
                ->where('services', 'consultation') // Ensure this matches the consultation service type
                ->whereMonth('appointment_date', $month)
                ->whereYear('appointment_date', Carbon::now()->year)
                ->count();
        }
    
        // Pass the data to the MonthlyConsultation view
        return view('admin.MonthlyConsultation', compact('consultationAppointments', 'totalConsultation', 'monthlyConsultations','appointments', 'appointmentCount'));
    }
    
}
                    
