<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- You can add your logo here if necessary -->
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Logo (optional) -->
            <div class="flex justify-center">
                <x-authentication-card-logo />
            </div>

            <!-- Name Field -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Email Field -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Address Field -->
            <div class="mt-4">
                <x-label for="address" value="{{ __('Address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>

            <!-- Contact Field -->
            <div class="mt-4">
                <x-label for="contact" value="{{ __('Contact') }}" />
                <x-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required />
            </div>

            <!-- Role Field -->
            <div class="mt-4 mb-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select id="role" class="select select-bordered w-full max-w-xs" name="role" required onchange="toggleClinicNameField()">
                    <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>{{ __('Client') }}</option>
                    <option value="vetclinic" {{ old('role') == 'vetclinic' ? 'selected' : '' }}>{{ __('Vet Clinic') }}</option>
                </select>
            </div>

           

            <!-- Clinic Name Field (conditionally shown) -->
            <div id="clinicname-field" class="mt-4" style="display: none;">
                <x-label for="clinicname" value="{{ __('Clinic Name') }}" />
                <x-input id="clinicname" class="block mt-1 w-full" type="text" name="clinicname" :value="old('clinicname')" />
            </div>

            <!-- File Upload Field (conditionally shown) -->
            <div id="clinic-documents-field" class="mt-4" style="display: none;">
                <x-label for="clinic_documents" value="{{ __('Clinic Documents') }}" />
                <input id="clinic_documents" class="block mt-1 w-full" type="file" name="clinic_documents[]" multiple />
            </div>

            <!-- Password Field -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password Field -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <!-- Terms and Privacy Policy -->
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Already registered link -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    function toggleClinicNameField() {
        var role = document.getElementById('role').value;
        var clinicNameField = document.getElementById('clinicname-field');
        var clinicDocumentsField = document.getElementById('clinic-documents-field');
        
        if (role === 'vetclinic') {
            clinicNameField.style.display = 'block';
            clinicDocumentsField.style.display = 'block';
        } else {
            clinicNameField.style.display = 'none';
            clinicDocumentsField.style.display = 'none'; // Hide file upload field
        }
    }

    // Run on page load in case there's old input
    document.addEventListener('DOMContentLoaded', function () {
        toggleClinicNameField();
    });
</script>
