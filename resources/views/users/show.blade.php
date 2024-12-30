@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card ">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> User Details</h4>
                            <a href="{{ route('users') }}" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="firstname" class="col-md-2 col-form-label">First Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="FirstName" id="firstname"
                                        value="{{ $user->firstname }}" readonly />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="lastname" class="col-md-2 col-form-label">Last Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="LastName" id="lastname"
                                        value="{{ $user->lastname }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email"
                                        value="{{ $user->email }}" readonly />
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="role" value="{{ $user->role }}" readonly />
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="role" class="col-sm-2 col-form-label">Account</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="role" value="{{ $user->account->name }}" readonly />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-md-2 col-form-label">Phone</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="Phone" id="phone"
                                        value="{{ $user->phone }}" readonly />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birthday" class="col-md-2 col-form-label">Birthday</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="Birthday" id="birthday"
                                        value="{{ $user->birthday }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="active" name="active"
                                            {{ $user->active ? 'checked' : '' }} disabled />
                                        <label class="form-check-label fw-bold" for="active">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="created_by" class="col-md-2 col-form-label">Created By</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="created_by" id="created_by"
                                        value="{{ $user->creator->firstname.' '.$user->creator->lastname }}" readonly />

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="updated_by" class="col-md-2 col-form-label">Updated By</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="updated_by" id="updated_by"
                                        value="{{ $user->updater->firstname.' '.$user->updater->lastname }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="created_at" class="col-md-2 col-form-label">Created At</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="created_at" id="created_at"
                                        value="{{ $user->created_at }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="updated_at" class="col-md-2 col-form-label">Updated At</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="updated_at" id="updated_at"
                                        value="{{ $user->updated_at }}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic with Icons -->
            </div>
        </div>
        <!-- / Content -->
    @endsection
