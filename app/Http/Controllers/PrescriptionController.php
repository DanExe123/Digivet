<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return view('MyPets.Prescription');
 
    }

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
        // Validate the incoming request data
        $validated = $request->validate([
            'pet_id' => 'required|exists:pets,id', // Ensure pet_id exists in pets table
            'medication' => 'required|string|max:255', // Ensure medication is a string
            'dosage' => 'required|string|max:255', // Ensure dosage is a string
            'frequency' => 'required|string|max:255', // Ensure frequency is a string
            'duration' => 'required|string|max:255', // Ensure duration is a string
            'notes' => 'nullable|string', // Ensure notes are optional
        ]);

        // Attempt to create the prescription
        try {
            Prescription::create([
                'user_id' => auth()->id(), // Associate with the logged-in user
                'pet_id' => $validated['pet_id'],
                'medication' => $validated['medication'],
                'dosage' => $validated['dosage'],
                'frequency' => $validated['frequency'],
                'duration' => $validated['duration'],
                'notes' => $validated['notes'],
            ]);

            return redirect()->back()->with('success', 'Prescription added successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing prescription: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add prescription. Please try again.');
        }
    }
    

    public function show()
    {
        // Fetch prescriptions for the authenticated user (clinic)
        $prescriptions = Prescription::where('user_id', auth()->id())->get();
    
        return view('client.prescriptions', compact('prescriptions'));
    }
}