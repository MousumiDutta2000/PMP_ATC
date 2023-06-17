<!-- resources/views/project_member/show.blade.php -->
@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Project Member Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $projectMember->id }}</td>
                </tr>
                <tr>
                    <th>Is Active</th>
                    <td>{{ $projectMember->is_active }}</td>
                </tr>
                <tr>
                    <th>User ID</th>
                    <td>{{ $projectMember->user_id }}</td>
                </tr>
                <tr>
                    <th>Project ID</th>
                    <td>{{ $projectMember->project_id }}</td>
                </tr>
                <tr>
                    <th>Project Role ID</th>
                    <td>{{ $projectMember->project_role_id }}</td>
                </tr>
                <tr>
                    <th>Is Project Admin</th>
                    <td>{{ $projectMember->is_project_admin }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('project-members.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
