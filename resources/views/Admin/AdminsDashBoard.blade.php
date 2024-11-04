@extends('layouts.admin-layout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-left font-bold mb-6 text-3xl">Hello Admin</h1>
                
                <!-- Slide Animation -->
                <div id="content" class="slide-up">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mt-6">
                        <!-- card1 JS -->
                        <a href="{{ route('admin.MonthlyVaccinated.index') }}" class="block w-full">
                            <div class="card bg-indigo-300  text-white image-full w-full  h-full flex">
                                <div class="card-body flex justify-between items-center w-full">
                                    <div class="text-left">
                                        <h2 class="card-title">Monthly <br>Vaccinated<br> Report</h2>
                                    </div>
                                    <figure class="ml-auto">
                                        <img class="h-12 w-12" src="{{ asset('logo/experimentation.png') }}" alt="Icon" />
                                    </figure>
                                </div>
                            </div>
                        </a>

                        <!-- card2 JS -->
                        <a href="{{ route('admin.MonthlyConsultation.index') }}" class="block w-full">
                            <div class="card bg-indigo-300  text-white image-full w-full shadow-xl h-full flex">
                                <div class="card-body flex justify-between items-center w-full">
                                    <div class="text-left">
                                        <h2 class="card-title">Monthly <br>Consultation<br> Report</h2>
                                    </div>
                                    <figure class="ml-auto">
                                        <img class="h-12 w-12" src="{{ asset('logo/veterinary.png') }}" alt="Dog Consultation Icon" />
                                    </figure>
                                </div>
                            </div>
                        </a>

                        <!-- card3 JS -->
                        <a href="{{ route('admin.MonthlyDeworming.index') }}" class="block w-full">
                            <div class="card bg-indigo-300  text-white image-full w-full shadow-xl h-full flex">
                                <div class="card-body flex justify-between items-center w-full">
                                    <div class="text-left">
                                        <h2 class="card-title">Monthly <br>Deworming<br> Report</h2>
                                    </div>
                                    <figure class="ml-auto">
                                        <img class="h-12 w-12" src="{{ asset('logo/worm.png') }}" alt="Icon" />
                                    </figure>
                                </div>
                            </div>
                        </a>

                        <!-- card4 JS -->
                        <a href="{{ route('admin.MonthlyPetGrooming.index') }}" class="block w-full">
                            <div class="card bg-indigo-300  text-white image-full w-full shadow-xl h-full flex">
                                <div class="card-body flex justify-between items-center w-full">
                                    <div class="text-left">
                                        <h2 class="card-title">Monthly <br>Pet Grooming<br> Report</h2>
                                    </div>
                                    <figure class="ml-auto">
                                        <img class="h-12 w-12" src="{{ asset('logo/grooming.png') }}" alt="Icon" />
                                    </figure>
                                </div>
                            </div>
                        </a>

                        <!-- card5 JS -->
                        <a href="{{ route('admin.MonthlyCancelled.index') }}" class="block w-full">
                            <div class="card bg-indigo-300  text-white image-full w-full shadow-xl h-full flex mb-6">
                                <div class="card-body flex justify-between items-center w-full">
                                    <div class="text-left">
                                        <h2 class="card-title">Monthly <br>Cancelled Appointment<br> Report</h2>
                                    </div>
                                    <figure class="ml-auto">
                                        <img class="h-12 w-12" src="{{ asset('logo/cancel-event.png') }}" alt="Icon" />
                                    </figure>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
