@extends('layouts.admin-layout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Communication Panel') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 h-screen">
        <div class="max-w-full mx-auto h-full flex flex-col">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg flex-grow">
                <div class="flex justify-center mt-2">
                    <h1 class="text-2xl font-bold font-serif">Admin Communication</h1>
                </div>

                 <!-- Slide Animation -->
                 <div id="content" class="slide-up">

                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex flex-col md:flex-row h-full">
                    <div class="container mx-auto my-10 p-5 flex-grow flex flex-col md:flex-row">
                        <!-- Accounts List -->
                        <div class="w-full md:w-1/3 bg-gray-100 dark:bg-sky-950 p-4 rounded-lg shadow-md flex flex-col h-full overflow-y-auto mb-4 md:mb-0">
                            <h2 class="text-lg font-semibold mb-4">Accounts</h2>
                            <!-- Example Account List -->
                            <div class="space-y-4 flex-grow">
                                <!-- Account Item -->
                                <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-200 dark:hover:bg-sky-950 p-2 rounded-lg">
                                    <img class="h-12 w-12 rounded-full object-cover mr-4" src="./logo/Veterinary Clinic System_20240517_125656_0000.png.png" alt="Client">
                                    <div>
                                        <p class="font-semibold">Dan Fred P Cablas</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Last message preview...</p>
                                    </div>
                                </div>
                                <!-- Add more accounts as needed -->
                            </div>
                        </div>

                        <!-- Chatbox -->
                        <div class="w-full md:w-2/3 pl-0 md:pl-4 flex flex-col bg-white dark:bg-gray-800 rounded-lg shadow-md h-full">
                            <!-- Header -->
                            <div class="bg-gray-800 custom-bg-357D7F p-4 text-white flex justify-between items-center">
                                <h1 class="text-lg font-semibold">Conversation</h1>
                                <div class="flex items-center">
                                    <img class="h-10 w-10 rounded-full object-cover mr-2" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                    <p class="text-gray-300 font-semibold">Active</p>
                                </div>
                            </div>
    
                            <!-- Messages -->
                            <div class="p-4 flex-grow overflow-y-auto">
                                <!-- Example Messages -->
                                <div class="space-y-4">
                                    <!-- Client Message -->
                                    <div class="flex items-start mb-4">
                                        <img class="h-8 w-8 rounded-full object-cover mr-4" src="./logo/Veterinary Clinic System_20240517_125656_0000.png.png" alt="Client">
                                        <div class="ml-2">
                                            <p class="bg-gray-200 dark:bg-gray-800 p-2 rounded-lg">Hello! How are you?</p>
                                            <p class="text-xs text-gray-500 mt-1">10:00 AM</p>
                                        </div>
                                    </div>
                                    <!-- Admin Message -->
                                    <div class="flex items-end justify-end mb-4">
                                        <div class="ml-2">
                                            <p class="bg-blue-500 text-white p-2 rounded-lg">I'm good, thank you!</p>
                                            <p class="text-xs text-gray-500 mt-1">10:02 AM</p>
                                        </div>
                                        <img class="h-10 w-10 rounded-full object-cover ml-4" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                    </div>
                                    <!-- Add more messages as needed -->
                                </div>
                            </div>
    
                            <!-- Input -->
                            <div class="p-4 border-t border-gray-300 dark:border-gray-700">
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
@endsection
