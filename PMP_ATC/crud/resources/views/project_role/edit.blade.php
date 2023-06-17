<!-- resources/views/project_role/edit.blade.php -->
@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Edit Project Role</h1>
        <form action="{{ route('project-roles.update', $projectRole->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="member_role_type">Member Role Type</label>
                <input type="text" name="member_role_type" class="form-control" id="member_role_type" value="{{ $projectRole->member_role_type }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
