@extends('layouts.side_nav') 

@section('pageTitle', 'Project') 

@section('breadcrumb')
<li class="breadcrumb-item">{{ $project->project_name }}</li>
<li class="breadcrumb-item active" aria-current="page">Settings</li>

@endsection @section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> 
@endsection 

@section('content')

<div class="form-container">
    <form action="{{ route('projects.updateSettings', $project->id) }}" method="POST" class="form">
        @csrf 
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="projectIdInput" class="form-label">Project ID</label>
                <input type="text" id="projectIdInput" class="form-control" name="project_id" value="{{ $project->id }}" required="required">
            </div>

            <div class="col-md-6 mb-3">
                <label for="projectNameInput" class="form-label">Project Name</label>
                <input type="text" id="projectNameInput" class="form-control" name="project_name" value="{{ $project->project_name }}" required="required">
            </div>


            <div class="mb-3">
                <label for="projectDescriptionInput" class="form-label">Project Description</label>
                <textarea class="ckeditor form-control" name="project_description" id="project_description" required="required" placeholder="Describe the project">{{ $project->project_description }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="projectStartInput" class="form-label">Project Start</label>
                <input type="date" id="projectStartInput" class="form-control" name="project_start" value="{{ $project->project_startDate }}" required="required">
            </div>

            <div class="col-md-6 mb-3">
                <label for="projectEndInput" class="form-label">Project End</label>
                <input type="date" id="projectEndInput" class="form-control" name="project_end" value="{{ $project->project_endDate }}" required="required">
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="statusSelect" class="form-label">Status</label>
                        <select id="statusSelect" name="status" class="form-select" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                            <option value="" selected="selected" disabled="disabled">Status</option>
                            <option>Not Started</option>
                            <option>Delay</option>
                            <option>Pending</option>
                            <option>Ongoing</option>
                            <option>Completed</option>
                        </select>
                </div>        
            </div>

            <div class="col-md-6 mb-3">
                <label for="memberInput" class="form-label" style="height:20px;">Member</label>
                <i class="fa fa-plus-circle" id="plusSign" style="color: #7d4287;"></i>
                <div id="memberInputSection" style="display: none;">
                    <input type="text" id="memberInput" placeholder="Enter members">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>

<script>
    // Get the plus sign element
    const plusSign = document.getElementById("plusSign");

    // Get the member input section element
    const memberInputSection = document.getElementById("memberInputSection");

    // Add click event listener to the plus sign
    plusSign.addEventListener("click", () => {
        // Toggle the display of the member input section
        memberInputSection.style.display = memberInputSection.style.display === "none" ? "block" : "none";
    });
</script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection