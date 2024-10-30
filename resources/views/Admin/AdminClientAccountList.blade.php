
@extends('layouts.admin-layout')

@section('header')

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Manage Client Accounts') }}
        </h2>
        
        @endsection

        @section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                 
    
                    <div class="flex justify-center">
                        <h1 class="text-3xl font-semibold text-center">Pet Owner Accounts</h1>
                    </div>
                     <!-- Slide Animation -->
                     <div id="content" class="slide-up">
                    <!-- Data Table -->
                    <div class="mt-12">
                       
                           
                        <div class="overflow-x-auto"> 
                            <table id="clientsTable" class="min-w-full divide-y divide-gray-200 bg-white shadow-md rounded-lg">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-sm">Name</th>
                                        <th class="px-4 py-2  text-sm">Email</th>
                                       
                                        <th class="px-4 py-2  text-sm">Contact</th>
                                      <th class="px-4 py-2  text-sm">Address</th>
                                        <th class="px-4 py-2  text-sm">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                 @foreach($clients as $client)
                                        <td class="px-4 py-2  text-sm">{{ $client->name }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $client->email }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $client->contact }}</td>
                                        <td class="px-4 py-2 text-sm">{{ $client->address }}</td>
                                        <td class="px-4 py-2 text-sm text-center">
                                            <div class="flex justify-center space-x-2">
                                               
                                                <button class="bg-cyan-950 text-xs btn btn-red text-red-500 hover:text-red-700" onclick="deleteRecord({{ $client->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <!-- Export/Download Button -->
                                                
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
               <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/9/9h3E0P9dS8IW4T4EZ2V6p9AlZa9yt1flvY/h" crossorigin="anonymous"></script>
            <!-- Include SweetAlert2 CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

            <!-- Include SweetAlert2 JS -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <!-- DataTables CSS -->
               <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  
      <!-- DataTables JS -->
                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#clientsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "dom": '<"top"lf>rt<"bottom"ip><"clear">',
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Search..."
                },
                "pagingType": "simple_numbers" // Use simple pagination with previous/next
            });
    
                    // Custom CSS to align the search bar to the left
                $('.dataTables_filter').css('float', 'left');
                $('.dataTables_length').css('float', 'right');
                
                // Apply border-radius to the search input
                $('.dataTables_filter input').css({
                    'border-radius': '15px',
                    'padding': '6px 12px', // Adjust padding as needed
                    'margin-bottom': '5px'
                });

                // Add an icon inside the search input
                $('.dataTables_filter').append('<i class="fas fa-search search-icon"></i>');
                
                // Adjust the search input padding to make room for the icon
                $('.dataTables_filter input').css({
                    'padding-left': '30px' // Adjust as needed

                    
                });
            });
    </script>
         <script>
            function deleteRecord(clientId) {
                // Show SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to delete this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with the deletion
                        fetch(`/clients/${clientId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            }
                            throw new Error('Network response was not ok.');
                        })
                        .then(data => {
                            // Optionally, show success message and reload the page
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Your appointment has been deleted.',
                            }).then(() => {
                                location.reload(); // Reload the page to see updated data
                            });
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                        });
                    }
                });
            }
        </script>
    

    @endsection

