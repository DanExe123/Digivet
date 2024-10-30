<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('How to pay in Digital Veterenary Clinic') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script> 

    <div class="py-12">
        <div id="description-section" class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 h-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Slide-left Section -->   
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Left Side: Appointment Payment Information -->
                    <div class="flex flex-col justify-center p-4" data-aos="fade-up-left" data-aos-duration="2000">
                        <!-- Logo on Top of Description -->
                        <div class="flex justify-center mb-6" data-aos="zoom-in" >
                            <img src="{{ asset('logo/Veterinary Clinic System_20240517_125656_0000.png.png') }}" alt="Clinic Logo" class="h-20" data-aos="fade-up-left" data-aos-duration="2000">
                        </div>
                        <h3 class="text-2xl font-bold">Welcome to Our Digital Veterinary Clinic</h3>
                        <p class="py-4">
                            We are excited to offer a convenient online payment system specifically for your appointment fees. 
                            This secure platform allows you to pay for your veterinary appointments from the comfort of your home.
                        </p>
                        <p>
                            To make a payment for your appointment, simply follow these steps:
                            <ul class="list-disc ml-5 mt-2">
                                <li>Select the appointment type you have scheduled.</li>
                                <li>Enter the total fee due for the appointment.</li>
                                <li>Provide your payment information securely.</li>
                                <li>Submit your payment and receive a confirmation email.</li>
                            </ul>
                        </p>
                        <p class="mt-4">
                            If you have any questions or need assistance with the online payment process, please feel free 
                            to contact our support team. Thank you for choosing us for your pet’s care!
                        </p>
                    </div>

                    <!-- Right Side: Vet Clinic Image -->
                    <div class="flex justify-center" data-aos="zoom-in">
                        <img src="{{ asset('logo/veterinary-care-composition-with-vet-doctors-dog-inspection-interior-elements-flat.png') }}" 
                             alt="Vet Clinic Image">
                    </div>
                </div>
                <!-- End of 2-column grid --> 
            </div>

            <!-- Start of 2-column grid with mockup phone and payment transaction design -->
            <div id="mockup-phone-section" class="grid grid-cols-1 md:grid-cols-2 gap-4" data-aos="zoom-in" data-aos-duration="2000">
                <!-- Left Side: Mockup Phone -->
                <div class="flex justify-center items-center">
                    <div class="relative">
                        <!-- Sliding Wrapper -->
                        <div class="mockup-phone relative overflow-hidden slide-in">
                            <div class="camera"></div>
                            <div class="display transition-transform duration-500 transform translate-x-0">
                                <div class="artboard artboard-demo phone-1 flex items-center justify-center p-4 bg-[#217ce4]">
                                    <!-- Payment Success Message -->
                                    <div class="text-center bg-white p-6 rounded shadow-md">
                                        <!-- Font Awesome Icon -->
                                        <i class="fas fa-check-circle text-blue-500 mx-auto mb-4" style="font-size: 4rem;"></i>
                                        <h4 class="text-xl font-bold text-green-800">Payment Successfully Sent!</h4>
                                        <p class="mt-2 text-gray-700">Thank you for your payment. Your transaction has been processed successfully.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Details and Steps Section -->
                <div class="flex flex-col space-y-4">
                    <!-- Company Details Section with Hover Transition -->
                    <div class="bg-white p-6 rounded shadow-md flex items-center space-x-6 w-3/4 border-l-2 border-black mt-10 h-64 transition duration-300 transform hover:scale-105 hover:bg-gray-100 dark:hover:bg-gray-900" data-aos="fade-up-left" data-aos-duration="2000">
                        <!-- Clinic Logo -->
                        <img src="{{ asset('logo/Veterinary Clinic System_20240517_125656_0000.png.png') }}" alt="Clinic Logo" class="h-20 w-20 object-cover">
                        <!-- Details Text -->
                        <div>
                            <h4 class="text-xl font-bold mb-4">Company Details</h4>
                            <p class="text-gray-700 mb-2">Company Name: XYZ Corp</p>
                            <p class="text-gray-700 mb-2">Address: 123 Business Rd, City, Country</p>
                            <p class="text-gray-700 mb-2">Contact Number: (123) 456-7890</p>
                            <p class="text-gray-700 mb-2">Bank Account Number: 9876543210</p>
                            <p class="text-gray-700">GCash Number: 0917-123-4567</p>
                        </div>
                    </div>

                    <!-- Steps Section with Hover Transition -->
                    <div class="bg-white p-6 rounded shadow-md flex-1 space-x-6 w-3/4 transition duration-300 transform hover:scale-105 hover:bg-gray-100 dark:hover:bg-gray-900" data-aos="fade-up-left" data-aos-duration="2000">
                        <h4 class="text-xl font-bold mb-4">Transaction Steps</h4>
                        <ol class="list-decimal pl-5 space-y-2">
                            <li class="text-gray-700">Step 1: Select your payment method.</li>
                            <li class="text-gray-700">Step 2: Enter payment details.</li>
                            <li class="text-gray-700">Step 3: Review and confirm payment.</li>
                            <li class="text-gray-700">Step 4: Payment processed successfully.</li>
                            <li class="text-gray-700">Step 5: Wait for Confirmation of admin.</li>
                        </ol>
                        <img src="{{ asset('logo/flat-receiving-cashback-bonus-from-paying-online.png') }}" alt="Vet Clinic Image" class="h-42">
                    </div>
                </div>
            </div>
            <!-- End of 2-column grid -->
        </div>

        <footer class="footer bg-white text-base-content p-10 mt-2" data-aos="zoom-in-up"data-aos-duration="2000">
            <aside>
                <img src="{{ asset('logo/Veterinary Clinic System_20240517_125656_0000.png.png') }}" alt="Clinic Logo" class="h-16 mb-4">
                <p>
                    Digital Veterinary Clinic System.
                    <br />
                    Providing reliable tech for pet care since 2024.
                </p>
            </aside>
            <nav>
                <h6 class="footer-title">Veterinary Services</h6>
                <a class="link link-hover">Pet Wellness Exams</a>
                <a class="link link-hover">Vaccinations</a>
                <a class="link link-hover">Surgery Services</a>
                <a class="link link-hover">Emergency Care</a>
            </nav>
            <nav>
                <h6 class="footer-title">About Us</h6>
                <a class="link link-hover">Our Team</a>
                <a class="link link-hover">Mission & Values</a>
                <a class="link link-hover">Testimonials</a>
                <a class="link link-hover">Contact Us</a>
            </nav>
            <nav>
                <h6 class="footer-title">Resources</h6>
                <a class="link link-hover">Pet Care Tips</a>
                <a class="link link-hover">FAQs</a>
                <a class="link link-hover">Blog</a>
                <a class="link link-hover">Appointment Policies</a>
            </nav>
            <nav>
                <h6 class="footer-title">Legal</h6>
                <a class="link link-hover">Terms of Service</a>
                <a class="link link-hover">Privacy Policy</a>
                <a class="link link-hover">Client Agreement</a>
            </nav>
        </footer>
    </div>

    <script>
        AOS.init(); // Initialize AOS
    </script>
</x-app-layout>
