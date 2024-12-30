@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Service</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.update', $service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- General Information -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $service->title) }}" />
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                               
                                <!-- Account -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="account_id">Account</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('account_id') is-invalid @enderror"
                                            id="account_id" name="account_id">
                                            <option value="">Select Account</option>
                                            @foreach ($accounts as $acc)
                                            <option value="{{ $acc->id }}" 
                                               >{{ $acc->name }}</option>
                                        @endforeach  
                                            
                                        </select>
                                        @error('account_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Dates -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="starting_date">Starting Date</label>
                                    <div class="col-sm-10">
                                        <input type="date"
                                            class="form-control @error('starting_date') is-invalid @enderror"
                                            id="starting_date" name="starting_date"
                                            value="{{ old('starting_date', $service->starting_date) }}" />
                                        @error('starting_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="ending_date">Ending Date</label>
                                    <div class="col-sm-10">
                                        <input type="date"
                                            class="form-control @error('ending_date') is-invalid @enderror" id="ending_date"
                                            name="ending_date" value="{{ old('ending_date', $service->ending_date) }}" />
                                        @error('ending_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="description">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $service->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Expired -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="expired">Expired</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="expired" name="expired"
                                                {{ old('expired', $service->expired) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="expired">Expired</label>
                                        </div>
                                        @error('expired')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Service</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>

    <!-- JavaScript to fetch and populate accounts based on selected organisation -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get elements
            const organisationSelect = document.getElementById('organisationId');
            const accountSelect = document.getElementById('account_id');

            // Event listener for organisation select change
            organisationSelect.addEventListener('change', function() {
                // Clear existing options
                accountSelect.innerHTML = '<option value="">Select Account</option>';

                // Get the selected organisation id
                const organisationId = this.value;

                // If no organisation selected, return
                if (!organisationId) return;

                // Fetch accounts related to the selected organisation
                fetch(`/organisations/${organisationId}/accounts`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate account options
                        data.forEach(account => {
                            const option = document.createElement('option');
                            option.value = account.id;
                            option.textContent = account.name;
                            accountSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching accounts:', error));
            });
        });
    </script>
@endsection
