<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to true to allow any user to make this request
    }

    public function rules()
    {
        return [
            'clinicname' => 'required|exists:users,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'reference_number' => 'required|string|max:255',
            'breed' => 'nullable|string',
            'birthdate' => 'nullable|date',
        ];
    }
}

