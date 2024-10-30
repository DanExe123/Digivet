@extends('layouts.admin-layout')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Appointments') }}
        </h2>
        @endsection

        @section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                   <!-- Slide Animation -->
                    <div id="content" class="slide-up">
                @role('vetclinic')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 mx-auto w-full max-w-4xl">
                    <!-- Card 1 -->
                    <div id="todaysPatientsCard" class="bg-indigo-300 shadow-xl flex p-4 items-center rounded w-72 md:max-w-sm h-32 mx-auto">
                        <div class="flex flex-col text-center">
                            <p class="text-stone-50 font-extrabold text-2xl">
                                Today's Total
                            </p>
                            <p class="text-stone-50 font-extrabold text-2xl mt-2">Patient</p>
                            <p id="todaysPatientsCount" class="text-stone-50 font-extrabold text-2xl mt-2">0</p>
                        </div>
                        <figure class="flex-shrink-0 ml-4">
                            <img class="h-16 w-16 object-cover" src="{{ asset('logo/shape1.png') }}" alt="Icon" />
                        </figure>
                    </div>
                
                    <!-- Card 2 -->
                    <div id="patientsQueueCard" class="bg-indigo-300 shadow-xl flex p-4 items-center rounded w-72 md:max-w-sm h-32 mx-auto">
                        <div class="flex flex-col text-center">
                            <p class="text-stone-50 font-extrabold text-2xl">
                                Patients in
                            </p>
                            <p class="text-stone-50 font-extrabold text-2xl mt-2">Queue</p>
                            <p id="patientsQueueCount" class="text-stone-50 font-extrabold text-2xl mt-2">0</p>
                        </div>
                        <figure class="flex-shrink-0 ml-10">
                            <img class="h-16 w-16 object-cover" src="{{ asset('logo/shape1.png') }}" alt="Icon" />
                        </figure>
                    </div>
                </div>
                


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Fetch today's patient and queue counts
                        fetch('/appointments/stats')
                        .then(response => response.json())
                        .then(data => {
                            console.log(data); // Log fetched data for debugging
                            document.getElementById('todaysPatientsCount').textContent = data.todays_patients;
                            document.getElementById('patientsQueueCount').textContent = data.queue_patients;
                        })
                        .catch(error => console.error('Error fetching patient stats:', error));
                    });
                </script>






<!-- Data Table -->
<div class="mt-6">
    <div class="overflow-x-auto w-full sm:w-auto"> <!-- Reduced width for responsiveness -->
        <table id="example" class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-2 py-1 text-left text-xs font-medium">Client Name</th> <!-- Reduced padding and font size -->
                    <th class="px-2 py-1 text-left text-xs font-medium">Pet Name</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Services</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Gender</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Breed</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Appointment Date</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Service type</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Appointnumber</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Status</th>
                    <th class="px-2 py-1 text-left text-xs font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($appointments as $appointment)
                <tr>
                    <td class="px-2 py-1 text-sm">{{ $appointment->user->name }}</td>
                    <td class="px-2 py-1 text-sm">{{ $appointment->pet_name }}</td>
                    <td class="px-2 py-1 text-sm">{{ $appointment->services }}</td>
                    <td class="px-2 py-1 text-sm">{{ $appointment->breed }}</td>
                    <td class="px-2 py-1 text-sm">{{ $appointment->gender }}</td>
                    <td class="px-2 py-1 text-sm">{{ $appointment->appointment_date }}</td>
                    <td class="px-2 py-1 text-sm">{{ $appointment->service_type }}</td>
                    <td class="px-2 py-1 text-sm">{{ $appointment->appointment_number }}</td>
                    <td class="px-2 py-1 text-sm">
                        @php
                            $status = strtolower(trim($appointment->status ?? 'pending')); // Normalize status
                        @endphp
                        
                        <span class="status-indicator 
                            {{ 
                                $status === 'done' ? 'bg-green-100 text-green-800' : 
                                ($status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') 
                            }} 
                            text-white py-1 px-2 rounded text-center flex justify-center">
                            {{ $status === 'active' ? 'Queue' : ucfirst($status) }} <!-- Display Queue for active status -->
                        </span>
                    </td>
                    
                    
                    <td class="px-2 py-1 text-center text-xs">
                        <div class="flex justify-center space-x-1">
                           
                            <button class="bg-cyan-950 text-xs btn btn-red text-red-500 hover:text-red-700 px-2 py-1" onclick="deleteRecord({{ $appointment->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            
                        
                            <button class="bg-cyan-950 text-xs btn btn-green text-green-500 hover:text-green-700 px-2 py-1" 
                            onclick="markAsDone({{ $appointment->id }}, '{{ $appointment->status }}')">
                        <i class="fas fa-check"></i>
                    </button>
                        </div>
                        
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
                            <!-- Include SweetAlert2 CSS -->
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

                            <!-- Include SweetAlert2 JS -->
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                <!-- jQuery -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/9/9h3E0P9dS8IW4T4EZ2V6p9AlZa9yt1flvY/h" crossorigin="anonymous"></script>

                            <!-- DataTables CSS -->
                            <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

                            <!-- DataTables JS -->
                            <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                            @endrole 
                                <!-- Initialize DataTables -->
                            <!-- DataTables Script -->
                            <script>
                                $(document).ready(function() {
                                    $('#example').DataTable({
                                        "paging": true,
                                        "searching": true,
                                        "ordering": true,
                                        "info": true,
                                        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
                                        "language": {
                                            "search": "_INPUT_",
                                            "searchPlaceholder": "Search..."
                                        },
                                        "pagingType": "simple_numbers",
                                        "autoWidth": false // Disables automatic width calculation
                                    });

                                    // Custom CSS to align the search bar to the left
                                    $('.dataTables_filter').css('float', 'left');
                                    $('.dataTables_length').css('float', 'right');

                                    // Apply border-radius to the search input
                                    $('.dataTables_filter input').css({
                                        'border-radius': '15px',
                                        'padding': '4px 8px', // Reduced padding for compact look
                                        'margin-bottom': '5px'
                                    });

                                    // Add an icon inside the search input
                                    $('.dataTables_filter').append('<i class="fas fa-search search-icon"></i>');
                                    $('.dataTables_filter input').css({
                                        'padding-left': '24px' // Adjust as needed for the icon
                                    });

                                    // CSS to remove the arrow down in the DataTable length select
                                    $('.dataTables_length select').css({
                                        'appearance': 'none', // Remove default appearance
                                        '-webkit-appearance': 'none', // Remove default appearance for Safari
                                        '-moz-appearance': 'none', // Remove default appearance for Firefox
                                        'background-image': 'none' // Remove any background image
                                    });
                                });
                            </script>

                                        <script>
                                            function markAsDone(appointmentId, status) {
                                                // Check the current status of the appointment
                                                if (status === 'done') {
                                                    // If it's already done, show a SweetAlert message
                                                    Swal.fire({
                                                        icon: 'info',
                                                        title: 'Appointment Already Done',
                                                        text: 'This appointment is already marked as done.',
                                                    });
                                                    return;
                                                }

                                                if (status === 'cancelled') {
                                                    // If the appointment is cancelled, show a SweetAlert message
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Appointment Cancelled',
                                                        text: 'You cannot mark a cancelled appointment as done.',
                                                    });
                                                    return;
                                                }

                                                // Proceed to mark as done
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "Do you want to mark this appointment as done?",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, mark it as done!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        fetch(`/appointments/${appointmentId}/mark-done`, {
                                                            method: 'PATCH',
                                                            headers: {
                                                                'Content-Type': 'application/json',
                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                            },
                                                            body: JSON.stringify({
                                                                status: 'done'
                                                            })
                                                        })
                                                        .then(response => {
                                                            if (response.ok) {
                                                                return response.json();
                                                            }
                                                            throw new Error('Network response was not ok.');
                                                        })
                                                        .then(data => {
                                                            // Reload the page to see updated data
                                                            location.reload();
                                                        })
                                                        .catch(error => {
                                                            console.error('There was a problem with the fetch operation:', error);
                                                        });
                                                    }
                                                });
                                            }
                                        
                                        </script>

                                        <script>
                                function deleteRecord(appointmentId) {
                                    // Show SweetAlert confirmation
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to delete this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Proceed with the deletion
                                            fetch(`/appointments/${appointmentId}`, {
                                                method: 'DELETE',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                                                }
                                            })
                                            .then(response => {
                                                if (response.ok) {
                                                    return response.json();
                                                }
                                                throw new Error('Network response was not ok.');
                                            })
                                            .then(data => {
                                                // Optionally, show success message and reload the page
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Deleted!',
                                                    text: 'Your appointment has been deleted.',
                                                }).then(() => {
                                                    location.reload(); // Reload the page to see updated data
                                                });
                                            })
                                            .catch(error => {
                                                console.error('There was a problem with the fetch operation:', error);
                                            });
                                        }
                                    });
                                }
                            </script>


                                
                                
                            

                                @endsection