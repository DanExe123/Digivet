<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ClinicPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'deworming', 'consultation', 'petgrooming', 'vaccination', 'featured_photo',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
