<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Digi Vet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <!-- Slide Animation -->
                    <div id="content" class="slide-up">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">My Pet Account</h2>
                            <a href="{{ route('MyPets.create') }}" class="custom-bg-357D7F hover:bg-gray-700 text-white py-2 px-4 rounded">Add New Pet</a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
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
                                        <a href="{{ route('MyPets.edit', $pet->id) }}" class="custom-bg-357D7F hover:bg-gray-700 text-white py-1 px-2 rounded text-xs">Edit</a>
                                        <a href="{{ route('MyPets.History.index', ['pet_id' => $pet->id]) }}" class="custom-bg-357D7F hover:bg-gray-700 text-white py-1 px-2 rounded text-xs">History</a>
                            <form class="inline-block" action="{{ route('MyPets.destroy', $pet->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="bg-red-700 hover:bg-gray-700 text-white py-1 px-2 rounded text-xs" value="Delete">
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</x-app-layout>
