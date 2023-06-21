@extends('layouts.side_nav')

@section('pageTitle', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profiles</li>
@endsection

@section('custom_css')

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

@endsection

@section('custom_js')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>

@endsection

@section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <a href="{{ route('profiles.create') }}" class="btn btn-primary">Add Profile</a>
        </div>
        <div class="table">
            <table id="example" class="table table-hover responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Phone Number</th>
                        <th>Profession</th>
                        <th>Date of Birth</th>
                        <th>App Access</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <a href="#">
                            <div class="d-flex align-items-center">
                            <div class="avatar avatar-blue mr-3">{{$profile->image}}</div>

                            <div class="">
                                <p class="font-weight-bold mb-0">{{$profile->name}}</p>
                                <p class="text-muted mb-0">{{$profile->email}}</p>
                            </div>
                            </div>
                        </a>
                        </td>
                        <td>{{$profile->contact_number}}</td>
                        <td>{{$profile->designation_id}}</td>
                        <td>09/04/1996</td>
                        <td>
                        <div class="badge badge-success badge-success-alt">Enabled</div>
                        </td>
                        <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                    title="Actions"></i>
                                </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                            <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                            </div>
                        </div>
                        </td>
                    </tr>

                    <tr>
                     <td>
                        <a href="#">
                            <div class="d-flex align-items-center">
                            <div class="avatar avatar-pink mr-3">JR</div>

                            <div class="">
                                <p class="font-weight-bold mb-0">Julie Richards</p>
                                <p class="text-muted mb-0">julie_89@example.com</p>
                            </div>
                            </div>
                        </a>
                        </td>
                        <td> (937) 874 6878</td>
                        <td>Investment Banker</td>
                        <td>13/01/1989</td>
                        <td>
                        <div class="badge badge-success badge-success-alt">Enabled</div>
                        </td>
                        <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                    title="Actions"></i>
                                </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                            <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Remove</a>
                            </div>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection

