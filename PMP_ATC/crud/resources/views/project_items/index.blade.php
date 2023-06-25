@extends('layouts.side_nav')

@section('pageTitle', 'Project_Items')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('project-items.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Project_Items</li>
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
            <a href="{{ route('project-items.create') }}" class="btn btn-primary">Add New</a>
        </div>
        @if ($projectItems->count() > 0)
            <table id="sprint-table" class="table table-hover responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Details</th>
                        <th>Project</th>
                        <th>Item</th>
                        <th>Sprint</th>
                        <th>Status</th>
                        <th>Expected Delivery</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Assigned To</th>
                        <th>Assigned By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projectItems as $projectItem)
                        <tr>
                            <td>{{ $projectItem->id }}</td>
                        <td>{{ $projectItem->item_name }}</td>
                        <td>{{ $projectItem->details }}</td>
                        {{-- <td>{{ $projectItem->project_id }}</td> --}}
                        <td>{{ $projectItem->project->project_name }}</td>
                        <td>{{ $projectItem->itemStatus->status }}</td>
                        {{-- <td>{{ $projectItem->item_id }}</td> --}}
                        <td>{{ $projectItem->sprint->sprint_name }}</td>
                        <td>{{ $projectItem->status }}</td>
                        <td>{{ $projectItem->expected_delivery }}</td>
                        <td>{{ $projectItem->start_date }}</td>
                        <td>{{ $projectItem->end_date }}</td>
                        <td>{{ $projectItem->assigned_to }}</td>
                        <td>{{ $projectItem->assigned_by }}</td>
                        <td>
                            
                                <div class="btn-group" role="group">
                                    <a href="{{ route('project-items.show', ['project_item' => $projectItem->id]) }}">
                                        <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                    </a>
                                    <a href="{{ route('project-items.edit', ['project_item' => $projectItem->id]) }}">
                                        <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                    </a>
                                    <form method="post" action="{{ route('project-items.destroy', ['project_item' => $projectItem->id]) }}">
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
            <p>No project_items found.</p>
        @endif
    </section>
</main>
@endsection



