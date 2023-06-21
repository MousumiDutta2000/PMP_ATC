@extends('layouts.side_nav')

@section('pageTitle', 'Projects')
@section('content')

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

<main class="container">
    <section>
        <div class="titlebar">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
        </div>

    <!-- <div class="row">
        <div class="col-md-6">
            <form action="{{ route('projects.index') }}" method="GET">
                <div class="input-group mb-3">
                    <select class="form-control" name="search_criteria">
                        <option value="date">Search by date</option>
                        <option value="technology">Search by technology</option>
                    </select>
                    <input type="text" class="form-control" name="search_value" placeholder="Enter search value">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->

    <!-- <a href="{{ route('projects.create') }}" class="btn btn-primary">Create project</a> -->

    <div class="table">
            <table id="example" class="table table-hover responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                    <th>Project ID</th>
                <th>Project Name</th>
                <th>Status</th>
                <th>Actions</th>
                    </tr>
                </thead>
    
        <tbody>
            <!-- @foreach ($projects as $project)
                @if (isset($_GET['search_criteria']) && isset($_GET['search_value']))
                    @php
                        $searchCriteria = $_GET['search_criteria'];
                        $searchValue = $_GET['search_value'];
                    @endphp
                    @if (($searchCriteria === 'date' && $project->date == $searchValue) || ($searchCriteria === 'technology' && $project->technology == $searchValue)) -->
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="" class="btn btn-info">Manage</a>
                                <a href="" class="btn btn-primary">Report</a>
                                <a href="{{ route('projects.settings', $project->id) }}" class="btn btn-primary">Settings</a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @else
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->active ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="" class="btn btn-info">Manage</a>
                            <a href="" class="btn btn-primary">Report</a>
                            <a href="{{ route('projects.settings', $project->id) }}" class="btn btn-primary">Settings</a>

                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
