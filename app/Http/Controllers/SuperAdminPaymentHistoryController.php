<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\Clinic;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Requests\StorePaymentRequest; // Import the request

class SuperAdminPaymentHistoryController extends Controller
{
    public function index()
    {
        // Get clinics with their payment history
        $clinics = User::whereNotNull('clinicname')->get(['id', 'clinicname']);
        
        // Fetch the payment history
        $payments = Payment::with('clinic')->get();
    
        // Ensure to pass payments that have valid clinic relationships
        $payments = $payments->filter(function ($payment) {
            return $payment->clinic !== null;
        });
    
        return view('SuperAdmin.SuperAdminPaymentHistory', compact('clinics', 'payments'));
    }
    
    public function store(StorePaymentRequest $request)
    {
        // Now you can use validated() method
        $validated = $request->validated();

        // Create the payment
        Payment::create([
            'clinicname' => $validated['clinicname'], // Assuming this maps to the clinic's user id
            'payment_date' => $validated['payment_date'],
            'amount' => $validated['amount'],
            'reference_number' => $validated['reference_number'],
           
        ]);

        return redirect()->route('SuperAdmin.SuperAdminPaymentHistory.index')->with('success', 'Payment recorded successfully.');
    }

    
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $request->validate([
            'clinicname' => 'required',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'reference_number' => 'required|string',
        ]);
    
        // Find the payment by ID
        $payment = Payment::findOrFail($id);
    
        // Update the payment attributes
        $payment->clinicname = $request->clinicname; // Assuming clinic_id is the correct attribute
        $payment->payment_date = $request->payment_date;
        $payment->amount = $request->amount;
        $payment->reference_number = $request->reference_number;
    
        // Save the updated payment
        $payment->save();
    
   
    

                    return redirect()->route('SuperAdmin.SuperAdminPaymentHistory.index')->with('success', 'Payment updated successfully.');
                }



                public function destroy($id)
                {
                    // Find the payment by ID and delete it
                    $payment = Payment::findOrFail($id);
                    $payment->delete();
                
                    return response()->json(['success' => true]);
                }
            
}
