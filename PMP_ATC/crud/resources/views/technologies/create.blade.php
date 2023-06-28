@extends('layouts.side_nav') 

@section('pageTitle', 'Technologies') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('technologies.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('technologies.index') }}">Technologies</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
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
    <form action="{{ route('technologies.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="technology_name">Technology Name</label>
                    <input type="text" name="technology_name" class="form-control" id="technology_name">
                </div>
            </div>
<<<<<<< HEAD
=======

            <div class="col-md-6">
                <div class="form-group">
                    <label for="vertical_head_name">Vertical Head Name</label>
                    <input type="text" name="vertical_head_name" id="vertical_head_name" class="form-control" required>
                </div>
            </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="vertical_head_emailId">Vertical Head Email:</label>
                <input type="email" name="vertical_head_emailId" id="vertical_head_emailId" class="form-control" required>
            </div>
        </div>

>>>>>>> 792c4c034942fef487b91bea6948e72500f00e7b
       
           <div class="col-md-6">
            <div class="form-group">
                <label for="expertise">Expertise</label>
                <input type="text" name="expertise" class="form-control" id="expertise">
            </div>
        </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('technologies.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>
@endsection



