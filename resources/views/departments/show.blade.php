@extends('layouts.app')

@section('title', 'Department Details')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Department Details</h4>
                            <a href="{{ route('departments') }}" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <!-- General Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name"
                                        value="{{ $department->name }}" readonly />
                                </div>
                            </div>


                            <!-- Created and Updated Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="created_by">Created By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="created_by"
                                        value="{{ $department->creator->firstname . ' ' . $department->creator->lastname }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="updated_by">Updated By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updated_by"
                                        value="{{ $department->updater->firstname . ' ' . $department->updater->lastname }}"
                                        readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic with Icons -->
            </div>
        </div>
        <!-- / Content -->
    </div>
@endsection
