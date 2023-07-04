@extends('layouts.side_nav') 

@section('pageTitle', 'Technologies') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('technologies.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('technologies.index') }}">Technologies</a></li>
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
    <form action="{{ route('technologies.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="technology_name">Technology Name</label>
                    <input type="text" name="technology_name" class="form-control" id="technology_name">
                </div>
            </div>
       
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



