@extends('layouts.side_nav') 

@section('pageTitle', 'Opportunity_status') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('opportunity_status.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('opportunity_status.index') }}">Opportunity_status</a></li>
<li class="breadcrumb-item">{{ $opportunityStatus->project_goal }}</li>
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
  <form action="{{ route('opportunity_status.update', $opportunityStatus->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="project_goal">Project Goal</label>
                <select name="project_goal" id="project_goal" class="form-control">
                    <option value="Achieved" {{ $opportunityStatus->project_goal === 'Achieved' ? 'selected' : '' }}>Achieved</option>
                    <option value="Lost" {{ $opportunityStatus->project_goal === 'Lost' ? 'selected' : '' }}>Lost</option>
                </select>
            </div>
        </div>


    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('opportunity_status.index') }}" class="btn btn-danger">Cancel</a>
    </div>


        </form>
    </div>
@endsection






{{-- @extends('layouts.side_nav')

@section('content')
    <h1>Edit Opportunity Status</h1>

    <form action="{{ route('opportunity_status.update', $opportunityStatus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_goal">Project Goal</label>
            <select name="project_goal" id="project_goal" class="form-control">
                <option value="Achieved" {{ $opportunityStatus->project_goal === 'Achieved' ? 'selected' : '' }}>Achieved</option>
                <option value="Lost" {{ $opportunityStatus->project_goal === 'Lost' ? 'selected' : '' }}>Lost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection --}}
