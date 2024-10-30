<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\MyPets;
use App\Models\User;
 // Import the DietPlan model

class HistoryController extends Controller
{
    public function index($pet_id)
    {
        // Fetch the pet by ID and ensure it belongs to the authenticated user
        $pet = MyPets::where('id', $pet_id)
                    ->where('user_id', auth()->id()) // Ensure this fetches the correct pet belonging to the logged-in user
                    ->first();
    
        if (!$pet) {
            return redirect()->back()->with('error', 'Pet not found.');
        }
    
        // Fetch all diagnoses for the specific pet using the pet ID
        $history = Diagnosis::where('pet_id', $pet->id)->get();
    
        // Pass both diagnoses history and pet details to the view
        return view('MyPets.History', compact('history', 'pet'));
    }
    
}
