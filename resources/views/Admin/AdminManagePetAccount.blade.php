@extends('layouts.admin-layout')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' ADMIN Manage Pet Account') }}
        </h2>
        @endsection

        @section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                 
    
                    <div class="flex justify-center">
                        <h1 class="text-3xl font-semibold text-center">Manage Pet Account</h1>
                    </div>
                                <!-- Slide Animation -->
                                <div id="content" class="slide-up">
                    <!-- Data Table -->
                    <div class="mt-12">
                       
                           
                    
                             
                            <div class="overflow-x-auto w-full sm:w-auto"> <!-- Reduced width for responsiveness -->
                                <table id="example" class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
                                    <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Pet Name</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Breed</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Gender</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">BirthDate</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Color</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Fur Type</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Weight</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Height</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($myPets as $pet)

                                    <!-- Example data -->
                                    <tr>
                                   
                                        <td class="px-4 py-2 text-sm">{{ $pet->name }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $pet->breed }}</td>
                                        <td class="px-4 py-2 text-sm ">{{ $pet->gender }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $pet->birthdate }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $pet->color }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $pet->fur_type }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $pet->weight }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $pet->height }}</td>
                                        <td class="px-4 py-2 text-left text-sm">
                                            <!-- Actions like edit, delete, etc. go here -->

                    <div class="flex justify-center space-x-2">
                                                    <!-- Diagnoses -->

                                     <button class="bg-cyan-950 btn btn-blue text-blue-500 hover:text-blue-700" 
                                      onclick="openDiagnosesModal('{{ $pet->name }}', {{ $pet->id }})">
                                <i class="fas fa-file-medical"></i> <!-- Icon representing a medical file/diagnosis -->
                               </button>
                       <!-- Button to open modal -->
                  

                                                       <!-- Modal Structure -->
<dialog id="diagnoses_modal" class="modal">
    <form method="POST" action="{{ route('diagnoses.store') }}" class="modal-box w-11/12 max-w-5xl">
        @csrf <!-- Laravel's CSRF protection -->
       
        <input type="hidden" id="pet-id" name="pet_id" value="">
            <!-- Clinic Name (Only display if user has a clinic name) -->
            @if(auth()->user()->clinicname)
            <div class="mb-4 mt-9">
                <label class="block text-gray-700 font-semibold mb-4" for="clinic-name">Clinic Name:</label>
                <input type="text" id="clinic-name" name="clinic_name" class="input input-bordered input-md w-full" value="{{ auth()->user()->clinicname }}" readonly>
            </div>
            @endif
        <!-- Diagnoses Section -->
        <h3 class="text-lg font-bold mb-4 text-center">Diagnoses</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Pet Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="pet-name">Pet Name:</label>
                <input type="text" id="pet-name" name="pet_name" class="input input-bordered input-md w-full" placeholder="Enter Pet Name" readonly>
            </div>

            <!-- Symptoms -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="symptoms">Symptoms:</label>
                <input type="text" id="symptoms" name="symptoms" class="input input-bordered input-md w-full" placeholder="Enter Symptoms">
            </div>

            <!-- Diagnose -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="diagnose">Diagnose:</label>
                <input type="text" id="diagnose" name="diagnose" class="input input-bordered input-md w-full" placeholder="Enter Diagnose">
            </div>

            <!-- Plan Treatment -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="plan-treatment">Plan Treatment:</label>
                <input type="text" id="plan-treatment" name="plan_treatment" class="input input-bordered input-md w-full" placeholder="Enter Plan Treatment">
            </div>

            <!-- Follow Up -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="follow-up">Follow Up:</label>
                <input type="text" id="follow-up" name="follow_up" class="input input-bordered input-md w-full" placeholder="Enter Follow Up">
            </div>
        </div>

        <!-- Diet Plan Section -->
        <h3 class="text-lg font-bold mb-4 text-center">Diet Plan</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Dietary Needs -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="dietary-needs">Dietary Needs:</label>
                <input type="text" id="dietary-needs" name="dietary_needs" class="input input-bordered input-md w-full" placeholder="Enter dietary needs" required>
            </div>

            <!-- Morning Needs -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="morning-needs">Morning Needs:</label>
                <input type="text" id="morning-needs" name="morning_needs" class="input input-bordered input-md w-full" placeholder="Enter morning needs" required>
            </div>

            <!-- Evening Meals -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="evening-meals">Evening Meals:</label>
                <input type="text" id="evening-meals" name="evening_meals" class="input input-bordered input-md w-full" placeholder="Enter evening meals" required>
            </div>

            <!-- Treats -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="treats">Treats:</label>
                <input type="text" id="treats" name="treats" class="input input-bordered input-md w-full" placeholder="Enter treats" required>
            </div>

            <!-- Water -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="water">Water:</label>
                <input type="text" id="water" name="water" class="input input-bordered input-md w-full" placeholder="Enter water requirements" required>
            </div>
        </div>

        <!-- Medication Section -->
        <h3 class="text-lg font-bold text-center">Medication</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Medication -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="medication">Medication:</label>
                <input type="text" id="medication" name="medication" class="input input-bordered input-md w-full" placeholder="Enter Medication Name">
            </div>

            <!-- Dosage -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="dosage">Dosage:</label>
                <input type="text" id="dosage" name="dosage" class="input input-bordered input-md w-full" placeholder="Enter Dosage">
            </div>

            <!-- Frequency -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="frequency">Frequency:</label>
                <input type="text" id="frequency" name="frequency" class="input input-bordered input-md w-full" placeholder="Enter Frequency">
            </div>

            <!-- Duration -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold" for="duration">Duration:</label>
                <input type="text" id="duration" name="duration" class="input input-bordered input-md w-full" placeholder="Enter Duration">
            </div>

            <!-- Additional Notes -->
            <div class="mb-4 col-span-2">
                <label class="block text-gray-700 font-semibold" for="notes">Additional Notes:</label>
                <textarea id="notes" name="notes" class="textarea textarea-bordered w-full h-24" placeholder="Enter any additional notes here..."></textarea>
            </div>
        </div>

        <!-- Modal Actions -->
        <div class="modal-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="button" class="btn" onclick="document.getElementById('diagnoses_modal').close()">Close</button>
        </div>
        
    </form>
</dialog>

               


                               

                
                                               
                                            </div>
                                           
                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                          
                        </div>
                    
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="{{ route('admin.AdminsDashboard.index') }}" class="block w-full">  
                            <button class="btn custom-bg-357D7F text-cyan-50">Back to Dashboard</button></a></div>
                            
                </div>
            </div>
        </div>
    </div>
    </div>
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <!-- DataTables CSS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  
      <!-- DataTables JS -->
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  
  

    <script>
       function openPrescriptionModal(petName, petId) {
    // Set the pet name and ID in the modal (if necessary)
    document.getElementById('pet-name').value = petName;
    document.getElementById('pet-id').value = petId;

    // Open the prescription modal
    document.getElementById('prescription_modal').showModal();
}

    </script>


<script>
    function openDiagnosesModal(petName, petId) {
        // Set the pet name in the input field
        document.getElementById('pet-name').value = petName;

        // Set the pet ID in a hidden input field (if you want to use it)
        document.getElementById('pet-id').value = petId; // Ensure you have a hidden input for pet_id

        // Show the modal
        document.getElementById('diagnoses_modal').showModal();
        
    }
   

</script>

<script>
    function openDietPlanModal(petName, petId) {
        document.getElementById('pet-id').value = petId;  // Set the pet ID in the hidden input field
        document.getElementById('diet_plan_modal').showModal();  // Open the modal
    }
</script>




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
        });
    </script>
    
    @endsection
