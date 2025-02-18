@extends('admin.layout.sidebar')
@section('content')
    <div class="container-fluid">
            <div class="container">
                <div class="container-fluid">
                    <div class="mt-4">
                        <h2>Dashboard</h2>
                        <div aria-label="breadcrumb mt-5">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Admin</li>
                                <li class="breadcrumb-item active">Dashboard</li>

                            </ol>
                        </div>
                    </div>
                    <div class="m-0 border-0 p-0">
                    </div>
                    <div class="mt-4">
                        <div class="row mb-3">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h4>Users +{{$userCount}}</h4>
                                    </div>
                                    <div class="card-body bg-primary bg-gradient bg-opacity-75 text-dark">
                                        <p class="m-0">New users this month
                                            <a class="stretched-link link-dark"
                                                href="{{route('show.users.admin')}}">
                                                more info
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card rounded">
                                    <div class="card-header bg-success">
                                        <h4>Rates +{{$rateCount}}</h4>
                                    </div>
                                    <div class="card-body bg-success bg-gradient bg-opacity-75 text-dark">
                                        <p class="m-0">New rates this month
                                            <a class="stretched-link link-dark"
                                                href="{{route('show.rates.admin')}}">
                                                more info
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header bg-warning">
                                        <h4>Properties +{{$postCount}}</h4>
                                    </div>
                                    <div class="card-body bg-warning bg-gradient bg-opacity-75 text-dark">
                                        <p class="m-0">New properties this month
                                            <a class="stretched-link link-dark"
                                                href="{{route('show.properties.admin')}}">
                                                more info
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <h4>More Info</h4>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <h5>Users</h5>
                                            <a class="ms-auto btn btn-sm btn-outline-primary"
                                                href="{{route('show.users.admin')}}">
                                                more</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3 mb-2">
                                                <img class="rounded-circle"
                                                    src="{{asset('../images/background/image.png')}}"
                                                    width="60px" alt="No Img">
                                            </div>
                                            <div class="col-9 mb-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="w-100">
                                                        <div class="fs-6">Admin User</div>
                                                        <a class="text-muted"
                                                            href="mailto:admin@admin.com">admin@admin.com</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <h5>Rates</h5>
                                            <a class="ms-auto btn btn-sm btn-outline-success"
                                                href="{{route('show.rates.admin')}}">
                                                more</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>No new rates this month.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <h5>Properties</h5>
                                            <a class="ms-auto btn btn-sm btn-outline-warning"
                                                href="{{route('show.properties.admin')}}">
                                                more</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>No new properties this month.</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection