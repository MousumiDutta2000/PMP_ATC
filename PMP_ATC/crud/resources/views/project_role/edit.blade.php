@extends('layouts.side_nav') 

@section('pageTitle', 'Project Role') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project-roles.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('project-roles.index') }}">Project Role</a></li>
<li class="breadcrumb-item">{{ $projectRole->id }}</li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
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
  <form action="{{ route('project-roles.update', $projectRole->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="member_role_type" style="font-size:15px;">Member Role Type</label>
                <input type="text" class="shadow-sm" name="member_role_type" id="member_role_type" value="{{ $projectRole->member_role_type }}" style="color: #999; font-size: 14px">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('project-roles.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    </form>
</div>
@endsection