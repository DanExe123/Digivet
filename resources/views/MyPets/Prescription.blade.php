<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Prescription DIGITAL VETERINARY CLINIC') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-100 to-blue-300">
        <!-- Slide Animation -->
 <div id="content" class="slide-up"> 
    <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 overflow-hidden relative">
            <!-- Paw Print Icons -->
            <div class="absolute top-4 left-4 flex space-x-4">
                <i class="fas fa-paw text-gray-500 text-6xl relative transform rotate-[-30deg]"></i>
            </div>
            <div class="absolute top-4 right-4 flex space-x-4">
                <i class="fas fa-paw text-gray-500 text-6xl relative transform rotate-[-30deg]"></i>
            </div>
            <div class="absolute bottom-4 left-4 flex space-x-4">
                <i class="fas fa-paw text-gray-500 text-6xl relative transform rotate-[-30deg]"></i>
            </div>
            <div class="absolute bottom-4 right-4 flex space-x-4">
                <i class="fas fa-paw text-gray-500 text-6xl relative transform rotate-[-30deg]"></i>
            </div>
            <div class="absolute top-1/2 left-1/4 flex space-x-4 transform -translate-x-1/2 -translate-y-1/2">
                <i class="fas fa-paw text-gray-500 text-6xl relative transform rotate-[-30deg]"></i>
            </div>
            <div class="absolute top-1/2 right-1/4 flex space-x-4 transform -translate-x-1/2 -translate-y-1/2">
                <i class="fas fa-paw text-gray-500 text-6xl relative transform rotate-[-30deg]"></i>
            </div>

            <div class="relative z-10">
                <div class="flex justify-center mb-4">
                    <x-application-logo class="block h-12 w-auto" />
                </div> 
                <h1 class="text-center text-3xl font-extrabold text-blue-800 dark:text-blue-200">DR. QUACK QUACK</h1>
                <p class="text-center text-xl mt-4 font-semibold text-gray-700 dark:text-gray-300">Prescription</p>

                <!-- Prescription Details -->
                <div class="mt-6">
                    <p class="text-lg"><strong>Pet Name:</strong> <span class="font-medium">DanFred</span></p>
                    <p class="text-lg"><strong>Breed:</strong> <span class="font-medium">Bully</span></p>
                    <p class="text-lg"><strong>Age:</strong> <span class="font-medium">3 years</span></p>
                    <p class="text-lg"><strong>Weight:</strong> <span class="font-medium">20 kg</span></p>
                    <p class="text-lg"><strong>Medical Diagnoses:</strong> <span class="font-medium">Skin Allergy</span></p>
                    <p class="text-lg mt-2"><strong>Advice:</strong> Avoid exposure to allergens. Bathe with medicated shampoo.</p>
                    <p class="text-lg"><strong>Medicines:</strong> Antihistamines, Omega-3 supplements</p>
                </div>

                <!-- Signature Section -->
                <div class="flex justify-end mt-8">
                    <div class="flex flex-col items-center">
                        <div class="relative">
                            <hr class="border-gray-500 w-32 mx-auto mb-2" />
                            <p class="absolute left-1/2 transform -translate-x-1/2 bg-white px-2 text-md font-semibold">Signature:</p>
                        </div>
                        <p class="text-lg font-medium mt-5">Dr. Quack Quack</p>
                    </div>
                </div>
            </div>

            <!-- Clinic Information -->
            <div class="w-full sm:max-w-2xl p-6 text-center border-t border-gray-300 pt-4 bg-white dark:bg-gray-800">
                <p class="text-sm font-semibold text-blue-800 dark:text-blue-200">Zetro Vet Veterinary Clinic</p>
                <p class="text-sm">123 Pet Street, Animal City, AC 12345</p>
                <p class="text-sm">Contact Number: (123) 456-7890</p>
            </div>
        </div>
    </div>
 </div>
</x-app-layout>
