@extends('layouts.side_nav') 

@section('pageTitle', 'Project') 

@section('breadcrumb')
<li class="breadcrumb-item">{{ $project->project_name }}</li>
<li class="breadcrumb-item active" aria-current="page">Settings</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> 
@endsection 

<!-- Include necessary scripts here -->

@section('project_js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/project.js') }}"></script>
@endsection

@section('content')

<!-- <div class="form-container">
    <form action="{{ route('projects.updateSettings', $project->id) }}" method="POST" class="form">
        @csrf 
        @method('PUT') -->

        <div class="form-container">
    <form action="{{ route('projects.updateSettings', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="projectIdInput" class="form-label">Project ID</label>
                <input type="text" id="projectIdInput" class="form-control" name="project_id" value="{{ $project->id }}" required="required">
            </div>

            <div class="col-md-6 mb-3">
                <label for="projectNameInput" class="form-label">Project Name</label>
                <input type="text" id="projectNameInput" class="form-control" name="project_name" value="{{ $project->project_name }}" required="required">
            </div>


            <div class="mb-3">
                <label for="projectDescriptionInput" class="form-label">Project Description</label>
                <textarea class="ckeditor form-control" name="project_description" id="project_description" required="required" placeholder="Describe the project">{{ $project->project_description }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="projectStartInput" class="form-label">Project Start</label>
                <input type="date" id="projectStartInput" class="form-control" name="project_start" value="{{ $project->project_startDate }}" required="required">
            </div>

            <div class="col-md-6 mb-3">
                <label for="projectEndInput" class="form-label">Project End</label>
                <input type="date" id="projectEndInput" class="form-control" name="project_end" value="{{ $project->project_endDate }}" required="required">
            </div>

            <div class="col-md-6">
    <div class="form-group">
        <!-- <label for="project_manager_id">Project Manager</label> -->
        <select name="project_manager_id" id="project_manager_id" class="form-control" required>
                @foreach ($projectManagers as $projectManager)
                    <option value="{{ $projectManager->id }}" {{ $project->project_manager_id == $projectManager->id ? 'selected' : '' }}>
                        {{ $projectManager->name }}
                    </option>
                @endforeach
        </select>
    </div>
</div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="statusSelect" class="form-label" style="margin-bottom: 0.3rem;">Status</label>
                    <select id="statusSelect" name="status" class="form-select" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                        <option value="" selected="selected" disabled="disabled">Status</option>
                        <option>Not Started</option>
                        <option>Delay</option>
                        <option>Pending</option>
                        <option>Ongoing</option>
                        <option>Completed</option>
                    </select>
                </div>
            </div>       
            
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <!-- <label for="vertical_id">Vertical</label> -->
                    <select name="vertical_id" id="vertical_id" class="form-control" required>
                        <!-- <option value="">Select Vertical</option> -->
                        <!-- @isset($verticals) -->
                            @foreach ($verticals as $vertical)
                            <option value="{{ $vertical->id }}" {{ $profile->vertical_id == $vertical->id ? 'selected' : '' }}>
                                    {{ $vertical->vertical_name }}
                                </option>
                            @endforeach
                        <!-- @endisset -->
                    </select>
                 </div>
            </div>    

            <hr>

            <div class="col-md-6">
                <div class="form-group">
                    <!-- <label for="client_id">Client</label> -->
                    <select id="client_id" name="client_id" class="form-control" required>
                    <!-- <option value="">Select Client</option> -->
                    <!-- @isset($clients) -->
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                    @endforeach
                    <!-- @endisset -->
                    </select>
                </div> 
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_name">Client Name [SPOC]</label>
                    <input type="text" name="client_spoc_name" id="client_spoc_name" required="required">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_email">Client Email [SPOC]</label>
                    <input type="email" name="client_spoc_email" id="client_spoc_email" required="required">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_contact">Client Contact [SPOC]</label>
                    <input type="text" name="client_spoc_contact" id="client_spoc_contact" required="required">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <!-- <label for="technologies_id">Technologies</label> -->
                <select id="technology_id" name="technology_id" class="form-control" required>
                <!-- <option value="">Select Technology</option> -->
                <!-- @isset($technologies) -->
                    @foreach($technologies as $technology)
                        <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                    @endforeach
                <!-- @endisset     -->
                </select>
            </div>

            <div class="col-md-6 mb-3">
    <label for="memberInput" class="form-label" style="height:20px;">Member</label>
    <i class="fa fa-plus-circle" id="plusSign" style="color: #7d4287; cursor: pointer;"></i>
    <div class="row" id="memberCardContainer"></div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h5 class="modal-title" id="myModalLabel">Add Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="fieldName" class="form-label mb-3">Member Name</label>
                    </div>
                    <div class="col-md-6">
                        <select id="project_members_id" name="project_members_id" class="form-control" required>
                            <!-- <option value="">Select Member</option> -->
                            <!-- @isset($projectMembers) -->
                            @foreach($projectMembers as $projectMember)
                            <option value="{{ $projectMember->id }}">{{ $projectMember->name }}</option>
                            @endforeach
                            <!-- @endisset  -->
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="project_role_id" class="form-label mb-3">Role</label>
                    </div>

                    <div class="col-md-6">
                        <select id="project_role_id" name="project_role_id" class="form-control" required>
                            <!-- <option value="">Select Role</option> -->
                            <!-- @isset($projectRoles) -->
                            @foreach ($projectRoles as $projectRole)
                            <option value="{{ $projectRole->id }}">{{ $projectRole->member_role_type }}</option>
                            @endforeach
                            <!-- @endisset  -->
                        </select>
                    </div>

                    <div class="col-md-12 mt-3 text-end">
                        <button type="button" class="btn btn-primary" id="addMemberBtn">Add Member</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h5 class="modal-title" id="editModalLabel">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="editFieldName" class="form-label mb-3">Member Name</label>
                    </div>
                    <div class="col-md-6">
                        <select id="editFieldName" name="editFieldName" class="form-control" required>
                            <!-- <option value="">Select Member</option> -->
                            <!-- @isset($projectMembers) -->
                            @foreach($projectMembers as $projectMember)
                            <option value="{{ $projectMember->id }}">{{ $projectMember->name }}</option>
                            @endforeach
                            <!-- @endisset  -->
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="editRoleSelect" class="form-label mb-3">Role</label>
                    </div>

                    <div class="col-md-6">
                        <select id="editRoleSelect" name="editRoleSelect" class="form-control" required>
                            <!-- <option value="">Select Role</option> -->
                            <!-- @isset($projectRoles) -->
                            @foreach ($projectRoles as $projectRole)
                            <option value="{{ $projectRole->id }}">{{ $projectRole->member_role_type }}</option>
                            @endforeach
                            <!-- @endisset  -->
                        </select>
                    </div>

                    <div class="col-md-12 mt-3 text-end">
                        <button type="button" class="btn btn-primary" id="updateMemberBtn">Update</button>
                        <button type="button" class="btn btn-primary" id="removeBtn">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="col-md-6 mb-3">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
</div>

</form>
</div>

<!-- Include necessary scripts here -->
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

<script>
    $(document).ready(function () {
        // Plus sign click event handler
        $('#plusSign').click(function () {
            // Show the add member modal
            $('#myModal').modal('show');
        });

        // Add member button click event handler
        $("#addMemberBtn").click(function () {
            var memberName = $("#project_members_id option:selected").text();
            var role = $("#project_role_id option:selected").text();

            if (memberName && role) {
                var cardHtml = `
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-title user-name">${memberName}</p>
                                <p class="card-text role">${role}</p>
                                <i class="fa fa-edit edit-icon" style="color: #7d4287; cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>`;

                $("#memberCardContainer").append(cardHtml);
            }

            $("#myModal").modal("hide");
        });

        // Edit Member button click event handler
        $(document).on('click', '.edit-icon', function () {
            // Get the current member name and role from the card
            var card = $(this).closest('.card');
            var memberName = card.find('.user-name').text();
            var memberRole = card.find('.role').text();

            // Set the values in the edit modal input fields
            $('#editFieldName').val(memberName);
            $('#editRoleSelect').val(memberRole);

            // Store a reference to the card being edited
            $('#editModal').data('card', card);

            // Show the edit modal
            $('#editModal').modal('show');
        });

// Update Member button click event handler
$('#updateMemberBtn').click(function () {
    // Get the updated member role from the edit modal input field
    var updatedMemberRole = $('#editRoleSelect option:selected').text();

    // Get the reference to the card being edited
    var card = $('#editModal').data('card');

    // Update the card with the new member role
    card.find('.role').text(updatedMemberRole);

    // Hide the edit modal
    $('#editModal').modal('hide');
});

        // Remove Member button click event handler
        $('#removeBtn').click(function () {
            // Get the reference to the card being edited
            var card = $('#editModal').data('card');

            // Remove the card from the container
            card.parent().remove();

            // Hide the edit modal
            $('#editModal').modal('hide');
        });
    });
</script>

@endsection
