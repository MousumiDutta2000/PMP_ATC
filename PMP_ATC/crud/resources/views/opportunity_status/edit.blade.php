<!DOCTYPE html>
<html>
<head>
    <title>Edit Opportunity Status</title>
    <!-- Include your CSS and JS files here -->
</head>
<body>
    <h1>Edit Opportunity Status</h1>

    <form action="{{ route('opportunity_status.update', $opportunityStatus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_goal">Project Goal</label>
            <select name="project_goal" id="project_goal" class="form-control">
                <option value="Achieved" {{ $opportunityStatus->project_goal === 'Achieved' ? 'selected' : '' }}>Achieved</option>
                <option value="Lost" {{ $opportunityStatus->project_goal === 'Lost' ? 'selected' : '' }}>Lost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
