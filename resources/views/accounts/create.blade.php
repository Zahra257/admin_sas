@extends('layouts.app')

@section('title', 'Add Account')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Add Account</h4>

            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <small class="text-muted float-end">Default label</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('accounts_admin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- General Information -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" />
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

                                <!-- Contact Information -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="email">Main Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="secondary_email">Secondary Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('secondary_email') is-invalid @enderror" id="secondary_email" name="secondary_email" value="{{ old('secondary_email') }}" />
                                        @error('secondary_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="phone">Main Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="secondary_phone">Secondary Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('secondary_phone') is-invalid @enderror" id="secondary_phone" name="secondary_phone" value="{{ old('secondary_phone') }}" />
                                        @error('secondary_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="website">Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" />
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Address Information -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="city">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" />
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="country">Country</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country') }}" />
                                        @error('country')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Segment Information -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="segment">Segment</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('segment') is-invalid @enderror" id="segment" name="segment">
                                            <option value="">Select Segment</option>
                                            <option value="Bronze" {{ old('segment') == 'Bronze' ? 'selected' : '' }}>Bronze</option>
                                            <option value="Silver" {{ old('segment') == 'Silver' ? 'selected' : '' }}>Silver</option>
                                            <option value="Gold" {{ old('segment') == 'Gold' ? 'selected' : '' }}>Gold</option>
                                            <option value="VIP" {{ old('segment') == 'VIP' ? 'selected' : '' }}>VIP</option>
                                        </select>
                                        @error('segment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Tax Information -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tax_id_1">Tax Id 1 (RC)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('tax_id_1') is-invalid @enderror" id="tax_id_1" name="tax_id_1" value="{{ old('tax_id_1') }}" />
                                        @error('tax_id_1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tax_id_2">Tax Id 2 (IF)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('tax_id_2') is-invalid @enderror" id="tax_id_2" name="tax_id_2" value="{{ old('tax_id_2') }}" />
                                        @error('tax_id_2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tax_id_3">Tax Id 3 (Patente)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('tax_id_3') is-invalid @enderror" id="tax_id_3" name="tax_id_3" value="{{ old('tax_id_3') }}" />
                                        @error('tax_id_3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tax_id_4">Tax Id 4 (ICE)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('tax_id_4') is-invalid @enderror" id="tax_id_4" name="tax_id_4" value="{{ old('tax_id_4') }}" />
                                        @error('tax_id_4')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tax_id_5">Tax Id 5</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('tax_id_5') is-invalid @enderror" id="tax_id_5" name="tax_id_5" value="{{ old('tax_id_5') }}" />
                                        @error('tax_id_5')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tax_id_6">Tax Id 6</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('tax_id_6') is-invalid @enderror" id="tax_id_6" name="tax_id_6" value="{{ old('tax_id_6') }}" />
                                        @error('tax_id_6')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Active Status -->
                                <div class="row mb-3">
                                  <label class="col-sm-2 col-form-label" for="active">Status</label>
                                  <div class="col-sm-10">
                                      <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" id="status"
                                              name="active" {{ old('active') ? 'checked' : '' }}>
                                          <label class="form-check-label" for="active">Active</label>
                                      </div>
                                      @error('active')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add Account</button>
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
