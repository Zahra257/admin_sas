@extends('layouts.app')

@section('title', 'Accounts')
<style>
 

    /* Custom styling for the search input */
    #dt-search-0 {
      
        margin-bottom: 10px; /* Add some space below the search input */
       
    
    }
    #tablediv .pagination {
      margin: 10
    }
    #tablediv th {
      text-align: left;
      vertical-align: top
    } 
    
      
    </style>
@section('content')
    <!-- Layout wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Accounts</h4>
                <a href="{{ route('accounts_admin.create') }}" class="btn btn-primary">
                    Add Account
                </a>
                <!-- Message Toast -->
                @if (session('success'))
                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-success bottom-0 end-0 show" role="alert"
                        aria-live="assertive" aria-atomic="true" id="messageToast">
                        <div class="toast-header">
                            <i class="bx bx-bell me-2"></i>
                            <div class="me-auto fw-semibold">Status</div>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">{{ session('success') }}</div>
                    </div>
                @endif
                <!-- End Message Toast -->

                <!-- Error Toast -->
                @if (session('error'))
                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-danger bottom-0 end-0 show" role="alert"
                        aria-live="assertive" aria-atomic="true" id="errorToast">
                        <div class="toast-header">
                            <i class="bx bx-bell me-2"></i>
                            <div class="me-auto fw-semibold">Error</div>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">{{ session('error') }}</div>
                    </div>
                @endif
                <!-- End Error Toast -->
            </div>

            <!-- Hoverable Table rows -->
            <div class="card p-3 " >
                <div class="table-responsive-sm table-responsive-md table-responsive-lg"  id="tablediv">
                  <table id="dataTable" class="table p-3 table-hover " >
                    <thead class="" >
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th>Segment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @if ($accounts->count() > 0)
                                @foreach ($accounts as $account)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td><strong>{{ $account->name }}</strong></td>
                                        <td>{{ $account->email }}</td>
                                        <td>
                                            <span class="badge bg-label-{{ $account->active ? 'success' : 'danger' }} me-1">
                                                {{ $account->active ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td>{{ $account->segment }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('accounts_admin.edit', $account->id) }}">
                                                        <i class="bx bx-edit-alt me-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('accounts_admin.destroy', $account->id) }}"
                                                        class="dropdown-item" method="POST"
                                                        id="deleteform_{{ $account->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div onclick="if (confirm('Delete?')) { document.getElementById('deleteform_{{ $account->id }}').submit(); }"
                                                            style="cursor: pointer;" class="text-danger">
                                                            <i class="bx bx-trash me-1"></i>Delete
                                                        </div>
                                                    </form>
                                                    <a class="dropdown-item"
                                                        href="{{ route('accounts_admin.show', $account->id) }}">
                                                        <i class='bx bx-detail'></i> Details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            {{-- @else
                                <tr>
                                    <td colspan="" class="text-center">No accounts found</td>
                                </tr>--}}
                            @endif 
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Hoverable Table rows -->
        </div>
    </div>
    @include('layouts.table')

@endsection
