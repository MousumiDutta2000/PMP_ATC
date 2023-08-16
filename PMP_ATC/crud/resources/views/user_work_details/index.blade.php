@extends('layouts.side_nav')

@section('pageTitle', 'Work Details')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Work Details</li>
@endsection

@section('custom_css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
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
    <section>
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -67px; margin-bottom: 50px; padding: 2px 30px; margin-right: -30px;">
            <a href="{{ route('user_work_details.create') }}" class="btn btn-primary">Add Work</a>
        </div>
        <div>
            <table id="profileTable" class="table table-hover responsive table-sm" style="width: 100%;border-spacing: 0 10px;">
                <thead style="border-radius:7px">
                <tr>
                    <th>Project Name</th>
                    <th>Task Name</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Work Type</th>
                    <th>Notes</th>
                    <th>Project Manager</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($userWorkDetails as $userWorkDetail)
                        <tr>
                            <td>{{ $userWorkDetail->project->project_name }}</td>
                            <td>{{ $userWorkDetail->task->title }}</td>
                            <td>{{ $userWorkDetail->date }}</td>
                            <td>{{ $userWorkDetail->start_time }}</td>
                            <td>{{ $userWorkDetail->end_time }}</td>
                            <td>{{ $userWorkDetail->workType ? $userWorkDetail->workType->name : 'N/A' }}</td>
                            <td>{{ $userWorkDetail->notes }}</td>
                            <td>{{ $userWorkDetail->projectManager->name }}</td>
                            <td>
                                <a href="{{ route('user_work_details.edit', $userWorkDetail->id) }}">Edit</a>
                                <form method="post" action="{{ route('user_work_details.destroy', $userWorkDetail->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
