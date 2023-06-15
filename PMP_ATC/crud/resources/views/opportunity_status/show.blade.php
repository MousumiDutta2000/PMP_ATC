<!DOCTYPE html>
<html>
<head>
    <title>Opportunity Status Details</title>
    <!-- Include your CSS and JS files here -->
</head>
<body>
    <h1>Opportunity Status Details</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $opportunityStatus->id }}</td>
            </tr>
            <tr>
                <th>Project Goal</th>
                <td>{{ $opportunityStatus->project_goal }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('opportunity_status.index') }}" class="btn btn-primary">Back to List</a>
</body>
</html>
