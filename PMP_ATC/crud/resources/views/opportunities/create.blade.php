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
                <label for="opportunity_status_id" style="font-size: 15px;">Opportunity Status ID:</label>
                <select name="opportunity_status_id" id="opportunity_status_id" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                    <option value="">Select Status</option>
                    @foreach ($opportunityStatuses as $opportunityStatus)
                        <option value="{{ $opportunityStatus->id }}">{{ $opportunityStatus->project_goal }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            
              
            <div class="col-md-6">  
              <div class="form-group">
                <label for="proposal" style="font-size: 15px;">Proposal:</label>
                <input type="text" name="proposal" id="proposal" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
              </div>
            </div>

            <div class="col-md-6 mt-4">  
              <div class="form-group">
                <label for="initial_stage" style="font-size: 15px;">Initial Stage:</label>
                <input type="text" name="initial_stage" id="initial_stage" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
              </div>
            </div>

            <div class="col-md-6 mt-4">  
              <div class="form-group">
                <label for="technical_stage" style="font-size: 15px;">Technical Stage:</label>
                <input type="text" name="technical_stage" id="technical_stage" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
              </div>
            </div>

            <div class="form-actions mt-3 text-end">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('opportunities.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection
