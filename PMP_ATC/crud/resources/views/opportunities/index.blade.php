
<h1>Opportunities</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('opportunities.create') }}">Create New Opportunity</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Opportunity Status ID</th>
            <th>Proposal</th>
            <th>Initial Stage</th>
            <th>Technical Stage</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($opportunities as $opportunity)
            <tr>
                <td>{{ $opportunity->id }}</td>
                <td>{{ $opportunity->opportunity_status_id }}</td>
                <td>{{ $opportunity->proposal }}</td>
                <td>{{ $opportunity->initial_stage }}</td>
                <td>{{ $opportunity->technical_stage }}</td>
                <td>
                    <a href="{{ route('opportunities.show', $opportunity->id) }}">View</a>
                    <a href="{{ route('opportunities.edit', $opportunity->id) }}">Edit</a>
                    <form method="POST" action="{{ route('opportunities.destroy', $opportunity->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
