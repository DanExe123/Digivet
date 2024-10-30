@extends('layouts.superAdmin-layout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Digital Vet Clinic System - Payment History') }}
    </h2>
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-left font-bold mb-6 text-3xl">Payment History</h1>
                  
                    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Payment Details</h3>
                            <form action="{{ route('payments.store') }}" method="POST">
                                @csrf
                                <!-- Clinic Name Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Select a Clinic</span>
                                    </label>
                                    <select id="clinic-select" name="clinicname" class="mt-2 block w-full p-2 border rounded" required>
                                        <option value="" disabled selected>Select a clinic</option>
                                        @foreach($clinics as $clinic)
                                            <option value="{{ $clinic->id }}">{{ $clinic->clinicname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Payment Date Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Payment Date</span>
                                    </label>
                                    <input type="date" name="payment_date" class="input input-bordered" required />
                                </div>
                                <!-- Amount Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Amount</span>
                                    </label>
                                    <input type="number" name="amount" placeholder="Enter amount" class="input input-bordered" required />
                                </div>
                                <!-- Reference Number Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Reference Number</span>
                                    </label>
                                    <input type="text" name="reference_number" placeholder="Enter reference number" class="input input-bordered" required />
                                </div>
                                <!-- Modal Action: Close Button -->
                                <div class="modal-action">
                                         <!-- Modal Action: Close Button -->
                          <div class="modal-action">
                            <!-- Red Cancel Button -->
                            <button class="btn bg-red-500 hover:bg-red-600 text-white" type="button" onclick="document.getElementById('my_modal_5').close()">Cancel</button>
                                 <button class="btn bg-green-500 hover:bg-green-600 text-white" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </dialog>

                    
                    
                                    <!-- Edit Payment Modal -->
                    <dialog id="edit_payment_modal" class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">Update Payment</h3>
                            <form action="" method="POST" id="editPaymentForm">
                                @csrf
                                @method('PUT')
                                <!-- Clinic Name Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Select a Clinic</span>
                                    </label>
                                    <select id="edit-clinic-select" name="clinicname" class="mt-2 block w-full p-2 border rounded" required>
                                        <option value="" disabled selected>Select a clinic</option>
                                        @foreach($clinics as $clinic)
                                            <option value="{{ $clinic->id }}">{{ $clinic->clinicname }}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                                <!-- Payment Date Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Payment Date</span>
                                    </label>
                                    <input type="date" name="payment_date" id="edit-payment-date" class="input input-bordered" required />
                                </div>
                                <!-- Amount Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Amount</span>
                                    </label>
                                    <input type="number" name="amount" id="edit-amount" placeholder="Enter amount" class="input input-bordered" required />
                                </div>
                                <!-- Reference Number Input -->
                                <div class="form-control my-2">
                                    <label class="label">
                                        <span class="label-text">Reference Number</span>
                                    </label>
                                    <input type="text" name="reference_number" id="edit-reference-number" placeholder="Enter reference number" class="input input-bordered" required />
                                </div>
                                <!-- Modal Action: Close Button -->
                                <div class="modal-action">
                                    <button class="btn bg-red-500 hover:bg-red-600 text-white" type="button" onclick="closeEditPaymentModal()">Cancel</button>
                                    <button class="btn bg-green-500 hover:bg-green-600 text-white" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </dialog>

                    

                <!-- Button above the table -->
                <div class="flex justify-end my-4">
                  <button class="btn btn-success text-cyan-50" onclick="my_modal_5.showModal()">Add New</button>
                </div>

                
                <div id="content" class="slide-up">
                  <div class="overflow-x-auto">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>
                                      <label>
                                          <input type="checkbox" class="checkbox" />
                                      </label>
                                  </th>
                                  <th>Clinic Name</th>
                                  <th>Payment Date</th>
                                  <th>Amount</th>
                                  <th>Reference#</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($payments as $payment)
                              <tr>
                                  <th>
                                      <label>
                                          <input type="checkbox" class="checkbox" />
                                      </label>
                                  </th>
                                  <td>
                                      <div class="flex items-center gap-3">
                                          
                                          </div>
                                          <div>
                                              <div class="font-bold">{{ $payment->clinic->clinicname }}</div>
                                              <div class="text-sm opacity-50">{{ $payment->clinic->address }}</div>
                                          </div>
                                      </div>
                                  </td>
                                  <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
                                  <td>${{ number_format($payment->amount, 2) }}</td>
                                  <td>{{ $payment->reference_number }}</td>
                                  <th class="flex space-x-2">
                                    <button class="btn btn-outline btn-success text-blue-600 hover:bg-blue-100"
                                            onclick="openEditModal({{ $payment->id }}, '{{ $payment->clinic->clinicname }}', '{{ $payment->payment_date->format('Y-m-d') }}', {{ $payment->amount }}, '{{ $payment->reference_number }}')">
                                        Edit
                                    </button>
                                    <button class="btn btn-outline btn-error text-red-600 hover:bg-red-100" 
                                            onclick="confirmDelete({{ $payment->id }})">
                                        Delete
                                    </button>
                                </th>
                                
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>
                
              function confirmDelete(paymentId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user confirms, send an AJAX request to delete the payment
                        fetch(`/payments/${paymentId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your payment has been deleted.',
                                    'success'
                                ).then(() => {
                                    // Reload the page or remove the payment from the UI
                                    location.reload(); // Reload the page
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was a problem deleting the payment.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the payment.',
                                'error'
                            );
                        });
                    }
                });
            }
            </script>

                    <script>
                        function openEditModal(paymentId, clinicname, payment_date, amount, reference_number) {
                            // Set values in the modal
                            document.getElementById('edit-clinic-select').value = clinicname; // Set the clinic ID here
                            document.getElementById('edit-payment-date').value = payment_date;
                            document.getElementById('edit-amount').value = amount;
                            document.getElementById('edit-reference-number').value = reference_number;

                            // Set the form action for the update route
                            document.getElementById('editPaymentForm').action = `/payments/${paymentId}`; // Ensure the URL is correct for your routing

                            // Open the modal
                            const modal = document.getElementById('edit_payment_modal');
                            modal.showModal(); // Use this to display the modal
                        }

                        function closeEditPaymentModal() {
                            const modal = document.getElementById('edit_payment_modal');
                            modal.close(); // Use this to close the modal
                        }
                    </script>
   


@endsection
