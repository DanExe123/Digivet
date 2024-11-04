<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperadminManageAccount extends Model
{
    
        protected $table = 'superadmin_manage_accounts'; // Replace with actual table name
    
      // Allow mass assignment for these fields
      protected $fillable = [
        'user_id',
        'name', // Add 'name' here
        'email',
        'address',
        'clinicname',
        'status',
        'clinic_documents',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function appointment()
{
    return $this->belongsTo(appointment::class);
}
 // Add relationship to Clinic
 public function clinic()
 {
     return $this->belongsTo(Clinic::class, 'clinicname'); // Assuming 'clinicname' is the foreign key
 }

}