@extends('layouts.side_nav') 

@section('pageTitle', 'Project Role') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project-roles.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('project-roles.index') }}">Project Role</a></li>
<li class="breadcrumb-item active" aria-current="page">Add New</li>
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
    <form action="{{ route('project-roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="member_role_type">Member Role Type</label>
                    <input type="text" name="member_role_type" class="form-control" id="member_role_type">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('project-roles.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection

