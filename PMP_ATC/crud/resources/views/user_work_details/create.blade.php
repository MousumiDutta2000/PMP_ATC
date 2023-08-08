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

<div class="form-container w-50">
    <h5>Create User Work Detail</h5>
    <form action="{{ route('user_work_details.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
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
                <div class="form-group">
                    <label for="task_id">Task:</label>
                    <select name="task_id" id="task_id" class="form-control">
                        {{-- Task options will be populated dynamically based on the selected project using JavaScript --}}
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_time">Start Time:</label>
                    <input type="time" name="start_time" id="start_time" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_time">End Time:</label>
                    <input type="time" name="end_time" id="end_time" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_manager">Project Manager:</label>
                    <select name="project_manager" id="project_manager" class="form-control">
                        {{-- Project manager options will be populated dynamically based on the selected project using JavaScript --}}
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection

@section('scripts')
    <script>
        const projectDropdown = document.getElementById('project_id');
        const projectManagerDropdown = document.getElementById('project_manager');
        const tasksByProject = @json($projects->pluck('tasks', 'id'));
        const projectManagersByProject = @json($projects->pluck('project_manager', 'id'));

        projectDropdown.addEventListener('change', updateTaskAndProjectManagerOptions);

        function updateTaskAndProjectManagerOptions() {
            const projectId = projectDropdown.value;
            const tasks = tasksByProject[projectId] || [];
            const optionsHtml = tasks.map(task => `<option value="${task.id}">${task.name}</option>`).join('');
            taskDropdown.innerHTML = optionsHtml;

            const projectManager = projectManagersByProject[projectId] || '';
            projectManagerDropdown.value = projectManager;
        }

        updateTaskAndProjectManagerOptions();
    </script>
@endsection
