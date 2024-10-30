<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif





        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
                    </div>


         <!-- Contact -->
              <div class="col-span-6 sm:col-span-4">
             <x-label for="contact" value="{{ __('Contact') }}" />
             <x-input id="contact" type="text" class="mt-1 block w-full" wire:model="state.contact" />
 <x-input-error for="contact" class="mt-2" />
                </div>




          <!-- Conditionally show 'Name of Clinic' field for 'vetclinic' role -->
                    @if (auth()->user()->hasRole('vetclinic'))
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="clinicname" value="{{ __('Clinic Name') }}" />
                        <x-input id="clinicname" type="text" class="mt-1 block w-full" wire:model="state.clinicname" autocomplete="clinicname" />
                        <x-input-error for="clinicname" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" autocomplete="address" />
                        <x-input-error for="address" class="mt-2" />
                    </div>

                    
                   
                    <!-- Pricing Inputs -->
                    <h3 class="col-span-6 sm:col-span-4 text-lg font-semibold mt-4 mb-2">Pricing Information</h3>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="pricing_deworming" value="{{ __('Deworming Pricing') }}" />
                        <x-input id="pricing_deworming" type="number" class="mt-1 block w-full" wire:model="state.pricing_deworming" />
                        <x-input-error for="pricing_deworming" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="pricing_vaccinated" value="{{ __('Vaccination Pricing') }}" />
                        <x-input id="pricing_vaccinated" type="number" class="mt-1 block w-full" wire:model="state.pricing_vaccinated" />
                        <x-input-error for="pricing_vaccinated" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="pricing_consultation" value="{{ __('Consultation Pricing') }}" />
                        <x-input id="pricing_consultation" type="number" class="mt-1 block w-full" wire:model="state.pricing_consultation" />
                        <x-input-error for="pricing_consultation" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="pricing_petgrooming" value="{{ __('Pet Grooming Pricing') }}" />
                        <x-input id="pricing_petgrooming" type="number" class="mt-1 block w-full" wire:model="state.pricing_petgrooming" />
                        <x-input-error for="pricing_petgrooming" class="mt-2" />
                    </div>

                    <!-- Vet Clinic Description -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="clinic_description" value="{{ __('Clinic Description') }}" />
                        <textarea id="clinic_description" class="mt-1 block w-full" wire:model="state.clinic_description" rows="3"></textarea>
                        <x-input-error for="clinic_description" class="mt-2" />
                    </div>
                    
                    @endif

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />
            

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-white">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
