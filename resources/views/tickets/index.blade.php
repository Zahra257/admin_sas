@extends('layouts.app')

@section('title', 'Tickets')
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
    
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
           

                <div class="col-12 d-flex justify-content-between align-items-center">    
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tickets</h4>
                

              </div>
 <!-- Hoverable Table rows -->
              <div class="card p-3 " >
                <div class="table-responsive-sm table-responsive-md table-responsive-lg" style="" id="tablediv">
                  <table id="dataTable"class="table p-3 table-hover" style="width:100%">
                    <thead class="" >
                      <tr>
                      <th>#</th>
                      <th>Subject</th>
                        <th>Owner</th>
                        <th>Assigned To </th>
                        <th>Service</th>
                        <th>Type</th>
                        <th>Priority</th>
                        <th>Status</th>                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @if($tickets->count() > 0)
                    @foreach($tickets as $rs)
                      <tr>
                      <td class="align-middle">{{ $loop->iteration }}</td>
                        <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{ $rs->subject }}</strong></td>
                        <td>{{ $rs->creator->firstname}}</td>
                        <td>
                        {{ $rs->operator->firstname}}
                        </td>
                       
                        <td>{{ $rs->service->title}}</td>
                        <td>{{ $rs->type}}</td>
                        <td>{{ $rs->priority}}</td>
                        <td>{{ $rs->status}}</td>                                              
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                            <div class="dropdown-menu">
                             <form action="{{ route('tickets.destroy', $rs->id) }}" class="dropdown-item" method="POST" id="deleteform_{{ $rs->id }}">
                                @csrf
                                @method('DELETE')
                                <div onclick="if (confirm('Delete?')) { document.getElementById('deleteform_{{ $rs->id }}').submit(); }" style="cursor: pointer;" class="text-danger">
                                  <i class="bx bx-trash me-1"></i>Delete
                                </div>
                            </form>
                            <a class="dropdown-item"  href="{{ route('tickets.show', $rs->id) }}"
                              ><i class='bx bx-chat'></i> Details
                            </a>
                            </div>
                            
                          </div>
                        </td>
                      </tr>
                   @endforeach
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

   