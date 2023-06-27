<!-- resources/views/project_member/create.blade.php -->
@extends('layouts.side_nav')

@section('pageTitle', 'Project Member')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Project Member</li>
    <li class="breadcrumb-item active" aria-current="page">create</li>
@endsection

@section('content')
    <div class="container card">
        <h1>Create Project Member</h1>
        <form action="{{ route('project-members.store') }}" method="POST">
            @csrf
            <div class="row mt-3">
                <div class="form-group">
                    <label for="is_active">Is Active:</label>
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user_id">User:</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="project_id">Project:</label>
                        <select name="project_id" id="project_id" class="form-control" required>
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                    {{ $project->project_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="project_role_id">Project Role:</label>
                        <select name="project_role_id" id="project_role_id" class="form-control" required>
                            <option value="">Select Project Role</option>
                            @foreach ($projectRoles as $role)
                                <option value="{{ $role->id }}" {{ old('project_role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->member_role_type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_project_admin">Is Project Admin:</label>
                    <input type="checkbox" name="is_project_admin" id="is_project_admin" value="1" {{ old('is_project_admin') ? 'checked' : '' }}>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
