<!DOCTYPE html>
<html>
<head>
    <title>Clients</title>
</head>
<body>
    <h1>Clients</h1>

    @if($clients->isEmpty())
        <p>No clients found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project ID</th>
                    {{-- Add other column headings --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->project_id }}</td>
                        {{-- Display other client fields --}}
                        <td>
                            <a href="{{ route('clients.edit', $client->id) }}">Edit</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('clients.create') }}">Create Client</a>
</body>
</html>
