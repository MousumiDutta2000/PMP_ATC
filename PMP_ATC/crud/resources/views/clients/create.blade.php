<!DOCTYPE html>
<html>
<head>
    <title>Create Client</title>
</head>
<body>
    <h1>Create Client</h1>

    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <label for="project_id">Project ID:</label>
        <input type="text" name="project_id" id="project_id" required>
        {{-- Add other fields as needed --}}

        <button type="submit">Create</button>
    </form>

    <a href="{{ route('clients.index') }}">Back to Clients</a>
</body>
</html>
