

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <style>
        .fc-button {
            background-color: #f3f4f6; /* Tailwind gray-200 */
            color: #111827; /* Tailwind gray-800 */
            border-radius: 0.375rem; /* Tailwind rounded-md */
            border: none;
        }
        .fc-button:hover {
            background-color: #e5e7eb; /* Tailwind gray-300 */
        }
        .fc-event.fully-booked {
            background-color: blue; /* Blue for fully booked */
            border-color: blue; /* Border color */
        }
        .fc-event.closed {
            background-color: red; /* Red for closed */
            border-color: red; /* Border color */
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Laravel FullCalendar Tutorial</h1>
    <div id='calendar' class="bg-white shadow-lg rounded-lg p-4"></div>
</div>
<script>
    $(document).ready(function () {
        var SITEURL = "{{ url('/') }}";
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Get user ID from a global JavaScript variable or from the server
        var userId = "{{ auth()->user()->id }}"; // Ensure user is authenticated

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
                            user_id: userId, // Include user ID here
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
                                    status: status, // Include status here
                                    user_id: userId  // Include user ID for filtering
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
                        user_id: userId, // Include user ID for validation
                        type: 'update'
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Event Updated Successfully");
                    }
                });
            },
            eventClick: function (event) {
                // Only allow deletion if the user is the owner of the event
                if (event.user_id === userId) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                id: event.id,
                                user_id: userId, // Include user ID for validation
                                type: 'delete'
                            },
                            success: function (response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event Deleted Successfully");
                            }
                        });
                    }
                } else {
                    alert("You do not have permission to delete this event.");
                }
            }
        });
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }
</script>

    

</body>
</html>
