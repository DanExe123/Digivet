<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Intervention\Image\Facades\Image;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'contact' => ['required', 'string', 'max:15'],
            'clinicname' => [$user->hasRole('vetclinic') ? 'required' : 'nullable', 'string', 'max:255'], // Required for vetclinic role
            'featured_photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'], // Featured photo field
            'pricing_deworming' => ['nullable', 'numeric'], // Pricing field for deworming
            'pricing_vaccinated' => ['nullable', 'numeric'], // Pricing field for vaccinated
            'pricing_consultation' => ['nullable', 'numeric'], // Pricing field for consultation
            'pricing_petgrooming' => ['nullable', 'numeric'], // Pricing field for pet grooming
            'clinic_description' => [$user->hasRole('vetclinic') ? 'required' : 'nullable', 'string'], // Clinic description field
        ])->validateWithBag('updateProfileInformation');

        // Handling photo upload for profile photo
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // Handling featured photo upload
        // Handle featured photo upload
    if (isset($input['featured_photo'])) {
        $path = $input['featured_photo']->store('featured-photos', 'public'); // Store in the public disk
        $user->featured_photo = $path; // Set the path for featured photo
    }

        // Updating the user's profile information
        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'clinicname' => $input['clinicname'],
                'contact' => $input['contact'],
                'featured_photo' => $this->handlePhotoUpload(),
                'pricing_deworming' => $input['pricing_deworming'],
                'pricing_vaccinated' => $input['pricing_vaccinated'],
                'pricing_consultation' => $input['pricing_consultation'],
                'pricing_petgrooming' => $input['pricing_petgrooming'],
                'clinic_description' => $input['clinic_description'],

            ])->save();
        }
    }

    protected function handlePhotoUpload()
    {
        // Check if 'featured_photo' exists in state and is a valid uploaded file
        if (isset($this->state['featured_photo']) && $this->state['featured_photo'] instanceof TemporaryUploadedFile) {
            // Store the photo in 'featured-photos' directory within the public disk
            $path = $this->state['featured_photo']->store('featured-photos', 'public');
            
            // You can now save the $path to the user's model if needed
            // Example: Auth::user()->update(['featured_photo' => basename($path)]);
            
            return $path; // Return the path if needed
        }
    
        return null; // Return null or handle the case where no file was uploaded
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
