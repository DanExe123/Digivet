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
    public function index() 
    {

        $appointments = Appointment::all(); // Fetch all appointments
        $appointmentCount = $appointments->count(); // Get the count of appointments

        $appointments = Appointment::with('user')->get();

                    // Return the view with appointments and new appointments passed to the view
                    return view('admin.AdminAppointment', compact('appointments', 'appointmentCount'));
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
    

