<!DOCTYPE html>
<html>
<head>
    <title>Client Details</title>
</head>
<body>
    <h1>Client Details</h1>

    <p><strong>ID:</strong> {{ $client->id }}</p>
    <p><strong>Project ID:</strong> {{ $client->project_id }}</p>
   

    <a href="{{ route('clients.index') }}">Back to Clients</a>
</body>
</html>
