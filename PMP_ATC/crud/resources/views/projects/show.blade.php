<h1>Project Details</h1>

<p><strong>Project Name:</strong> {{ $project->project_name }}</p>
<p><strong>Project Type:</strong> {{ $project->project_type }}</p>
<p><strong>Description:</strong> {{ $project->project_description }}</p>
<p><strong>Project Manager:</strong> {{ $project->project_manager }}</p>
<p><strong>Project StartDate:</strong> {{ $project->project_startDate }}</p>
<p><strong>Project EndDate:</strong> {{ $project->project_endDate }}</p>
<p><strong>Client Name:</strong> {{ $project->client_spoc_name }}</p>
<p><strong>Client EmailID:</strong> {{ $project->client_spoc_email }}</p>
<p><strong>Client Contact:</strong> {{ $project->client_spoc_contact }}</p>
<p><strong>Client Status:</strong> {{ $project->project_status }}</p>
<p><strong>Vertical ID:</strong> {{ $project->vertical_id }}</p>

<a href="{{ route('projects.index') }}">Back</a>
