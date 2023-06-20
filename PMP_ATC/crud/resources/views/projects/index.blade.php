@extends('layouts.side_nav')

@section('pageTitle', 'Projects')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
        </ol>
    </nav>

    <a href="{{ route('projects.create') }}" class="btn btn-primary">Create project</a>

    <table class="table">
        <thead>
            <tr>
                <th>Project ID </th>
                <th>Project Name</th>
                <th>Actions</th>
                <!-- <th>Project Status</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->project_name }}</td>
                    <td>
                        <a href="" class="btn btn-info">Manage</a>
                        <a href="" class="btn btn-primary">Report</a>
                        <a href="{{ route('projects.settings', $project->id) }}" class="btn btn-primary">Settings</a>

                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
