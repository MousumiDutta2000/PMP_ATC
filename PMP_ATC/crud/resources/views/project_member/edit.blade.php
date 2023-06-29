
@extends('layouts.side_nav')

@section('pageTitle', 'Project Member')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Project Member</li>
    <li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection

@section('content')
    <div class="container card ">
        <h1>Edit Project Member</h1>
        <form action="{{ route('project-members.update', $projectMember->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="is_active">Is Active:</label>
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ $projectMember->is_active ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $projectMember->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="project_id">Project:</label>
                <select name="project_id" id="project_id" class="form-control" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $projectMember->project_id ? 'selected' : '' }}>{{ $project->project_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="project_role_id">Project Role:</label>
                <select name="project_role_id" id="project_role_id" class="form-control" required>
                    @foreach($projectRoles as $projectRole)
                        <option value="{{ $projectRole->id }}" {{ $projectRole->id == $projectMember->project_role_id ? 'selected' : '' }}>{{ $projectRole->member_role_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="is_project_admin">Is Project Admin:</label>
                <input type="checkbox" name="is_project_admin" id="is_project_admin" value="1" {{ $projectMember->is_project_admin ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
