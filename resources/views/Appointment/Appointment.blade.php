<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Appointment Scheduling') }}
        </h2>
    </x-slot>
    
    @role('client')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-center font-extrabold mb-6">Choose Services you want to book</h1>
                     <!-- Slide Animation -->
                     <div id="content" class="slide-up">
                    <!-- Grid Layout for Cards --> 
                    <form action="{{ route('appointments.store') }}" method="POST" id="appointment-form">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Vaccination Card -->
                    <div class="card bg-base-100 shadow-xl border border-black relative">
                        <figure class="px-10 pt-10">
                            <img src="https://autumntrailsvet.com/wp-content/uploads/2021/03/injection-for-dog.jpg" alt="Vaccination" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center">
                            <div class="card-actions mt-7 relative">
                                <button type="button" class="btn custom-bg-357D7F" 
                                        onclick="toggleCheckIcon(this, 'vaccination-checkbox')" 
                                        value="Vaccination">Vaccination</button>
                                <input type="checkbox" id="vaccination-checkbox" class="checkbox checkbox-md mt-3" name="services[]" value="Vaccination" style="display: none;" />
                            </div>
                        </div>
                    </div>

                    <!-- Deworming Card -->
                    <div class="card bg-base-100 shadow-xl border border-black relative">
                        <figure class="px-10 pt-10">
                            <img src="https://media.istockphoto.com/id/1547703847/photo/dog-dewormer-with-food-in-hand-of-veterinarian-or-pet-owner.jpg?s=612x612&w=0&k=20&c=WMP0gSyEnq5r4bkfAuBcEJwKhMNxsmYSbn1b4Endcb8=" alt="Deworming" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center">
                            <div class="card-actions mt-4">
                                <button type="button" class="btn custom-bg-357D7F" 
                                        onclick="toggleCheckIcon(this, 'deworming-checkbox')" 
                                        value="Deworming">Deworming</button>
                                <input type="checkbox" id="deworming-checkbox" class="checkbox checkbox-md mt-3" name="services[]" value="Deworming" style="display: none;" />
                            </div>
                        </div>
                    </div>

                    <!-- Pet Grooming Card -->
                    <div class="card bg-base-100 shadow-xl border border-black relative">
                        <figure class="px-10 pt-10">
                            <img src="https://cdn.shopify.com/s/files/1/0259/9626/3490/files/dog-grooming-1.png?v=1665519040" alt="Pet Grooming" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center">
                            <div class="card-actions mt-6">
                                <button type="button" class="btn custom-bg-357D7F" 
                                        onclick="toggleCheckIcon(this, 'grooming-checkbox')" 
                                        value="Pet Grooming">Pet Grooming</button>
                                <input type="checkbox" id="grooming-checkbox" class="checkbox checkbox-md mt-3" name="services[]" value="Pet Grooming" style="display: none;" />
                            </div>
                        </div>
                    </div>

                    <!-- Consultation Card -->
                    <div class="card bg-base-100 shadow-xl border border-black relative">
                        <figure class="px-10 pt-10">
                            <img src="https://www.dogstrust.org.uk/images/800x600/assets/2022-09/labrador%20standing%20on%20vet%20table%20with%20treat.jpg" alt="Consultation" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center">
                            <div class="card-actions mt-2">
                                <button type="button" class="btn custom-bg-357D7F" 
                                        onclick="toggleCheckIcon(this, 'consultation-checkbox')" 
                                        value="Consultation">Consultation</button>
                                <input type="checkbox" id="consultation-checkbox" class="checkbox checkbox-md mt-3" name="services[]" value="Consultation" style="display: none;" />
                            </div>
                        </div>
                    </div>
                     
                        </div>



                   
                    
                     <!-- Calendar Section -->
                     <h2 class="text-left font-extrabold mt-12 mb-6 ">Select a Date for Your Appointment</h2>
                     <div class="flex justify-start">
                        <div id="calendar" class="bg-white p-4 rounded-lg shadow-lg mb-5 w-full h-96 md:h-128 lg:h-144 xl:h-160"></div>
                  

                    
                    
                        <div class="w-full max-w-xs ml-5">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Select Clinic</label>
                            <select id="clinic-select" name="clinicname" class="mt-2 block w-full p-2 border rounded" required>
                                <option value="" disabled selected>Select a clinic</option>
                                @foreach($clinics as $clinic)
                                    <option value="{{ $clinic->clinicname}}" 
                                        data-details='{{ json_encode([
                                            "name" => $clinic->name, 
                                            "email" => $clinic->email, 
                                            "address" => $clinic->address, 
                                            "Contact" => $clinic->Contact, 
                                            "clinic_description" => $clinic->clinic_description, 
                                            "pricing_deworming" => $clinic->pricing_deworming, 
                                            "pricing_vaccinated" => $clinic->pricing_vaccinated, 
                                            "pricing_consultation" => $clinic->pricing_consultation, 
                                            "pricing_petgrooming" => $clinic->pricing_petgrooming
                                        ]) }}'>
                                        {{ $clinic->clinicname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
<!--

                        />
-->

    

<!-- Modal structure -->
        <dialog id="my_modal_4" class="modal">
    <div class="modal-box w-11/12 max-w-5xl">
        <h3 class="text-lg font-bold">Clinic Details</h3>

        <div class="flex justify-between mb-4">
            <!-- Left Side: Clinic Details -->
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg w-1/2 border-l-4 border-[#357D7F]">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2" id="clinic-name"></div>
                    <p class="text-gray-700 text-base">
                        <strong>Email:</strong> <span id="clinic-email"></span><br>
                        <strong>Address:</strong> <span id="clinic-address"></span><br>
                        <strong>Contact:</strong> <span id="clinic-contact"></span>
                    </p>
                </div>
            </div>
        
            <!-- Right Side: Clinic Image -->
            <div class="w-1/2 flex justify-center items-center">
                <img id="clinic-image" src="https://img.freepik.com/premium-vector/doctor-with-cats-doctor-room-with-cat-dog_1120557-15207.jpg?w=826" alt="Clinic Image" class="rounded shadow-lg w-full max-w-sm object-cover" />
            </div>
        </div>
        
        
 <!-- Clinic Description -->
<div class="flex justify-center mb-4">
    <div class="max-w-3xl rounded-lg overflow-hidden shadow-lg custom-gradient p-6 text-white">
        <h4 class="text-2xl font-bold mb-4 text-center underline">Clinic Description</h4>
        <p id="clinic-description" class="text-gray-200 text-base leading-relaxed">
            <!-- Clinic description will be dynamically inserted here -->
        </p>
    </div>
</div>

        
        <!-- Pricing Cards (4 Columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4 relative z-10">
            <!-- Pricing Card 1: Deworming -->
            <div class="max-w-sm rounded overflow-hidden shadow-lg p-4 bg-white border-l-4 border-[#357D7F] transition-transform duration-300 hover:scale-105">
                <div class="font-bold text-xl mb-2">Deworming</div>
                <p class="text-gray-700 text-base">
                    Price: <span id="clinic-pricing_deworming"></span>
                </p>
            </div>
        
            <!-- Pricing Card 2: Vaccination -->
            <div class="max-w-sm rounded overflow-hidden shadow-lg p-4 bg-white border-l-4 border-[#357D7F] transition-transform duration-300 hover:scale-105">
                <div class="font-bold text-xl mb-2">Vaccination</div>
                <p class="text-gray-700 text-base">
                    Price: <span id="clinic-pricing_vaccinated"></span>
                </p>
            </div>
        
            <!-- Pricing Card 3: Consultation -->
            <div class="max-w-sm rounded overflow-hidden shadow-lg p-4 bg-white border-l-4 border-[#357D7F] transition-transform duration-300 hover:scale-105">
                <div class="font-bold text-xl mb-2">Consultation</div>
                <p class="text-gray-700 text-base">
                    Price: <span id="clinic-pricing_consultation"></span>
                </p>
            </div>
        
            <!-- Pricing Card 4: Pet Grooming -->
            <div class="max-w-sm rounded overflow-hidden shadow-lg p-4 bg-white border-l-4 border-[#357D7F] transition-transform duration-300 hover:scale-105">
                <div class="font-bold text-xl mb-2">Pet Grooming</div>
                <p class="text-gray-700 text-base">
                    Price: <span id="clinic-pricing_petgrooming"></span>
                </p>
            </div>
        </div>
        
        <div class="modal-action">
            <button type="button" class="btn custom-bg-357D7F" id="save-button">Save</button>
            <button class="btn custom-bg-357D7F" id="close-modal">Cancel</button>
        </div>
    </div>
</dialog>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedClinic = null; // To keep track of the selected clinic

       

        // Show modal with clinic details when the clinic is selected
        document.getElementById('clinic-select').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const clinicDetails = selectedOption.getAttribute('data-details');

            if (clinicDetails) {
                selectedClinic = JSON.parse(clinicDetails); // Save selected clinic details
                
                // Update with the selected clinic's data
                document.getElementById('clinic-name').textContent = selectedClinic.name;
                document.getElementById('clinic-email').textContent = selectedClinic.email;
                document.getElementById('clinic-address').textContent = selectedClinic.address;
                document.getElementById('clinic-contact').textContent = selectedClinic.Contact;
                document.getElementById('clinic-description').textContent = selectedClinic.clinic_description;
                document.getElementById('clinic-pricing_deworming').textContent = selectedClinic.pricing_deworming;
                document.getElementById('clinic-pricing_vaccinated').textContent = selectedClinic.pricing_vaccinated;
                document.getElementById('clinic-pricing_consultation').textContent = selectedClinic.pricing_consultation;
                document.getElementById('clinic-pricing_petgrooming').textContent = selectedClinic.pricing_petgrooming;

                // Show the modal
                document.getElementById('my_modal_4').showModal();

                // Update calendar based on selected user
                updateCalendar(selectedClinic.id); // Use the clinic ID or modify this if you have user ID to pass
            } else {
                alert('Please select a clinic.'); // Fallback if no details are found
            }
        });

      

        // Save button functionality
        document.getElementById('save-button').addEventListener('click', function() {
            if (selectedClinic) {
                // Logic to save the selected clinic details
                // You can implement your saving logic here, such as AJAX or setting a hidden input field
                
                // Close the modal after saving
                document.getElementById('my_modal_4').close();
                
                // Display a success message (optional)
                alert('Clinic selected: ' + selectedClinic.name);
            } else {
                alert('Please select a clinic before saving.'); // Handle case where no clinic is selected
            }
        });

        // Close modal when the close button is clicked
        document.getElementById('close-modal').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            document.getElementById('my_modal_4').close(); // Close the modal
        });
    });
</script>

                     </div>
                     <!-- closed and fullybooked -->
                    <div class="flex items-center mt-5">
                        <div class="w-4 h-4 bg-red-500 mr-3"></div> 
                        <div class="font-extrabold">
                            <p>Veterinary clinic is closed.</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-blue-500 mr-3"></div> 
                        <div class="font-extrabold">
                            <p>Fully booked on that day.</p>
                        </div>
                     </div>
                    
                       <!-- Open the modal using ID.showModal() method -->
                       <div class="flex justify-end">
                        <button type="button" class="btn custom-bg-357D7F" onclick="my_modal_5.showModal()">Fillup Form</button>
                    
                        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                            
                            <div class="modal-box p-6">
                                <h3 class="text-lg font-bold text-center mb-4">Services Form</h3>
                               
                                <form method="POST" action="{{ route('appointments.store') }}" id="modal-appointment-form">
                                    @csrf
                                    <!-- Form Fields -->
                                    <label class="form-control w-full mb-4">
                                        <div class="label">
                                            <span class="label-text">Pet name:</span>
                                        </div>
                                        <input type="text"  name="pet_name" placeholder="Enter your pet name" class="input input-bordered w-full" />
                                    </label>
                                    
                                    <label class="form-control w-full mb-4">
                                        <div class="label">
                                            <span class="label-text">Gender:</span>
                                        </div>
                                        <input type="text" name="gender" placeholder="Enter your gender" class="input input-bordered w-full" />
                                    </label>
                                    
                                    <label class="form-control w-full mb-4">
                                        <div class="label">
                                            <span class="label-text">Breed:</span>
                                        </div>
                                        <input type="text" name="breed"  placeholder="Enter your breed" class="input input-bordered w-full" />
                                    </label>
                    
                                    <label class="form-control w-full mb-4">
                                        <div class="label">
                                            <span class="label-text">Birthdate:</span>
                                        </div>
                                        <input type="text"  name="birthdate" placeholder="Enter your birthdate" class="input input-bordered w-full" />
                                    </label>
                                    <label class="form-control w-full mb-4">
                                        <div class="mb-4">
                                            <label class="form-control w-full">
                                                <div class="label">
                                                    <span class="label-text">Select Date Appointment:</span>
                                                </div>
                                                <input 
                                                    type="date" 
                                                    id="date" 
                                                    name="appointment_date"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" 
                                                />
                                            </label>
                                       
                                    <!-- Select element with full width -->
                                    <select name="service_type" class="select select-bordered w-full mt-6 mb-4">
                                        <option disabled selected>Select Service</option>
                                        <option>Home Service</option>
                                        <option>Walk-in</option>
                                    </select>
                                    
            <!-- Steps -->
            <div class="overflow-x-auto">
                
              
                
                    <ul class="steps flex space-x-1 mb-6">
                        <li data-content="✓" class="step w-44">Cancellation</li>
                        <li data-content="✓" class="step w-44">Payment</li>
                        <li data-content="✓" class="step w-44">Liability</li>
                        
           
                </ul>
                
            </div>
            
            <!-- Terms and Conditions -->
            <div id="termsConditions" class="space-y-4">
                <div class="shadow-md text-justify">
                    <p class="py-4 text-lg font-bold">"Appointments must be canceled or rescheduled at least 24 hours in advance. Failure to do so may result in a cancellation fee or a penalty affecting future bookings."</p>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">I AGREE</span>
                            <input type="checkbox" name="agreed_cancellation" id="checkbox-1" value="1" class="checkbox" />
                        </label>
                    </div>
                </div>
            
                <div class="shadow-md text-justify">
                    <p class="py-4 text-lg font-bold">"All services must be paid in full at the time of the appointment unless prior arrangements have been made."</p>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">I AGREE</span>
                            <input type="checkbox" name="agreed_payment" id="checkbox-2" value="1" class="checkbox" />
                        </label>
                    </div>
                </div>
            
                <div class="shadow-md text-justify">
                    <p class="py-4 text-lg font-bold">"The clinic requires accurate and complete medical history of the pet to provide optimal care. By booking an appointment."</p>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">I AGREE</span>
                            <input type="checkbox"  name="agreed_liability"   id="checkbox-3"  value="1" class="checkbox" />
                        </label>
                    </div>
                </div>
            </div>
              

            <!-- Modal Actions -->
            <div class="btn-group flex justify-end mt-10 space-x-0">
                <button type="submit" class="btn custom-bg-357D7F">Submit</button>
                <a href="{{ route('Appointment.index') }}" class="btn custom-bg-357D7F text-cyan-50 rounded-l-none">Close</a>
            </div>
            
            </div>
            </form>   </form>
        </div>
    </dialog>
</div>

                </div>
                   </div>
            </div>
            
        </div>


    </div>
</div>
@endrole
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Inline CSS for Check Icon -->
    <style>

    .card:hover {
        transform: translateY(-10px); /* Move the card up */
        transition: transform 0.3s ease; /* Smooth transition */
    }
        .check-icon {
            display: none; /* Hide icon by default */
            position: absolute;
            top: -10px;
            right: -10px;
            background-color:#357D7F;
            border-radius: 50%;
            padding: 5px;
            color: white;
            font-size: 20px;
        }
        .card.relative {
            position: relative;
        }
        #calendar {
            max-width: 600px;
            height: 500px; 
            margin-bottom: 20px;
        }
   

.step-complete {
    border-bottom-color: #357D7F; 
    color: #4caf50;

}
    </style>

    <!-- Inline JavaScript for Button Click -->
    <script>
        function toggleCheckIcon(button) {
            var icon = button.nextElementSibling;
            icon.style.display = icon.style.display === 'block' ? 'none' : 'block'; // Toggle check icon
        }
    </script>
 <!-- toast validation-->
<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Validation Error');
        @endforeach
    @endif
</script>

<!--Services!-->
<script>
   function toggleCheckIcon(button, checkboxId) {
    const checkbox = document.getElementById(checkboxId);

    // Toggle checkbox checked state
    checkbox.checked = !checkbox.checked;

    // Optionally, you can add a visual indicator to the button (like changing its background color when selected)
    if (checkbox.checked) {
        button.classList.add('bg-black-500');
    } else {
        button.classList.remove('bg-black-500');
    }
}

</script>







 <!-- Inline JavaScript for Button Click and Calendar -->
 <script>
    function toggleCheckIcon(button) {
        var icon = button.nextElementSibling;
        icon.style.display = icon.style.display === 'block' ? 'none' : 'block'; // Toggle check icon
    }

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
        editable: false,  // Make the calendar non-editable for clients
        events: SITEURL + "/fullcalender", // Fetch available slots
        displayEventTime: true,
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
        selectable: false, // Disable selection for clients
        eventClick: function (event) {
            // Show details about the event, if necessary
            alert('Doctor: ' + event.title + 
      '\nStatus: ' + event.status + 
      '\nStart: ' + event.start.format('YYYY-MM-DD HH:mm') + 
      '\nEnd: ' + (event.end ? event.end.format('YYYY-MM-DD HH:mm') : 'N/A'));

        }
    });










    

    // Check for closed date when the input changes
    $('#date').on('change', function () {
        var selectedDate = $(this).val();  // Get the selected date

        // Make the AJAX request to check if the date is closed or fully booked
        $.ajax({
            url: SITEURL + "/check-date",  // URL to check date availability
            method: 'POST',
            data: {
                date: selectedDate
            },
            dataType: 'json',
            success: function (response) {
                if (response.isClosed) {
                    alert('Your selected date is closed or fully booked. Please choose another date.');
                } else {
                    alert('The selected date is available.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error during AJAX request:', error);
                alert('An error occurred while checking the date.');
            }
        });
    });
});




function displayMessage(message) {
    toastr.success(message, 'Event');
}


    function updateSteps() {
    const steps = document.querySelectorAll('.step');
    const checkboxes = [
        document.getElementById('checkbox-1'),
        document.getElementById('checkbox-2'),
        document.getElementById('checkbox-3')
    ];

    checkboxes.forEach((checkbox, index) => {
        if (checkbox.checked) {
            steps[index].classList.add('step-primary');
        } else {
            steps[index].classList.remove('step-primary');
        }
    });
}

// Add event listeners to checkboxes
document.querySelectorAll('.checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateSteps);
}); 
</script>



    <!-- Include FullCalendar CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</x-app-layout>