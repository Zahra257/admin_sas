@extends('layouts.app')

@section('title', 'Add Department')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Add Department</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- General Information -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required/>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="organisationId">Organisation</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('organisationId') is-invalid @enderror" id="organisationId" name="organisationId">
                                            <option value="">Select Organisation</option>
                                            @foreach($organisations as $organisation)
                                                <option value="{{ $organisation->id }}" {{ old('organisationId') == $organisation->id ? 'selected' : '' }}>{{ $organisation->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('organisationId')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add Department</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Basic with Icons -->
            </div>
        </div>
        <!-- / Content -->
    </div>
@endsection
