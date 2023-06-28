@extends('layouts.side_nav') 

@section('pageTitle', 'Opportunities') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('opportunities.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('opportunities.index') }}">Opportunities</a></li>
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
    <form action="{{ route('opportunities.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="opportunity_status_id">Opportunity Status ID:</label>
                <input type="text" name="opportunity_status_id" id="opportunity_status_id" class="form-control" required>
              </div>
            </div>
              
            <div class="col-md-6">  
              <div class="form-group">
                <label for="proposal">Proposal:</label>
                <input type="text" name="proposal" id="proposal" class="form-control" required>
              </div>
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label for="initial_stage">Initial Stage:</label>
                <input type="text" name="initial_stage" id="initial_stage" class="form-control" required>
              </div>
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label for="technical_stage">Technical Stage:</label>
                <input type="text" name="technical_stage" id="technical_stage" class="form-control" required>
              </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('opportunities.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection






{{-- @extends('layouts.side_nav')

@section('content')
  <h1>Create New Opportunity</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('opportunities.store') }}">
    @csrf

    <div class="form-group">
      <label for="opportunity_status_id">Opportunity Status ID:</label>
      <input type="text" name="opportunity_status_id" id="opportunity_status_id" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="proposal">Proposal:</label>
      <input type="text" name="proposal" id="proposal" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="initial_stage">Initial Stage:</label>
      <input type="text" name="initial_stage" id="initial_stage" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="technical_stage">Technical Stage:</label>
      <input type="text" name="technical_stage" id="technical_stage" class="form-control" required>
    </div>

    <div>
      <button type="submit" class="btn btn-primary">Create Opportunity</button>
    </div>
  </form>

  <a href="{{ route('opportunities.index') }}" class="btn btn-primary">Back to Opportunities</a>
@endsection --}}
