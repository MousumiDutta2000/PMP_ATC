<!-- resources/views/project_role/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Project Member Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $projectRole->id }}</td>
                </tr>
                <tr>
                    <th>Member Role Type</th>
                    <td>{{ $projectRole->member_role_type }}</td>
                </tr>

            </tbody>
        </table>
        <a href="{{ route('project-members.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
