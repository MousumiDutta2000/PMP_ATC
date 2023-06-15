<!DOCTYPE html>
<html>
<head>
    <title>Create Opportunity Status</title>
    <!-- Include your CSS and JS files here -->
</head>
<body>
    <h1>Create Opportunity Status</h1>

    <form action="{{ route('opportunity_status.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_goal">Project Goal</label>
            <select name="project_goal" id="project_goal" class="form-control">
                <option value="Achieved">Achieved</option>
                <option value="Lost">Lost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</body>
</html>
