@extends('layouts.side_nav')

@section('pageTitle', 'Project Member')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Project Member</li>
@endsection

@section('content')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Projects</li>
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
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -74px; margin-bottom: 50px;">
            <a href="{{ route('project-members.create') }}" class="btn btn-primary">Add Project Member</a>
        </div>

        <div class="table-row">
            <table id="projectMemberTable" class="table table-hover responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                    <!-- <th>ID</th> -->
                    <th>Is Active</th>
                    <th>User</th>
                    <th>Project</th>
                    <th>Project Role</th>
                    <th>Is Project Admin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectMembers as $projectMember)
                    <tr>
                        <!-- <td>{{ $projectMember->id }}</td> -->
                        <td>{{ $projectMember->is_active ? 'Yes' : 'No' }}</td>
                        <td>{{ $projectMember->user->name }}</td>
                        <td>{{ $projectMember->project->project_name }}</td>
                        <td>{{ $projectMember->projectRole->member_role_type }}</td>
                        <td>{{ $projectMember->is_project_admin ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('project-members.show', $projectMember->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('project-members.edit', $projectMember->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('project-members.destroy', $projectMember->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
