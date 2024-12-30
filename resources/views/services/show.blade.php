@extends('layouts.app')

@section('title', 'Service Details')

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
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Service Details</h4>
                            <a href="{{ route('services') }}" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <!-- General Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="title">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $service->title }}" readonly>
                                </div>
                            </div>

                            <!-- Account -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="account_id">Account</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="account_id" name="account_id"
                                        value="{{ $service->account->name }}" readonly>
                                </div>
                            </div>

                            <!-- Dates -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="starting_date">Starting Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="starting_date" name="starting_date"
                                        value="{{ $service->starting_date }}" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="ending_date">Ending Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="ending_date" name="ending_date"
                                        value="{{ $service->ending_date }}" readonly>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="description">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="description" name="description" readonly>{{ $service->description }}</textarea>
                                </div>
                            </div>

                            <!-- Expired -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="expired">Expired</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="expired" name="expired"
                                        value="{{ $service->expired ? 'Yes' : 'No' }}" readonly>
                                </div>
                            </div>

                            <!-- Created and Updated Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="created_by">Created By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="created_by"
                                        value="{{ $service->creator->firstname . ' ' . $service->creator->lastname }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="updated_by">Updated By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updated_by"
                                        value="{{ $service->updater->firstname . ' ' . $service->updater->lastname }}"
                                        readonly />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
@endsection
