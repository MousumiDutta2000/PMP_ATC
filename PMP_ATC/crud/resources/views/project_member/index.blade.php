<!-- resources/views/project_member/index.blade.php -->
@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Project Members</h1>
        <a href="{{ route('project-members.create') }}" class="btn btn-primary">Add Project Member</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Is Active</th>
                    <th>User ID</th>
                    <th>Project ID</th>
                    <th>Project Role ID</th>
                    <th>Is Project Admin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectMembers as $projectMember)
                    <tr>
                        <td>{{ $projectMember->id }}</td>
                        <td>{{ $projectMember->is_active }}</td>
                        <td>{{ $projectMember->user_id }}</td>
                        <td>{{ $projectMember->project_id }}</td>
                        <td>{{ $projectMember->project_role_id }}</td>
                        <td>{{ $projectMember->is_project_admin }}</td>
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
