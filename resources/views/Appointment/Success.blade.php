
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('  Digital Veterinary Clinic ') }}
        </h2>
    </x-slot>





<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($appointments as $appointment)

                <!-- Appointment Card -->
                <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl cursor-pointer">
                    <div class="p-6">
                        <h2 class="text-center text-xl font-bold text-green-600 uppercase">Appointment</h2>
                        <div class="mt-4">
                            <h3 class="text-lg text-gray-700 dark:text-gray-300 text-center">
                                Appointment Number: <span class="text-red-600 font-bold">{{ $appointment->appointment_number }}</span>
                            </h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300 text-center mt-2">
                                Scheduled Date: <span class="text-red-600 font-bold">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y') }}</span>
                            </p>
                        </div>

                        <p class="text-lg text-gray-700 dark:text-gray-300 text-center mt-2">
                            Services: 
                            <span class="text-red-600 font-bold">
                                @if(is_array($appointment->services))
                                    {{ implode(', ', $appointment->services) }}  <!-- If services is an array -->
                                @else
                                    {{ $appointment->services }}  <!-- If services is a string -->
                                @endif
                            </span>
                        </p>
                  
                    
                        <!-- Illustration -->
                        <div class="flex justify-center my-4">
                            <img src="{{ asset('logo/Veterinary Clinic System_20240517_125656_0000.png.png') }}" alt="Clinic Logo" class="h-20 w-20 object-cover">
                        </div>
                    
                       
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</x-app-layout>
