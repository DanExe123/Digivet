<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


<nav x-data="{ open: false }" class="custom-bg-357D7F border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.AdminWelcome') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                @role('vetclinic')
                <!-- Navigation Links for vetclinic role -->
                <div class="hidden space-x-10 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('admin.AdminsDashboard.index') }}" :active="request()->routeIs('admin.AdminsDashboard.index')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('chatify') }}" :active="request()->routeIs('chatify')" class="custom-bg-357D7F text-cyan-50">
                        {{ __('Admin Communication') }}
                    </x-nav-link>


                <!--Admin Appointment Modal Trigger -->
                    <div class="dropdown dropdown-hover mt-5">
                        <x-nav-link href="{{ route('admin.AdminAppointment.index') }}" :active="request()->routeIs('admin.AdminAppointment.index')">
                            {{ __('Manage Clients Appointment') }}
                        </x-nav-link>
                      
                             <ul class="menu dropdown-content custom-bg-357D7F rounded-box z-[1] w-62 p-2 shadow">
                                <li>
                                    <a href="#" onclick="my_modal_4.showModal()" class="{{ request()->routeIs('admin.FullCalendar.index') ? 'bg-cyan-700 text-cyan-50' : 'text-cyan-500' }} rounded px-4 py-2 p-7">
                                        Update My Schedule
                                    </a>
                                </li>   </ul>
                          <!-- Modal Structure -->
    <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="text-lg font-bold">Update My Schedule</h3>
            <div class="container mx-auto mt-10">
               
                <div id='calendar' class="bg-white shadow-lg rounded-lg p-4"></div>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        
    </dialog>
</div>






                    <x-nav-link href="{{ route('admin.AdminManagePetAccount.index') }}" :active="request()->routeIs('admin.AdminManagePetAccount.index')">
                        {{ __('Manage Pet Accounts') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('admin.AdminClientAccountList.index') }}" :active="request()->routeIs('admin.AdminClientAccountList.index')">
                        {{ __('Client Account List') }}
                    </x-nav-link>


                    <x-nav-link>
                        <button class="indicator ml-20" onclick="my_modal_5.showModal()">
                            <span class="indicator-item badge badge-secondary bg-white text-black border-none">{{ $appointmentCount }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-5-5.917V5a2 2 0 10-4 0v.083A6.002 6.002 0 004 11v3.159c0 .538-.214 1.055-.595 1.437L2 17h13zM12 22a2 2 0 002-2H10a2 2 0 002 2z" />
                            </svg>
                        </button>
                        
                    </x-nav-link>
                    
                    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <div class="sticky top-0 z-10 bg-white">
                                <h3 class="text-lg font-bold">Notifications</h3>
                                <p class="py-4">You have new notifications!</p>
                                <h4 class="text-md font-semibold mt-4">New Appointments</h4>
                            </div>
                            <div class="indicator flex flex-col space-y-2 w-full">
                                @foreach($appointments as $appointment)
                                <div id="notification-{{ $appointment->id }}" class="alert shadow-lg p-2 rounded-lg flex flex-col justify-between text-sm">
                                    <div class="flex justify-between items-center">
                                        <strong class="text-green-600">Appointment</strong>: 
                                        <span class="font-bold text-red-600">{{ $appointment->appointment_number }}</span>
                                        <button class="close-alert text-gray-600 hover:text-gray-900 ml-2" onclick="removeNotification({{ $appointment->id }});">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <span class="text-gray-500 text-xs mt-1 text-center">Scheduled Date: <span class="font-bold text-red-600">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y') }}</span></span>
                                </div>
                            @endforeach
                            </div>
                            
                            <div class="modal-action mt-4">
                                <form method="dialog">
                                    <button class="btn">Close</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                        
                    

                </div>
                @endrole
            </div>



            <script>
                function removeNotification(appointmentId) {
                    // Remove the notification from the DOM
                    const notificationElement = document.getElementById('notification-' + appointmentId);
                    if (notificationElement) {
                        notificationElement.remove();
                    }
            
                    // Optionally, make an AJAX request to delete the notification on the server
                    fetch(`/appointments/${appointmentId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // You may want to return JSON if needed
                    })
                    .then(data => {
                        console.log('Notification deleted successfully:', data);
                    })
                    .catch((error) => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
                }
            </script>





            <!-- Profile and Settings Dropdowns -->
            <div class="flex items-right space-x-4 mt-5">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                    {{ Auth::user()->currentTeam->name }}

                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>
                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}'s Profile Picture">
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-black dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}
                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-black">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger Menu for Small Screens -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link href="{{ route('admin.AdminWelcome') }}" :active="request()->routeIs('admin.AdminWelcome')">
                {{ __('Welcome') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin.AdminsDashboard.index') }}" :active="request()->routeIs('admin.AdminsDashboard.index')">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin.AdminCommunication.index') }}" :active="request()->routeIs('admin.AdminCommunication.index')">
                {{ __('Admin Communication') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin.AdminAppointment.index') }}" :active="request()->routeIs('admin.AdminAppointment.index')">
                {{ __('Manage Clients Appointment') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin.AdminManagePetAccount.index') }}" :active="request()->routeIs('admin.AdminManagePetAccount.index')">
                {{ __('Manage Pet Accounts') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin.AdminClientAccountList.index') }}" :active="request()->routeIs('admin.AdminClientAccountList.index')">
                {{ __('Client Account List') }}
            </x-nav-link>
        </div>
    </div>
</nav>


<script>
    // Optional: If you want to open the modal when clicking on "My Schedule"
    document.querySelector('.dropdown label').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default behavior
        document.getElementById('my-modal').checked = true; // Open the modal
    });

    
</script>


<script>
    $(document).ready(function () {
        var SITEURL = "{{ url('/') }}";
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        var calendar = $('#calendar').fullCalendar({
            header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
            editable: true,
            events: SITEURL + "/fullcalender",
            displayEventTime: false,
            editable: true,
            eventRender: function (event, element) {
                // Apply classes based on event status
                if (event.status === 'fully_booked') {
                    element.css('background-color', 'blue');  // Blue for fully booked
                    element.css('border-color', 'blue');      // Border color
                } else if (event.status === 'closed') {
                    element.css('background-color', 'red');   // Red for closed
                    element.css('border-color', 'red');       // Border color
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
    var title = prompt('Event Title:');
    var status = prompt('Event Status (closed or fully_booked):'); // Prompt for status
    if (title && (status === 'closed' || status === 'fully_booked')) {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
        $.ajax({
            url: SITEURL + "/fullcalenderAjax",
            data: {
                title: title,
                start: start,
                end: end,
                type: 'add',
                status: status // Include status here
            },
            type: "POST",
            success: function (data) {
                displayMessage("Event Created Successfully");

                calendar.fullCalendar('renderEvent',
                    {
                        id: data.id,
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay,
                        status: status // Include status here
                    }, true);

                calendar.fullCalendar('unselect');
            }
        });
    } else {
        alert('Please enter a valid title and status.');
    }
},

            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
    
                $.ajax({
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        title: event.title,
                        start: start,
                        end: end,
                        id: event.id,
                        type: 'update'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event Updated Successfully");
                    }
                });
            },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event Deleted Successfully");
                        }
                    });
                }
            }
        });
    
    });
    
    function displayMessage(message) {
        toastr.success(message, 'Event');
    }
    </script>
    

