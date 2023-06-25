
@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Project Item Details</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $projectItem->id }}</td>
                </tr>
                <tr>
                    <th>Item Name</th>
                    <td>{{ $projectItem->item_name }}</td>
                </tr>
                <tr>
                    <th>Details</th>
                    <td>{{ $projectItem->details }}</td>
                </tr>
                <tr>
                    <th>Project ID</th>
                    <td>{{ $projectItem->project_id }}</td>
                </tr>
                <tr>
                    <th>Item ID</th>
                    <td>{{ $projectItem->item_id }}</td>
                </tr>
                <tr>
                    <th>Sprint ID</th>
                    <td>{{ $projectItem->sprint_id }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $projectItem->status }}</td>
                </tr>
                <tr>
                    <th>Expected Delivery</th>
                    <td>{{ $projectItem->expected_delivery }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ $projectItem->start_date }}</td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td>{{ $projectItem->end_date }}</td>
                </tr>
                <tr>
                    <th>Assigned To</th>
                    <td>{{ $projectItem->assigned_to }}</td>
                </tr>
                <tr>
                    <th>Assigned By</th>
                    <td>{{ $projectItem->assigned_by }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('project-items.edit', $projectItem->id) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('project-items.destroy', $projectItem->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project item?')">Delete</button>
        </form>
    </div>
@endsection
