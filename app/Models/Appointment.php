<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
  
class Appointment extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'user_id',
        'clinic_owner_id',
        'pet_name',
        'clinicname', 
        'services',
        'gender',
        'breed',
        'birthdate',
        'appointment_date',
        'appointment_number',
        'service_type',
        'agreed_cancellation',
        'agreed_payment',
        'agreed_liability',
        'cancellation_reason',
        
    ];

   
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id'); // Assumes 'user_id' is the foreign key in appointments table
    }

    

        public function event()
        {
            return $this->belongsTo(Event::class);
        }
    
        public function clinic()
        {
            return $this->belongsTo(Clinic::class);
        }
}

