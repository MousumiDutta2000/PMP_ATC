@extends('layouts.side_nav') 

@section('pageTitle', 'Vertical') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('verticals.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('verticals.index') }}">Vertical</a></li>
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
    <form action="{{ route('verticals.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="vertical_name">Vertical Name</label>
                    <input type="text" name="vertical_name" id="vertical_name" class="form-control shadow-sm" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="vertical_head_name">Vertical Head Name</label>
                    <input type="text" name="vertical_head_name" id="vertical_head_name" class="form-control shadow-sm" required>
                </div>
            </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="vertical_head_emailId">Vertical Head Email:</label>
                <input type="email" name="vertical_head_emailId" id="vertical_head_emailId" class="form-control shadow-sm" required>
            </div>
        </div>

       
           <div class="col-md-6">
            <div class="form-group">
                <label for="vertical_head_contact">Vertical Head Contact:</label>
                <input type="text" name="vertical_head_contact" id="vertical_head_contact" class="form-control shadow-sm" required>
            </div>
        </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('verticals.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>
@endsection

