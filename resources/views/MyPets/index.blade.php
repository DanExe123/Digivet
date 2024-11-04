<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Accounts  | Digital Veterinary System') }}
        </h2>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script> 
    </x-slot>

    <div class="relative py-12" style="background-image: url('{{ asset('logo/bgpetacc.jpg') }}'); background-size: cover; background-position: center;"  data-aos="zoom-in"data-aos-duration="2000">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay -->
        
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10"> <!-- Ensure content is above overlay -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-md"  data-aos="flip-down"data-aos-duration="2000">
                <div class="p-6 bg-white dark:bg-gray-800 border-l-4 border-cyan-800 rounded-md"> <!-- Add rounded border here -->
                    <p class="text-gray-700 mb-4">
                        Managing a pet account helps you keep track of your pet's health, appointments, and records. Here are some benefits of having a pet account:
                    </p>
                    <ul class="list-disc list-inside mb-4 text-gray-700">
                        <li>Easy access to your pet's medical history and vaccination records.</li>
                        <li>Schedule appointments quickly and efficiently.</li>
                        <li>Receive reminders for vaccinations and check-ups.</li>
                        <li>Track your pet's health progress and updates.</li>
                        <li>Manage multiple pets from one account.</li>
                    </ul>
                    <h3 class="text-md font-semibold mb-2">Your Pet Accounts</h3>
                    <p class="text-gray-700 mb-4">
                        Below are the details of your registered pets. You can update their information or remove accounts as needed.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                  
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">My Pet Account</h2>
                            <a href="{{ route('MyPets.create') }}" class="custom-bg-357D7F hover:bg-gray-700 text-white py-2 px-4 rounded">Add New Pet</a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4" data-aos="zoom-in"data-aos-duration="2000">
                            @foreach ($myPets as $pet)
                                <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg overflow-hidden flex flex-col justify-center items-center w-full transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                                    <img src="{{ asset('images/' . $pet->image) }}" alt="Pet Image" class="w-20 h-20 object-cover rounded-full flex justify-center">
                                    <div class="p-2 text-center">
                                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">Name: {{ $pet->name }}</p>
                                        <p class="text-xs text-gray-800 dark:text-gray-200 flex text-right">Breed: {{ $pet->breed }}</p>
                                        <p class="text-xs text-gray-800 dark:text-gray-200 flex text-right">Gender: {{ $pet->gender }}</p>
                                        <p class="text-xs text-gray-800 dark:text-gray-200 flex text-right">BirthDate: {{ $pet->birthdate }}</p>
                                        <p class="text-xs text-gray-800 dark:text-gray-200 flex text-right">Color: {{ $pet->color }}</p>
                                        <p class="text-xs text-gray-800 dark:text-gray-200 flex text-right">Furtype: {{ $pet->fur_type }}</p>
                                        <p class="text-xs text-gray-800 dark:text-gray-200 flex text-right">Weight: {{ $pet->weight }}</p>
                                        <p class="text-xs text-gray-800 dark:text-gray-200 flex text-right">Height: {{ $pet->height }}</p>
                                    </div>
                                    <div class="p-2 flex justify-between items-center gap-1 mb-2">
                                        <button type="button" onclick="confirmEdit({{ $pet->id }})" class="bg-blue-600 hover:bg-gray-700 text-white py-1 px-2 rounded text-xs">Edit</button>
                                        <a href="{{ route('MyPets.History.index', ['pet_id' => $pet->id]) }}" class="custom-bg-357D7F hover:bg-gray-700 text-white py-1 px-2 rounded text-xs">History</a>
                                        
                                        <form class="inline-block delete-form" action="{{ route('MyPets.destroy', $pet->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete(this)" class="bg-red-700 hover:bg-gray-700 text-white py-1 px-2 rounded text-xs">Delete</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
           
        </div>
    </div>



    <div class="py-12 bg-white">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10" > <!-- Ensure content is above overlay -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-md">
                <!-- Quotes Section -->
                <div class="flex flex-col sm:flex-row items-center"  >
                    <div class="flex-1 mb-6 sm:mb-0 sm:pr-10">
                        <blockquote class="border-l-4 border-cyan-800 pl-4 text-gray-600 italic text-lg" data-aos="fade-right"data-aos-duration="2000">
                            <p class="text-cyan-800">"The greatness of a nation and its moral progress can be judged by the way its animals are treated." - Mahatma Gandhi</p>
                            <p class="mt-2 text-cyan-800">"The best way to predict the future is to create it." - Peter Drucker</p>
                        </blockquote>
                    </div>
                    <!-- Right Side: Vet Clinic Image -->
                    <div class="flex-shrink-0 w-full sm:w-1/2 flex justify-center" data-aos="fade-left"data-aos-duration="2000">
                        <img src="{{ asset('logo/beautiful-shot-different-dog-breeds-resting.png') }}" 
                             alt="Vet Clinic Image" class="object-cover h-full w-full sm:w-auto"> <!-- Increased image size -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
                 
<footer class="footer bg-white text-base-content p-10 mt-2 relative overflow-hidden" data-aos="zoom-in-up" data-aos-duration="2000">
    <div class="absolute inset-0 z-0 h-full w-full">
        <div class="absolute inset-0 z-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#357D7F" fill-opacity="1" d="M0,64L120,80C240,96,480,128,720,128C960,128,1200,96,1320,80L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
        </div>
    </div>
    <aside class="relative z-10">
        <img src="{{ asset('logo/Veterinary Clinic System_20240517_125656_0000.png.png') }}" alt="Clinic Logo" class="h-16 mb-4">
        <p>
            Digital Veterinary Clinic System.
            <br />
            Providing reliable tech for pet care since 2024.
        </p>
    </aside>
    <nav class="relative z-10">
        <h6 class="footer-title">Veterinary Services</h6>
        <a class="link link-hover">Pet Wellness Exams</a>
        <a class="link link-hover">Vaccinations</a>
        <a class="link link-hover">Surgery Services</a>
        <a class="link link-hover">Emergency Care</a>
    </nav>
    <nav class="relative z-10">
        <h6 class="footer-title">About Us</h6>
        <a class="link link-hover">Our Team</a>
        <a class="link link-hover">Mission & Values</a>
        <a class="link link-hover">Testimonials</a>
        <a class="link link-hover">Contact Us</a>
    </nav>
    <nav class="relative z-10">
        <h6 class="footer-title">Resources</h6>
        <a class="link link-hover">Pet Care Tips</a>
        <a class="link link-hover">FAQs</a>
        <a class="link link-hover">Blog</a>
        <a class="link link-hover">Appointment Policies</a>
    </nav>
    <nav class="relative z-10">
        <h6 class="footer-title">Legal</h6>
        <a class="link link-hover">Terms of Service</a>
        <a class="link link-hover">Privacy Policy</a>
        <a class="link link-hover">Client Agreement</a>
    </nav>
</footer>

<style>
    /* Default SVG background for larger screens */
    .footer {
        background-color: white; /* Fallback color */
    }

    /* Media query for mobile devices */
    @media (max-width: 640px) {
        .footer {
            background-color: #357D7F; /* Change background color for mobile */
            padding: 2rem; /* Adjust padding for mobile if needed */
        }
        
        .footer .absolute {
            display: none; /* Hide SVG background on mobile */
        }
    }
</style>
                <script>
                    AOS.init(); // Initialize AOS
                </script>
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('message'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if (Session::has('message'))
                @if (Session::get('message_type') == 'success')
                    toastr.success("{{ Session::get('message') }}", "Saved");
                @elseif (Session::get('message_type') == 'error')
                    toastr.error("{{ Session::get('message') }}", "Deleted");
                @endif
            @endif
        });
    </script>

    
    @endif


    <script>
        // Confirm Delete with SweetAlert
function confirmDelete(button) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form
            button.closest('form').submit();
        }
    });
}

// Display success messages for edit and delete
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
});

    function confirmEdit(petId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to edit this pet's information?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, edit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the edit route
                window.location.href = "{{ url('pets') }}/" + petId + "/edit";
            }
        });
    }

    </script>
</x-app-layout>
