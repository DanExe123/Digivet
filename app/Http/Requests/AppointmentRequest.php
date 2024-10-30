<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Appointment;
class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Change this if you have authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        \Log::info('Current Request Data:', $this->all()); // Log the current request data
  
        return [
            'pet_name' => 'required|string|max:255',
            'clinicname' => 'required|string',
            'services' => 'required|array|min:1',

            'gender' => 'required|string',
            'breed' => 'required|string',
            'birthdate' => 'required|date',
            'appointment_date' => 'required|date',
            'service_type' => 'required|string',
            'agreed_cancellation' => 'required|boolean',
            'agreed_payment' => 'required|boolean',
            'agreed_liability' => 'required|boolean',
            
        ];
    }
  
    /**
     * Get the validation messages that apply to the request.
     */
    public function messages()
    {
        return [
            'pet_name.required' => 'The pet name is required.',
            'gender.required' => 'The gender is required.',
            'breed.required' => 'The breed is required.',
            'birthdate.required' => 'The birthdate is required.',
            'appointment_date.required' => 'The appointment date is required.',
            'service_type.required' => 'The service type is required.',
            'clinicname.required' => 'The clinic name is required.',
            'services.required' => 'At least one service must be selected.',
            'agreed_cancellation.required' => 'You must agree to the cancellation policy.',
            'agreed_payment.required' => 'You must agree to the payment policy.',
            'agreed_liability.required' => 'You must agree to the liability policy.',
        ];
    }
}
