
@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Create Project Role</h1>
        <form action="{{ route('project-roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="member_role_type">Member Role Type</label>
                <input type="text" name="member_role_type" class="form-control" id="member_role_type">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('project-roles.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection
