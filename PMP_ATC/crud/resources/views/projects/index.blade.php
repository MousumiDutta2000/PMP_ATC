@extends('layouts.side_nav')

@section('pageTitle', 'Projects')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
        </ol>
    </nav>

    <div class="row">
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
    </div>

    <a href="{{ route('projects.create') }}" class="btn btn-primary">Create project</a>

    <table class="table">
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                @if (isset($_GET['search_criteria']) && isset($_GET['search_value']))
                    @php
                        $searchCriteria = $_GET['search_criteria'];
                        $searchValue = $_GET['search_value'];
                    @endphp
                    @if (($searchCriteria === 'date' && $project->date == $searchValue) || ($searchCriteria === 'technology' && $project->technology == $searchValue))
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
