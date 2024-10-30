<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        // Define any fields you need in the history
    ];

    // Define the relationship with the Diagnosis model
    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}

