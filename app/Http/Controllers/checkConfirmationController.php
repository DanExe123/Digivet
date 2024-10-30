<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperadminManageAccount;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class CheckConfirmationController extends Controller
{
    public function confirmAccount(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'role' => ['required', 'in:vetclinic'],
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            Log::warning('User is not authenticated');
            return response()->json(['confirmed' => false, 'rejected' => false, 'message' => 'User is not authenticated.']);
        }

        // Log the authenticated user's ID
        Log::info('Authenticated user ID: ' . Auth::id());

        // Find the vet clinic for the authenticated user
        $vetClinic = SuperadminManageAccount::where('user_id', Auth::id())->first();

        if (!$vetClinic) {
            Log::warning('Vet clinic not found for user ID: ' . Auth::id());
            return response()->json(['confirmed' => false, 'rejected' => false, 'message' => 'Vet clinic not found.']);
        }

        // Check the confirmation status
        $isConfirmed = $vetClinic->status === 'Complete';
        $isRejected = $vetClinic->status === 'Rejected'; // Assuming 'Rejected' is the status for a rejected account

        return response()->json([
            'confirmed' => $isConfirmed,
            'rejected' => $isRejected,
            'message' => $isRejected ? 'Your account has been rejected. Please create another account and attach the clinic documents.' : ''
        ]);
    }
}
