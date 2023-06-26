@extends('layouts.side_nav') 

@section('pageTitle', 'Sprints') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('sprints.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('sprints.index') }}">Sprints</a></li>
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
    <form action="{{ route('sprints.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sprint_name">Sprint Name</label>
                    <input type="text" name="sprint_name" id="sprint_name" value="{{ old('sprint_name') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="is_global_sprint">Is Global Sprint</label>
                    <select name="is_global_sprint" id="is_global_sprint">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_id">Project ID</label>
                    <input type="text" name="project_id" id="project_id" value="{{ old('project_id') }}">
                </div>  
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="Under discussion">Under discussion</option>
                        <option value="Under development">Under development</option>
                        <option value="In queue">In queue</option>
                        <option value="Not Started">Not started</option>
                        <option value="Pending">Pending</option>
                        <option value="Delay">Delay</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">
                </div>        
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="assigned_to">Assigned To</label>
                    <input type="text" name="assigned_to" id="assigned_to" value="{{ old('assigned_to') }}">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_by">Assigned By</label>
                    <input type="text" name="assigned_by" id="assigned_by" value="{{ old('assigned_by') }}">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('sprints.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection
