@extends('layouts.side_nav') @section('content') @section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('projects.index') }}">Home</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Projects</li>
@endsection @section('custom_css')
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
@endsection @section('custom_js')
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
@endsection @section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <a href="{{ route('project-roles.create') }}" class="btn btn-primary">Add Project Role</a>
        </div>

        <div class="table-row">
            <table
                id="example"
                class="table table-hover responsive nowrap"
                style="width:100%">
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
                            <a
                                href="{{ route('project-roles.edit', $projectRole->id) }}"
                                class="btn btn-primary">Edit</a>
                            <form
                                action="{{ route('project-roles.destroy', $projectRole->id) }}"
                                method="POST"
                                style="display: inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection