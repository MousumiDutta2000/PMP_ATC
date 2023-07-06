@extends('layouts.side_nav') 

@section('pageTitle', 'Project_Item_Statuses') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project_item_statuses.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('project_item_statuses.index') }}">Project_Item_Statuses</a></li>
<li class="breadcrumb-item">{{ $projectItemStatus->status }}</li>
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
  <form action="{{ route('project_item_statuses.update', $projectItemStatus->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="status" style="font-size: 15px;">Status</label>
                <select name="status" id="status" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                    <option value="Under discussion" {{ $projectItemStatus->status === 'Under discussion' ? 'selected' : '' }}>Under discussion</option>
                    <option value="Under development" {{ $projectItemStatus->status === 'Under development' ? 'selected' : '' }}>Under development</option>
                    <option value="In queue" {{ $projectItemStatus->status === 'In queue' ? 'selected' : '' }}>In queue</option>
                    <option value="Not Started" {{ $projectItemStatus->status === 'Not Started' ? 'selected' : '' }}>Not Started</option>
                    <option value="Pending" {{ $projectItemStatus->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Delay" {{ $projectItemStatus->status === 'Delay' ? 'selected' : '' }}>Delay</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('project_item_statuses.index') }}" class="btn btn-danger">Cancel</a>
        </div>

        </form>
    </div>
@endsection
