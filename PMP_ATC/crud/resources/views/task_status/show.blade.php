@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Task Type</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $TaskStatus->id }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>$TaskStatus->status</td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td>{{ $TaskStatus->level }}</td>
                </tr>

            </tbody>
        </table>
        <a href="{{ route('task_status.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
