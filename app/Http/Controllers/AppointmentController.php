<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Appointment;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth; 
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       
       // $clinics = User::whereNotNull('clinicname')->pluck('clinicname')->unique();
       // $clinics = User::whereNotNull('clinicname')->get();
       $clinics = User::whereNotNull('clinicname')->get([
        'id', 
        'name', 
        'email', 
        'address', 
        'Contact', 
        'clinicname',
        'clinic_description',
        'pricing_deworming', 
        'pricing_vaccinated', 
        'pricing_consultation', 
        'pricing_petgrooming'
    ]);
    
        return view('Appointment.appointment', compact('clinics'));
    
    }
   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    //model property 
    public function store(AppointmentRequest $request)
    {

        \Log::info($request->all()); // Logs the form data

    
        
        $validated = $request->validated();
        
        
        $filteredServices = array_filter($validated['services']); // Filter out any empty services

          // Get the last appointment number
    $lastAppointment = Appointment::orderBy('appointment_number', 'desc')->first();
    $newAppointmentNumber = $lastAppointment ? $lastAppointment->appointment_number + 1 : 1; // Increment or start from 1


    Appointment::create([

        'user_id' => auth()->id(), 
        'pet_name' => $validated['pet_name'],
        'clinicname' => $validated['clinicname'],
        'services' => !empty($filteredServices) ? implode(',', $filteredServices) : null, // Store services as a comma-separated string
  
            'gender' => $validated['gender'],
            'breed' => $validated['breed'],
            'birthdate' => $validated['birthdate'],
            'appointment_date' => $validated['appointment_date'],
            'service_type' => $validated['service_type'],
            'agreed_cancellation' => $validated['agreed_cancellation'],
            'agreed_payment' => $validated['agreed_payment'],
            'agreed_liability' => $validated['agreed_liability'],
            'appointment_number' => $newAppointmentNumber,
           // 'status' => $validated['cancelled'],
           
        ]);
        
        return redirect()->route('Success.index')->with('success', 'Appointment created successfully.');
        
   
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
    public function getEvents(Request $request)
    {
        // Ensure the user is logged in
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
        // Fetch events for the logged-in user
        $events = Event::where('user_id', Auth::id())->get();
    
        return response()->json($events);
    }
}