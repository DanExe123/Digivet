<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis; 
use App\Models\MyPets; // Assuming you have a Diagnosis model
use Illuminate\Support\Facades\Log;

class DiagnosisController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data including new fields
        $request->validate([
            'pet_id' => 'required|exists:my_pets,id',
            'pet_name' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'diagnose' => 'required|string|max:255',
            'plan_treatment' => 'required|string|max:255',
            'follow_up' => 'required|string|max:255',
            'dietary_needs' => 'nullable|string|max:255',
            'morning_needs' => 'nullable|string|max:255',
            'evening_meals' => 'nullable|string|max:255',
            'treats' => 'nullable|string|max:255',
            'water' => 'nullable|string|max:255',
            'medication' => 'nullable|string|max:255',
            'dosage' => 'nullable|string|max:255',
            'frequency' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500', // Allow longer notes if needed
        ]);
    
        // Store data in the database
        try {
            Diagnosis::create([
                'user_id' => auth()->id(), // Associate with the logged-in user
                'pet_id' => $request->input('pet_id'),
                'pet_name' => $request->input('pet_name'),
                'symptoms' => $request->input('symptoms'),
                'diagnose' => $request->input('diagnose'),
                'plan_treatment' => $request->input('plan_treatment'),
                'follow_up' => $request->input('follow_up'),
                'dietary_needs' => $request->input('dietary_needs'), // New field
                'morning_needs' => $request->input('morning_needs'), // New field
                'evening_meals' => $request->input('evening_meals'), // New field
                'treats' => $request->input('treats'), // New field
                'water' => $request->input('water'), // New field
                'medication' => $request->input('medication'), // New field
                'dosage' => $request->input('dosage'), // New field
                'frequency' => $request->input('frequency'), // New field
                'duration' => $request->input('duration'), // New field
                'notes' => $request->input('notes'), // New field
            ]);
    
            return redirect()->back()->with('success', 'Diagnosis added successfully!');
        } catch (\Exception $e) {
            Log::error('Error storing diagnosis: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add diagnosis. Please try again.');
        }
    }
}
