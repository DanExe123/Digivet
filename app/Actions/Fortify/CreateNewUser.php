<?php

namespace App\Actions\Fortify;
use App\Models\SuperadminManageAccount;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
         // Validate the input data
    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'address' => ['required', 'string', 'max:255'],
        'role' => ['required', 'in:vetclinic,client'],
        'clinicname' => $input['role'] === 'vetclinic' ? ['required', 'string', 'max:255'] : 'nullable',
        //'clinic_documents.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:2048',
         'contact' => ['required', 'string', 'max:15'],
        'password' => $this->passwordRules(),
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    ])->validate();

    // Create the new user
    $user = User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'address' => $input['address'], 
      'contact' => $input['contact'],
        'password' => Hash::make($input['password']),
     
        'clinicname' => $input['role'] === 'vetclinic' ? $input['clinicname'] : null,
        
    ]);

    
    // Assign the role to the user
    if ($input['role'] === 'client') {
        $user->assignRole('client');
    } elseif ($input['role'] === 'vetclinic') {
        $user->assignRole('vetclinic');
        // Store the clinic name if the role is vetclinic
        $user->clinicname = $input['clinicname'];
        $user->save();

         // Handle clinic documents
         $documentPaths = [];

         if (request()->hasFile('clinic_documents')) {
            foreach (request()->file('clinic_documents') as $document) {
                // Store the document and retrieve the file path
                $path = $document->store('clinic_documents', 'public');
                $documentPaths[] = $path; // Add the file path to the array
            }
        }
      
         // Add vet clinic data to superadmin_manage_accounts
         SuperadminManageAccount::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'contact' => $user->Contact,
            'clinicname' => $user->clinicname,
            'status' => 'Pending', // Set status to 'Pending'
            'clinic_documents' => json_encode($documentPaths),
           
        ]);
    }
    

    return $user;
    }
}