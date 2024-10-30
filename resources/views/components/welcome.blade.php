<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- Include your Tailwind CSS here -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script> 
  
<div class=" lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700" data-aos="fade-down">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
      Welcome to DigiVet Web Application
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
      DigiVet is improving how veterinary clinics work. We recognize that outdated processes cause things to move slower. Our simple system makes appointments scheduling, record management, and communication and client engagement. We're using technology to make everything faster and clinics run smoother. DigiVet is all about making things better for both staff and clients.
    </p>
  </div>

  <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 p-6 lg:p-8">
<!-- Column 1: Vaccinations -->
<div class="bg-white dark:bg-gray-700 p-2 lg:p-3 rounded shadow border border-black transition-transform transform hover:scale-105 hover:shadow-lg duration-300 " data-aos="zoom-out">
  <div class="flex justify-center">
      <h1 class="mt-4 text-xl font-medium text-gray-900 dark:text-white">Vaccinations</h1>
  </div>
  <div class="flex justify-center">
      <img src="https://autumntrailsvet.com/wp-content/uploads/2021/03/injection-for-dog.jpg" alt="Vaccination Image" class="mt-4 rounded w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28">
  </div>
  <div class="text-center mt-2">
      <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed text-sm">
          "Protect your pets with our vaccination plans, administered by expert veterinarians. From core vaccines to specialized options,"
      </p>
  </div>
  <div class="flex justify-center mt-9">
      <a href="{{ route('Appointment.index') }}" class="custom-bg-357D7F hover:text-white hover:bg-gray-800 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline text-sm">
          Proceed
      </a>
  </div>
</div>

<!-- Column 2: Deworming -->
<div class="bg-white dark:bg-gray-700 p-2 lg:p-3 rounded shadow border border-black transition-transform transform hover:scale-105 hover:shadow-lg duration-300" data-aos="zoom-out">
  <div class="flex justify-center">
      <h1 class="mt-4 text-xl font-medium text-gray-900 dark:text-white">Deworming</h1>
  </div>
  <div class="flex justify-center">
      <img src="https://media.istockphoto.com/id/1547703847/photo/dog-dewormer-with-food-in-hand-of-veterinarian-or-pet-owner.jpg?s=612x612&w=0&k=20&c=WMP0gSyEnq5r4bkfAuBcEJwKhMNxsmYSbn1b4Endcb8=" alt="Deworming Image" class="mt-4 rounded w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28">
  </div>
  <div class="text-center mt-2">
      <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed text-sm">
          "Protect your pets with our deworming plans, administered by expert veterinarians. From core treatments to specialized options,"
      </p>
  </div>
  <div class="flex justify-center mt-9">
      <a href="{{ route('Appointment.index') }}" class="custom-bg-357D7F hover:text-white hover:bg-gray-800 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline text-sm">
          Proceed
      </a>
  </div>
</div>

<!-- Column 3: Consultation -->
<div class="bg-white dark:bg-gray-700 p-2 lg:p-3 rounded shadow border border-black transition-transform transform hover:scale-105 hover:shadow-lg duration-300" data-aos="zoom-out">
  <div class="flex justify-center">
      <h1 class="mt-4 text-xl font-medium text-gray-900 dark:text-white">Pet Consultation</h1>
  </div>
  <div class="flex justify-center">
      <img src="https://cdn.shopify.com/s/files/1/0259/9626/3490/files/dog-grooming-1.png?v=1665519040" alt="Consultation Image" class="mt-4 rounded w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28">
  </div>
  <div class="text-center mt-2">
      <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed text-sm">
          "Protect your pets with our consultation plans, administered by expert veterinarians. We prioritize your pet's health and well-being."
      </p>
  </div>
  <div class="flex justify-center mt-8">
      <a href="{{ route('Appointment.index') }}" class="custom-bg-357D7F hover:text-white hover:bg-gray-800 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline text-sm">
          Proceed
      </a>
  </div>
</div>

<!-- Column 4: Pet Grooming -->
<div class="bg-white dark:bg-gray-700 p-2 lg:p-3 rounded shadow border border-black transition-transform transform hover:scale-105 hover:shadow-lg duration-300" data-aos="zoom-out">
  <div class="flex justify-center">
      <h1 class="mt-4 text-xl font-medium text-gray-900 dark:text-white">Pet Grooming</h1>
  </div>
  <div class="flex justify-center">
      <img src="https://www.dogstrust.org.uk/images/800x600/assets/2022-09/labrador%20standing%20on%20vet%20table%20with%20treat.jpg" alt="Pet Grooming Image" class="mt-4 rounded w-16 h-16 md:w-24 md:h-24 lg:w-28 lg:h-28">
  </div>
  <div class="text-center mt-2">
      <p class="mt-4 text-gray-500 dark:text-gray-400 leading-relaxed text-sm">
          "Keep your pet looking its best with our grooming services, tailored to your pet’s needs and comfort."
      </p>
  </div>
  <div class="flex justify-center mt-14">
      <a href="{{ route('Appointment.index') }}" class="custom-bg-357D7F hover:text-white hover:bg-gray-800 text-white font-bold py-1 px-3 rounded focus:outline-none focus:shadow-outline text-sm">
          Proceed
      </a>
  </div>
</div>


  </div>

  <section class="bg-gray-50 py-12 sm:py-16 lg:py-20 xl:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <!-- Welcome Section -->
        <div class="mb-12 rounded-lg p-6 shadow-lg" style="background-color: #357D7F;">
            <h1 class="text-4xl font-bold text-white">Welcome to Our Pet Care Platform</h1>
            <p class="mt-4 text-lg text-gray-200">
                Join us in providing the best care for your pets. Our platform helps you manage their health, appointments, and communications seamlessly.
            </p>
        </div>
        
    
        <!-- Card Section -->
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-lg border border-gray-300 bg-white p-6 shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up">
                <h2 class="text-lg font-bold">Quality Care</h2>
                <p class="mt-2 text-gray-600">We ensure your pets receive top-notch care from our trusted professionals.</p>
            </div>
            <div class="rounded-lg border border-gray-300 bg-white p-6 shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up">
                <h2 class="text-lg font-bold">Easy Appointments</h2>
                <p class="mt-2 text-gray-600">Schedule and manage appointments effortlessly through our platform.</p>
            </div>
            <div class="rounded-lg border border-gray-300 bg-white p-6 shadow-lg hover:shadow-xl transition-shadow duration-300" data-aos="fade-up">
                <h2 class="text-lg font-bold">Client Communication</h2>
                <p class="mt-2 text-gray-600">Stay connected with your clients through our integrated communication tools.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-50 py-12 sm:py-16 lg:py-20 xl:py-24" data-aos="zoom-in">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Features Section -->
        <div class="mt-5 rounded-lg bg-white p-6 shadow-lg">
            <p class="text-sm font-bold uppercase tracking-widest text-gray-700">How It Works</p>
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-[#357D7F] sm:text-4xl lg:text-5xl">Get Started with Our Comprehensive Services in 4 Easy Steps</h2>
            <p class="mx-auto mt-4 max-w-2xl text-lg font-normal text-gray-700 lg:text-xl lg:leading-8">
                Seamlessly manage your pet's health and communication with clients through our platform—just follow these simple steps to get started!
            </p>
            
            <ul class="mx-auto mt-12 grid max-w-md grid-cols-1 gap-10 sm:mt-16 lg:mt-20 lg:max-w-5xl lg:grid-cols-4">
                <li class="flex-start group relative flex lg:flex-col" data-aos="zoom-in" data-aos-delay="100">
                    <span class="absolute left-[18px] top-14 h-[calc(100%_-_32px)] w-px bg-gray-300 lg:right-0 lg:left-auto lg:top-[18px] lg:h-px lg:w-[calc(100%_-_72px)]" aria-hidden="true"></span>
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-[#357D7F] group-hover:bg-[#357D7F]">
                        <i class="fas fa-comments text-gray-600 group-hover:text-white"></i>
                    </div>
                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-[#357D7F] before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">Client Communication Engagement</h3>
                        <h4 class="mt-2 text-base text-gray-700">Engage effectively with clients through our platform.</h4>
                    </div>
                </li>
                <li class="flex-start group relative flex lg:flex-col" data-aos="zoom-in" data-aos-delay="200">
                    <span class="absolute left-[18px] top-14 h-[calc(100%_-_32px)] w-px bg-gray-300 lg:right-0 lg:left-auto lg:top-[18px] lg:h-px lg:w-[calc(100%_-_72px)]" aria-hidden="true"></span>
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-[#357D7F] group-hover:bg-[#357D7F]">
                        <i class="fas fa-calendar-check text-gray-600 group-hover:text-white"></i>
                    </div>
                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-[#357D7F] before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">Appointment Scheduling</h3>
                        <h4 class="mt-2 text-base text-gray-700">Schedule your appointments seamlessly.</h4>
                    </div>
                </li>
                <li class="flex-start group relative flex lg:flex-col" data-aos="zoom-in" data-aos-delay="300">
                    <span class="absolute left-[18px] top-14 h-[calc(100%_-_32px)] w-px bg-gray-300 lg:right-0 lg:left-auto lg:top-[18px] lg:h-px lg:w-[calc(100%_-_72px)]" aria-hidden="true"></span>
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-[#357D7F] group-hover:bg-[#357D7F]">
                        <i class="fas fa-paw text-gray-600 group-hover:text-white"></i>
                    </div>
                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-[#357D7F] before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">Pet Account</h3>
                        <h4 class="mt-2 text-base text-gray-700">Manage your pet's information and records.</h4>
                    </div>
                </li>
                <li class="flex-start group relative flex lg:flex-col" data-aos="zoom-in" data-aos-delay="400">
                    <div class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-gray-300 bg-gray-50 transition-all duration-200 group-hover:border-[#357D7F] group-hover:bg-[#357D7F]">
                        <i class="fas fa-money-bill-wave text-gray-600 group-hover:text-white"></i>
                    </div>
                    <div class="ml-6 lg:ml-0 lg:mt-10">
                        <h3 class="text-xl font-bold text-[#357D7F] before:mb-2 before:block before:font-mono before:text-sm before:text-gray-500">How to Pay</h3>
                        <h4 class="mt-2 text-base text-gray-700">Learn the payment process for your services.</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>



<section class="bg-gray-50 py-12 sm:py-16 lg:py-20 xl:py-24" data-aos="fade-up">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- Tips for Dogs Section -->
        <div class="rounded-lg bg-white p-8 shadow-lg mb-12 border-t-4 border-[#357D7F]">
            <p class="text-sm font-bold uppercase tracking-widest text-[#357D7F]">Tips for Dog Owners</p>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">Keep Your Dog Happy and Healthy</h2>
            <p class="mx-auto mt-4 max-w-2xl text-lg font-normal text-gray-700 lg:text-xl lg:leading-8">
                Here are some essential tips to ensure your dog's well-being.
            </p>
            
            <ul class="mt-8 space-y-6">
                <li class="flex items-start transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="100">
                    <div class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#357D7F] text-white">
                        <i class="fas fa-bone"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Provide a Balanced Diet</h3>
                        <p class="mt-1 text-gray-600">Feed your dog a nutritious, balanced diet to maintain optimal health and energy levels.</p>
                    </div>
                </li>
                <li class="flex items-start transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="200">
                    <div class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#357D7F] text-white">
                        <i class="fas fa-paw"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Regular Exercise</h3>
                        <p class="mt-1 text-gray-600">Daily walks and playtime are essential for physical and mental well-being.</p>
                    </div>
                </li>
                <li class="flex items-start transition-all duration-300 hover:scale-105" data-aos="fade-up" data-aos-delay="300">
                    <div class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-[#357D7F] text-white">
                        <i class="fas fa-stethoscope"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Routine Vet Visits</h3>
                        <p class="mt-1 text-gray-600">Regular check-ups can catch potential health issues early on.</p>
                    </div>
                </li>
            </ul>
           
        </div>

          <!-- Pet Story Section -->
          <div class="rounded-lg bg-white p-8 shadow-lg border-t-4 border-[#357D7F]" data-aos="fade-left">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl">A Heartwarming Pet Story</h2>
            <p class="mt-4 text-lg text-gray-700">Meet Bella, a playful golden retriever who found her forever home and now lives happily with her loving family.</p>
            
            <div class="mt-8 flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Image with responsive width and height -->
                <img src="{{ asset('logo/goldenretriever.png') }}" alt="Bella the Golden Retriever" class="w-full lg:w-1/2 h-64 sm:h-80 lg:h-auto object-cover rounded-lg" data-aos="flip-left>
                
                <!-- Story text with responsive margin -->
                <p class="text-lg text-gray-700 lg:w-1/2">
                    Bella was rescued from a shelter when she was just a puppy. She quickly became an essential part of the family, bringing joy and companionship. From daily walks to family picnics, Bella loves spending time with her family and has a special bond with the kids. Her story is a reminder of the incredible impact adopting a pet can have, and the love and happiness that animals bring into our lives.
                </p>
            </div>
        </div>
    </div>
</section>

</div>
<footer class="footer bg-white text-base-content p-10 mt-2 relative overflow-hidden" data-aos="zoom-in-up" data-aos-duration="1500">
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


<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<script>
    AOS.init(); // Initialize AOS
</script>