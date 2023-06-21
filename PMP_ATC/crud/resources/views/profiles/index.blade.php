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
            <a href="{{ route('profiles.create') }}" class="btn btn-primary">Add Project</a>
        </div>
        <div class="table">
            <table id="example" class="table table-hover responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Phone Number</th>
                        <th>Line Manager</th>
                        <th>User</th>
                        <th>Vertical</th>
                        <th>Designation</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($profiles)>0)
                        @foreach($profiles as $profile)
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
                                <td>{{$profile->line_manager_id}}</td>
                                <td>{{$profile->user_id}}</td>
                                <td>{{$profile->vertical_id}}</td>
                                <td>{{$profile->designation_id}}</td>
                                <td>09/04/1996</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('profiles.show', ['profile' => $profile->id]) }}">
                                            <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                        </a>
                                        <a href="{{ route('profiles.edit', ['profile' => $profile->id]) }}">
                                            <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                        </a>
                                        <form method="post" action="{{ route('profiles.destroy', ['profile' => $profile->id]) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
