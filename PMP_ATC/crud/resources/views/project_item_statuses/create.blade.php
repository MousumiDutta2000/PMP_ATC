@extends('layouts.side_nav') 

@section('pageTitle', 'Project_Item_Statuses') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project_item_statuses.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('project_item_statuses.index') }}">Project_Item_Statuses</a></li>
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
    <form action="{{ route('project_item_statuses.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- <div class="col-md-6"> --}}
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Under discussion">Under discussion</option>
                        <option value="Under development">Under development</option>
                        <option value="In queue">In queue</option>
                        <option value="Not Started">Not Started</option>
                        <option value="Pending">Pending</option>
                        <option value="Delay">Delay</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            {{-- </div> --}}

           

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection






{{-- @extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h2>Create New Project Item Status</h2>
        <form action="{{ route('project_item_statuses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Under discussion">Under discussion</option>
                    <option value="Under development">Under development</option>
                    <option value="In queue">In queue</option>
                    <option value="Not Started">Not Started</option>
                    <option value="Pending">Pending</option>
                    <option value="Delay">Delay</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection --}}
