<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Digivet</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


           <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
      
      
        <!-- Icon JS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        
        <!-- Daisyui JS  temporary-->
            <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
            <script src="https://cdn.tailwindcss.com"></script>
       
        <!-- SweetAlert2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

         <!-- barChartScripts -->
        <script src="{{ asset('js/barChartPlugin.js') }}"></script>


        <!-- Styles -->
        @livewireStyles


         <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
         
    </head>
    <body class="font-sans antialiased">
        
        <x-loading-screen />
        
        <x-banner />
        

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @stack('scripts')
        @stack('modals')

        @livewireScripts
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var loadingScreen = document.getElementById('loadingScreen');
                var content = document.getElementById('content');
        
                function showLoadingScreen() {
                    loadingScreen.classList.remove('hidden');
                }
        
                function hideLoadingScreen() {
                    loadingScreen.classList.add('hidden');
                }
        
                function showContent() {
                    content.classList.add('visible');
                }
        
                // Show the loading screen initially
                showLoadingScreen();
        
                window.addEventListener('load', function () {
                    setTimeout(function() {
                        hideLoadingScreen();
                        showContent(); // Add the visible class to slide up content
                    }, 500); // Adjust timing if needed
                });
        
                $(document).ajaxStart(function() {
                    showLoadingScreen();
                }).ajaxStop(function() {
                    hideLoadingScreen();
                    showContent(); // Add the visible class when AJAX requests complete
                });
        
                // Optional: Hide loading screen after a fixed time if not manually hidden
                setTimeout(function() {
                    hideLoadingScreen();
                    showContent(); // Add the visible class
                }, 5000); // Example: hide after 1 second if not manually hidden
            });
        </script>
        
      
    </body>
</html>
