
@extends('layouts.side_nav')

@section('content')
    <h1>Edit Task</h1>
   
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="feature" {{ $task->type == 'feature' ? 'selected' : '' }}>Feature</option>
                <option value="user story" {{ $task->type == 'user story' ? 'selected' : '' }}>User Story</option>
            </select>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control" required>
                <option value="Low priority" {{ $task->priority == 'Low priority' ? 'selected' : '' }}>Low Priority</option>
                <option value="Med Priority" {{ $task->priority == 'Med Priority' ? 'selected' : '' }}>Med Priority</option>
                <option value="High priority" {{ $task->priority == 'High priority' ? 'selected' : '' }}>High Priority</option>
            </select>
        </div>

        <div class="form-group">
            <label for="details">Details</label>
            <textarea name="details" id="details" class="form-control" required>{{ $task->details }}</textarea>
        </div>

        <div class="form-group">
            <label for="file_attachments">File Attachments</label>
            <input type="file" name="file_attachments" id="file_attachments" class="form-control">
        </div>

        <div class="form-group">
            <label for="assigned_to">Assigned To</label>
            <input type="text" name="assigned_to" id="assigned_to" class="form-control" value="{{ $task->assigned_to }}" required>
        </div>

        <div class="form-group">
            <label for="last_edited_by">Last Edited By</label>
            <input type="text" name="last_edited_by" id="last_edited_by" class="form-control" value="{{ $task->last_edited_by }}" required>
        </div>

        <div class="form-group">
            <label for="estimated_time">Estimated Time</label>
            <input type="text" name="estimated_time" id="estimated_time" class="form-control" value="{{ $task->estimated_time }}" required>
        </div>

        <div class="form-group">
            <label for="time_taken">Time Taken</label>
            <input type="text" name="time_taken" id="time_taken" class="form-control" value="{{ $task->time_taken }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="not started" {{ $task->status == 'not started' ? 'selected' : '' }}>Not Started</option>
                <option value="ongoing" {{ $task->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="hold" {{ $task->status == 'hold' ? 'selected' : '' }}>Hold</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="parent_task">Parent Task</label>
            <input type="number" name="parent_task" id="parent_task" class="form-control" value="{{ $task->parent_task }}">
        </div>

        <!-- Add other form fields for your fields -->

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
