@extends('layouts.side_nav')

@section('pageTitle', 'Sprints')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('sprints.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sprints</li>
@endsection

@section('custom_css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
@endsection

@section('content')
<main class="container">
    <section class="body">
        <div class="titlebar">
            <a href="{{ route('sprints.create') }}" class="btn btn-primary">Create New Sprint</a>
        </div>
        @if ($sprints->count() > 0)
            <table id="sprint-table" class="table table-hover responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sprint Name</th>
                        <th>Project ID</th>
                        <th>Is Global Sprint</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Assigned By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sprints as $sprint)
                        <tr>
                            <td>{{ $sprint->id }}</td>
                            <td>{{ $sprint->sprint_name }}</td>
                            <td>{{ $sprint->project_id }}</td>
                            <td>{{ $sprint->is_global_sprint }}</td>
                            <td>{{ $sprint->start_date }}</td>
                            <td>{{ $sprint->end_date }}</td>
                            <td>{{ $sprint->status }}</td>
                            <td>{{ $sprint->assigned_to }}</td>
                            <td>{{ $sprint->assigned_by }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('sprints.show', ['sprint' => $sprint->id]) }}">
                                        <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                    </a>
                                    <a href="{{ route('sprints.edit', ['sprint' => $sprint->id]) }}">
                                        <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                    </a>
                                    <form method="post" action="{{ route('sprints.destroy', ['sprint' => $sprint->id]) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0">
                                            <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No sprints found.</p>
        @endif
    </section>
</main>
@endsection


{{-- <h1>Sprints</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('sprints.create') }}">Create New Sprint</a>

@if ($sprints->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sprint Name</th>
                <th>Project ID</th>
                <th>Is Global Sprint</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Assigned By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sprints as $sprint)
                <tr>
                    <td>{{ $sprint->id }}</td>
                    <td>{{ $sprint->sprint_name }}</td>
                    <td>{{ $sprint->project_id }}</td>
                    <td>{{ $sprint->is_global_sprint }}</td>
                    <td>{{ $sprint->start_date }}</td>
                    <td>{{ $sprint->end_date }}</td>
                    <td>{{ $sprint->status }}</td>
                    <td>{{ $sprint->assigned_to }}</td>
                    <td>{{ $sprint->assigned_by }}</td>
                    <td>
                        <a href="{{ route('sprints.show', $sprint->id) }}">View</a>
                        <a href="{{ route('sprints.edit', $sprint->id) }}">Edit</a>
                        <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No sprints found.</p>
@endif --}}
