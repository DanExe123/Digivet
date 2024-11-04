<?php

namespace App\Http\Controllers;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Appointment; 

use Illuminate\Support\Facades\Log; // Import the Log facade
use Spatie\Permission\Models\Permission;

class AdminAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Retrieve clinic_id from the request
    $clinic_id = $request->input('clinic_id'); // Make sure 'clinic_id' matches the name of the input field

    // Fetch appointments, filtering by clinic_id if provided
    $appointments = Appointment::with('user')
        ->when($clinic_id, function ($query) use ($clinic_id) {
            return $query->where('clinic_id', $clinic_id);
        })
        ->get();

    // Log each appointment's details
    foreach ($appointments as $appointment) {
        \Log::info('Appointment Details:', $appointment->toArray());
    }

    // Get the count of appointments
    $appointmentCount = $appointments->count();



    // Return view with data
    return view('admin.AdminAppointment', compact('appointments', 'appointmentCount', 'clinic_id'));
}

    
    public function markAsDone(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|string',
        ]);
    
        // Find the appointment and update the status
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status; // Update the status
        $appointment->save(); // Save changes
    
        return response()->json(['message' => 'Status updated successfully!']);
    }



    public function destroy($id)
    {
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);
        
        // Delete the appointment
        $appointment->delete();
        
        // Return a response (optional)
        return response()->json(['message' => 'Appointment deleted successfully.']);
    }






  // New method to get today's patient stats and patients in queue
  public function getPatientStats()
  {
    
      $today = \Carbon\Carbon::today()->toDateString();
  
      // Count today's patients
      $todaysPatientsCount = Appointment::whereDate('appointment_date', $today)->count();
  
      // Count patients in queue (assuming 'active' indicates appointments that are queued)
      $patientsInQueueCount = Appointment::where('status', 'active')->count();
  
      return response()->json([
          'todays_patients' => $todaysPatientsCount,
          'queue_patients' => $patientsInQueueCount,
      ]);
  }  

}
    

