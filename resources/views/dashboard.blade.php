@extends('layouts.app')

@section('title', 'My Kalapps')

@section('content')
    {{-- <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-6 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary"> You have {{ $openticketsCount }} open tickets in
                                    progress.</h5>
                                <p class="mb-4">
                                    You have a total of <span class="fw-bold"> {{ $ticketsCount }} </span>Tickets
                                    Click here to check


                                </p>

                                <a href="{{route('tickets')}}" class="btn btn-sm btn-outline-primary">Tickets</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-6 mb-2">
                        <div class="card" style="height: 200px">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-end justify-content-end">
                                    <div class="">
                                        <i class='bx bx-buildings fs-1'></i>
                                    </div>
                                </div>
                                <a href="{{route('organisations')}}"><span class="fw-semibold d-block mb-1">Total organisation</span></a></a>
                                <h2 class="card-title mt-4">{{ $organisationsCount }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-6 mb-5">
                        <div class="card" style="height: 200px">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-end justify-content-end">

                                    <div class="">
                                        <i class='bx bx-diamond fs-1'></i>
                                    </div>

                                </div>
                                <a href="{{route('accounts')}}"><span class="fw-semibold d-block mb-1">Total Account</span></a>
                                <h2 class="card-title text-nowrap mt-4">{{ $accountsCount }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-6 mb-5">
                        <div class="card" style="height: 200px">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-end justify-content-end">

                                    <div class="">
                                        <i class='bx bx-category fs-1'></i>
                                    </div>

                                </div>
                                <a href="{{route('departments')}}"><span class="fw-semibold d-block mb-1">Total Departments</span></a>
                                <h2 class="card-title text-nowrap mt-1">{{ $departmentsCount }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-6 mb-5">
                        <div class="card" style="height: 200px">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-end justify-content-end">

                                    <div class="">
                                        <i class=' bx bxs-user fs-1'></i>
                                    </div>
                                </div>
                                <a href="{{route('users')}}"><span class="fw-semibold d-block mb-1">Total<br> User</span></a>
                                <h2 class="card-title text-nowrap mt-4">{{ $userCount }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
    hello admin
@endsection
