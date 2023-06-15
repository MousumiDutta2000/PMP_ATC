<!DOCTYPE html>
<html>
<head>
    <title>Create Client</title>
</head>
<body>
    <h1>Create Client</h1>

    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <label for="client_name">Client Name:</label>
        <input type="text" name="client_name" id="client_name" required>
        <br>
        <label for="phone_no">Phone Number:</label>
        <input type="text" name="phone_no" id="phone_no" required>
        <br>
        <label for="email_address">Email Address:</label>
        <input type="email" name="email_address" id="email_address" required>
        <br>

        <button type="submit">Create</button>
    </form>

    <a href="{{ route('clients.index') }}">Back to Clients</a>
</body>
</html>
