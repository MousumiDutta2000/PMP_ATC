@extends('layouts.side_nav') 

@section('pageTitle', 'Project_Items') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project-items.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('sprints.index') }}">Project-items</a></li>
<li class="breadcrumb-item">{{ $projectItem->item_name }}</li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection 


@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
@endsection 

<!-- Include necessary scripts here -->

@section('project_js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/project.js') }}"></script>
@endsection

@section('content')

<div class="form-container">
    <form action="{{ route('project-items.update', $projectItem->id) }}" method="POST" class="form">
        @csrf 
        @method('PUT') 

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="item_name" style="font-size: 15px;">Item Name</label>
                <input type="text" name="item_name" id="item_name" class="form-controlcl shadow-sm" value="{{ $projectItem->item_name }}" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="status" style="font-size: 15px;">Status</label>
                <select name="status" id="status" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                    <option value="Under discussion" {{ $projectItem->status == 'Under discussion' ? 'selected' : '' }}>Under discussion</option>
                    <option value="Under development" {{ $projectItem->status == 'Under development' ? 'selected' : '' }}>Under development</option>
                    <option value="In queue" {{ $projectItem->status == 'In queue' ? 'selected' : '' }}>In queue</option>
                    <option value="Not Started" {{ $projectItem->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                    <option value="Pending" {{ $projectItem->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Delay" {{ $projectItem->status == 'Delay' ? 'selected' : '' }}>Delay</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="details" style="font-size: 15px;">Details</label>
                <textarea name="details" id="details" class="form-control shadow-sm" required>{{ $projectItem->details }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="project_id" style="font-size: 15px;">Project ID</label>
                <select name="project_id" id="project_id" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $projectItem->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->project_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="item_id" style="font-size: 15px;">Item ID</label>
                <select name="item_id" id="item_id" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}" {{ $projectItem->status == $status->id ? 'selected' : '' }}>
                            {{ $status->status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="sprint_id" style="font-size: 15px;">Sprint ID</label>
                <select name="sprint_id" id="sprint_id" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                    <option value="">Select Sprint</option>
                    @foreach($sprints as $sprint)
                    <option value="{{ $sprint->id }}" {{ $projectItem->sprint_id == $sprint->id ? 'selected' : '' }}>
                        {{ $sprint->sprint_name }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="expected_delivery" style="font-size: 15px;">Expected Delivery</label>
                    <input type="date" name="expected_delivery" id="expected_delivery" class="form-control shadow-sm" value="{{ $projectItem->expected_delivery }}" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date" style="font-size: 15px;">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control shadow-sm" value="{{ $projectItem->start_date }}" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                </div>
            </div>       
            
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <div class="form-group">
                        <label for="end_date" style="font-size: 15px;">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control shadow-sm" value="{{ $projectItem->end_date }}" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                    </div>
                </div>
        
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_to" style="font-size: 15px;">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $sprint->assigned_to == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_by" style="font-size: 15px;">Assigned By</label>
                    <select name="assigned_by" id="assigned_by" class="form-controlcl shadow-sm"  style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $sprint->assigned_by == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>


        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('project-items.index') }}" class="btn btn-danger">Cancel</a>
        </div>
        
    </form>

</div>

@endsection

