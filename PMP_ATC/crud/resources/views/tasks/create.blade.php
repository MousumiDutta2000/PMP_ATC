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
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="sprint_id" style="font-size: 15px;">Sprint ID:</label>
                    <select name="sprint_id" id="sprint_id" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select Sprint</option>
                        @foreach ($sprints as $sprint)
                            <option value="{{ $sprint->id }}">{{ $sprint->sprint_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="type" style="font-size: 15px;">Type</label>
                    <select name="type" id="type" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <option value="" selected="selected" disabled="disabled">Select type</option>
                        @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->task_type_id }}</option>
                    @endforeach
                        {{-- <option value="Feature">Feature</option>
                        <option value="User story">User story</option> --}}
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

            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="attachments"  style="font-size: 15px;">Attachments</label>
                    <input type="file" name="attachments" id="attachments" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;"">
                </div>
            </div> --}}

            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_to" style="font-size: 15px;">Assigned To</label>
                    {{-- <input type="text" name="assigned_to" id="assigned_to" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required> --}}
                    <select name="assigned_to" id="assigned_to" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select User</option>
                        @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->profile_name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="created_by" style="font-size: 15px;">Created By</label>
                    {{-- <input type="text" name="created_by" id="created_by" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required> --}}
                    <select name="created_by" id="created_by" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select User</option>
                        @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->profile_name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="last_edited_by" style="font-size: 15px;">Last Edited By</label>
                {{-- <input type="text" name="last_edited_by" id="last_edited_by" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required> --}}
                <select name="last_edited_by" id="last_edited_by" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                    <option value="">Select User</option>
                    @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}">{{ $profile->profile_name }}</option>
                    @endforeach
                </select>
            </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="estimated_time" style="font-size: 15px;">Estimated Time</label>
                    <div class="input-group">
                        <input type="number" name="estimated_time_number" id="estimated_time_number" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <div class="input-group-append">
                            <select name="estimated_time_unit" id="estimated_time_unit" class="form-control shadow-sm" style="height:39px; color: #858585; font-size: 14px;">
                                <option value="hour">Hour</option>
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </div>
                    </div>
                </div>        
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="time_taken">Time Taken</label>
                    <div class="input-group">
                        <input type="number" name="time_taken_number" id="time_taken_number" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <div class="input-group-append">
                            <select name="time_taken_unit" id="time_taken_unit" class="form-control shadow-sm" style="height:39px; color: #858585; font-size: 14px;">
                                <option value="hour">Hour</option>
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
          
<div class="col-md-6">
    <div class="form-group">
        <label for="status" style="font-size: 15px;">Status</label>
        <select name="status" id="status" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
            <option value="" selected disabled>Select status</option>
            <option value="ToDo">ToDo</option>
            <option value="In Progress">In Progress</option>
            <option value="Done">Done</option>
        </select>
    </div>
</div>

        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="parent_task" style="font-size: 15px;">Parent Task</label>
                    <select name="parent_task" id="parent_task" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <option value="">Select Task</option>
                        @foreach ($tasks as $task)
                            <option value="{{ $task->id }}">{{ $task->title }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>

           

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection

