@extends('layouts.side_nav')

@section('pageTitle', 'Tasks')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('tasks.index') }}">Tasks</a></li>
    <li class="breadcrumb-item">{{ $task->title }}</li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" style="font-size: 15px;">Title</label>
                    <input type="text" name="title" id="title" class="form-control shadow-sm" value="{{ $task->title }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="type" style="font-size: 15px;">Type</label>
                    <select name="type" id="type" class="form-control shadow-sm" required>
                        <option value="feature" {{ $task->type == 'feature' ? 'selected' : '' }}>Feature</option>
                        <option value="user story" {{ $task->type == 'user story' ? 'selected' : '' }}>User Story</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="priority" style="font-size: 15px;">Priority</label>
                    <select name="priority" id="priority" class="form-control shadow-sm" required>
                        <option value="Low priority" {{ $task->priority == 'Low priority' ? 'selected' : '' }}>Low Priority</option>
                        <option value="Med priority" {{ $task->priority == 'Med priority' ? 'selected' : '' }}>Med Priority</option>
                        <option value="High priority" {{ $task->priority == 'High priority' ? 'selected' : '' }}>High Priority</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="attachments" style="font-size: 15px;">Attachments</label>
                <input type="file" name="attachments" id="attachments" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                @if($task->attachments)
                    <p>Current Attachment: <a href="{{ asset('path/to/attachments/'.$task->attachments) }}">{{ $task->attachments }}</a></p>
                @else
                    <p>No Attachment Uploaded.</p>
                @endif
            </div>
            


            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="attachments" style="font-size: 15px;">Attachments</label>
                    <input type="file" name="attachments" id="attachments" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                    @if($task->attachments)
                        <p>Current Attachment: <a href="{{ asset('path/to/attachments/'.$task->attachments) }}">{{ $task->attachments }}</a></p>
                    @else
                        <p>No Attachment Uploaded.</p>
                    @endif
                </div>
            </div> --}}

                      
                <div class="form-group">
                    <label for="details" style="font-size: 15px;">Details</label>
                    <textarea name="details" id="details" class="form-control shadow-sm" required>{{ $task->details }}</textarea>
                </div>
            

            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_to" style="font-size: 15px;">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}" {{ $task->assigned_to == $profile->id ? 'selected' : '' }}>
                                {{ $profile->profile_name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- <input type="text" name="assigned_to" id="assigned_to" class="form-control shadow-sm" value="{{ $task->assigned_to }}" required> --}}
                </div>
            </div>  
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="created_by" style="font-size: 15px;">Created By</label>
                    <select name="created_by" id="created_by" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}" {{ $task->created_by == $profile->id ? 'selected' : '' }}>
                                {{ $profile->profile_name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- <input type="text" name="created_by" id="created_by" class="form-control shadow-sm" value="{{ $task->created_by }}" required> --}}
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_edited_by" style="font-size: 15px;">Last Edited By</label>
                    <select name="last_edited_by" id="last_edited_by" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}" {{ $task->last_edited_by == $profile->id ? 'selected' : '' }}>
                                {{ $profile->profile_name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- <input type="text" name="last_edited_by" id="last_edited_by" class="form-control shadow-sm" value="{{ $task->last_edited_by }}" required> --}}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="estimated_time" style="font-size: 15px;">Estimated Time</label>
                    <div class="input-group">
                        <input type="number" name="estimated_time_number" id="estimated_time_number" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" value="{{ old('estimated_time_number', explode(' ', $task->estimated_time)[0]) }}">
                        <div class="input-group-append">
                            <select name="estimated_time_unit" id="estimated_time_unit" class="form-control shadow-sm" style="height:39px; color: #858585; font-size: 14px;">
                                <option value="hour" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'hour' ? 'selected' : '' }}>Hour</option>
                                <option value="day" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'day' ? 'selected' : '' }}>Day</option>
                                <option value="month" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                        </div>
                    </div>
                </div>        
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="time_taken">Time Taken</label>
                    <div class="input-group">
                        <input type="number" name="time_taken_number" id="time_taken_number" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" value="{{ old('time_taken_number', explode(' ', $task->time_taken)[0]) }}">
                        <div class="input-group-append">
                            <select name="time_taken_unit" id="time_taken_unit" class="form-control shadow-sm" style="height:39px; color: #858585; font-size: 14px;">
                                <option value="hour" {{ old('time_taken_unit', explode(' ', $task->time_taken)[1]) === 'hour' ? 'selected' : '' }}>Hour</option>
                                <option value="day" {{ old('time_taken_unit', explode(' ', $task->time_taken)[1]) === 'day' ? 'selected' : '' }}>Day</option>
                                <option value="month" {{ old('time_taken_unit', explode(' ', $task->time_taken)[1]) === 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ old('time_taken_unit', explode(' ', $task->time_taken)[1]) === 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-md-6">
                <div class="form-group">
                    <label for="status" style="font-size: 15px; ">Status</label>
                    <select name="status" id="status" class="form-controlcl shadow-sm" required>
                        <option value="not started" {{ $task->status == 'not started' ? 'selected' : '' }}>Not Started</option>
                        <option value="ongoing" {{ $task->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="hold" {{ $task->status == 'hold' ? 'selected' : '' }}>Hold</option>
                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
            </div>    

            <div class="col-md-6">
                <div class="form-group">
                    <label for="parent_task" style="font-size: 15px;">Parent Task</label>
                    <select name="parent_task" id="parent_task" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select Task</option>
                        @foreach ($tasks as $task)
                            <option value="{{ $task->id }}" {{ $task->title == $task->id ? 'selected' : '' }}>
                                {{ $task->title }}
                            </option>
                        @endforeach
                        
                    </select>
                    
                </div>
            </div>    

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

