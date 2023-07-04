@extends('layouts.side_nav') 

@section('pageTitle', 'Opportunities') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('opportunities.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('opportunities.index') }}">Opportunities</a></li>
<li class="breadcrumb-item">{{ $opportunity->opportunity_status_id }}</li>
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
  <form action="{{ route('opportunities.update', $opportunity->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="opportunity_status_id">Opportunity Status ID:</label>
                <select name="opportunity_status_id" id="opportunity_status_id" class="form-control shadow-sm" required>
                    @foreach ($opportunityStatuses as $opportunityStatus)
                        <option value="{{ $opportunityStatus->id }}" {{ $opportunity->opportunity_status_id == $opportunityStatus->id ? 'selected' : '' }}>
                            {{ $opportunityStatus->project_goal }}
                        </option>
                    @endforeach
                </select>
            </div>
          
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="proposal">Proposal</label>
                <input type="text" name="proposal" id="proposal" value="{{ $opportunity->proposal }}" class="form-control shadow-sm" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="initial_stage">Initial Stage:</label>
                <input type="text" name="initial_stage" id="initial_stage" value="{{ $opportunity->initial_stage }}" class="form-control shadow-sm" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="technical_stage">Technical Stage:</label>
                <input type="text" name="technical_stage" id="technical_stage" value="{{ $opportunity->technical_stage }}" class="form-control shadow-sm" required>
            </div>
        </div>

    <div class="form-actions mt-3 text-end">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('opportunities.index') }}" class="btn btn-danger">Cancel</a>
    </div>


        </form>
    </div>
@endsection

