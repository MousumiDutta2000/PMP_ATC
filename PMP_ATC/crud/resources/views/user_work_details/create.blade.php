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

<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="form-container">
        <h5>Create User Work Detail</h5>
        <form action="{{ route('user_work_details.store') }}" method="POST">
            @csrf
            <div class="row shadow">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="project_id">Project:</label>
                        <select name="project_id" id="project_id" class="form-control" onchange="onchangeDropdown(this.value);">
                            <option value="">Select Project</option>
                            @foreach ($distinctProjectIds as $projectId)
                                @php
                                    $project = App\Models\Project::find($projectId);
                                @endphp
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
                                <option value="{{ $task->id }}" data-project-id="{{ $task->projectTaskStatus->project_id }}">
                                    {{ $task->title }}
                                </option>
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

                <div>
                    <div class="form-group mt-2">
                        <label for="work_type_id">Work Type:</label>
                        <select name="work_type_id" id="work_type_id" class="form-control" required>
                            <option value="">Select Work Type</option>
                            @foreach ($workTypes as $workType)
                                <option value="{{ $workType->id }}">{{ $workType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label for="notes">Notes:</label>
                    <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-4 mb-2 ml-auto">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection



@section('custom_css')
<style>
/* Media query for screens with a maximum width of 576px */
@media (max-width: 576px) {
    .form-container {
        width: 90%; /* Reduce the width for smaller screens */
    }
}

/* Media query for screens with a maximum width of 720px (Samsung Galaxy A51/A71) */
@media (max-width: 720px) {
    .form-container {
        width: 90%; /* Further reduce the width for medium-sized screens */
    }
}

/* Media query for screens with a maximum width of 768px */
@media (max-width: 768px) {
    .form-container {
        width: 80%; /* Further reduce the width for small tablets */
    }
}

/* Media query for screens with a maximum width of 992px */
@media (max-width: 992px) {
    .container {
        padding: 15px; /* Add padding to the container for medium-sized screens */
    }

    .form-container {
        width: 70%; /* Reduce the width for medium-sized screens */
    }
}

/* Media query for screens with a maximum width of 1200px */
@media (max-width: 1200px) {
    .form-container {
        width: 60%; /* Reduce the width for large screens */
    }
}

/* Media query for screens with a minimum width of 1201px (large screens) */
@media (min-width: 1201px) {
    .container {
        padding: 30px; /* Increase padding for large screens */
    }

    .form-container {
        width: 50%; /* Adjust the width for large screens */
    }
}
</style>
@endsection

@section('custom_js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function onchangeDropdown(projectId) {
        var taskDropdown = document.getElementById('task_id');
        taskDropdown.innerHTML = '<option value="">Select Task</option>'; // Reset tasks dropdown

        if (projectId) {
            jQuery.ajax({
                method: "POST",
                url: '/get-tasks/' + projectId,
                data: {"_token": "{{ csrf_token() }}"}
            })
            .done(function(data) {
                if (data.length > 0) {
                    data.forEach(task => {                        
                        var option = document.createElement('option');
                        option.value = task.id;
                        option.text = task.title;
                        taskDropdown.appendChild(option);
                    });
                } else {
                    var option = document.createElement('option');
                    option.value = "";
                    option.text = "No tasks available for this project";
                    taskDropdown.appendChild(option);
                }
            });
        }
    }
</script>
@endsection
