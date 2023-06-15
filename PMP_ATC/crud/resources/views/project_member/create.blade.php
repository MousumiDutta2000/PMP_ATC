<!-- resources/views/project_member/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Project Member</h1>
        <form action="{{ route('project-members.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="is_active">Is Active:</label>
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="number" name="user_id" id="user_id" class="form-control" value="{{ old('user_id') }}" required>
            </div>
            <div class="form-group">
                <label for="project_id">Project ID:</label>
                <input type="number" name="project_id" id="project_id" class="form-control" value="{{ old('project_id') }}" required>
            </div>
            <div class="form-group">
                <label for="project_role_id">Project Role ID:</label>
                <input type="number" name="project_role_id" id="project_role_id" class="form-control" value="{{ old('project_role_id') }}" required>
            </div>
            <div class="form-group">
                <label for="is_project_admin">Is Project Admin:</label>
                <input type="checkbox" name="is_project_admin" id="is_project_admin" value="1" {{ old('is_project_admin') ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
