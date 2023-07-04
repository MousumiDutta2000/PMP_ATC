@extends('layouts.side_nav') 

@section('pageTitle', 'Clients') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('clients.index') }}">Clients</a></li>
<li class="breadcrumb-item">{{ $client->client_name }}</li>
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
  <form action="{{ route('clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input type="text" name="client_name" id="client_name" value="{{ $client->client_name }}" class="form-control shadow-sm" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="phone_no">Phone Number</label>
                <input type="text" name="phone_no" id="phone_no" value="{{ $client->phone_no }}" class="form-control shadow-sm" required>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="email_address">Email Address:</label>
                <input type="email" name="email_address" id="email_address" value="{{ $client->email_address }}" class="form-control shadow-sm" required>
            </div>
        </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('clients.index') }}" class="btn btn-danger">Cancel</a>
    </div>


        </form>
    </div>
@endsection


