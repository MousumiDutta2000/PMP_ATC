@extends('layouts.side_nav') @section('pageTitle', 'Project') @section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Project</li>
@endsection @section('custom_css')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> @endsection @section('custom_js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/table.js') }}"></script>
<script src="{{ asset('js/project.js') }}"></script>
@endsection @section('content')

<main class="container">
    <section>
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -67px; margin-bottom: 50px; padding: 2px 30px; margin-right: -30px;">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New</a>
        </div>

        <div id="filterDiv" class="shadow-sm" style="background-color: #dbddf9;">
            <div id="formSections">
                <!-- Your initial form section (with both plus and minus signs) -->
                <div class="form-section">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="filterOptions" class="filterOptions">Filter by:</label>
                                    <select class="form-control" id="filterOptions">
                                        <option value="">Select Option...</option>
                                        <option value="date">Date</option>
                                        <option value="technology">Technology</option>
                                        <option value="member">Member</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="searchQuery" class="filterOptions">Search:</label>
                                    <input type="text" class="form-control" id="searchQuery" placeholder="Enter search query">
                                </div>
                            </div>

                            <div class="col-md-1" style="display: flex; align-items: center;">
                                <!-- Plus icon -->
                                <button type="button" class="btn btn-link add-form-section">
                                    <i class="bi bi-plus-circle" style="font-size: 19px; margin-left: -17px; position: relative; top: 12px; color: forestgreen;"></i>
                                </button>

                                <!-- Cross icon -->
                                <button type="button" class="btn btn-link remove-form-section" style="display: none;">
                                    <i class="bi bi-x-circle" style="font-size: 19px; margin-left: -17px; position: relative; top: 12px; color: red;"></i>
                                </button>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group" id="technologyFilter" style="display: none;">
                                    <!-- Add an empty option for the technology filter -->
                                    <select class="form-control" id="technologySelect">
                                        <option value="">Select Technology...</option>
                                        @foreach ($technologies as $technology)
                                            <option value="{{ $technology->technology_name }}">{{ $technology->technology_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group" id="projectMemberFilter" style="display: none;">
                                    <select class="form-control" id="projectMemberSelect" name="selectedMember">
                                        <option value="">Select Project Member...</option>
                                        @foreach($projectMembers as $projectMember)
                                            <option value="{{ $projectMember->profile_name }}">{{ $projectMember->profile_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Reset and Search buttons placed at the bottom of filterDiv -->
            <button type="button" id="searchButton" class="btn btn-outline-secondary search-button" style="margin-left: 87%">Search</button>
            <button type="button" id="resetButton" class="btn btn-outline-danger reset-button" style="margin-left: 1%">Reset</button>
        </div>

        <div id="tableContainer">
            <table id="projectTable" class="table table-hover responsive" style="width: 100%; border-spacing: 0 10px;">
                <i id="filterButton" class="bi bi-funnel filter-icon">Filter</i>

                <thead>
                    <tr>
                        <th style="width: 150px; padding-left: 37px;">ID</th>
                        <th style="width: 380px;">Project Name</th>
                        <th style="width: 182px;">Status</th>
                        <th style="width: 113px;" class="hide-startDate">Start Date</th>
                        <th style="width: 113px;" class="hide-technology">Technology</th>
                        <th style="width: 113px;" class="hide-member">Member</th>
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
                        <td class="hide-startDate">{{ ($project->project_startDate) }}</td>
                        <td class="hide-technology">
                            @if($project->technologies->count() > 0) @foreach($project->technologies as $technology) {{ $technology->technology_name }} @if(!$loop->last) ,
                            <!-- Add a comma if it's not the last technology -->
                            @endif @endforeach @else No Technologies @endif
                        </td>
                        <td class="hide-member">
                            @if($project->projectMembers->count() > 0)
                            <!-- Assuming you have a relationship set up -->
                            @foreach ($project->projectMembers as $member) {{ $member->profile_name }} @endforeach @else No Members @endif
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
                                    @method('delete') @csrf
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
        </div>
    </section>
</main>


<script>
  
</script>

@endsection