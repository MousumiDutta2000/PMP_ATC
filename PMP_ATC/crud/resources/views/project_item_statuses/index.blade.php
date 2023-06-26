@extends('layouts.side_nav')


@section('pageTitle', 'Project_Item_Statuses')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('project_item_statuses.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Project_Item_Statuses</li>
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
            <a href="{{ route('project_item_statuses.create') }}" class="btn btn-primary">Add New</a>
        </div>
        @if ($statuses->count() > 0)
            <table id="sprint-table" class="table table-hover responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="padding-left:35px">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>
                                @if($status->status == 'Under discussion')
                                    <div class="badge badge-success-light text-success font-weight-bold" style="background-color: #79c57f;">{{ $status->status }}</div>
                                @elseif($status->status == 'Delay')
                                    <div class="badge badge-warning-light text-warning font-weight-bold" style="background-color: #fbe99f; margin-left:16px; padding-left:18px; padding-right:18px;">{{ $status->status }}</div>
                                @elseif($status->status == 'Pending')
                                    <div class="badge badge-danger-light text-danger font-weight-bold" style="background-color: #f1909b; margin-left:16px;">{{ $status->status }}</div>
                                @elseif($status->status == 'Under development')
                                    <div class="badge badge-primary-light text-primary font-weight-bold" style="background-color: #6ec6ff;">{{ $status->status }}</div>
                                @elseif($status->status == 'In queue')
                                    <div class="badge badge-info-light text-info font-weight-bold" style="background-color: #17a2b8; margin-left:16px;">{{ $status->status }}</div>
                                @elseif($status->status == 'Not Started')
                                    <div class="badge badge-danger-light text-danger font-weight-bold" style="background-color: #f07f8c; margin-left:12px;">{{ $status->status }}</div>
                                @endif
                            </td>
                            {{-- <td>{{ $status->status }}</td> --}}
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('project_item_statuses.show', ['project_item_status' => $status->id]) }}">
                                        <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                    </a>
                                    <a href="{{ route('project_item_statuses.edit', ['project_item_status' => $status->id]) }}">
                                        <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                    </a>
                                    <form method="post" action="{{ route('project_item_statuses.destroy', ['project_item_status' => $status->id]) }}">
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

{{-- 
@section('content')
    <div class="container">
        <h2>Project Item Statuses</h2>
        <a class="btn btn-primary" href="{{ route('project_item_statuses.create') }}">Create New Status</a>
        @if ($statuses->count() > 0)
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->status }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('project_item_statuses.edit', $status->id) }}">Edit</a>
                                <form action="{{ route('project_item_statuses.destroy', $status->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this status?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No project item statuses found.</p>
        @endif
    </div>
@endsection --}}
