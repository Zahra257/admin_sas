@extends('layouts.app')

@section('title', 'Account Details')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span></h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Account Details</h4>
                            <a href="{{ route('accounts_admin') }}" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <!-- General Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" value="{{ $account->name }}"
                                        readonly />
                                </div>
                            </div>
                            <!-- Contact Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">Main Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" value="{{ $account->email }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="secondary_email">Secondary Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="secondary_email"
                                        value="{{ $account->secondary_email }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="phone">Main Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" value="{{ $account->phone }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="secondary_phone">Secondary Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="secondary_phone"
                                        value="{{ $account->secondary_phone }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="website">Website</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="website"
                                        value="{{ $account->website }}" readonly />
                                </div>
                            </div>

                            <!-- Address Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="address">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" readonly>{{ $account->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="city">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="city" value="{{ $account->city }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="country">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="country"
                                        value="{{ $account->country }}" readonly />
                                </div>
                            </div>

                            <!-- Segment Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="segment">Segment</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="segment"
                                        value="{{ $account->segment }}" readonly />
                                </div>
                            </div>

                            <!-- Tax Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tax_id_1">Tax Id 1 (RC)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tax_id_1"
                                        value="{{ $account->tax_id_1 }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tax_id_2">Tax Id 2 (IF)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tax_id_2"
                                        value="{{ $account->tax_id_2 }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tax_id_3">Tax Id 3 (Patente)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tax_id_3"
                                        value="{{ $account->tax_id_3 }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tax_id_4">Tax Id 4 (ICE)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tax_id_4"
                                        value="{{ $account->tax_id_4 }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tax_id_5">Tax Id 5</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tax_id_5"
                                        value="{{ $account->tax_id_5 }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tax_id_6">Tax Id 6</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tax_id_6"
                                        value="{{ $account->tax_id_6 }}" readonly />
                                </div>
                            </div>

                            <!-- Active Status -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="visible3" name="active"
                                            disabled {{ $account->active ? 'checked' : '' }} />
                                        <label class="form-check-label fw-bold" for="visible3">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Created and Updated Information -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="created_by">Created By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="created_by"
                                        value="{{ $account->creator->firstname . ' ' . $account->creator->lastname }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="updated_by">Updated By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="updated_by"
                                        value="{{ $account->updater->firstname . ' ' . $account->updater->lastname }}"
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
