@extends('layouts.side_nav')


@section('pageTitle', 'Project Role')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('project-roles.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Project Role</li>
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
            <a href="{{ route('project-roles.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="table">
            <table id="projectRoleTable" class="table table-hover responsive"  style="width: 100%;border-spacing: 0 10px;">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th style="padding-left:120px;">Member Role Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($projectRoles as $projectRole)
                            <tr class="shadow" style="border-radius:15px;">
                                {{-- <td>{{ $projectRole->id }}</td> --}}
                                <td style="padding-left: 120px;">{{ $projectRole->member_role_type }}</td>
                               
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('project-roles.show', ['project_role' => $projectRole->id]) }}">
                                            <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                        </a>
                                        <a href="{{ route('project-roles.edit', ['project_role' => $projectRole->id]) }}">
                                            <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                        </a>
                                        <form method="post" action="{{ route('project-roles.destroy', ['project_role' => $projectRole->id]) }}">
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
                    
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection





{{-- @extends('layouts.side_nav') 

@section('pageTitle', 'Project Role') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Project Role</li>
@endsection 

@section('custom_css')
<link
    rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link
    rel='stylesheet'
    href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
<link
    rel='stylesheet'
    href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
<link
    rel='stylesheet'
    href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection 

@section('custom_js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/table.js') }}"></script>
@endsection

@section('content')

@if ($errors->any())
<div class="error-messages">
    <strong>Validation Errors:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<main class="container">
    <section>
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -74px; margin-bottom: 50px;">
            <a href="{{ route('project-roles.create') }}" class="btn btn-primary">Add Project Role</a>
        </div>

            <table id="projectRoleTable" class="table table-hover responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Member Role Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projectRoles as $projectRole)
                    <tr>
                        <td>{{ $projectRole->id }}</td>
                        <td>{{ $projectRole->member_role_type }}</td>
                        <td>
                            <a href="{{ route('project-roles.edit', $projectRole->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('project-roles.destroy', $projectRole->id) }}" method="POST" style="display: inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endsection --}}