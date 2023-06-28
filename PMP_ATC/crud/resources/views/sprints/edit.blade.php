@extends('layouts.side_nav') 

@section('pageTitle', 'Sprints') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('sprints.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('sprints.index') }}">Sprints</a></li>
<li class="breadcrumb-item">{{ $sprint->sprint_name }}</li>
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
  <form action="{{ route('sprints.update', $sprint->id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="sprint_name">Sprint Name:</label>
                <input type="text" name="sprint_name" id="sprint_name" class="form-control" value="{{ old('sprint_name', $sprint->sprint_name) }}">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="is_global_sprint">Is Global Sprint:</label>
                <select name="is_global_sprint" id="is_global_sprint" class="form-control">
                  <option value="yes" {{ $sprint->is_global_sprint === 'yes' ? 'selected' : '' }}>Yes</option>
                  <option value="no" {{ $sprint->is_global_sprint === 'no' ? 'selected' : '' }}>No</option>
                </select>
              </div>
            </div>

        
            <div class="col-md-6">
              <div class="form-group">
                <label for="project_id">Project ID:</label>
                <input type="text" name="project_id" id="project_id" class="form-control" value="{{ old('project_id', $sprint->project_id) }}">
              </div> 
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                  <option value="Under discussion" {{ $sprint->status === 'Under discussion' ? 'selected' : '' }}>Under discussion</option>
                  <option value="Under development" {{ $sprint->status === 'Under development' ? 'selected' : '' }}>Under development</option>
                  <option value="In queue" {{ $sprint->status === 'In queue' ? 'selected' : '' }}>In queue</option>
                  <option value="Not Started" {{ $sprint->status === 'Not Started' ? 'selected' : '' }}>Not Started</option>
                  <option value="Pending" {{ $sprint->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                  <option value="Delay" {{ $sprint->status === 'Delay' ? 'selected' : '' }}>Delay</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $sprint->start_date) }}" required="required">
              </div>        
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $sprint->end_date) }}" required="required">
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="assigned_to">Assigned To:</label>
                <input type="text" name="assigned_to" id="assigned_to" class="form-control" value="{{ old('assigned_to', $sprint->assigned_to) }}">
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label for="assigned_by">Assigned By:</label>
                <input type="text" name="assigned_by" id="assigned_by" class="form-control" value="{{ old('assigned_by', $sprint->assigned_by) }}">
              </div>
            </div>

                
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{ route('sprints.index') }}" class="btn btn-danger">Cancel</a>
          </div>
  
      
    </form>

</div>

@endsection



