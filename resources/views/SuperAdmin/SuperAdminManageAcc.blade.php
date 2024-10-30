@extends('layouts.superAdmin-layout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Digital Vet Clinic System - Admin Welcome') }}
    </h2>
@endsection

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    
                  <h1 class="text-left font-bold mb-6 text-3xl"> <span class="text-cyan-800"> Manage Accounts </span></h1>
                    
                  <div id="content" class="slide-up">
                        <div class="overflow-x-auto">
                            <table class="table">
                              <!-- head -->
                              <thead>
                                <tr>
                                  <th>
                                    <label>
                                      <input type="checkbox" class="checkbox" />
                                    </label>
                                  </th>
                                  <th>Name of Vet Clinic</th>
                                  <th>Email</th>
                                  <th>Files</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                               
                                @foreach($vetClinics as $clinic)
                                <tr>
                                    <th>
                                      <label>
                                        <input type="checkbox" class="checkbox" />
                                      </label>
                                    </th>
                                    <td>
                                      <div class="flex items-center gap-3">
                                        <div class="avatar">
                                          
                                        </div>
                                        <div>
                                          <div class="font-bold">{{ $clinic->clinicname}}</div>
                                          <div class="text-sm opacity-50">{{ $clinic->address }}</div>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      {{ $clinic->email }}
                                      <br />
                                           </td>
                                           <td>
                                      {{ $clinic->clinic_documents }}
                                      <br />
                                           </td>
                                    <td> 
                                      <span class="{{ $clinic->status === 'Complete' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">
                                        {{ $clinic->status }}
                                    </span>
                            
                                    </td>
                                    <th class="flex space-x-2 mt-3">

                                      <!-- Update Status Button -->
                                                                
                            @if($clinic->status === 'Pending')
                            <form id="update-status-form-{{ $clinic->id }}" action="{{ route('superadmin.updateStatus', $clinic->id) }}" method="POST" class="inline">
                              @csrf
                              <input type="hidden" name="status" value="Complete">
                              <button type="button" class="btn btn-ghost btn-xs text-green-600 hover:bg-green-100" onclick="confirmStatusUpdate({{ $clinic->id }})" id="confirm-btn-{{ $clinic->id }}">
                                  Confirm
                              </button>
                          </form>
                            @endif

                            <!-- Delete Button -->
                            <form action="{{ route('vetclinic.delete', $clinic->id) }}" method="POST" class="inline" id="delete-form-{{ $clinic->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-ghost btn-xs text-red-600 hover:bg-red-100" onclick="confirmDelete({{ $clinic->id }})">Delete</button>
                            </form>

                            <!-- Reject Button -->
                            <form action="{{ route('superadmin.updateStatus', $clinic->id) }}" method="POST" class="inline" id="reject-form-{{ $clinic->id }}">
                            @csrf
                            <input type="hidden" name="status" value="Rejected">
                            <button type="button" class="btn btn-ghost btn-xs text-red-600 hover:bg-red-100" onclick="confirmReject({{ $clinic->id }})">Reject</button>
                            </form>
                            <!-- Send Email Alert Button -->
                            <form id="email-alert-form-{{ $clinic->id }}" action="{{ route('SuperAdmin.SuperAdminManageAcc', $clinic->id) }}" method="POST" class="inline">
                              @csrf
                              <button type="button" class="btn btn-ghost btn-xs text-blue-600 hover:bg-blue-100" onclick="confirmEmailAlert({{ $clinic->id }})">Send Email Alert</button>
                          </form>
                                  </th>
                              </tr>
                              @endforeach
                              </tbody>

                            </table>
                          </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}

function confirmReject(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This will mark the clinic as rejected!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, reject it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('reject-form-' + id).submit();
        }
    });
}

function confirmEmailAlert(clinicId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to send an email alert to this clinic!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, send it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById('email-alert-form-' + clinicId).submit();
            }
        });
    }
    function confirmStatusUpdate(clinicId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to update the status to 'Complete'.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form after confirmation
                document.getElementById('update-status-form-' + clinicId).submit();
                // Disable the button to prevent multiple clicks
                document.getElementById('confirm-btn-' + clinicId).disabled = true;
                document.getElementById('confirm-btn-' + clinicId).innerHTML = 'Confirmed';
            }
        });
    }
</script>
  
@endsection
