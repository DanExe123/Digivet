@extends('layouts.admin-layout')

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
        <h1 class="text-left font-bold mb-6 text-3xl">
          Welcome Admin
          @if(auth()->user()->clinicname)
            <span class="text-cyan-800">{{ auth()->user()->clinicname }}</span>
          @else
            <span class="text-cyan-800">No Clinic Assigned</span>
          @endif
        </h1>
        <p class="mb-8 text-gray-600 dark:text-gray-400 text-lg">
          Here you can manage your clinic's operations, review client interactions, handle appointments, and maintain pet records all in one place.
        </p>
      </div>
    </div></div></div>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-5">
        <!-- Notification Section -->
        <div id="content" class="slide-up"> <!-- Added mt-10 for spacing above cancellation section -->
          @if($cancelledAppointments->count() > 0)
            <div class="indicator ml-5">
              <span class="indicator-item badge custom-bg-357D7F flex items-center justify-center text-white">
                {{ $cancelledAppointments->count() }}
              </span>
              <div role="alert" class="alert w-full border-l-4 border-teal-600 bg-white p-4 rounded-md shadow-md"> <!-- Full width and left border -->
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <div class="ml-3">
                    <h3 class="font-bold text-teal-800">New Message!</h3>
                    <div class="text-xs text-gray-600">
                      You have {{ $cancelledAppointments->count() }} Cancelled Appointment{{ $cancelledAppointments->count() > 1 ? 's' : '' }}
                    </div>
                  </div>
                </div>
                <div class="flex-none mt-2">
                  <button id="cancelAlert" class="btn btn-sm btn-primary bg-teal-600 text-white hover:bg-teal-700 rounded-md px-3 py-1">See</button>
                </div>
              </div>
            </div>
          @else


          <!-- caancellll -->
            <div class="ml-5 px-4">
              <div role="alert" class="alert w-full border-l-2 border-cyan-800 bg-white p-4 rounded-md shadow-md">
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v8m0 4h0m-8 0h16M6 8h12"></path>
                  </svg>
                  <div class="ml-3">
                    <h3 class="font-bold text-gray-800">No Cancelled Appointments</h3>
                    <div class="text-xs text-gray-600">
                      You currently have no appointments that have been canceled.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    


        <div class="py-2">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
 <!-- Cards Section -->
 <div class="my-10"> <!-- Added margin for spacing -->
  <h2 class="text-xl font-bold mb-4 ml-4"> Overview</h2> <!-- Optional header for the cards section -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
    <!-- Admin Communication Card -->
    <div class="card bg-base-100 shadow-xl p-4 transition transform hover:scale-105">
      <div class="card-body">
        <h2 class="card-title">Admin Communication</h2>
        <p>Engage with clients and manage communications effectively to enhance client satisfaction.</p>
      </div>
      <figure>
        <img src="https://img.freepik.com/premium-vector/two-individuals-seated-across-from-each-other-table-what-appears-be-professional_1158065-1880.jpg?w=740" alt="Communication">
      </figure>
    </div>

    <!-- Manage Appointment Card -->
    <div class="card bg-base-100 shadow-xl p-4 transition transform hover:scale-105">
      <div class="card-body">
        <h2 class="card-title">Manage Appointment</h2>
        <p>Effortlessly schedule, view, and manage upcoming appointments to streamline clinic operations.</p>
      </div>
      <figure>
        <img src="https://img.freepik.com/free-vector/appointment-booking-with-smartphone_23-2148567481.jpg?t=st=1729845351~exp=1729848951~hmac=bf5c39e9470cf6344525925a729e95425f34e5c08622fc99217f3a7303107727&w=740" alt="Manage Appointment">
      </figure>
    </div>

    <!-- Manage Pet Account Card -->
    <div class="card bg-base-100 shadow-xl p-4 transition transform hover:scale-105">
      <div class="card-body">
        <h2 class="card-title">Manage Pet Account</h2>
        <p>Access and update pet profiles and health records to ensure accurate and up-to-date information.</p>
      </div>
      <figure>
        <img src="https://img.freepik.com/premium-vector/person-using-tablet-with-dog-by-their-side-while-reviewing-checklist_854757-16404.jpg?w=740" alt="Pet Account">
      </figure>
    </div>

    <!-- Client List Card -->
    <div class="card bg-base-100 shadow-xl p-4 transition transform hover:scale-105">
      <div class="card-body">
        <h2 class="card-title">Client List</h2>
        <p>View and manage client accounts and details to keep client information organized.</p>
      </div>
      <figure>
        <img src="https://img.freepik.com/free-vector/telecommuting_23-2148491068.jpg?t=st=1729845607~exp=1729849207~hmac=3aabaa2c32e14a660a3fc56b4912bfe723965ae13357b6f82b12b7c594d91007&w=740" alt="Client List">
      </figure>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>
</div>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('cancelAlert').addEventListener('click', function() {
      Swal.fire({
        title: 'Cancelled Appointment!',
        text: 'You have Cancelled Appointment. Would you like to view the reason?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, take me there!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '/admin/MonthlyCancelled';
        }
      });
    });
</script>



@endsection
