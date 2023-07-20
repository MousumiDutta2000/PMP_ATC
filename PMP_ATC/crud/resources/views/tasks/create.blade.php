@extends('layouts.side_nav') 

@section('pageTitle', 'Tasks') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('tasks.index') }}">Tasks</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
@endsection 

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/profiles.js') }}"></script>
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
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control shadow-sm" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="type" style="font-size: 15px;">Type</label>
                    <select name="type" id="type" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <option value="" selected="selected" disabled="disabled">Select type</option>
                        <option value="Feature">Feature</option>
                        <option value="User story">User story</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="priority" style="font-size: 15px;">Priority</label>
                    <select name="priority" id="priority" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <option value="" selected="selected" disabled="disabled">Select priority</option>
                        <option value="Low priority">Low priority</option>
                        <option value="Med priority">Med priority</option>
                        <option value="High priority">High priority</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="details" style="font-size: 15px;">Details</label>
                    <textarea name="details" id="details" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="attachments"  style="font-size: 15px;">Attachments</label>
                    <input type="file" name="attachments" id="attachments" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;"">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_to" style="font-size: 15px;">Assigned To</label>
                    <input type="text" name="assigned_to" id="assigned_to" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="created_by" style="font-size: 15px;">Created By</label>
                    <input type="text" name="created_by" id="created_by" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                </div>

            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="last_edited_by" style="font-size: 15px;">Last Edited By</label>
                <input type="text" name="last_edited_by" id="last_edited_by" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
            </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="estimated_time" style="font-size: 15px;">Estimated Time</label>
                    <input type="datetime-local" name="estimated_time" id="estimated_time" class="form-control shadow-sm"  style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                </div>        
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="time_taken">Time Taken</label>
                    <input type="datetime-local" name="time_taken" id="time_taken" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                </div>
            </div>
            
          
<div class="col-md-6">
    <div class="form-group">
        <label for="status" style="font-size: 15px;">Status</label>
        <select name="status" id="status" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
            <option value="" selected disabled>Select status</option>
            <option value="notstarted">Not started</option>
            <option value="ongoing">Ongoing</option>
            <option value="hold">Hold</option>
            <option value="completed">Completed</option>
        </select>
    </div>
</div>

        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="parent_task" style="font-size: 15px;">Parent Task</label>
                    <input type="number" name="parent_task" id="parent_task" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                    {{-- <select name="parent_task" id="parent_task" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select> --}}
                </div>
            </div>

           

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection

