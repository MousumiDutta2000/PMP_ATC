<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
</head>
<body>
    <h1>Edit Client</h1>

    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        @csrf
        @method('PUT')

        <label for="project_id">Project ID:</label>
        <input type="text" name="project_id" id="project_id" value="{{ $client->project_id }}" required>
        {{-- Add other fields as needed --}}

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('clients.index') }}">Back to Clients</a>
</body>
</html>
