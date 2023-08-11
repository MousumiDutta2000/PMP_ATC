@extends('layouts.side_nav')

@section('content')

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="form-container w-100">
        <h5>Create User Work Detail</h5>
        <form action="{{ route('user_work_details.store') }}" method="POST">
            @csrf
            <div class="row shadow">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="project_id">Project:</label>
                        <select name="project_id" id="project_id" class="form-control">
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="task_id">Task:</label>
                        <select name="task_id" id="task_id" class="form-control">
                            <option value="">Select Task</option>
                            @foreach ($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="start_time">Start Time:</label>
                        <input type="time" name="start_time" id="start_time" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="end_time">End Time:</label>
                        <input type="time" name="end_time" id="end_time" class="form-control" required>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label for="notes">Notes:</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
                </div>


                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-4 mb-2 ml-auto">Save</button>
                </div>
        </form>
    </div>
</div>
@endsection

@section('custom_css')
<style>
/* Add a media query for screens with a maximum width of 576px (adjust as needed) */
@media (max-width: 576px) {
    .form-container {
        width: 90%; /* Reduce the width for smaller screens */
    }
}
</style>
@endsection

@section('custom_js')
@endsection