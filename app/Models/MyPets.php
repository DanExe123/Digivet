<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyPets extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',  
    'name',
    'breed', 
    'gender',
    'birthdate',
    'color',
    'fur_type',
    'weight',
    'height',
      'image',
];

public function user()
{
    return $this->hasMany(User::class, 'user_id');
}



public function diagnoses()
{
    return $this->hasMany(Diagnosis::class, 'pet_id'); // Assuming 'pet_id' is the foreign key in the diagnoses table
}
public function dietplan()
{
    return $this->hasMany(DietPlan::class, 'pet_id'); // 'pet_id' links to the diet table
}


}
