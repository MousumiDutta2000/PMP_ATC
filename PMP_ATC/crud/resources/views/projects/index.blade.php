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
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
    <style>
    /* Add this to your existing CSS file or style tag */
    .modal {
        display: none; /* Initially hide the modal */
    }

    .modal.show {
        display: block; /* Show the modal when it has the 'show' class */
    }

    .filter-card {
        display: none; /* Initially hide the filter cards */
    }

    /* Add your other CSS styles as needed */
</style>

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
            <i id="filterButton" class="bi bi-funnel">Filter</i>
            <!-- Add a search bar initially hidden -->
<div id="searchBar" style="display: none;">
    <input type="text" id="searchInput" class="form-control" placeholder="Search...">
</div>

            <div id="myModal" class="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-content">
                    <!-- Filter cards -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="filter-card mb-2 text-center" id="dateFilter" style="display: none;">
                                <i class="fa-regular fa-calendar" style="color: #9ea7fc; margin-right: 25px; margin-top: 17px; margin-left: 25px;"></i>
                                <label for="date">Date</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="filter-card mb-2 text-center" id="technologyFilter" style="display: none; margin-left: -15px;">
                            <i class="fa-solid fa-laptop" style="color: #9ea7fc; margin-top: 17px;"></i>
                                <label for="technology">Technology</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="filter-card text-center" id="memberFilter" style="display: none;">
                                <i class="fa-solid fa-users" style="color: #9ea7fc; margin-top: 17px;"></i>
                                <label for="member">Member</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <thead>
                    <tr>
                        <th style="width: 150px; padding-left: 37px;">ID</th>
                        <th style="width: 380px;">Project Name</th>
                        <th style="width: 182px;">Status</th>
                        <th style="width: 113px;">Start Date</th>
                        <th style="width: 113px;">Technology</th>
                        <th style="width: 113px;">Member</th>
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
                            @if($project->projectMembers->count() > 0) <!-- Assuming you have a relationship set up -->
                            @foreach ($project->projectMembers as $member)
                                {{ $member->profile_name }}
                            @endforeach
                            @else
                                No Members
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


<script>
$(document).ready(function () {
    // When the filter icon is clicked, open the filter modal
    $('#filterButton').click(function () {
        $('#myModal').addClass('show'); // Add 'show' class to the modal
        $('#dateFilter').show(); // Show the "Date" filter card
        $('#technologyFilter').show(); // Show the "Technology" filter card
        $('#memberFilter').show(); // Show the "Member" filter card
    });

    // When a filter card is clicked, close the modal and show the search bar
    $('.filter-card').click(function () {
        $('#myModal').removeClass('show'); // Remove 'show' class from the modal
        $('#searchBar').show(); // Show the search bar
    });

    // When the close button or outside the modal is clicked, close the modal
    $('.close, .modal').click(function () {
        $('#myModal').removeClass('show'); // Remove 'show' class from the modal
    });

    // Prevent modal from closing when clicking inside the modal content
    $('.modal-content').click(function (event) {
        event.stopPropagation();
    });
});

</script>

@endsection