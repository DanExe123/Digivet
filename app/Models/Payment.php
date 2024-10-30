<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define the table associated with the model (if it's not pluralized)
    protected $table = 'payments'; // Optional, if your table name follows Laravel's naming conventions

    // Define the fillable attributes
    protected $fillable = [
        'clinicname', // Assuming there's a foreign key for the clinic
        'payment_date',
        'amount',
        'reference_number',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    // Define relationships (if any)
    public function clinic()
    {
        return $this->belongsTo(User::class, 'clinicname'); // Assuming clinic_id is the foreign key
    }
}
