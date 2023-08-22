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
<link rel="stylesheet" href="{{ asset('css/project.css') }}">

@endsection @section('custom_js')
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

        <table id="projectTable" class="table table-hover responsive" style="width: 100%; border-spacing: 0 10px;">
            <div class="dropdown">
                <i id="filterButton" class="bi bi-funnel">Filter</i>
                <div class="dropdown-menu dropdown-menu-right" id="dropdownContent" aria-labelledby="dropdownMenuLink" style="display: none; margin-top: 37px; left: 82%; position: absolute; border-radius: 10px;">
                    <!-- Dropdown content -->
                    <div class="row" style="margin-top:5px; margin-bottom:5px;">
                        <!-- Update your filter cards with unique classes -->
                        <div class="col-md-6">
                            <div class="filter-card date-filter mb-3 text-center" id="dateFilter" style="display: none; margin-left:15px;">
                                <i class="fa-regular fa-calendar" style="color: #9ea7fc; margin-right: 25px; margin-top: 17px; margin-left: 25px;"></i>
                                <label for="date">Date</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="filter-card technology-filter mb-3 text-center" id="technologyFilter" style="display: none; margin-left: -3px;">
                                <i class="fa-solid fa-laptop" style="color: #9ea7fc; margin-top: 17px;"></i>
                                <label for="technology" style="margin-left:-3px;">Technology</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="filter-card member-filter text-center" id="memberFilter" style="display: none; margin-left: 15px;">
                                <i class="fa-solid fa-users" style="color: #9ea7fc; margin-top: 17px;"></i>
                                <label for="member">Member</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add a search bar initially hidden -->
            <div id="searchBar" style="display: none; float:right;">
                <input type="date" id="searchInput" class="form-control" style="height:31px;" placeholder="Search...">
            </div>

            <!-- Add a search bar for technology, initially hidden -->
            <div id="technologySearchBar" style="display: none; float:right;">
                <input type="text" id="technologyInput" class="form-control" style="height: 31px;" placeholder="Search by Technology...">
            </div>

            <!-- Add a search bar for technology, initially hidden -->
            <div id="memberSearchBar" style="display: none; float:right;">
                <input type="text" id="memberInput" class="form-control" style="height: 31px;" placeholder="Search by Member...">
            </div>

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
    </section>
</main>

<script>
    $(document).ready(function() {
        // Function to perform the search
        function performSearch() {
            var searchText = $('#searchInput').val().toLowerCase(); // Get the search text

            // Loop through each table row
            $('tbody tr').each(function() {
                var projectRow = $(this);
                var projectDate = projectRow.find('td:nth-child(4)').text().toLowerCase(); // Get the project date
                var projectTechnologies = projectRow.find('td:nth-child(5)').text().toLowerCase(); // Get the project technology

                // Check if the project date matches the entered date
                if (projectDate.includes(searchText)) {
                    projectRow.show(); // Show the row if it matches
                } else {
                    projectRow.hide(); // Hide the row if it doesn't match
                }
            });
        }

        // Function to perform technology search
        function performTechnologySearch() {
            var searchText = $('#technologyInput').val().toLowerCase(); // Get the technology search text

            // Loop through each table row
            $('tbody tr').each(function() {
                var projectRow = $(this);
                var projectTechnologies = projectRow.find('td:nth-child(5)').text().toLowerCase(); // Get the project technology

                // Check if the project technology contains the entered search text
                if (projectTechnologies.includes(searchText)) {
                    projectRow.show(); // Show the row if it matches the technology
                } else {
                    projectRow.hide(); // Hide the row if it doesn't match
                }
            });
        }

        // Function to perform member search
        function performMemberSearch() {
            var searchText = $('#memberInput').val().toLowerCase();

            $('tbody tr').each(function() {
                var projectRow = $(this);
                var projectMembers = projectRow.find('td:nth-child(6)').text().toLowerCase();

                if (projectMembers.includes(searchText)) {
                    projectRow.show();
                } else {
                    projectRow.hide();
                }
            });
        }

        // When the filter icon is clicked, open the filter modal
        $('#filterButton').click(function() {
            $('#myModal').addClass('show'); // Add 'show' class to the modal
            $('#dateFilter').show(); // Show the "Date" filter card
            $('#technologyFilter').show(); // Show the "Technology" filter card
            $('#memberFilter').show(); // Show the "Member" filter card
        });

        // When a filter card is clicked, close the modal and show the corresponding search bar
        $('.filter-card').click(function() {
            // $('#myModal').removeClass('show');
            if ($(this).hasClass('date-filter')) {
                $('#searchBar').show();
                $('#technologySearchBar').hide();
                $('#memberSearchBar').hide(); // Hide the member search bar
            } else if ($(this).hasClass('technology-filter')) {
                $('#searchBar').hide();
                $('#technologySearchBar').show();
                $('#memberSearchBar').hide(); // Hide the member search bar
            } else if ($(this).hasClass('member-filter')) { // Check if the clicked card is the "Member" filter
                $('#searchBar').hide();
                $('#technologySearchBar').hide();
                $('#memberSearchBar').show(); // Show the member search bar
            } else {
                $('#searchBar').hide();
                $('#technologySearchBar').hide();
                $('#memberSearchBar').hide(); // Hide the member search bar for other filters
            }
        });

        // When the search input changes or the user presses Enter, perform the search
        $('#searchInput').on('input', performSearch);
        $('#searchInput').on('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });

        // Add a keyup event listener to the technology search input to filter rows as you type
        $('#technologyInput').on('keyup', performTechnologySearch);
        $('#memberInput').on('keyup', performMemberSearch);
    });

    // Get references to the elements
    const filterButton = document.getElementById("filterButton");
    const dropdownContent = document.getElementById("dropdownContent");

    // Add a click event listener to the filter button
    filterButton.addEventListener("click", function() {
        // Toggle the display of the dropdown content
        if (dropdownContent.style.display === "none" || dropdownContent.style.display === "") {
            dropdownContent.style.display = "block";
        } else {
            dropdownContent.style.display = "none";
        }
    });

    // Add click event listeners to filter cards to close the dropdown
    $('.filter-card').click(function() {
        dropdownContent.style.display = "none";
    });
</script>

@endsection