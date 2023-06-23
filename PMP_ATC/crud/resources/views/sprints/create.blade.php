
@extends('layouts.side_nav') 

@section('pageTitle', 'Project') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('projects.index') }}">Project</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> 
@endsection 

@section('content')

    <h1>Create Sprint</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sprints.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="sprint_name">Sprint Name</label>
            <input type="text" name="sprint_name" id="sprint_name" value="{{ old('sprint_name') }}">
        </div>
        
        <div class="form-group">
            <label for="project_id">Project ID</label>
            <input type="text" name="project_id" id="project_id" value="{{ old('project_id') }}">
        </div>

        <div class="form-group">
            <label for="is_global_sprint">Is Global Sprint</label>
            <select name="is_global_sprint" id="is_global_sprint">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Under discussion">Under discussion</option>
                <option value="Under development">Under development</option>
                <option value="In queue">In queue</option>
                <option value="Not Started">Not Started</option>
                <option value="Pending">Pending</option>
                <option value="Delay">Delay</option>
            </select>
        </div>

        <div class="form-group">
            <label for="assigned_to">Assigned To</label>
            <input type="text" name="assigned_to" id="assigned_to" value="{{ old('assigned_to') }}">
        </div>

        <div class="form-group">
            <label for="assigned_by">Assigned By</label>
            <input type="text" name="assigned_by" id="assigned_by" value="{{ old('assigned_by') }}">
        </div>

        <button type="submit">Create</button>
    </form>

    <a href="{{ route('sprints.index') }}">Back</a>

@endsection


{{-- <h1>Create Sprint</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('sprints.store') }}" method="POST">
    @csrf
    <label for="sprint_name">Sprint Name</label>
    <input type="text" name="sprint_name" id="sprint_name" value="{{ old('sprint_name') }}">
    
    <label for="project_id">Project ID</label>
    <input type="text" name="project_id" id="project_id" value="{{ old('project_id') }}">

    <label for="is_global_sprint">Is Global Sprint</label>
    <select name="is_global_sprint" id="is_global_sprint">
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>

    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">

    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">

    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="Under discussion">Under discussion</option>
        <option value="Under development">Under development</option>
        <option value="In queue">In queue</option>
        <option value="Not Started">Not Started</option>
        <option value="Pending">Pending</option>
        <option value="Delay">Delay</option>
    </select>

    <label for="assigned_to">Assigned To</label>
    <input type="text" name="assigned_to" id="assigned_to" value="{{ old('assigned_to') }}">

    <label for="assigned_by">Assigned By</label>
    <input type="text" name="assigned_by" id="assigned_by" value="{{ old('assigned_by') }}">

    <button type="submit">Create</button>
</form>

<a href="{{ route('sprints.index') }}">Back</a> --}}
