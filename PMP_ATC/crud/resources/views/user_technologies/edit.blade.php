@extends('layouts.side_nav') 

@section('pageTitle', 'Skills') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('user_technologies.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('user_technologies.index') }}">Skills</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> 
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
  <form action="{{ route('user_technologies.update', $user_technology->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class ="col-md-4">
        <div class="form-group">
            <label for="project_role_id">Project Role:</label>
            <select name="project_role_id" id="project_role_id" class="form-control" required>
                <option value="">Select Project Role</option>
                @foreach ($project_roles as $project_role)
                    <option value="{{ $project_role->id }}">{{ $project_role->member_role_type }}</option>
                @endforeach
            </select>                                       
        </div>
    </div>
    <div class ="col-md-6">
        <div class="form-group">
            <label for="details">Details:</label>
            <input type="text" name="details" id="details" class="form-control" required>
        </div>                                   
    </div>
    <div class ="col-md-4">
        <div class="form-group">
            <label for="technology_id">Technology:</label>
            <select name="technology_id" id="technology_id" class="form-control" required>
                <option value="">Select Technology</option>
                @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                @endforeach
            </select>                                             
        </div>
    </div>
    <div class ="col-md-6">
        <div class="form-group">
            <label for="years_of_experience">Years Of Experience:</label>
                <input type="text" name="years_of_experience" id="years_of_experience" class="form-control" required>
        </div>
                                      
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="typeSelect">Is Current Company:</label>
            <input type="checkbox" name="is_current_company" id="is_current_company" value="1" {{ old('is_current_company') ? 'checked' : '' }}>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('user_technologies.index') }}" class="btn btn-danger">Cancel</a>
    </div>


        </form>
    </div>
@endsection






{{-- @extends('layouts.side_nav')

@section('content')
    <h1>Edit Skills</h1>

    <form action="{{ route('user_technologies.update', $user_technology->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class ="col-md-4">
        <div class="form-group">
            <label for="project_role_id">Project Role:</label>
            <select name="project_role_id" id="project_role_id" class="form-control" required>
                <option value="">Select Project Role</option>
                @foreach ($project_roles as $project_role)
                    <option value="{{ $project_role->id }}">{{ $project_role->member_role_type }}</option>
                @endforeach
            </select>                                       
        </div>
    </div>
    <div class ="col-md-6">
        <div class="form-group">
            <label for="details">Details:</label>
            <input type="text" name="details" id="details" class="form-control" required>
        </div>                                   
    </div>
    <div class ="col-md-4">
        <div class="form-group">
            <label for="technology_id">Technology:</label>
            <select name="technology_id" id="technology_id" class="form-control" required>
                <option value="">Select Technology</option>
                @foreach ($technologies as $technology)
                    <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                @endforeach
            </select>                                             
        </div>
    </div>
    <div class ="col-md-6">
        <div class="form-group">
            <label for="years_of_experience">Years Of Experience:</label>
                <input type="text" name="years_of_experience" id="years_of_experience" class="form-control" required>
        </div>
                                      
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="typeSelect">Is Current Company:</label>
            <input type="checkbox" name="is_current_company" id="is_current_company" value="1" {{ old('is_current_company') ? 'checked' : '' }}>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection --}}
