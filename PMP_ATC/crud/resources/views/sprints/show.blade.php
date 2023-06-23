@extends('layouts.side_nav')

@section('content')
    <h1>Sprint Details</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $sprint->id }}</td>
            </tr>
            <tr>
                <th>Sprint Name</th>
                <td>{{ $sprint->sprint_name }}</td>
            </tr>
            <tr>
                <th>Project ID</th>
                <td>{{ $sprint->project_id }}</td>
            </tr>
            <tr>
                <th>Is Global Sprint</th>
                <td>{{ $sprint->is_global_sprint }}</td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td>{{ $sprint->start_date }}</td>
            </tr>
            <tr>
                <th>End Date</th>
                <td>{{ $sprint->end_date }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $sprint->status }}</td>
            </tr>
            <tr>
                <th>Assigned To</th>
                <td>{{ $sprint->assigned_to }}</td>
            </tr>
            <tr>
                <th>Assigned By</th>
                <td>{{ $sprint->assigned_by }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('sprints.index') }}" class="btn btn-primary">Back to List</a>
@endsection
