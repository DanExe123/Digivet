<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    // Specify the fillable attributes
    protected $fillable = [
        'pet_id',
        'user_id',
        'medication',
        'dosage',
        'frequency',
        'duration',
        'notes',
    ];

    // Define the relationship with the Pet model
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // Define the relationship with the User model (clinic)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
