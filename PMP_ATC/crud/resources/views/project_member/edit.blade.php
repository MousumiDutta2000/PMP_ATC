
@extends('layouts.side_nav')

@section('pageTitle', 'Project Member')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Project Member</li>
    <li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
@endsection 

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/profiles.js') }}"></script>
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
        <form action="{{ route('project-members.update', $projectMember->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user_id" style="font-size: 15px;">User</label>
                        <select name="user_id" id="user_id" class="form-control shadow-sm" required style="padding: 3px; color: #999; font-size: 14px">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $projectMember->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="project_id" style="font-size: 15px;">Project</label>
                        <select name="project_id" id="project_id" class="form-control shadow-sm" required style="padding: 3px; color: #999; font-size: 14px">
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ $project->id == $projectMember->project_id ? 'selected' : '' }}>{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="project_role_id" style="font-size: 15px;">Project Role</label>
                        <select name="project_role_id" id="project_role_id" class="form-control shadow-sm" required style="padding: 3px; color: #999; font-size: 14px">
                            @foreach($projectRoles as $projectRole)
                                <option value="{{ $projectRole->id }}" {{ $projectRole->id == $projectMember->project_role_id ? 'selected' : '' }}>{{ $projectRole->member_role_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="is_active" style="font-size: 15px;">Is Active</label>
                        <input type="checkbox" name="is_active" class="shadow-sm" id="is_active" value="1" {{ $projectMember->is_active ? 'checked' : '' }}>
                    </div>
                </div> 

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="is_project_admin" style="font-size: 15px;">Is Project Admin:</label>
                        <input type="checkbox" name="is_project_admin" class="shadow-sm" id="is_project_admin" value="1" {{ $projectMember->is_project_admin ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('project-members.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection
