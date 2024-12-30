@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4 class="fw-bold"> Edit User</h4>
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="firstname" class="col-md-2 col-form-label">First Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('firstname') is-invalid @enderror" type="text"
                                            name="firstname" id="firstname" value="{{ old('firstname', $user->firstname) }}" />
                                        @error('firstname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="lastname" class="col-md-2 col-form-label">Last Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('lastname') is-invalid @enderror" type="text"
                                            name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}" />
                                        @error('lastname')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="name@example.com" name="email"
                                            value="{{ old('email', $user->email) }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            placeholder="********" name="password" />
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('role') is-invalid @enderror" id="role"
                                            aria-label="Default select example" name="role">
                                            <option selected disabled>Choose the role</option>
                                            @auth
                                                @if (Auth::user()->role == 'main_admin')
                                                    <option value="super_admin"
                                                        {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin
                                                    </option>
                                                @endif
                                            @endauth
                                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                                            </option>
                                            <option value="operator" {{ old('role', $user->role) == 'operator' ? 'selected' : '' }}>
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
                                    <option value="">{{ $user->accountId->name }}</option>
                                    @foreach ($accounts as $acc)
                                    <option value="{{ $acc->id }}">{{ $acc->name }}</option>
                                @endforeach                                        </select>
                                @error('account_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                                <div class="mb-3 row">
                                    <label for="phone" class="col-md-2 col-form-label">Phone</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                            name="phone" id="phone" value="{{ old('phone', $user->phone) }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="birthday" class="col-md-2 col-form-label">Birthday</label>
                                    <div class="col-md-10">
                                        <input class="form-control @error('birthday') is-invalid @enderror" type="date"
                                            name="birthday" id="birthday" value="{{ old('birthday', $user->birthday) }}" />
                                        @error('birthday')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="active"
                                                name="active" {{ old('active', $user->active) ? 'checked' : '' }} />
                                            <label class="form-check-label fw-bold" for="active">Active</label>
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
@endsection
