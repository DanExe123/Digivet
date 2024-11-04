<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name (optional)
    protected $table = 'clinics';

    // Specify the attributes that can be mass-assigned
    protected $fillable = [
        'user_id',
        'name',
        'clinicname',
        'address',
        'contact',
        'clinic_documents',
        'status',
    ];

    /**
     * Get the user that owns the clinic.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinic()
{
    return $this->belongsTo(User::class, 'clinic_id');
}

        public function appointments()
            {
                return $this->hasMany(Appointment::class);
            }

            public function events()
                {
                    return $this->hasMany(Event::class);
                }
}
