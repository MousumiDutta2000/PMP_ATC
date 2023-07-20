
@extends('layouts.side_nav')

@section('content')
    <h1>Task Details</h1>
   
    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $task->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $task->title }}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{ $task->type }}</td>
            </tr>
            <tr>
                <th>Priority</th>
                <td>{{ $task->priority }}</td>
            </tr>
            <tr>
                <th>Details</th>
                <td>{{ $task->details }}</td>
            </tr>
            <tr>
                <th>File Attachments</th>
                <td>{{ $task->file_attachments }}</td>
            </tr>
            <tr>
                <th>Assigned To</th>
                <td>{{ $task->assigned_to }}</td>
            </tr>
            <tr>
                <th>Last Edited By</th>
                <td>{{ $task->last_edited_by }}</td>
            </tr>
            <tr>
                <th>Estimated Time</th>
                <td>{{ $task->estimated_time }}</td>
            </tr>
            <tr>
                <th>Time Taken</th>
                <td>{{ $task->time_taken }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $task->status }}</td>
            </tr>
            <tr>
                <th>Parent Task</th>
                <td>{{ $task->parent_task }}</td>
            </tr>
            <tr>
                <th>Last Edited</th>
                <td>{{ $task->updated_at }}</td>
            </tr>
            <!-- Add other table rows for your fields -->
        </tbody>
    </table>

    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
