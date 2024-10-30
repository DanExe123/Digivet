<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Diagnosis extends Model
{
    use HasFactory;

    // Allow mass assignment for the following fields
    protected $fillable = ['user_id',
    'pet_id', 
    'pet_name', 
    'symptoms',
     'diagnose',
      'plan_treatment',
       'follow_up',
       'dietary_needs',
    'morning_needs',
    'evening_meals',
    'treats',
    'water',
    'medication',
    'dosage',
    'frequency',
    'duration',
    'notes'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pet()
    {
        return $this->belongsTo(MyPets::class); // This is the foreign key
    }
    
}
