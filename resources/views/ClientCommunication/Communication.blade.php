<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Client Communication Engagement') }}
        </h2>
    </x-slot>

    <div class="py-12 h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg h-full">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex justify-center h-full">
                    <div class="container mx-auto my-10 p-5 flex-grow" x-data="{ isOpen: true }">
                        <div class="h-full bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden flex flex-col">
                            <!-- Slide Animation -->
                    <div id="content" class="slide-up">
                            <!-- Header -->
                            <div class="bg-gray-800 custom-bg-357D7F p-4 text-white flex justify-between items-center">
                                <h1 class="text-lg font-semibold">Conversation</h1>
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-full object-cover mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                    <p class="text-gray-300 font-semibold">Active</p>
                                    <button class="ml-4 text-white" @click="isOpen = !isOpen">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
    
                            <!-- Messages -->
                            <div class="p-4 flex-grow overflow-y-auto" x-show="isOpen">
                                <div class="mb-4">
                                    <div class="flex items-start ml-2">
                                        <img class="h-8 w-8 rounded-full object-cover mr-4" src="./logo/Veterinary Clinic System_20240517_125656_0000.png.png" alt="User">
                                        <div class="ml-2">
                                            <p class="bg-gray-200 dark:bg-gray-700 p-2 rounded-lg">Hello! How are you?</p>
                                            <p class="text-xs text-gray-500 mt-1">10:00 AM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 text-right">
                                    <div class="flex items-end justify-end">
                                        <div class="mr-4">
                                            <p class="bg-blue-500 text-white p-2 rounded-lg">I'm good, thank you!</p>
                                            <p class="text-xs text-gray-500 mt-1">10:02 AM</p>
                                        </div>
                                        <img class="h-10 w-10 rounded-full object-cover ml-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                            </div>
    
                          <!-- Input Message at the Bottom -->
                          <div class=" p-4 border-t border-gray-300 dark:border-gray-700" x-show="isOpen">
                            <div class="flex items-center">
                                <input type="text" placeholder="Type your message here" class="input input-bordered w-full max-w-xl" />
                                <button class="btn btn-outline ml-4">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
                
         