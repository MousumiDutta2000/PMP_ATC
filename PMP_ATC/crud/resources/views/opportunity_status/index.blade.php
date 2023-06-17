@extends('layouts.side_nav')

@section('content')
    <h1>Opportunity Statuses</h1>

    <a href="{{ route('opportunity_status.create') }}" class="btn btn-primary">Create New</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Goal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($opportunityStatuses as $opportunityStatus)
                <tr>
                    <td>{{ $opportunityStatus->id }}</td>
                    <td>{{ $opportunityStatus->project_goal }}</td>
                    <td>
                        <a href="{{ route('opportunity_status.edit', $opportunityStatus->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('opportunity_status.destroy', $opportunityStatus->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this opportunity status?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
