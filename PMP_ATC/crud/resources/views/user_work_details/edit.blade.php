@extends('layouts.side_nav')

@section('content')
    <h1>Edit User Work Detail</h1>
    <form action="{{ route('user_work_details.update', $userWorkDetail) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="project_id">Project:</label>
        <select name="project_id" id="project_id">
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id === $userWorkDetail->project_id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>

        <label for="task_id">Task:</label>
        <select name="task_id" id="task_id">
            {{-- Task options will be populated dynamically based on the selected project using JavaScript --}}
            {{-- Similar to the create.blade.php file, tasks will be populated dynamically --}}
        </select>

        <label for="start_time">Start Time:</label>
        <input type="time" name="start_time" id="start_time" value="{{ $userWorkDetail->start_time }}" required>

        <label for="end_time">End Time:</label>
        <input type="time" name="end_time" id="end_time" value="{{ $userWorkDetail->end_time }}" required>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" rows="3">{{ $userWorkDetail->notes }}</textarea>

        <label for="project_manager">Project Manager:</label>
        <select name="project_manager" id="project_manager">
            @foreach ($projectManagers as $manager)
                <option value="{{ $manager }}" {{ $manager === $userWorkDetail->project_manager ? 'selected' : '' }}>
                    {{ $manager }}
                </option>
            @endforeach
        </select>

        <label for="action">Action:</label>
        <input type="text" name="action" id="action" value="{{ $userWorkDetail->action }}" required>

        <button type="submit">Update</button>
    </form>
@endsection

@section('scripts')
    <script>
        const projectDropdown = document.getElementById('project_id');
        const taskDropdown = document.getElementById('task_id');
        const tasksByProject = @json($projects->pluck('tasks', 'id'));

        projectDropdown.addEventListener('change', updateTaskOptions);

        function updateTaskOptions() {
            const projectId = projectDropdown.value;
            const tasks = tasksByProject[projectId] || [];
            const optionsHtml = tasks.map(task => `<option value="${task.id}">${task.name}</option>`).join('');
            taskDropdown.innerHTML = optionsHtml;
        }

        updateTaskOptions();
    </script>
@endsection
