<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
class MonthlyVaccinatedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    public function getVaccinatedData()
    {
        $appointments = Appointment::all(); // Fetch all appointments
        $appointmentCount = $appointments->count(); // Get the count of appointments


        // Fetch all the appointments where the status is 'done' and the service type is 'vaccination'
        $vaccinatedAppointments = Appointment::with('user')  // Assuming the 'user' relationship exists
            ->where('status', 'done')
            ->where('services', 'vaccination') // Filter for vaccination appointments
            ->get();
        
        // Count the total number of vaccinated appointments
        $totalVaccinated = $vaccinatedAppointments->count();
        
        // Optionally, calculate monthly vaccinated data for charting purposes
        $monthlyVaccinations = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyVaccinations[] = Appointment::where('status', 'done')
                ->where('services', 'vaccination') // Ensure this also filters by vaccination
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', Carbon::now()->year)
                ->count();
        }
        
        // Pass the data to the MonthlyVaccinated view
        return view('admin.MonthlyVaccinated', compact('vaccinatedAppointments', 'totalVaccinated', 'monthlyVaccinations','appointments', 'appointmentCount'));
    }
    
}
