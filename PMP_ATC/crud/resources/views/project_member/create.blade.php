@extends('layouts.side_nav') 

@section('pageTitle', 'Project Member') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project-members.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('project-members.index') }}">Project Member</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
@endsection 

@section('content') 

@if ($errors->any())
<div class="error-messages">
    <strong>Validation Errors:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-container">
    <form action="{{ route('project-members.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="user_id" style="font-size: 15px;">User</label>
                    <select name="user_id" class="shadow-sm" id="user_id" required style="padding: 3px; color: #999; font-size: 14px">
                        <option value="">Select user</option>
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
                    <label for="project_id" style="font-size: 15px;">Project</label>
                    <select name="project_id" class="shadow-sm" id="project_id" required style="padding: 3px; color: #999; font-size: 14px">
                        <option value="">Select project</option>
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
                    <label for="project_role_id" style="font-size: 15px;">Project Role</label>
                    <select name="project_role_id" class="shadow-sm" id="project_role_id" required style="padding: 3px; color: #999; font-size: 14px">
                        <option value="">Select project role</option>
                        @foreach ($projectRoles as $projectRole)
                            <option value="{{ $projectRole->id }}">{{ $projectRole->member_role_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div> 

            <div class="col-md-4"> 
                <div class="form-group">
                    <label for="is_active" style="font-size: 15px;">Is Active</label>
                    <input type="checkbox" class="shadow-sm" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                </div>
            </div>

            <div class="col-md-4"> 
                <div class="form-group">
                    <label for="is_project_admin" style="font-size: 15px;">Is Project Admin</label>
                    <input type="checkbox" class="shadow-sm" name="is_project_admin" id="is_project_admin" value="1" {{ old('is_project_admin') ? 'checked' : '' }}>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('project-members.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>       
    </form>
</div>

@endsection