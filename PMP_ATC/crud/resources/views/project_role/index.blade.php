<!-- resources/views/project_role/index.blade.php -->
@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Project Roles</h1>
        <table class="table">
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
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('project-roles.create') }}" class="btn btn-success">Create</a>
    </div>
@endsection
