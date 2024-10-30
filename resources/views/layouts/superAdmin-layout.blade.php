<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digi Vet Admin') }}</title>
    
    <!-- Include your CSS and JS dependencies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/barChartPlugin.js') }}"></script>
    @livewireStyles
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased">

    <!-- Global Loading Screen -->
    <x-loading-screen />

    <!-- Admin Navigation -->
    @include('SuperAdminNav.SuperAdmin-nav')

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Admin Page Content -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            @yield('content') <!-- Make sure this placeholder is present -->
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

            showLoadingScreen();

            window.addEventListener('load', function () {
                setTimeout(function() {
                    hideLoadingScreen();
                    showContent();
                }, 500);
            });

            $(document).ajaxStart(function() {
                showLoadingScreen();
            }).ajaxStop(function() {
                hideLoadingScreen();
                showContent();
            });

            setTimeout(function() {
                hideLoadingScreen();
                showContent();
            }, 5000);
        });
    </script>
</body>
</html>
