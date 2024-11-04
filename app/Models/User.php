<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Relations\HasMany;

//has role permission
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable 
{

    
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    //roles
    use HasRoles;

    protected $guard = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'password',
        'role',     
        'clinicname', 
        'clinic_documents',
           'contact', 
           'feature_photo',
           'pricing_deworming',
            'pricing_vaccinated',
            'pricing_consultation',
            'pricing_petgrooming',
            'clinic_description'

       
   
    ];

    
    public function manageAccount()
    {
        return $this->hasOne(SuperAdminManageAccount::class, 'user_id');
    }

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];

        
    }

    public function updateFeaturedPhoto($photo): void
    {
        // Validate the photo if necessary
        // Store the image in the 'public/profile-photos' directory
        $path = $photo->store('profile-photos', 'public');

        // Optionally, you can manipulate the image with Intervention Image
        // Example: Image::make($photo)->resize(300, 300)->save(storage_path('app/public/' . $path));

        // Update the user's photo path in the database
        $this->forceFill([
            'photo' => $path,
        ])->save();
    }


    
      /**
     * Get the messages sent by the user.
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the chats created by the user.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
 

      /** roles 
            
             * Check if the user is a veterinary clinic.
             *
             * @return bool
             */
            public function isVetClinic()
            {
                return $this->hasRole('vetclinic');
            }

            /**
             * Check if the user is a client.
             *
             * @return bool
             */
            public function isClient()
            {
                return $this->hasRole('client');
            }

            /**
             * Check if the user is a super admin.
             *
             * @return bool
             */
            public function isSuperAdmin()
            {
                return $this->hasRole('superadmin');
            }
         

            public function appointments()
            {
                return $this->hasMany(Appointment::class, 'user_id'); // Assumes 'user_id' is the foreign key in appointments table
            }

            public function payments()
            {
                return $this->hasMany(Payment::class, 'clinic_id'); // Adjust as per your foreign key
            }
            public function MyPets()
            {
                return $this->hasMany(MyPets::class);
            }

            public function events()
            {
                return $this->hasMany(Event::class);
            }
            
   }