<h1>Project</h1>

<a href="{{ route('projects.create') }}">Create project</a>

<table>
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Type</th>
            <th>Description</th>
            <th>Project Manager</th>
            <th>Project StartDate</th>
            <th>Project EndDate</th>
            <th>Client Name</th>
            <th>Client Email</th>
            <th>Client Contact</th>
            <th>Project Status</th>
            <th>Vertical ID</th>
            <th>Technologies ID</th>
            <th>Client ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->project_name }}</td>
            <td>{{ $project->project_type }}</td>
            <td>{{ $project->project_description }}</td>
            <td>{{ $project->project_manager }}</td>
            <td>{{ $project->project_startDate }}</td>
            <td>{{ $project->project_endDate }}</td>
            <td>{{ $project->client_spoc_name }}</td>
            <td>{{ $project->client_spoc_email }}</td>
            <td>{{ $project->client_spoc_contact }}</td>
            <td>{{ $project->project_status }}</td>
            <td>{{ $project->vertical_id }}</td>
            <td>{{ $project->technologies_id }}</td>
            <td>{{ $project->client_id }}</td>
            <td>
                <a href="{{ route('projects.show', $project->id) }}">Show</a>
                <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>