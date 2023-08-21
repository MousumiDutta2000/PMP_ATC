@extends('layouts.side_nav')

@section('pageTitle', 'Project')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Project</li>
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
    <script src="{{ asset('js/project.js') }}"></script>
@endsection

@section('content')

<main class="container">
    <section>
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -67px; margin-bottom: 50px; padding: 2px 30px; margin-right: -30px;">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New</a>
        </div>

            <table id="projectsTable" class="table table-hover responsive" style="width: 100%; border-spacing: 0 10px;">
            <button id="filterButton" class="btn btn-primary" style="float: right;"><i class="bi bi-funnel"></i></button>

            <div id="filterForm" style="display: none;">
                <label for="filterType"></label>
                <select id="filterType" class="form-control">
                    <option value="date">Selected filter type</option>
                    <option value="date">Date</option>
                    <option value="technology">Technology</option>
                </select>

                <div id="dateFilter" style="display: none;">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" class="form-control">
                </div>

                <div id="technologyFilter" style="display: none;">
                    <label for="technology">Select Technology:</label>
                    <input type="text" id="technology" class="form-control" placeholder="Enter Technology">
                </div>

                <button id="applyFilter" class="btn btn-success" style="margin-top: 10px;">Apply</button>
            </div>


                <thead>
                    <tr>
                        <th style="width: 150px; padding-left: 37px;">ID</th>
                        <th style="width: 380px;">Project Name</th>
                        <th style="width: 182px;">Status</th>
                        <th style="width: 113px;">Start Date</th>
                        <th style="width: 113px;">Technology</th>
                        <th style="width: 113px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr class="shadow" style="border-radius:15px;">
                        <td style="padding-left:37px;">{{ $project->uuid }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td>
                            @if($project->project_status == 'Not Started')
                                <div class="badge badge-success-light text-white font-weight-bold" style="background-color: #ed5768; ">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Delay')
                                <div class="badge badge-warning-light text-white font-weight-bold" style="background-color: #c25eea; padding-left:18px; padding-right:18px;">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Pending')
                                <div class="badge badge-danger-light text-white font-weight-bold" style="background-color: #ffc500">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Ongoing')
                                <div class="badge badge-primary-light text-white font-weight-bold" style="background-color: #1b74ae;">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Completed')
                                <div class="badge badge-info-light text-white font-weight-bold" style="background-color: #17b85d">{{ $project->project_status }}</div>
                            @endif
                        </td>
                        <td>{{ ($project->project_startDate) }}</td>
                        <td>
                            @if($project->technologies->count() > 0)
                                @foreach($project->technologies as $technology)
                                    {{ $technology->technology_name }}
                                    @if(!$loop->last)
                                        , <!-- Add a comma if it's not the last technology -->
                                    @endif
                                @endforeach
                            @else
                                No Technologies
                            @endif
                        </td>

                        
                        <td>
                            <div class="btn-group" role="group">
                            <a href="{{ route('sprints.index', ['sprints' => $project->id]) }}" data-toggle="tooltip" data-placement="top" title="View Sprints">
                                <i class="fa-solid fa-people-roof text-warning" style="margin-right: 10px"></i>
                            </a>
                            <a href="{{ route('kanban', ['projectId' => $project->id]) }}" data-toggle="tooltip" data-placement="top" title="View Tasks">
                                <i class="bi bi-kanban" style="margin-right: 10px; color: blueviolet;"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="">
                                <i class="bi bi-exclamation-octagon" style="margin-right: 10px; color:red;"></i>
                            </a>
                            <a href="{{ route('projects.edit', ['project' => $project->id]) }}" data-toggle="tooltip" data-placement="top" title="Settings">
                                <i class="fa-solid fa-gear text-secondary" style="margin-right: 10px"></i>
                            </a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                    @method('delete')
                                    @csrf 
                                    <button type="button" class="btn btn-link p-0 delete-button" data-toggle="modal" data-placement="top" title="Delete" data-target="#deleteModal{{ $project->id }}">
                                        <i class="fas fa-trash-alt text-danger mb-2" style="border: none;"></i>
                                    </button>         
                                    <!-- Delete Modal start -->
                                    <div class="modal fade" id="deleteModal{{ $project->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header flex-column">
                                                    <div class="icon-box">
                                                        <i class="material-icons">&#xE5CD;</i>
                                                    </div>
                                                    <h3 class="modal-title w-100">Are you sure?</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you really want to delete these record?</p>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal end-->
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
</main>

@endsection