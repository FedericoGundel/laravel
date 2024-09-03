@extends('layouts.master')
@section('title')Widgets @endsection
@section('content')

    {{-- breadcrumbs  --}}
    @section('breadcrumb')
        @component('components.breadcrumb')
            @slot('li_1') UI Elements @endslot
            @slot('title') Widgets @endslot
        @endcomponent
    @endsection

<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <div class="avatar-title bg-primary-subtle text-primary rounded-circle font-size-18">
                                <i class="uil uil-list-ul"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <p class="mb-1 text-truncate text-muted">Total Tasks</p>
                        <h5 class="font-size-16 mb-0">21</h5>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <div class="avatar-title bg-primary-subtle text-primary rounded-circle font-size-18">
                                <i class="uil uil-check-circle"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <p class="mb-1 text-truncate text-muted">Completed Tasks</p>
                        <h5 class="font-size-16 mb-0">10</h5>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <div class="avatar-title bg-primary-subtle text-primary rounded-circle font-size-18">
                                <i class="uil uil-users-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <p class="mb-1 text-truncate text-muted">Members</p>
                        <h5 class="font-size-16 mb-0">12</h5>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <div class="avatar-title bg-primary-subtle text-primary rounded-circle font-size-18">
                                <i class="uil uil-clock-eight"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <p class="mb-1 text-truncate text-muted">Total Hours</p>
                        <h5 class="font-size-16 mb-0">3224</h5>
                    </div>
                </div>
            </div><!-- end card body-->
        </div><!-- end card -->
    </div> <!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xl-3 col-sm-6">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="font-size-xs text-uppercase">Total Revenue</h6>
                        <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                            $46.34k
                        </h4>
                        <div class="text-muted">Earning this month</div>
                    </div>
                    <div>
                        <div class="dropdown">
                            <a class="dropdown-toggle btn btn-light btn-sm" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted">Monthly<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apex-charts mt-3" id="sparkline-chart-1"></div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-3 col-sm-6">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="font-size-xs text-uppercase">Total Refunds</h6>
                        <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                            $895.02
                        </h4>
                        <div class="text-muted">Refunds this month</div>
                    </div>
                    <div>
                        <div class="dropdown">
                            <a class="dropdown-toggle btn btn-light btn-sm" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted">Monthly<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apex-charts mt-3" id="sparkline-chart-2"></div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-3 col-sm-6">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="font-size-xs text-uppercase">Active Users</h6>
                        <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                            6,985
                        </h4>
                        <div class="text-muted">Users this Week</div>
                    </div>
                    <div>
                        <div class="dropdown">
                            <a class="dropdown-toggle btn btn-light btn-sm" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted">Weekly<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apex-charts mt-3" id="sparkline-chart-3"></div>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-3 col-sm-6">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="font-size-xs text-uppercase">All Time Orders</h6>
                        <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                            12,584
                        </h4>
                        <div class="text-muted">Total Number of Orders</div>
                    </div>
                    <div>
                        <div class="dropdown">
                            <a class="dropdown-toggle btn btn-light btn-sm" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted">Yearly<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apex-charts mt-3" id="sparkline-chart-4"></div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div> <!-- end row-->

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-h-100">
            <div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle font-size-12">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Users</p>
                                <h5 class="font-size-16 mb-0">2.2 k</h5>
                            </div>
                            <div class="flex-shrink-0 align-self-end">
                                <div class="badge bg-success-subtle text-success ms-2">1.2 % <i class="uil uil-arrow-up-right text-success ms-1"></i></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle font-size-12">
                                        <i class="fas fa-hourglass-start"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Sessions</p>
                                <h5 class="font-size-16 mb-0">3.85 k</h5>
                            </div>
                            <div class="flex-shrink-0 align-self-end">
                                <div class="badge badge-soft-danger ms-2">1.2 % <i class="uil uil-arrow-down-left text-danger ms-1"></i></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle font-size-12">
                                        <i class="fas fa-stopwatch"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Session Duration</p>
                                <h5 class="font-size-16 mb-0">1 min</h5>
                            </div>
                            <div class="flex-shrink-0 align-self-end">
                                <div class="badge badge-soft-danger ms-2">1.1 % <i class="uil uil-arrow-down-left text-danger ms-1"></i></div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle font-size-12">
                                        <i class="fas fa-chart-area"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Bounce Rate</p>
                                <h5 class="font-size-16 mb-0">24.03 %</h5>
                            </div>
                            <div class="flex-shrink-0 align-self-end">
                                <div class="badge bg-success-subtle text-success ms-2">1.2 % <i class="uil uil-arrow-up-right text-success ms-1"></i></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end card -->
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item pt-0 py-3 px-0">
                            <div class="row">
                                <div class="col-7">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">New Visitors</p>
                                        <h5 class="font-size-16 mb-0 text-truncate">1.2 k <span class="text-muted font-size-12 fw-normal ms-2">0.2 % <i class="uil uil-arrow-up-right text-success ms-1"></i></span></h5>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div id="chart-sparkarea-1"></div>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item py-3 px-0">
                            <div class="row">
                                <div class="col-7">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Users</p>
                                        <h5 class="font-size-16 mb-0 text-truncate">2.2 k</h5>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div id="chart-sparkarea-2"></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3 pb-0 px-0">
                            <div class="row">
                                <div class="col-7">
                                    <div>
                                        <p class="text-muted mb-2 text-truncate">Sessions</p>
                                        <h5 class="font-size-16 mb-0 text-truncate">3.85 k <span class="text-muted font-size-12 fw-normal ms-2">1.2 % <i class="uil uil-arrow-up-right text-success ms-1"></i></span></h5>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div id="chart-sparkarea-3"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card card-h-100">
            <div class="card-header border-bottom-0">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Visitors by Browser</h5>
                    </div>

                    <div class="flex-shrink-0">
                        <div class="dropdown">
                            <a class="font-size-16 text-muted dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-4">
                <div data-simplebar style="max-height: 195px;">
                    <ul class="list-unstyled unstyled mb-0">
                        <li class="px-4 py-3 pt-0">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                            <i class="fab fa-chrome"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">Chrome <span class="float-end fw-medium">82 %</span></p>
                                    <div class="progress animated-progess custom-progress">
                                        <div class="progress-bar" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                            <i class="fab fa-firefox-browser"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">Firefox <span class="float-end fw-medium">70 %</span></p>
                                    <div class="progress animated-progess custom-progress">
                                        <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="px-4 py-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                            <i class="fab fa-safari"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">Safari <span class="float-end fw-medium">76 %</span></p>
                                    <div class="progress animated-progess custom-progress">
                                        <div class="progress-bar" role="progressbar" style="width: 76%" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="px-4 py-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                            <i class="fab fa-edge"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">Edge <span class="float-end fw-medium">67 %</span></p>
                                    <div class="progress animated-progess custom-progress">
                                        <div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-4">Visitors Source</h5>
                    </div>

                    <div class="flex-shrink-0">
                        <div class="dropdown">
                            <a class="font-size-16 text-muted dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chart-donut" class="apex-charts" dir="ltr"></div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-warning border-0 d-flex align-items-center" role="alert">
                    <i class="uil uil-exclamation-triangle font-size-16 text-warning me-2"></i>
                    <div class="flex-grow-1 text-truncate">
                        Your free trial expired in <b>21</b> days.
                    </div>
                    <div class="flex-shrink-0">
                        <a href="pricing-basic" class="text-reset text-decoration-underline"><b>Upgrade</b></a>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-sm-7">
                        <p class="font-size-18">Upgrade your plan from a <span class="fw-semibold">Free
                                trial</span>, to ‘Premium Plan’ <i class="mdi mdi-arrow-right"></i></p>
                        <div class="mt-4">
                            <a href="pricing-basic" class="btn btn-primary">Upgrade Account!</a>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <img src="{{URL::asset('assets/images/illustrator/2.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-semibold">Report By:</span> <span class="text-muted">Monthly<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Yearly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                            <a class="dropdown-item" href="#">Today</a>
                        </div>
                    </div>
                </div>

                <h4 class="card-title mb-4">Earning Reports</h4>

                <div class="row align-items-center">
                    <div class="col-sm-7">
                        <div class="row mb-3">
                            <div class="col-6">
                                <p class="text-muted mb-2">This Month</p>
                                <h5>$12,582<small class="badge bg-success-subtle text-success font-13 ms-2">+15%</small></h5>
                            </div>

                            <div class="col-6">
                                <p class="text-muted mb-2">Last Month</p>
                                <h5>$98,741</h5>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="" class="btn btn-secondary-subtle btn-sm">Generate Reports <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                    </div> <!-- end col-->
                    <div class="col-sm-5">
                        <div class="my-2">
                            <div id="chart-donut-reports" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title">Inbox</h5>
                    </div>

                    <div class="flex-shrink-0">
                        <div class="dropdown">
                            <a class="font-size-16 text-muted dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card header -->

            <div class="pb-4">
                <div class="chat-message-list widget-chat-list" data-simplebar>
                    <div class="px-4">
                        <ul class="list-unstyled chat-list">
                            <li class="active">
                                <a href="#" class="mt-0">
                                    <div class="d-flex align-items-start">

                                        <div class="flex-shrink-0 user-img online align-self-center me-3">
                                            <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" class="rounded-circle avatar-sm" alt="">
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Daniel Pickering</h5>
                                            <p class="text-truncate mb-0">Hey! there I'm available</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">02 min</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                            <li class="unread">
                                <a href="#">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 user-img online align-self-center me-3">
                                            <div class="avatar-sm align-self-center">
                                                <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                    H
                                                </span>
                                            </div>
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Helen Harper</h5>
                                            <p class="text-truncate mb-0">I've finished it! See you so</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">10 min</div>
                                        </div>

                                        <div class="unread-message">
                                            <span class="badge bg-danger rounded-pill">01</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 user-img away align-self-center me-3">
                                            <img src="{{URL::asset('assets/images/users/avatar-3.jpg')}}" class="rounded-circle avatar-sm" alt="">
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Mary Welch</h5>
                                            <p class="text-truncate mb-0">This theme is awesome!</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">22 min</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-start">

                                        <div class="flex-shrink-0 user-img align-self-center me-3">
                                            <img src="{{URL::asset('assets/images/users/avatar-4.jpg')}}" class="rounded-circle avatar-sm" alt="">
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Vicky Garcia</h5>
                                            <p class="text-truncate mb-0">Nice to meet you</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">01 Hr</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-start">

                                        <div class="flex-shrink-0 user-img online align-self-center me-3">
                                            <div class="avatar-sm align-self-center">
                                                <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                    S
                                                </span>
                                            </div>
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Scott Pierce</h5>
                                            <p class="text-truncate mb-0">Wow that's great</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">04 Hrs</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-start">

                                        <div class="flex-shrink-0 user-img online align-self-center me-3">
                                            <div class="avatar-sm align-self-center">
                                                <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                    R
                                                </span>
                                            </div>
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Ray Little</h5>
                                            <p class="text-truncate mb-0">Hey! there I'm available</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">10 Hrs</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-start">

                                        <div class="flex-shrink-0 user-img online align-self-center me-3">
                                            <div class="avatar-sm align-self-center">
                                                <span class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                    R
                                                </span>
                                            </div>
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Robert Perez</h5>
                                            <p class="text-truncate mb-0">Thanks</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">yesterday</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 user-img away align-self-center me-3">
                                            <img src="{{URL::asset('assets/images/users/avatar-3.jpg')}}" class="rounded-circle avatar-sm" alt="">
                                            <span class="user-status"></span>
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">Mary Welch</h5>
                                            <p class="text-truncate mb-0">This theme is awesome!</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">22 min</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- end li -->
                        </ul>
                        <!-- end ul -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="p-3 px-lg-4 border-bottom">
                <div class="row">
                    <div class="col-xl-4 col-7">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar me-3 d-sm-block d-none">
                                <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="" class="img-thumbnail d-block rounded-circle">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark">Daniel Pickering</a></h5>
                                <p class="text-muted text-truncate mb-0">Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-5">
                        <ul class="list-inline user-chat-nav text-end mb-0">
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="uil uil-search"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                        <form class="px-2">
                                            <div>
                                                <input type="text" class="form-control bg-light rounded" placeholder="Search...">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="uil uil-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#">Archive</a>
                                        <a class="dropdown-item" href="#">Muted</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <!-- end li -->
                        </ul>
                        <!-- end ul -->
                    </div>
                </div>
            </div>
            <div>
                <div class="chat-conversation p-3 px-2 widget-chat" data-simplebar>
                    <ul class="list-unstyled mb-0">
                        <li class="chat-day-title">
                            <div class="title">Today</div>
                        </li>
                        <li>
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="chat-avatar">
                                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="avatar-2">
                                    </div>
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><a href="#" class="user-name">Daniel Pickering</a> <span class="time">10:00</span></h5>
                                        <p class="mb-0">Good morning !</p>
                                    </div>
                                    <div class="dropdown align-self-start">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end li -->

                        <li class="right">
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="chat-avatar">
                                        <img src="{{URL::asset('assets/images/users/avatar-1.jpg')}}" alt="avatar-1">
                                    </div>
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><a href="#" class="user-name">Kate</a> <span class="time">10:02</span></h5>
                                        <p class="mb-0">Good morning</p>
                                    </div>
                                    <div class="dropdown align-self-start">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end li -->

                        <li>
                            <div class="conversation-list mb-0">
                                <div class="ctext-wrap">
                                    <div class="chat-avatar">
                                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="avatar-2">
                                    </div>
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><a href="#" class="user-name">Daniel Pickering</a> <span class="time">10:04</span></h5>
                                        <p class="mb-0">
                                            Hello!
                                        </p>
                                    </div>
                                    <div class="dropdown align-self-start">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="ctext-wrap">
                                    <div class="chat-avatar">
                                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="avatar-2">
                                    </div>
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><a href="#" class="user-name">Daniel Pickering</a> <span class="time">10:04</span></h5>
                                        <p class="mb-0">
                                            What about our next meeting?
                                        </p>
                                    </div>
                                    <div class="dropdown align-self-start">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end li -->

                        <li>
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="chat-avatar">
                                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="avatar-2">
                                    </div>
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><a href="#" class="user-name">Daniel Pickering</a> <span class="time">10:06</span></h5>
                                        <p class="mb-0">
                                            Next meeting tomorrow 10.00AM
                                        </p>
                                    </div>
                                    <div class="dropdown align-self-start">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end li -->

                        <li class="right">
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="chat-avatar">
                                        <img src="{{URL::asset('assets/images/users/avatar-1.jpg')}}" alt="avatar-1">
                                    </div>
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><a href="#" class="user-name">Kate</a> <span class="time">10:06</span></h5>
                                        <p class="mb-0">
                                            Wow that's great
                                        </p>
                                    </div>
                                    <div class="dropdown align-self-start">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end li -->

                        <li>
                            <div class="conversation-list">
                                <div class="ctext-wrap">
                                    <div class="chat-avatar">
                                        <img src="{{URL::asset('assets/images/users/avatar-2.jpg')}}" alt="avatar-2">
                                    </div>
                                    <div class="ctext-wrap-content">
                                        <h5 class="conversation-name"><a href="#" class="user-name">Daniel Pickering</a> <span class="time">10:06</span></h5>
                                        <p class="mb-0">
                                            img-1.jpg & img-2.jpg images for a New Projects
                                        </p>

                                        <div class="message-img mt-3 mb-0">
                                            <div class="message-img-list">
                                                <a class="d-inline-block" href="">
                                                    <img src="{{URL::asset('assets/images/small/img-1.jpg')}}" alt="" class="rounded">
                                                </a>
                                            </div>

                                            <div class="message-img-list">
                                                <a class="d-inline-block" href="">
                                                    <img src="{{URL::asset('assets/images/small/img-2.jpg')}}" alt="" class="rounded">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown align-self-start">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="uil uil-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Copy</a>
                                            <a class="dropdown-item" href="#">Save</a>
                                            <a class="dropdown-item" href="#">Forward</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- end li -->
                    </ul>
                    <!-- end ul -->
                </div>
            </div>
            <div class="p-3 chat-input-section">
                <div class="row">
                    <div class="col">
                        <div class="position-relative">
                            <input type="text" class="form-control chat-input" placeholder="Enter Message...">

                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary chat-send w-md"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send float-end"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')

<!-- apexcharts -->
<script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- init js -->
<script src="{{ URL::asset('assets/js/pages/widgets.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection