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
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_name">Project Name</label>
                    <input type="text" name="project_name" id="project_name" required="required"></div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="typeSelect">Project Type</label>
                    <select id="typeSelect" name="project_type" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                <option value="" selected="selected" disabled="disabled">Type</option>
                <option>Internal</option>
                <option>External</option>
            </select>
                </div>
            </div>

            <div class="form-group">
                <label for="project_description">Description</label>
                <textarea class="ckeditor form-control" name="project_description" id="project_description" required="required"></textarea>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_startDate">Project Start Date</label>
                    <input type="date" name="project_startDate" id="project_startDate" required="required"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_endDate">Project End Date</label>
                    <input type="date" name="project_endDate" id="project_endDate" required="required"></div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_manager">Project Manager</label>
                    <input type="text" name="project_manager" id="project_manager" required="required">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="statusSelect">Status</label>
                    <select id="statusSelect" name="project_status" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
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
                <div class="form-group">
                    <label for="vertical_id">Vertical</label>
                    {{-- <select id="vertical_id" name="project_status" required="required">
                    <option value="" selected="selected" disabled="disabled">Vertical</option>
                    <option>Vertical 1</option>
                    <option>Vertical 2</option>
                    <option>Vertical 3</option>
                    </select>
                </div> --}}

                 <input type="text" name="vertical_id" id="vertical_id" required="required"></div> 
            </div>

            <hr>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_id">Client</label>
                    {{-- <select id="client_id" name="project_status" required="required">
                    <option value="" selected="selected" disabled="disabled">Client</option>
                    <option>Client 1</option>
                    <option>Client 1</option>
                    <option>Client 1</option>
                    </select>
                </div> --}}
                 <input type="text" name="clients_id" id="client_id" required="required"></div> -->
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_name">Client Name [SPOC]</label>
                    <input type="text" name="client_spoc_name" id="client_spoc_name" required="required">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_email">Client Email [SPOC]</label>
                    <input type="email" name="client_spoc_email" id="client_spoc_email" required="required">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_contact">Client Contact [SPOC]</label>
                    <input type="text" name="client_spoc_contact" id="client_spoc_contact" required="required">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label for="technologies_id">Technologies</label>
                <textarea name="technologies_id" id="technologies_id" required="required"></textarea>
            </div>

            <div class="col-md-6 mb-3" style="margin-top:-13px;">
                <label for="memberInput" class="form-label">Member</label>
                <i class="fa fa-plus-circle" id="plusSign" style="color: #7d4287;"></i>
                <div id="memberInputSection" style="display: none;">
                    <input type="text" id="memberInput" placeholder="Enter members">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

<script>
    const plusSign = document.getElementById("plusSign");
    const memberInputSection = document.getElementById("memberInputSection");
    plusSign.addEventListener("click", () => {
        memberInputSection.style.display = memberInputSection.style.display === "none" ? "block" : "none";
    });
</script>

<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('project_description', {
            toolbar: 'Basic',
            contentsCss: '{{ asset('
            css / project.css ') }}',
        });
    });
</script>
@endsection