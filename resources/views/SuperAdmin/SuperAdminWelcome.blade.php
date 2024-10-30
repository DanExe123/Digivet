@extends('layouts.superAdmin-layout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Digital Vet Clinic System - Admin Welcome') }}
    </h2>
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-left font-bold mb-6 text-3xl">Welcome  <span class="text-cyan-800"> SUPER ADMIN! </span></h1>
                    
                    @foreach($vetClinics as $clinic)
                    <div role="alert" class="alert mb-4 p-4 flex items-center bg-gray-100 border border-gray-300 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 shrink-0 text-gray-500" stroke="black">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="ml-3 flex-1">
                            <span class="font-bold">{{ $clinic->clinicname }}</span> is waiting for your confirmation to proceed to their landing page.
                        </div>
                        <div class="ml-3">
                            <!-- Update Status Button -->
                            @if($clinic->status === 'Pending')
                            <form action="{{ route('SuperAdmin.SuperAdminManageAcc.index', $clinic->id) }}" method="">
                              @csrf
                                    @csrf
                                    <input type="hidden" name="status" value="Complete">
                                    <button type="submit" class="btn btn-ghost btn-xs text-green-600 hover:bg-green-100">See</button>
                                </form>
                            @endif
                
                          
                        </div>
                    </div>
                @endforeach
                
                    
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

@endsection
