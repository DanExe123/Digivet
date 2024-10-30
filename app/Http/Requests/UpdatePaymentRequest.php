<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    public function rules()
    {
        return [
            'clinicname' => 'required|exists:clinics,id', // Ensure clinic exists in the clinics table
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'reference_number' => 'required|string|max:255',
        ];
    }
}
