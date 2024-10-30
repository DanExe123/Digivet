<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Digi Vet Medical History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-center font-extrabold mb-6">My Medical History</h1>
                    
                   <!-- Slide Animation -->
<div id="content" class="slide-up">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($history as $historyItem)
            <!-- Medical History Card with Hover Effect -->
            <div class="card bg-base-100 w-96 shadow-xl transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-teal-500">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h1 class="text-xl font-bold">Diagnoses</h1>
                        <p class="text-black font-semibold"><strong> {{ $historyItem->user->clinicname }}</strong></p>
                    </div>

                    <h2 class="card-title text-black">{{ $historyItem->pet->name }}</h2>
                    <p class="text-black font-semibold"><strong>Symptoms:</strong> {{ $historyItem->symptoms }}</p>
                    <p class="text-black font-semibold"><strong>Diagnose:</strong> {{ $historyItem->diagnose }}</p>
                    <p class="text-black font-semibold"><strong>Plan Treatment:</strong> {{ $historyItem->plan_treatment }}</p>
                    <p class="text-black font-semibold"><strong>Follow Up:</strong> {{ $historyItem->follow_up }}</p>
                    <div class="card-actions justify-end">
                        <!-- You can add action buttons or links here -->
                    </div>
                </div>
                <figure>
                    <img
                        src="https://img.freepik.com/premium-vector/veterinarians-man-woman-employees-veterinary-clinic-with-dog-animal-examination-pets-professional-health-care-medical-consultation-cartoon-flat-isolated-illustration-vector-concept_176411-9848.jpg?w=740"
                        alt="{{ $historyItem->pet->name }}"
                        class="object-cover rounded-b-lg h-48 w-full" /> <!-- Set fixed height -->
                </figure>
            </div>

            <!-- Medical History Card with Hover Effect -->
            <div class="card bg-base-100 w-96 shadow-xl transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-teal-500">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h1 class="text-xl font-bold">Diet Plan</h1>
                        <p class="text-black font-semibold"><strong>{{ $historyItem->user->clinicname }}</strong> </p>
                    </div> 
                    <h2 class="card-title text-black">{{ $historyItem->pet->name }}</h2>
                    <p class="text-black font-semibold"><strong>Dietary Needs:</strong> {{ $historyItem->dietary_needs }}</p>
                    <p class="text-black font-semibold"><strong>Morning Needs:</strong> {{ $historyItem->morning_needs }}</p>
                    <p class="text-black font-semibold"><strong>Evening Needs:</strong> {{ $historyItem->evening_meals }}</p>
                    <p class="text-black font-semibold"><strong>Treats:</strong> {{ $historyItem->treats }}</p>
                    <p class="text-black font-semibold"><strong>Water:</strong> {{ $historyItem->water }}</p>
                    <div class="card-actions justify-end">
                        <!-- You can add action buttons or links here -->
                    </div>
                </div>
                <figure>
                    <img
                        src="https://img.freepik.com/premium-vector/cartoon-illustration-saint-bernard-dog-with-bone_1120558-36104.jpg?w=826"
                        alt="{{ $historyItem->pet->name }}"
                        class="object-cover rounded-b-lg h-48 w-full" /> <!-- Set fixed height -->
                </figure>
            </div>

            <!-- Medical History Card with Hover Effect -->
            <div class="card bg-base-100 w-96 shadow-xl transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl hover:bg-teal-500">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h1 class="text-xl font-bold">Medication And Notes</h1>
                        <p class="text-black font-semibold"><strong>{{ $historyItem->user->clinicname }}</strong> </p>
                    </div>
                    <h2 class="card-title text-black">{{ $historyItem->pet->name }}</h2>
                    <p class="text-black font-semibold"><strong>Medication:</strong> {{ $historyItem->medication }}</p>
                    <p class="text-black font-semibold"><strong>Dosage:</strong> {{ $historyItem->dosage }}</p>
                    <p class="text-black font-semibold"><strong>Frequency:</strong> {{ $historyItem->frequency }}</p>
                    <p class="text-black font-semibold"><strong>Duration:</strong> {{ $historyItem->duration }}</p>
                    <p class="text-black font-semibold line-clamp-3"><strong>Notes:</strong> {{ $historyItem->notes }}</p>
                    <div class="card-actions justify-end">
                        <!-- You can add action buttons or links here -->
                    </div>
                </div>
                <figure>
                    <img
                        src="https://img.freepik.com/free-vector/veterinary-clinic-flat-background-with-male-female-pet-doctors-conducting-medical-procedure-cat-vector-illustration_1284-75011.jpg?t=st=1729048959~exp=1729052559~hmac=24821282dcbfed8429a6275de2b1cd11d0a4908561d09075c8b422de399d9e9e&w=740"
                        alt="{{ $historyItem->pet->name }}"
                        class="object-cover rounded-b-lg h-52 w-full" /> <!-- Set fixed height -->
                </figure>
            </div>
        @endforeach
    </div>
</div>

                         
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
