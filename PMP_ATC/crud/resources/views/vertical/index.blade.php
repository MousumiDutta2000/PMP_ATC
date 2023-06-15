<!-- resources/views/vertical/index.blade.php -->

<h1>Verticals</h1>

<a href="{{ route('verticals.create') }}">Create Vertical</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Head Name</th>
            <th>Head Email</th>
            <th>Head Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($verticals as $vertical)
        <tr>
            <td>{{ $vertical->vertical_name }}</td>
            <td>{{ $vertical->vertical_head_name }}</td>
            <td>{{ $vertical->vertical_head_emailId }}</td>
            <td>{{ $vertical->vertical_head_contact }}</td>
            <td>
                <a href="{{ route('verticals.show', $vertical->id) }}">Show</a>
                <a href="{{ route('verticals.edit', $vertical->id) }}">Edit</a>
                <form action="{{ route('verticals.destroy', $vertical->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
