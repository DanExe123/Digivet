<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyPets;
use App\Models\History;
use App\Models\User;
use App\Http\Requests\StoreMyPetsRequest;
use App\Http\Requests\UpdateMyPetsRequest;

class MyPetsController extends Controller
{
    /**
     * Display a listing of the resource for the authenticated user.
     */
    public function index()
    {
        // Fetch pets that belong to the authenticated user
        $myPets = MyPets::where('user_id', auth()->id())->get();
        return view('MyPets.index', compact('myPets'));
    }

    public function history($id)
    {
        // Fetch history for the pet that belongs to the authenticated user
        $History = History::where('pet_id', $id)
            ->whereHas('pet', function ($query) {
                $query->where('user_id', auth()->id()); // Ensure only the user's pets are considered
            })->get();

        return view('MyPets.history', [
            'id' => $id,
            'History' => $History
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MyPets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMyPetsRequest $request)
    {
        $validated = $request->validated();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        // Add user_id to the validated data
        $validated['user_id'] = auth()->id();

        // Create the new pet record
        MyPets::create($validated);

   

        return redirect()->route('MyPets.index')->with('success', 'Pet created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MyPets $MyPets)
    {
        return view('MyPets.show', compact('MyPets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pet = MyPets::where('id', $id)->where('user_id', auth()->id())->firstOrFail(); // Ensure the user owns the pet
        return view('MyPets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'birthdate' => 'required|date',
            'color' => 'required|string|max:255',
            'fur_type' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Make image optional
        ]);

        // Find the MyPets instance by ID, ensuring the user owns the pet
        $MyPets = MyPets::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName; // Use $validatedData instead of $validated
        }

        // Update the MyPets instance with validated data
        $MyPets->update($validatedData);

       

        return redirect()->route('MyPets.index')->with('success', 'Pet information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the MyPets instance by ID, ensuring the user owns the pet
        $MyPets = MyPets::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $MyPets->delete();

      
        return redirect()->route('MyPets.index')->with('success', 'Pet deleted successfully!');
    }
}
