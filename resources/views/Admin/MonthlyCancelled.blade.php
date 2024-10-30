
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
            
                            <!-- Title -->
                            <h1 class="text-left font-bold mb-6 text-3xl">Monthly Cancelled Report</h1>
            
                            <!-- Slide Animation -->
                            <div id="content" class="slide-up">
            
                                <!-- Responsive Grid for Card and Bar Chart -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            
                                    <!-- Card with Fixed Height -->
                                    <div class="bg-gray-700 shadow-xl flex p-4 items-center rounded max-w-xs md:max-w-sm h-44 mt-10">
                                        <!-- Image on the right -->
                                        <figure class="flex-shrink-0 mr-4">
                                            <img class="h-20 w-20 object-cover" src="{{ asset('logo/cancel-event.png') }}" alt="Icon" />
                                        </figure>
                                        <!-- Text content on the left -->
                                        <div class="flex flex-col text-right">
                                            <p class="text-cyan-50 font-extrabold text-3xl">
                                                <span class="text-cyan-50 ml-3">{{ $cancelledCount }}</span>
                                                <span class="text-cyan-50 ml-3">Total</span>
                                            </p>
                                            <p class="text-cyan-50 font-extrabold text-3xl mt-2">Cancelled</p>
                                            <p class="text-cyan-50 font-extrabold text-3xl mt-2">Patients</p>
                                        </div>
                                    </div>
            
                                    <!-- Bar Chart -->
                                    <div class="col-span-2 md:col-span-1 w-full mb-2">
                                        <div class="chart-container">
                                            <canvas id="myBarChart"style="width: 110%; height: 400px;"></canvas>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Data Table -->
                                <div class="mt-12">
                                    <div class="overflow-x-auto">
                                        <table id="example" class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
                                            <thead class="bg-gray-800 text-white">
                                                <tr>
                                                    <th class="px-4 py-2 text-left text-sm font-medium">Pet Name</th>
                                                    <th class="px-4 py-2 text-left text-sm font-medium">Services</th>
                                                    <th class="px-4 py-2 text-left text-sm font-medium">Appointment Number</th>
                                                    <th class="px-4 py-2 text-left text-sm font-medium">Appointment Date</th>
                                                    <th class="px-4 py-2 text-left text-sm font-medium">Cancellation Reason</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($cancelledAppointments as $appointment)
                                                <tr>
                                                    <td class="px-4 py-2">{{ $appointment->pet_name }}</td>
                                                    <td class="px-4 py-2">{{ $appointment->services }}</td>
                                                    <td class="px-4 py-2">{{ $appointment->appointment_number }}</td>
                                                    <td class="px-4 py-2">{{ $appointment->appointment_date }}</td>
                                                    <td class="px-4 py-2">{{ $appointment->cancellation_reason }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
            
                                <!-- Back to Dashboard Button -->
                                <div class="flex justify-end mt-5">
                                    <a href="{{ route('admin.AdminsDashboard.index') }}" class="block w-full">
                                        <button class="btn custom-bg-357D7F text-cyan-50">Back to Dashboard</button>
                                    </a>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/9/9h3E0P9dS8IW4T4EZ2V6p9AlZa9yt1flvY/h" crossorigin="anonymous"></script>

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>    <!-- Chart.js -->
            <!-- barChartScripts -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Get the cancellation data from the backend
                var cancellationData = @json($monthlyCancellations);
            
                // Create the bar chart
                var ctx = document.getElementById('myBarChart').getContext('2d');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                     datasets: [{
                            label: 'Cancelled Appointments',
                            data: cancellationData,
                            backgroundColor: '#357D7F', // Bar color
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

        <!-- Initialize DataTables -->
    <!-- Initialize DataTables -->
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
                    "pagingType": "simple_numbers"
                });
                
                // Custom CSS to align the search bar to the left
                $('.dataTables_filter').css('float', 'left');
                $('.dataTables_length').css('float', 'right');
                
                // Apply border-radius to the search input
                $('.dataTables_filter input').css({
                    'border-radius': '15px',
                    'padding': '6px 12px',
                
                    'margin-bottom': '5px'
                });
                
                // Add an icon inside the search input
                $('.dataTables_filter').append('<i class="fas fa-search search-icon"></i>');

                // Adjust the search input padding to make room for the icon
                $('.dataTables_filter input').css({
                    'padding-left': '30px',
                    'padding-bottom': '5px'
                    

                });
                
            });
        </script>
        @endsection

