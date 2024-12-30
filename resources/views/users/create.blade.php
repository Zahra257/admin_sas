@extends('layouts.app')

@section('title', 'Add User')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4 class="fw-bold"> Add User</h4>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="html5-date-input" class="col-md-2 col-form-label">firstname</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('firstname') is-invalid @enderror" type="text"
                                            name="firstname" id="" value="{{ old('firstname') }}" />
                                        @error('firstname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                   
                                <div class="mb-3 row">
                                    <label for="html5-date-input" class="col-md-2 col-form-label">lastname</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('lastname') is-invalid @enderror" type="text"
                                            name="lastname" id="" value="{{ old('lastname') }}" />
                                        @error('lastname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="exampleFormControlInput1" placeholder="name@example.com" name="email"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            placeholder="********" name="password" />
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('role') is-invalid @enderror" id=""
                                            aria-label="Default select example" name="role">
                                            <option selected>choose the role</option>
                                            @auth
                                                @if (Auth::user()->role == 'main_admin')
                                                    <option value="super_admin"
                                                        {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin
                                                    </option>
                                                @endif
                                            @endauth
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User
                                            </option>
                                            <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>
                                                Operator</option>
                                        </select>
                                        @error('role')
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
                                    <option value="{{ $acc->id }}">{{ $acc->name }}</option>
                                @endforeach                                        </select>
                                @error('account_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                               

                                <div class="mb-3 row">
                                    <label for="html5-date-input" class="col-md-2 col-form-label">Phone</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                            name="phone" id="" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="html5-date-input" class="col-md-2 col-form-label">Birthday</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('birthday') is-invalid @enderror" type="date"
                                            name="birthday" id="" value="{{ old('birthday') }}" />
                                        @error('birthday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="visible3"
                                                name="active" {{ old('active') ? 'checked' : '' }} />
                                            <label class="form-check-label fw-bold" for="visible3">active</label>
                                        </div>
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
    <script>
        console.log('hi')
        document.getElementById("exampleFormControlSelect1").addEventListener("change", function() {
            var selectedOption = this.value;
            if (selectedOption === "") {
                selectedOption = null; // Set the value to null if no option is selected
            }
            console.log('hi',
                selectedOption
            ); // You can replace console.log with any other action you want to take with the selected value
        });
    </script>
@endsection
