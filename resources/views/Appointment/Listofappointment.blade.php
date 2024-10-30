<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    @role('client')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg h-full">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 h-full">
                    <h1 class="text-center text-2xl font-extrabold mb-6">My Appointments</h1>

                    <!-- Modal Toggle Checkbox -->
                    <input type="checkbox" id="my_modal_6" class="modal-toggle hidden" />
                    
                    <!-- Modal -->
                    <div class="modal">
                        <div class="modal-box relative">
                            <h3 class="text-lg font-bold">Cancel Appointment</h3>
                            <p class="py-4">Please provide a reason for cancelling the appointment.</p>
                    
                            <form action="{{ route('Listofappointment.cancel') }}" method="POST" id="cancel-appointment-form">
                                @csrf
                                <input type="hidden" name="appointment_id" id="appointment_id"> <!-- Hidden appointment ID -->
                    
                                <div class="mb-4">
                                    <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Cancellation</label>
                                    <textarea id="reason" name="reason" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter reason here" required></textarea>
                                </div>
                    
                                <!-- Submit Button -->
                                <div class="modal-action">
                                    <button type="submit" class="btn btn-success text-cyan-50">Submit</button>
                                    <label for="my_modal_6" class="btn">Close</label>
                                </div>
                            </form>
                        </div>
                        <label for="my_modal_6" class="modal-backdrop"></label>
                    </div>
                    
                    <!-- Slide Animation -->
                    <div id="content" class="slide-up">
                        <div class="overflow-x-auto">
                            <table id="example" class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Pet Name</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Clinic Name</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Services</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Gender</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Breed</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Appointment Date</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Birthdate</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Status</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($appointments as $appointment)
                                    <tr>
                                        <td class="px-4 py-2 text-sm">{{ $appointment->pet_name }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $appointment->clinicname }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $appointment->services }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $appointment->gender }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $appointment->breed }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $appointment->appointment_date }}</td>
                                        <td class="px-4 py-2 text-sm">{{ \Carbon\Carbon::parse($appointment->birthdate)->format('Y-m-d') }}</td>
                                        <td class="px-4 py-2">
                                            <span class="
                                                {{ $appointment->status === 'cancelled' ? 'bg-red-100 text-red-800' : 
                                                   ($appointment->status === 'active' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }} 
                                                status-indicator text-white py-1 px-2 rounded text-center flex justify-center">
                                                {{ $appointment->status === 'active' ? 'Queue' : ucfirst($appointment->status) }} <!-- Capitalize the first letter -->
                                            </span>
                                        </td>
                                        
                                            
                                        <td class="px-4 py-2 text-center">
                                            <!-- Trigger Button -->
                                            <button 
                                                onclick="document.getElementById('appointment_id').value = '{{ $appointment->id }}'; document.getElementById('my_modal_6').checked = true;"
                                                class="flex items-center w-20 bg-red-500 text-white rounded px-2 py-1 cursor-pointer hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                <i class="fas fa-times mr-2"></i> <!-- Cancel icon -->
                                                Cancel
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

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
    
</x-app-layout>
