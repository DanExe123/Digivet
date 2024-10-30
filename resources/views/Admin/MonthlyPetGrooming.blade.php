@extends('layouts.admin-layout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-left font-bold mb-6 text-3xl">Monthly Grooming Report {{ \Carbon\Carbon::now()->format('F, Y') }}</h1>
                <div id="content" class="slide-up">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="bg-gray-700 shadow-xl flex p-4 items-center rounded max-w-xs md:max-w-sm h-44 mt-10">
                            <figure class="flex-shrink-0 mr-4">
                                <img class="h-20 w-20 object-cover" src="{{ asset('logo/grooming.png') }}" alt="Icon" />
                            </figure>
                            <div class="flex flex-col text-right">
                                <p class="text-cyan-50 font-extrabold text-3xl">
                                    <span class="text-cyan-50 ml-3">{{ $totalGrooming }}</span>
                                    <span class="text-cyan-50 ml-3">Total</span>
                                </p>
                                <p class="text-cyan-50 font-extrabold text-3xl mt-2">Pet Grooming</p>
                                <p class="text-cyan-50 font-extrabold text-3xl mt-2">Appointments</p>
                            </div>
                        </div>

                        <div class="col-span-2 md:col-span-1 w-full mb-2">
                            <div class="chart-container">
                                <canvas id="myBarChart" style="width: 110%; height: 400px;"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <div class="overflow-x-auto">
                            <table id="groomingTable" class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Owner Name</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Pet Name</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Gender</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Breed</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Birthdate</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Appointment Date</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Services</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($GroomingAppointments as $appointment)
                                    <tr>
                                        <td class="px-2 py-1 text-sm">{{ auth()->user()->name }}</td>
                                        <td class="px-2 py-1 text-sm">{{ $appointment->pet_name }}</td>
                                        <td class="px-2 py-1 text-sm">{{ $appointment->gender }}</td>
                                        <td class="px-2 py-1 text-sm">{{ $appointment->breed }}</td>
                                        <td class="px-2 py-1 text-sm">{{ \Carbon\Carbon::parse($appointment->birthdate)->format('Y-m-d') }}</td>
                                        <td class="px-2 py-1 text-sm">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') }}</td>
                                        <td class="px-2 py-1 text-sm">{{ $appointment->services }}</td>
                                        <td class="px-2 py-1 text-sm">
                                            @php
                                                $status = strtolower(trim($appointment->status ?? 'pending'));
                                            @endphp
                                            
                                            <span class="status-indicator 
                                                {{ 
                                                    $status === 'done' ? 'bg-green-100 text-green-800' : 
                                                    ($status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') 
                                                }} 
                                                text-white py-1 px-2 rounded text-center flex justify-center">
                                                {{ $status === 'active' ? 'Queue' : ucfirst($status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('admin.AdminsDashboard.index') }}" class="block w-full">  
                            <button class="btn custom-bg-357D7F text-cyan-50">Back to Dashboard</button>
                        </a>
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
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myBarChart').getContext('2d');
        let table;

        $(document).ready(function() {
            table = $('#groomingTable').DataTable({
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
                "autoWidth": false
            });

            $('.dataTables_filter').css('float', 'left');
            $('.dataTables_length').css('float', 'right');

            $('.dataTables_filter input').css({
                'border-radius': '15px',
                'padding': '4px 8px',
                'margin-bottom': '5px'
            });

            $('.dataTables_filter').append('<i class="fas fa-search search-icon"></i>');
            $('.dataTables_filter input').css({
                'padding-left': '24px'
            });

            $('.dataTables_length select').css({
                'appearance': 'none',
                '-webkit-appearance': 'none',
                '-moz-appearance': 'none',
                'background-image': 'none'
            });
        });

        const myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Monthly Groomings',
                    data: @json($monthlyGrooming), // Make sure to pass this data from your controller
                    backgroundColor: '#357D7F',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                onClick: function(event) {
                    const activePoints = myBarChart.getElementsAtEventForMode(event, 'nearest', { intersect: true }, true);
                    if (activePoints.length > 0) {
                        const firstPoint = activePoints[0];
                        const monthIndex = firstPoint.index;
                        const month = myBarChart.data.labels[monthIndex];

                        console.log('Clicked Month:', month);
                        table.search(month).draw();
                    }
                }
            }
        });
    </script>
@endsection
