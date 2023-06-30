
@extends('layouts.side_nav')

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
        <a href="{{ route('project-roles.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
