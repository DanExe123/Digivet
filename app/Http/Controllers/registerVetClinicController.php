<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuperAdminNotification;
use App\Mail\UserVerification;
use App\Models\User;
use App\Models\SuperAdminManageAccount; // Ensure this matches your actual model name
use Illuminate\Support\Facades\Storage;

class registerVetClinicController extends Controller
{
    public function index()
    {
        // Fetch all records from the superadmin_manage_accounts table
        $accounts = SuperAdminManageAccount::all();
        
        // Return the view, passing the accounts data
        return view('SuperAdmin.SuperAdminManageAcc', compact('accounts')); // Adjust path as needed
    }

    public function registerVetClinic(Request $request)
    {
        // Validate the form data
        $request->validate([
            'clinic_name' => 'required|string|max:255',
            'email' => 'required|email|unique:superadmin_manage_accounts,email',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'clinic_documents.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        // Handle clinic document uploads
        $documents = [];
        if ($request->hasFile('clinic_documents')) {
            foreach ($request->file('clinic_documents') as $file) {
                $path = $file->store('clinic_documents', 'public');
                $documents[] = $path; // Store the file path in an array
            }
        }

        // Create a new vet clinic record in superadmin_manage_accounts table
        $account = SuperadminManageAccount::create([
            'name' => $request->clinic_name,
            'email' => $request->email,
            'address' => $request->address,
            'clinicname' => $request->clinic_name,
            'status' => 'pending', // Default status is pending
            'clinic_documents' => json_encode($documents), // Store the documents array as JSON
        ]);

        // Notify superadmin
        Mail::to('superadmin@example.com')->send(new SuperAdminNotification($account));

        // Return response or redirect
        return response()->json(['message' => 'Registration successful! Please wait for admin approval.']);
    }

    // Method for superadmin to approve user
    public function approveUser($id)
    {
        $account = SuperadminManageAccount::findOrFail($id);
        $account->status = 'approved'; // Update status to approved
        $account->save();

        // Send approval email to the user
        Mail::to($account->email)->send(new UserVerification($account));

        return response()->json(['message' => 'User approved and notified!']);
    }
}
