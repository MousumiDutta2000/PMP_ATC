@extends('layouts.side_nav') 

@section('pageTitle', 'Project') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('projects.index') }}">Project</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection 

<!-- Include necessary scripts here -->

@section('project_js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/project.js') }}"></script>
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

<div class="form-container">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_name">Project Name</label>
                    <input type="text" class="shadow-sm" name="project_name" id="project_name" placeholder="Enter project name" required="required" style="color:#999; font-size: 14px;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="typeSelect">Project Type</label>
                    <select id="typeSelect" class="shadow-sm" name="project_type" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color:#999; font-size: 14px;">
                        <option value="" selected="selected" disabled="disabled">Select type</option>
                        <option>Internal</option>
                        <option>External</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="project_description">Description</label>
                <textarea class="ckeditor form-control" class="shadow-sm" name="project_description" id="project_description" required="required"></textarea>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_startDate">Project Start Date</label>
                    <input type="date" class="shadow-sm" name="project_startDate" id="project_startDate" required="required" style="color:#999; font-size: 14px;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_endDate">Project End Date</label>
                    <input type="date" class="shadow-sm" name="project_endDate" id="project_endDate" required="required" style="color:#999; font-size: 14px;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_manager_id">Project Manager</label>
                        <select name="project_manager_id" class="shadow-sm" id="project_manager_id" class="form-control" required style="padding-bottom: 6px; height: 39.1px; color:#999; font-size: 14px;">
                            <option value="">Select Project Manager</option>
                            @foreach ($projectManagers as $projectManager)
                                <option value="{{ $projectManager->id }}">{{ $projectManager->name }}</option>
                            @endforeach
                        </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="statusSelect">Status</label>
                    <select id="statusSelect" class="shadow-sm" name="project_status" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color:#999; font-size: 14px;">
                    <option value="" selected="selected" disabled="disabled">Select status</option>
                    <option>Not Started</option>
                    <option>Delay</option>
                    <option>Pending</option>
                    <option>Ongoing</option>
                    <option>Completed</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6 mb-0">
                <div class="form-group">
                    <label for="vertical_id">Vertical</label>
                    <select name="vertical_id" class="shadow-sm" id="vertical_id" class="form-control" required style="padding-bottom: 6px; color:#999; font-size: 14px;">
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
                    <label for="client_id">Client</label>
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
                    <label for="client_spoc_name">Client Name [SPOC]</label>
                    <input type="text" class="shadow-sm" name="client_spoc_name" id="client_spoc_name" placeholder=" Enter client name" required="required" style="color:#999;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_email">Client Email [SPOC]</label>
                    <input type="email" class="shadow-sm" name="client_spoc_email" id="client_spoc_email" placeholder=" Enter client email" required="required" style="color:#999;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_spoc_contact">Client Contact [SPOC]</label>
                    <input type="text" class="shadow-sm" name="client_spoc_contact" id="client_spoc_contact" placeholder="Enter client contact" required="required" style="color:#999;">
                </div>
            </div>

            <hr style="border-top: 1px solid #0129704a; width:97%; margin-left: 12px; margin-right: 20px;">

            <!-- <div class="form-group">
                <label for="technology_id">Technologies</label>
                <div class="custom-select">
                    <div class="select-selected">Select Technology</div>
                    <div class="select-items select-hide">
                        @foreach($technologies as $technology)
                            <div>
                                <span class="circle">{{ substr($technology->technology_name, 0, 1) }}</span>
                                {{ $technology->technology_name }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> -->

            <div class="form-group">
                <label for="technology_id">Technologies</label>
                <select id="technology_id" name="technology_id" class="form-control" required>
                <option value="">Select Technology</option>
                    @foreach($technologies as $technology)
                        <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="memberInput" class="form-label" style="height:20px;">Member</label>
                <i class="fa fa-plus-circle" id="plusSign" style="color: #7d4287; cursor: pointer;"></i>
                <div class="row" id="memberCardContainer"></div>
            </div>


            <!-- Bootstrap Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="close">
                <div class="modal-dialog modal-dialog-centered" role="document" style="z-index: 1060;">
                    <div class="modal-content">
                        <div class="modal-header p-0" style="margin-left:15px;">
                            <h4 class="modal-title" id="myModalLabel" style="font-weight:bold; color: #012970;">Add Member</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right:9px;"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fieldName" class="form-label mb-3">Member Name</label>
                                </div>
                
                                <div class="col-md-6" style="font-size:14px;">
                                    <select id="project_members_id" name="project_members_id" class="js-example-basic-single" required style="width:100%;">
                                        <option value="">Select Member</option>
                                        @foreach($projectMembers as $projectMember)
                                        <option value="{{ $projectMember->id }}">{{ $projectMember->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="col-md-6">
                                    <label for="project_role_id" class="form-label mb-3">Role</label>
                                </div>

                                <div class="col-md-6">
                                    <select id="project_role_id" name="project_role_id" class="form-control" required>
                                        <option value="">Select Role</option>
                                            @foreach ($projectRoles as $projectRole)
                                                <option value="{{ $projectRole->id }}">{{ $projectRole->member_role_type }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 mt-3 text-end">
                                    <button type="button" class="btn" id="addMemberBtn" style="background-color: #012970; color: white;">Add Member</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                                
             <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                                        <option value="">Select Member</option>
                                        @foreach($projectMembers as $projectMember)
                                        <option value="{{ $projectMember->id }}">{{ $projectMember->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="editRoleSelect" class="form-label mb-3">Role</label>
                                </div>

                                <div class="col-md-6">
                                    <select id="editRoleSelect" name="editRoleSelect" class="form-control" required>
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

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
            </div>
    </form>
</div>

<!-- Select2 JS -->
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2({
    placeholder: 'Select Member',
    dropdownParent:'#myModal'
    });
});
</script>

<!-- CSK Editor JS -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

<!-- ADD Member $ EDIT Member JS -->
<script>
$(document).ready(function() {
    // Plus sign click event handler
    $('#plusSign').click(function() {
    // Show the add member modal
    $('#myModal').modal('show');
    });

    // Add member button click event handler
    $("#addMemberBtn").click(function() {
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
    $(document).on('click', '.edit-icon', function() {
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
    $('#updateMemberBtn').click(function() {
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
    $('#removeBtn').click(function() {
    // Get the reference to the card being edited
    var card = $('#editModal').data('card');

    // Remove the card from the container
    card.parent().remove();

    // Hide the edit modal
    $('#editModal').modal('hide');
    });
});
</script>

<!-- <script>
    // JavaScript code to update the circle based on the selected technology
    var selectElement = document.getElementById("technology_id");
    var containerElement = document.getElementById("selectedTechnologyContainer");

    selectElement.addEventListener("change", function() {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var technologyName = selectedOption.text;
        var firstName = technologyName.split(" ")[0];
        
        // Remove existing circle, if any
        while (containerElement.firstChild) {
            containerElement.removeChild(containerElement.firstChild);
        }
        
        if (firstName) {
            var circleElement = document.createElement("div");
            circleElement.style.display = "inline-block";
            circleElement.style.width = "20px";
            circleElement.style.height = "20px";
            circleElement.style.borderRadius = "50%";
            circleElement.style.backgroundColor = "gray";
            circleElement.style.marginRight = "5px";
            circleElement.style.textAlign = "center";
            circleElement.style.color = "white";
            circleElement.style.fontSize = "12px";
            circleElement.style.lineHeight = "20px";
            circleElement.textContent = firstName.charAt(0).toUpperCase();
            
            containerElement.appendChild(circleElement);
        }
    });
</script> -->

<script>
  var selectContainer = document.querySelector('.custom-select');
  var selectSelected = selectContainer.querySelector('.select-selected');
  var selectItems = selectContainer.querySelector('.select-items');
  var selectOptions = selectItems.querySelectorAll('div');
  var circle = selectSelected.querySelector('.circle');

  selectSelected.addEventListener('click', function () {
    selectItems.classList.toggle('select-hide');
  });

  for (var i = 0; i < selectOptions.length; i++) {
    selectOptions[i].addEventListener('click', function () {
      var selectedOption = this.textContent.trim();

      selectSelected.textContent = selectedOption;
      selectItems.classList.add('select-hide');
    });
  }

  document.addEventListener('click', function (event) {
    if (!selectContainer.contains(event.target)) {
      selectItems.classList.add('select-hide');
    }
  });

  // Update circle based on the selected option
  selectContainer.addEventListener('change', function () {
    var selectedOption = selectContainer.value;
    var selectedOptionText = selectOptions[selectedOption].textContent.trim();
    var selectedOptionFirstLetter = selectedOptionText.charAt(0).toUpperCase();

    circle.textContent = selectedOptionFirstLetter;
  });
</script>

@endsection
