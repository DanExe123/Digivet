<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script> 
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    html {
    scroll-behavior: smooth;
}
</style>


<body>
    <!-- Sticky Navbar -->
    <nav class="bg-white shadow sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center px-4 py-4">
            <!-- Logo Section -->
            <div class="text-xl font-bold text-[#357D7F]">
                <a href="welcome" class="flex items-center">
                    <img src="{{ asset('logo/Veterinary Clinic System_20240517_125656_0000.png.png') }}" alt="Clinic Logo" class="h-10">
                    <span class="font-poppins">Digi Vet</span>
                </a>
            </div>
    
            <!-- Hamburger Button -->
            <div class="block lg:hidden">
                <button id="hamburger" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
    
         <!-- Centered Navigation Links -->
        <div id="nav-menu" class="hidden lg:flex flex-1 justify-center">
            <ul class="flex space-x-8">
                <li><a href="#welcome" class="text-gray-600 hover:text-gray-800 transition font-poppins">Home</a></li>
                <li><a href="#about" class="text-gray-600 hover:text-gray-800 transition font-poppins">About</a></li>
                <li>
                    <a href="#services" class="text-gray-600 hover:text-gray-800 transition relative border-b-2 border-[#357D7F] font-poppins"> 
                        Our Services
                    </a>
                </li>
                <li><a href="#payment" class="text-gray-600 hover:text-gray-800 transition font-poppins">Payment</a></li>
                <li><a href="#pet-health" class="text-gray-600 hover:text-gray-800 transition font-poppins">Pet Health</a></li>
                <li><a href="#features" class="text-gray-600 hover:text-gray-800 transition font-poppins">Features</a></li>
            </ul>
            
        </div>

            <!-- Right-side Links -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-[#0f0f0f] transition">Register</a>
            </div>
        </div>
    
        <!-- Responsive Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden">
            <ul class="flex flex-col items-center space-y-2 py-4">
                <li><a href="#" class="text-gray-600 hover:text-gray-800 transition font-poppins">Home</a></li>
                <li><a href="#" class="text-gray-600 hover:text-gray-800 transition font-poppins">About</a></li>
                <li>
                    <a href="#" class="text-gray-600 hover:text-gray-800 transition relative border-b-2 border-[#357D7F] font-poppins"> 
                        Our Services
                    </a>
                </li>
                <li><a href="#" class="text-gray-600 hover:text-gray-800 transition font-poppins">Payment</a></li>
                <li><a href="#" class="text-gray-600 hover:text-gray-800 transition font-poppins">Pet Health</a></li>
                <li><a href="#" class="text-gray-600 hover:text-gray-800 transition font-poppins">Features</a></li>
            </ul>
    
            <!-- Login and Register Links in Mobile Menu -->
            <div class="flex flex-col items-center space-y-2 py-4">
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 transition">Login</a>
                <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-[#0f0f0f] transition">Register</a>
            </div>
        </div>
    </nav>
    
    
    <!-- Main Container for Both Sections -->
<div class="flex h-screen"> <div class="absolute inset-0 bg-gray-800 opacity-5"></div>
    <!-- Section 1: Image Section -->
    <section class="flex-none w-1/2 h-full relative" data-aos="fade-up"
    data-aos-duration="3000">
        <img src="{{ asset('logo/welcomebg.png') }}" alt="Welcome Background" class="w-full h-full object-cover"> <!-- Image fills the section height -->
        <!-- Gray overlay with 50% opacity -->
       
    </section>

    <!-- Section 2: Content Section -->
    <section class="flex-none w-1/2 h-full flex flex-col items-start p-8 relative" data-aos="fade-left"  data-aos-duration="3000"> <!-- Align items to the top -->
        <h2 class="text-3xl font-bold text-gray-800">Welcome to <span class="text-[#357D7F]">Digi Vet</span></h2>
        <p class="mt-4 text-gray-600">Your trusted partner in pet health and wellness. We offer a range of services to keep your pets happy and healthy.</p>
        <blockquote class="mt-4 italic text-gray-500 border-l-4 border-[#357D7F] pl-4">
            "The greatness of a nation and its moral progress can be judged by the way its animals are treated." - Mahatma Gandhi
        </blockquote>
        <p class="mt-4 text-gray-600">Join us in creating a healthier and happier environment for your furry friends. Together, we can make a difference!</p>
        <a href="#" class="mt-6 bg-[#357D7F] text-white px-4 py-2 rounded hover:bg-[#2f6d6f] transition">Read More</a>

       
    </section>
</div>
<!-- Card Section --><!-- Card Section -->
<!-- Cards Section -->
<section id="services"class="py-12 bg-white" >
    <h1 class="text-3xl font-bold text-center mb-8" data-aos="zoom-in "  data-aos-duration="2000">Our Services</h1>
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

       
      <!-- Vaccination Card -->
<div class="bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" data-aos="zoom-in" data-aos-duration="2000">
    <div class="flex justify-center">
        <i class="fas fa-syringe text-4xl text-white hover:text-[#2f6d6f] transition"></i>
    </div>
    <h3 class="text-xl font-bold mt-4 text-center text-white">Vaccination</h3>
    <p class="mt-2 text-gray-200 text-center">Comprehensive vaccination services to keep your pets protected.</p>
</div>

<!-- Pet Grooming Card -->
<div class="bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" data-aos="zoom-in" data-aos-duration="2000">
    <div class="flex justify-center">
        <i class="fas fa-scissors text-4xl text-white hover:text-[#2f6d6f] transition"></i>
    </div>
    <h3 class="text-xl font-bold mt-4 text-center text-white">Pet Grooming</h3>
    <p class="mt-2 text-gray-200 text-center">Professional grooming to keep your pet looking and feeling their best.</p>
</div>

<!-- Consultation Card -->
<div class="bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" data-aos="zoom-in" data-aos-duration="2000">
    <div class="flex justify-center">
        <i class="fas fa-comments text-4xl text-white hover:text-[#2f6d6f] transition"></i>
    </div>
    <h3 class="text-xl font-bold mt-4 text-center text-white">Consultation</h3>
    <p class="mt-2 text-gray-200 text-center">Expert consultations for all your pet health questions.</p>
</div>

<!-- Deworming Card -->
<div class="bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" data-aos="zoom-in" data-aos-duration="2000">
    <div class="flex justify-center">
        <i class="fas fa-pills text-4xl text-white hover:text-[#2f6d6f] transition"></i>
    </div>
    <h3 class="text-xl font-bold mt-4 text-center text-white">Deworming</h3>
    <p class="mt-2 text-gray-200 text-center">Safe and effective deworming treatments for your pets.</p>
</div>

    </div>
</section>


<section id="pet-health" class="py-12 bg-white">
    <h1 class="text-3xl font-bold text-center mb-8" data-aos="zoom-in">Pet Health</h1>
    <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between">
        <!-- Left Column: Text Content -->
        <div class="lg:w-1/2 p-8" data-aos="zoom-in-right" data-aos-duration="1500">
            <h2 class="text-2xl font-semibold text-[#357D7F]">Keeping Your Pets Healthy and Happy</h2>
            <p class="mt-4 text-gray-600">
                At Digi Vet, we believe that pet health is paramount. Our comprehensive health plans are designed to keep your furry friends in their best shape. From vaccinations to regular check-ups, we offer a range of services tailored for your pet’s needs.
            </p>
            <p class="mt-4 text-gray-600 mb-5">
                "The best way to find yourself is to lose yourself in the service of others." – Mahatma Gandhi. We are dedicated to serving your pets with the utmost care and love.
            </p>
            <a href="#" class="mt-10 bg-[#357D7F] text-white px-4 py-2 rounded hover:bg-[#2f6d6f] transition">
                Learn More
            </a>
        </div>
        
        <!-- Right Column: Image -->
        <div class="lg:w-1/2 flex justify-center p-8" data-aos="zoom-in-left" data-aos-duration="1500">
            <img src="{{ asset('logo/pethealth.png') }}" alt="Pet Health" class=" w-full max-w-md object-cover">
        </div>
    </div>
</section>

<section id="about" class="py-12">
    <div class="relative bg-cover bg-center" style="background-image: url('{{ asset('logo/secbg.jpg') }}');" data-aos="zoom-in" data-aos-duration="1500">
        <div class="bg-black bg-opacity-50 py-12"> <!-- Semi-transparent overlay -->
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-4">About Us</h2>
                <p class="mt-4 text-gray-300">
                    At Digi Vet, we are dedicated to transforming the veterinary industry. Our innovative system empowers veterinary clinics to embrace digital solutions, streamline operations, and enhance patient care. 
                    We believe in a future where technology and compassion work hand in hand to ensure every pet receives the best possible care.
                </p>
                <p class="mt-4 text-gray-300">
                    Join us on our journey to revolutionize pet healthcare by providing the tools and resources necessary for clinics to operate more efficiently and effectively. Let us help you make your clinic more digital, organized, and ready for the future!
                </p>
            </div>
        </div>
    </div>
</section>



<section id="features" class="py-12 bg-white">
    <div class="container mx-auto text-center" data-aos="fade-down"
    data-aos-easing="linear"
    data-aos-duration="1500">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Features</h2>
        
        <div class="flex flex-col md:flex-row">
            <!-- Client Account Features -->
            <div class="flex-1">
                <h3 class="text-xl font-bold mb-4 text-left">Client Account Features</h3>
                <div class="space-y-4">
                    <!-- Account Features Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-user-circle mr-2 text-xl"></i>
                            <span class="text-lg text-white">Account Features</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Easily manage your account details and preferences.
                        </p>
                    </div>
                    <!-- Communication Engagement Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-comments mr-2 text-xl"></i>
                            <span class="text-lg text-white">Communication Engagement</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Stay connected with our easy-to-use messaging system.
                        </p>
                    </div>
                    <!-- Appointment Scheduling Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-calendar-check mr-2 text-xl"></i>
                            <span class="text-lg text-white">Appointment Scheduling</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Schedule and manage your appointments effortlessly.
                        </p>
                    </div>
                    <!-- Pet Accounts Profile Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-paw mr-2 text-xl"></i>
                            <span class="text-lg text-white">Pet Accounts Profile</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Create and manage profiles for your pets easily.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Vertical Divider -->
            <div class="hidden md:block w-1 bg-gray-300 mx-4"></div>

            <!-- Vet Clinic Account Features -->
            <div class="flex-1">
                <h3 class="text-xl font-bold mb-4 text-left">Vet Clinic Account Features</h3>
                <div class="space-y-4">
                    <!-- Analytics Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-chart-line mr-2 text-xl"></i>
                            <span class="text-lg text-white">Analytics</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Gain insights into your clinic's performance with analytics.
                        </p>
                    </div>
                    <!-- Client Communication Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-comments mr-2 text-xl"></i>
                            <span class="text-lg text-white">Client Communication</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Communicate efficiently with your clients.
                        </p>
                    </div>
                    <!-- Admin Appointment Management Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-tasks mr-2 text-xl"></i>
                            <span class="text-lg text-white">Admin Appointment Management</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Manage appointments with ease and efficiency.
                        </p>
                    </div>
                    <!-- Manage Pet Accounts Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-paw mr-2 text-xl"></i>
                            <span class="text-lg text-white">Manage Pet Accounts</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Administer pet accounts for better organization.
                        </p>
                    </div>
                    <!-- Client List of Accounts Card -->
                    <div class="relative bg-[#357D7F] p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl group">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-users mr-2 text-xl"></i>
                            <span class="text-lg text-white">Client List of Accounts</span>
                        </div>
                        <p class="absolute bottom-0 left-0 right-0 bg-white text-gray-800 p-4 rounded-lg hidden group-hover:block">
                            Keep track of all client accounts efficiently.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="payment" class="py-12 bg-gray-100">
    <div class="container mx-auto text-center" data-aos="fade-up"
    data-aos-duration="1500">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Payment Options</h2>
        <p class="mt-4 text-gray-600">
            Choose your preferred subscription plan and payment method to enjoy our services seamlessly. We accept both GCash and Bank Transfer for your convenience.
        </p>

        <div class="mt-8 flex flex-col md:flex-row justify-center space-y-6 md:space-y-0 md:space-x-6">
            <!-- Subscription Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                <h3 class="text-xl font-bold mb-2">Basic Plan</h3>
                <p class="text-gray-600 mb-4">₱500 for 1 month access. Perfect for small pet owners looking to manage their pets' health.</p>
                <div class="relative group">
                    <button class="bg-[#357D7F] text-white px-4 py-2 rounded-lg transition hover:bg-[#2A5B5B]">
                        Guide Payment
                    </button>
                    <div class="absolute left-1/2 transform -translate-x-1/2 bottom-12 w-48 bg-gray-800 text-white text-sm rounded-lg p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Click here to view payment instructions.
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                <h3 class="text-xl font-bold mb-2">Standard Plan</h3>
                <p class="text-gray-600 mb-4">₱800 for 1 month access. Ideal for pet owners with multiple pets who need additional features.</p>
                <div class="relative group">
                    <button class="bg-[#357D7F] text-white px-4 py-2 rounded-lg transition hover:bg-[#2A5B5B]">
                        Guide Payment
                    </button>
                    <div class="absolute left-1/2 transform -translate-x-1/2 bottom-12 w-48 bg-gray-800 text-white text-sm rounded-lg p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Click here to view payment instructions.
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                <h3 class="text-xl font-bold mb-2">Premium Plan</h3>
                <p class="text-gray-600 mb-4">₱1200 for 1 month access. Best for clinics looking for comprehensive features and support.</p>
                <div class="relative group">
                    <button class="bg-[#357D7F] text-white px-4 py-2 rounded-lg transition hover:bg-[#2A5B5B]">
                        Guide Payment
                    </button>
                    <div class="absolute left-1/2 transform -translate-x-1/2 bottom-12 w-48 bg-gray-800 text-white text-sm rounded-lg p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Click here to view payment instructions.
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-xl font-bold mb-2">Payment Methods</h3>
            <p class="text-gray-600 mb-4">We accept the following payment methods:</p>
            <div class="flex justify-center space-x-6">
                <div class="flex items-center">
                    <i class="fab fa-gcash text-4xl text-[#357D7F]"></i>
                    <span class="ml-2 text-lg">GCash</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-university text-4xl text-[#357D7F]"></i>
                    <span class="ml-2 text-lg">Bank Transfer</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-12 bg-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Payment Guide</h2>
        <p class="mt-4 text-gray-600">
            When you choose to pay for your access plan, please follow the steps below for a smooth payment experience.
        </p>

        <div class="flex flex-col md:flex-row justify-center items-start">
            <!-- Phone Mockup Section -->
            <div class="flex justify-center w-full md:w-1/2 mb-8 md:mb-0" data-aos="zoom-in-right" data-aos-duration="1500">
                <div class="mockup-phone border-primary">
                    <div class="camera"></div>
                    <div class="display">
                        <div class="artboard artboard-demo phone-1">
                            <img src="{{ asset('logo/phone.png') }}" alt="Payment Instructions" class="mx-auto my-2" style="max-width: 90%; height: auto;">
                            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 rounded-lg">
                                <p class="font-bold text-center">Important Note:</p>
                                <p class="text-center">Hi. You can follow the instructions above for your payment.</p>
                                <p class="text-center mt-2">After your payment, please wait for confirmation.</p>
                                <p class="text-center">The Super Admin will alert your Gmail to log in again.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Steps Section -->
            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <div class="grid grid-cols-1 gap-8">
                    <!-- Step 1 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" data-aos="zoom-in-left" data-aos-duration="1500">
                        <h3 class="text-xl font-bold mb-2">Step 1: Choose Your Plan</h3>
                        <p class="text-gray-600">
                            Select the subscription plan that best suits your clinic's needs from the payment options available.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105" data-aos="zoom-in-left"data-aos-duration="1500">
                        <h3 class="text-xl font-bold mb-2">Step 2: Make Payment</h3>
                        <p class="text-gray-600">
                            Proceed with the payment through GCash or Bank Transfer. Ensure that you follow the instructions provided during checkout.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105"data-aos="zoom-in-left"data-aos-duration="1500">
                        <h3 class="text-xl font-bold mb-2">Step 3: Wait for Confirmation</h3>
                        <p class="text-gray-600">
                            After making the payment, please wait for a confirmation from our Super Admin. This process usually takes a few hours.
                        </p>
                    </div>
                </div>

                <div class="mt-8" data-aos="zoom-in-left">
                    <h3 class="text-lg font-semibold">Important Note:</h3>
                    <p class="text-gray-600 mt-2">
                        If you do not receive confirmation within 24 hours, please contact our support team for assistance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer bg-white text-base-content p-10 mt-2 relative overflow-hidden" data-aos="zoom-in-up" data-aos-duration="1500">
    <div class="absolute inset-0 z-0">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#357D7F" fill-opacity="1" d="M0,64L120,80C240,96,480,128,720,128C960,128,1200,96,1320,80L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
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
        <a class="link-hover">Blog</a>
        <a class="link link-hover">Appointment Policies</a>
    </nav>
    <nav class="relative z-10">
        <h6 class="footer-title">Legal</h6>
        <a class="link link-hover">Terms of Service</a>
        <a class="link link-hover">Privacy Policy</a>
        <a class="link link-hover">Client Agreement</a>
    </nav>
</footer>

</body>

<script>
    AOS.init(); // Initialize AOS
</script>
</html>
