@extends('layouts.side_nav') 

@section('pageTitle', 'Project') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('projects.index') }}">Project</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}">
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
<link rel="stylesheet" href="path-to/font-awesome/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection 

<!-- Include necessary scripts here -->

@section('project_js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/project.js') }}"></script>
<script src="{{ asset('js/side_highlight.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content') 

@if ($errors->any())
<div class="error-messages">
    <strong>Validation Errors:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-container w-60">
    <div class="container">
        <div class="page-number text-secondary" id="page-number-1" style="text-align: right; float:right">Page 1 of 2</div>
    </div>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div id="section-1">
            <div class="project-details">
                <h5>Add Project Details</h5>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="project_name" class="mb-1" style="font-size: 15px;">Project Name</label>
                        <input type="text" class="shadow-sm" name="project_name" id="project_name" placeholder="Enter project name" required="required" style="color:#999; font-size: 14px;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="typeSelect" class="mb-1" style="font-size: 15px;">Project Type</label>
                        <select id="typeSelect" class="shadow-sm" name="project_type" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color:#999; font-size: 14px;">
                            <option value="" selected="selected" disabled="disabled">Select type</option>
                            <option>Internal</option>
                            <option>External</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="project_description" class="mb-1" style="font-size: 15px;">Description</label>
                    <textarea class="ckeditor form-control" class="shadow-sm" name="project_description" id="project_description" required="required"></textarea>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="project_startDate" class="mb-1" style="font-size: 15px;">Project Start Date</label>
                        <input type="date" class="shadow-sm" name="project_startDate" id="project_startDate" required="required" style="color:#999; font-size: 14px;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="project_endDate" class="mb-1" style="font-size: 15px;">Project End Date</label>
                        <input type="date" class="shadow-sm" name="project_endDate" id="project_endDate" required="required" style="color:#999; font-size: 14px;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status" class="mb-1" style="font-size: 15px;">Status</label>
                        <select id="status" class="shadow-sm" name="project_status" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color:#999; font-size: 14px;">
                            <option value="" selected="selected" disabled="disabled">Select status</option>
                            <option value="Not Started">Not started</option>
                            <option value="Pending">Pending</option>
                            <option value="Delay">Delay</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="technology_id" class="mb-1" style="font-size: 15px;">Technologies</label>
                        <div id="technology-wrapper" class="shadow-sm" style="font-size: 14px;">
                            <select id="technology_id" name="technology_id[]" class="Technology" required style="width: 100%;" multiple>
                                @foreach($technologies as $technology)
                                    <option value="{{ $technology->id }}">{{ substr($technology->technology_name, 0, 1) . $technology->technology_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: right;">
            <button type="button" class="btn btn-primary" id="nextButton" onclick="showSection(2)">Next</button>
            </div>
        </div>

        <div class="page-number" id="page-number-2" style="display: none; text-align: right; float:right">Page 2 of 2</div>
            <div id="section-2" style="display: none;">
                <div class="profile-details">
                    <h5>Addition Details</h5>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="project_manager_id" class="mb-1" style="font-size: 15px;">Project Manager</label>
                                <select id="project_manager_id" name="project_manager_id" class="shadow-sm" required style="padding-bottom: 6px; color:#999; font-size: 14px;">
                                    <option value="">Select Project Manager</option>
                                    @foreach ($projectManagers as $projectManager)
                                        <option value="{{ $projectManager->id }}">{{ $projectManager->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-0">
                        <div class="form-group">
                            <label for="vertical_id" class="mb-1" style="font-size: 15px;">Vertical</label>
                                <select id="vertical_id" name="vertical_id" class="shadow-sm" required style="padding-bottom: 6px; color:#999; font-size: 14px;">
                                    <option value="">Select Vertical</option>
                                        @foreach ($verticals as $vertical)
                                            <option value="{{ $vertical->id }}">{{ $vertical->vertical_name }}</option>
                                        @endforeach
                                </select>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #0129704a; width:97%; margin-left: 12px; margin-right: 20px;">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_id" class="mb-1" style="font-size: 15px;">Client</label>
                            <select id="client_id" class="shadow-sm" name="client_id" class="form-control" required style="height: 38.1px; color:#999; font-size: 14px;">
                            <option value="">Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                            @endforeach
                            </select>
                        </div>   
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_spoc_name" class="mb-1" style="font-size: 15px;">Client Name [SPOC]</label>
                            <input type="text" class="shadow-sm" name="client_spoc_name" id="client_spoc_name" placeholder=" Enter client name" required="required" style="color:#999;">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_spoc_email" class="mb-1" style="font-size: 15px;">Client Email [SPOC]</label>
                            <input type="email" class="shadow-sm" name="client_spoc_email" id="client_spoc_email" placeholder=" Enter client email" required="required" style="color:#999;">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_spoc_contact" class="mb-1" style="font-size: 15px;">Client Contact [SPOC]</label>
                            <input type="text" class="shadow-sm" name="client_spoc_contact" id="client_spoc_contact" placeholder="Enter client contact" required="required" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" style="color:#999;">
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #0129704a; width:97%; margin-left: 12px; margin-right: 20px;">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="task_type_id" class="mb-1" style="font-size: 15px;">Choose Project Task Type</label>
                                <select id="task_type_id" name="task_type_id[]" class="task_type custom-select shadow-sm" required style="width: 100%;" multiple>
                                    @foreach($task_types as $task_type)
                                        <option value="{{ $task_type->id }}">{{ $task_type->type_name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="task_status_id" class="mb-1" style="font-size: 15px;">Choose Project Task Status</label>
                                <select id="task_status_id" name="task_status_id[]" class="task_status shadow-sm" required style="width: 100%;" multiple>
                                    @foreach($task_statuses as $task_status)
                                        <option value="{{ $task_status->id }}">{{ $task_status->status }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #0129704a; width:97%; margin-left: 12px; margin-right: 20px;">

                    <div class="col-md-12 mb-3">
                        <label for="memberInput" class="form-label" style="height:20px; font-size: 15px;">Member</label>
                        <i class="fa fa-plus-circle" id="plusSign" style="color: #7d4287; cursor: pointer;"></i>
                        <div class="row" id="memberCardContainer"></div>
                    </div>

                    <!-- Bootstrap Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="close" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 1060;">
                            <div class="modal-content">
                                <div class="modal-header p-0" style="margin-left:15px;">
                                    <h4 class="modal-title" id="myModalLabel" style="font-weight:bold; color: #012970;">Add Member</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right:9px;" onclick="closeModal()"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="fieldName" class="form-label mb-3">Member Name</label>
                                        </div>
                        
                                        <div class="col-md-6" style="font-size:14px;">
                                            <select id="project_members_id" name="project_members_id[]" class="addmember" required style="width:100%;">
                                                <option value="">Select Member</option>
                                                @foreach($projectMembers as $projectMember)
                                                    <option value="{{ $projectMember->id }}">{{ $projectMember->profile_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
            
                                        <div class="col-md-6">
                                            <label for="project_role_id" class="form-label mb-3">Role</label>
                                        </div>

                                        <div class="col-md-6">
                                            <select id="project_role_id" name="project_role_id[]" class="form-control" required>
                                                <option value="">Select Role</option>
                                                    @foreach ($projectRoles as $projectRole)
                                                        <option value="{{ $projectRole->id }}">{{ $projectRole->member_role_type }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mt-3 text-end">
                                            <button type="button" class="btn" id="addMemberBtn" style="background-color: #012970; color: white;" onclick="addMember()">Add Member</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="close" data-bs-backdrop="static" data-bs-keyboard="false">
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

                                        <div class="col-md-6" style="font-size:14px;">
                                            <select id="edit_project_members_id" name="project_members_id[]" class="editmember" required style="width:100%;">
                                                <option value="">Select Member</option>
                                                @foreach($projectMembers as $projectMember)
                                                <option value="{{ $projectMember->id }}">{{ $projectMember->profile_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="editRoleSelect" class="form-label mb-3">Role</label>
                                        </div>

                                        <div class="col-md-6">
                                            <select id="edit_project_role_id" name="project_role_id[]" class="form-control" required>
                                                <option value="">Select Role</option>
                                                @foreach ($projectRoles as $projectRole)
                                                    <option value="{{ $projectRole->id }}">{{ $projectRole->member_role_type }}</option>
                                                @endforeach
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
                    </div>  -->

                </div>
                
                <div style="text-align: right;">
                    <button type="button" class="btn btn-primary" onclick="showSection(1)">Previous</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>

            <!-- <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
            </div> -->
    </form>
</div>

<!-- Select2 JS -->

<script>
$(document).ready(function() {
    $('.Technology').select2({
        placeholder: 'Select technologies',
        dropdownParent: $('#technology-wrapper'),
        templateResult: formatTechnology,
        templateSelection: formatTechnology
    });

    function formatTechnology(technology) {
        if (!technology.id) {
            return technology.text;
        }

        var firstLetter = technology.text.charAt(0).toUpperCase();
        return $('<span><span class="circle">' + firstLetter + '</span>' + technology.text.substr(1) + '</span>');
    }
});
</script>

<!-- ADD Member $ EDIT Member JS -->
<script>
    $(document).ready(function() {
        // Plus sign click event handler: show the add member modal
        $('#plusSign').click(function() {
            $('#myModal').modal('show');
        });

        // Add member button click event handler

        $("#addMemberBtn").click(function() {
            var memberName = $("#project_members_id option:selected").text();
            var memberId = $("#project_members_id").val();
            var role = $("#project_role_id option:selected").text();
            var roleId = $("#project_role_id").val();

            if (memberName && role) {
                var cardHtml = `
                <div class="col-md-3 member-container">
                    <div class="card mb-0 mt-3">
                        <div class="card-body mb-2">
                            <div class="avatar avatar-blue">
                            <img class="rounded_circle mb-1 mt-3" src="${getProfileImage(memberId)}" alt="Profile Image">
                            </div>
                            <p class="card-title user-name">${memberName}</p>
                            <p class="card-text role">${role}</p>
                            <i class="fa fa-edit edit-icon"></i>
                            <input type="hidden" name="project_members_id[]" value="${memberId}">
                            <input type="hidden" name="project_role_id[]" value="${roleId}">
                        </div>
                    </div>
                </div>`;

                $("#memberCardContainer").append(cardHtml);
            }

            $("#myModal").modal("hide");

            $('#myModal').on('show.bs.modal', function () {
                $('#project_members_id').val(null).trigger('change');
                $('#project_role_id').val(null).trigger('change');
            });
        });
        
        // Function to get profile image URL by member ID
        function getProfileImage(memberId) {
            @foreach ($projectMembers as $projectMember)
                if ('{{ $projectMember->id }}' === memberId) {
                    return '{{ asset($projectMember->image) }}';
                }
            @endforeach
            // If no matching member ID is found, return a default image URL
            return '{{ asset('images/default-profile-image.png') }}'; // Replace 'images/default-profile-image.png' with the path to your default profile image
        }

        // Edit Member button click event handler
        $(document).on('click', '.edit-icon', function() {
            // Get the current member name and role from the card
            var card = $(this).closest('.card');
            var memberName = card.find('.user-name').text();
            var memberRole = card.find('.role').text();

            // Set the values in the edit modal input fields
            // $('#editFieldName').val(memberName);
            $('#editRoleSelect').val(memberRole).trigger('change'); // Trigger change event to update select2 dropdown

            // Store a reference to the card being edited
            $('#editModal').data('card', card);

            // Show the edit modal
            $('#editModal').modal('show');
        });

        // Update Member button click event handler
        $('#updateMemberBtn').click(function() {
            // Get the updated member role from the edit modal input field
            var updatedMemberRole = $('#edit_project_role_id option:selected').text();

            // Get the reference to the card being edited
            var card = $('#editModal').data('card');

            // Update the card with the new member role
            card.find('.role').text(updatedMemberRole);

            // Hide the edit modal
            $('#editModal').modal('hide');
        });

        // Remove Member button click event handler
        $('#removeBtn').click(function() {
        // Get the reference to the card being edited
        var card = $('#editModal').data('card');

        // Remove the card from the container
        card.parent().remove();

        // Hide the edit modal
        $('#editModal').modal('hide');
        });
    });

    function checkFieldsInSection(sectionNumber) {
        var sectionSelector = "#section-" + sectionNumber;

        var requiredInputs = $(sectionSelector + " :input[required]");
        var isValid = true;

        requiredInputs.each(function () {
            if (!$(this).val()) {
                isValid = false;
                return false; // Exit the loop if an empty required field is found
            }
        });

        return isValid;
    }

    $("#nextButton").click(function () {
        var currentSectionNumber = 1; // Change this to the current section number

        if (checkFieldsInSection(currentSectionNumber)) {
            showSection(currentSectionNumber + 1);
        } else {
            // Do not proceed if required fields are missing
            alert("Please fill in all the required fields before proceeding.");
        }
    });

    function showSection(sectionNumber) {
        var currentSectionNumber = 1; // Change this to the current section number

        if (sectionNumber === currentSectionNumber + 1) {
            // Check if all required fields in the current section are filled
            if (!checkFieldsInSection(currentSectionNumber)) {
                alert("Please fill in all the required fields before proceeding.");
                return; // Prevent moving to the next section
            }
        }

        document.getElementById('section-1').style.display = 'none';
        document.getElementById('section-2').style.display = 'none';

        document.getElementById('page-number-1').style.display = 'none';
        document.getElementById('page-number-2').style.display = 'none';

        if (sectionNumber === 1) {
            document.getElementById('section-1').style.display = 'block';
            document.getElementById('page-number-1').style.display = 'block';
        } else if (sectionNumber === 2) {
            document.getElementById('section-2').style.display = 'block';
            document.getElementById('page-number-2').style.display = 'block';
        } 
    }

</script>

@endsection