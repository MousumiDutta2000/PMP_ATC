<h1>Edit Project</h1>

@if ($errors->any())
    <div>
        <strong>Validation Errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="project_name">Project Name:</label>
        <input type="text" name="project_name" id="project_name" value="{{ $project->project_name }}" required>
    </div>
    <div>
        <label for="project_type">Project Type:</label>
        <input type="text" name="project_type" id="project_type" value="{{ $project->project_type }}" required>
    </div>
    <div>
        <label for="project_description">Description:</label>
        <input type="text" name="project_description" id="project_description" value="{{ $project->project_description  }}" required>
    </div>
    <div>
        <label for="project_manager">Project Manager:</label>
        <input type="text" name="project_manager" id="project_manager" value="{{ $project->project_manager }}" required>
    </div>
    <div>
        <label for="project_startDate">Project StartDate:</label>
        <input type="text" name="project_startDate" id="project_startDate" value="{{ $project->project_startDate }}" required>
    </div>
    <div>
        <label for="project_endDate">Project EndDate:</label>
        <input type="text" name="project_endDate" id="project_endDate" value="{{ $project->project_endDate }}" required>
    </div>
    <div>
        <label for="client_spoc_name">Client Name:</label>
        <input type="text" name="client_spoc_name" id="client_spoc_name" value="{{ $project->client_spoc_name }}" required>
    </div>
    <div>
        <label for="client_spoc_email">Client Email:</label>
        <input type="email" name="client_spoc_email" id="client_spoc_email" value="{{ $project->client_spoc_email }}" required>
    </div>
    <div>
        <label for="client_spoc_contact">Client Contact:</label>
        <input type="text" name="client_spoc_contact" id="client_spoc_contact" value="{{ $project->client_spoc_contact }}" required>
    </div>
    <div>
        <label for="project_status">Project Status:</label>
        <input type="text" name="project_status" id="project_status" value="{{ $project->project_status }}" required>
    </div>
    <button type="submit">Update</button>
</form>

<a href="{{ route('projects.index') }}">Back</a>
