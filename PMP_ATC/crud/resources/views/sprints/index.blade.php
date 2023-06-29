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
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -74px; margin-bottom: 50px;">
            <a href="{{ route('sprints.create') }}" class="btn btn-primary" style="margin-right: 10px;">Add New</a>
            <i class="fa-solid fa-file-export" style="font-size: 30px;color:blue"></i>
            
        </div>
        @if ($sprints->count() > 0)
            <table id="example" class="table table-hover responsive" style="width:100%; border-spacing: 0 10px;">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Sprint Name</th>
                        <th>Is Global Sprint</th>
                        <th>Project Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th style="padding-left:35px">Status</th>
                        <th>Assigned To</th>
                        <th>Assigned By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sprints as $sprint)
                        <tr class="shadow" style="border-radius:15px;">
                            {{-- <td>{{ $sprint->id }}</td> --}}
                            <td>{{ $sprint->sprint_name }}</td>
                            <td>{{ $sprint->is_global_sprint }}</td>
                            <td>{{ $sprint->project->project_name }}</td>   
                            <td>{{ $sprint->start_date }}</td>
                            <td>{{ $sprint->end_date }}</td>
                            <td>
                                @if($sprint->status == 'Under discussion')
                                    <div class="badge badge-success-light text-white font-weight-bold" style="background-color: #79c57f;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Delay')
                                    <div class="badge badge-warning-light text-white font-weight-bold" style="background-color: #fbe99f; margin-left:16px; padding-left:18px; padding-right:18px;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Pending')
                                    <div class="badge badge-danger-light text-white font-weight-bold" style="background-color: #f1909b; margin-left:16px;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Under development')
                                    <div class="badge badge-primary-light text-white font-weight-bold" style="background-color: #6ec6ff;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'In queue')
                                    <div class="badge badge-info-light text-white font-weight-bold" style="background-color: #17a2b8; margin-left:16px;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Not Started')
                                    <div class="badge badge-danger-light text-white font-weight-bold" style="background-color: #f07f8c; margin-left:12px;">{{ $sprint->status }}</div>
                                @endif
                            </td>
                            <td>{{ $sprint->assigned_to }}</td>
                            <td>{{ $sprint->assigned_by }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" data-toggle="modal" data-target="#showModal_{{ $sprint->id }}">
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
            
            <!-- Show Modal -->
            @foreach ($sprints as $sprint)
    <div class="modal fade" id="showModal_{{ $sprint->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel_{{ $sprint->id }}" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #DBF3FA">
                    <h5 class="modal-title" id="showModalLabel_{{ $sprint->id }}" style="color: black; font-weight: bolder;">Sprint Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <table class="table" style="margin: 0 auto;">
                        <tbody>
                            <tr>
                                {{-- <th>ID</th> --}}
                                {{-- <td>{{ $sprint->id }}</td> --}}
                            </tr>
                            <tr>
                                <th>Sprint Name:</th>
                                <td>{{ $sprint->sprint_name }}</td>
                            </tr>
                            <tr>
                                <th>Is Global Sprint:</th>
                                <td>{{ $sprint->is_global_sprint }}</td>
                            </tr>
                            <tr>
                                <th>Project ID:</th>
                                <td>{{ $sprint->project_id }}</td>
                            </tr>
                            <tr>
                                <th>Start Date:</th>
                                <td>{{ $sprint->start_date }}</td>
                            </tr>
                            <tr>
                                <th>End Date:</th>
                                <td>{{ $sprint->end_date }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($sprint->status == 'Under discussion')
                                        <div class="badge badge-success-light text-white font-weight-bold" style="background-color: #79c57f;">{{ $sprint->status }}</div>
                                    @elseif($sprint->status == 'Delay')
                                        <div class="badge badge-warning-light text-white font-weight-bold" style="background-color: #fbe99f; margin-left: 16px; padding-left: 18px; padding-right: 18px;">{{ $sprint->status }}</div>
                                    @elseif($sprint->status == 'Pending')
                                        <div class="badge badge-danger-light text-white font-weight-bold" style="background-color: #f1909b;">{{ $sprint->status }}</div>
                                    @elseif($sprint->status == 'Under development')
                                        <div class="badge badge-primary-light text-white font-weight-bold" style="background-color: #6ec6ff;">{{ $sprint->status }}</div>
                                    @elseif($sprint->status == 'In queue')
                                        <div class="badge badge-info-light text-white font-weight-bold" style="background-color: #17a2b8; margin-left: 16px;">{{ $sprint->status }}</div>
                                    @elseif($sprint->status == 'Not Started')
                                        <div class="badge badge-danger-light text-white font-weight-bold" style="background-color: #f07f8c; margin-left: 12px;">{{ $sprint->status }}</div>
                                    @endif
                                </td>
                                {{-- <td>{{ $sprint->status }}</td> --}}
                            </tr>
                            <tr>
                                <th>Assigned To:</th>
                                <td>{{ $sprint->assigned_to }}</td>
                            </tr>
                            <tr>
                                <th>Assigned By:</th>
                                <td>{{ $sprint->assigned_by }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach

        @else
            <div class="alert alert-info mt-4" role="alert">
                No sprints found.
            </div>
        @endif
    </section>
</main>
@endsection







{{-- @extends('layouts.side_nav')

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
            <a href="{{ route('sprints.create') }}" class="btn btn-primary">Add New</a>
        </div>
        @if ($sprints->count() > 0)
            <table id="sprint-table" class="table table-hover responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sprint Name</th>
                        <th>Is Global Sprint</th>
                        <th>Project ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th style="padding-left:35px">Status</th>
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
                            <td>{{ $sprint->is_global_sprint }}</td>
                            <td>{{ $sprint->project_id }}</td>   
                            <td>{{ $sprint->start_date }}</td>
                            <td>{{ $sprint->end_date }}</td>
                            <td>
                                @if($sprint->status == 'Under discussion')
                                    <div class="badge badge-success-light text-success font-weight-bold" style="background-color: #79c57f;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Delay')
                                    <div class="badge badge-warning-light text-warning font-weight-bold" style="background-color: #fbe99f; margin-left:16px; padding-left:18px; padding-right:18px;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Pending')
                                    <div class="badge badge-danger-light text-danger font-weight-bold" style="background-color: #f1909b;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Under development')
                                    <div class="badge badge-primary-light text-primary font-weight-bold" style="background-color: #6ec6ff;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'In queue')
                                    <div class="badge badge-info-light text-info font-weight-bold" style="background-color: #17a2b8; margin-left:16px;">{{ $sprint->status }}</div>
                                @elseif($sprint->status == 'Not Started')
                                    <div class="badge badge-danger-light text-danger font-weight-bold" style="background-color: #f07f8c; margin-left:12px;">{{ $sprint->status }}</div>
                                @endif
                            </td>                            
                            
                            
                            
                            
                            {{-- <td>{{ $sprint->status }}</td> --}}
                            {{-- <td>{{ $sprint->assigned_to }}</td>
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
  --}}
