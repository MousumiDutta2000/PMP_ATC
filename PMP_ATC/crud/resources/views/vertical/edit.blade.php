@extends('layouts.side_nav') 

@section('pageTitle', 'Verical') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('verticals.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('verticals.index') }}">Vertical</a></li>
<li class="breadcrumb-item">{{ $vertical->vertical_name }}</li>
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
  <form action="{{ route('verticals.update', $vertical->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="vertical_name">Vertical Name</label>
                <input type="text" name="vertical_name" id="vertical_name" class="form-control" value="{{ $vertical->vertical_name }}" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="vertical_head_name">Vertical Head Name</label>
                <input type="text" name="vertical_head_name" id="vertical_head_name" class="form-control" value="{{ $vertical->vertical_head_name }}" required>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="vertical_head_emailId">Vertical Head Email:</label>
                <input type="email" name="vertical_head_emailId" id="vertical_head_emailId" class="form-control" value="{{ $vertical->vertical_head_emailId }}" required>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="vertical_head_contact">Vertical Head Contact:</label>
                <input type="text" name="vertical_head_contact" id="vertical_head_contact" class="form-control" value="{{ $vertical->vertical_head_contact }}" required>
            </div>
        </div>



    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('verticals.index') }}" class="btn btn-danger">Cancel</a>
    </div>


        </form>
    </div>
@endsection

