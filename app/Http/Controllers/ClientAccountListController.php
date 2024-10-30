<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
class ClientAccountListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    
    // Pass the users data to the view
    return view('admin.AdminClientAccountList');
    }


    public function getClients()
    {
        $appointments = Appointment::all(); // Fetch all appointments
        $appointmentCount = $appointments->count(); // Get the count of appointments

        // Retrieve only users with the 'client' role
        $clients = User::role('client')->get();
    
        // Return the data to your DataTable view
        return view('admin.AdminClientAccountList', compact('clients','appointments', 'appointmentCount'));
    }


    public function destroy($id)
    {
        // Find the appointment by ID
        $clients = User::findOrFail($id);
        
        // Delete the appointment
        $clients->delete();
        
        // Return a response (optional)
        return response()->json(['message' => 'Appointment deleted successfully.']);
    }
}
