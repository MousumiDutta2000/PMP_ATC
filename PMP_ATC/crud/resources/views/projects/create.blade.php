@extends('layouts.side_nav') 

@section('pageTitle', 'Project') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('projects.index') }}">Project</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
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
                    <input type="text" name="project_name" id="project_name" required="required"></div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="typeSelect">Project Type</label>
                    <select id="typeSelect" name="project_type" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                <option value="" selected="selected" disabled="disabled">Type</option>
                <option>Internal</option>
                <option>External</option>
            </select>
                </div>
            </div>

            <div class="form-group">
                <label for="project_description">Description</label>
                <textarea class="ckeditor form-control" name="project_description" id="project_description" required="required"></textarea>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_startDate">Project Start Date</label>
                    <input type="date" name="project_startDate" id="project_startDate" required="required"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_endDate">Project End Date</label>
                    <input type="date" name="project_endDate" id="project_endDate" required="required"></div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_manager">Project Manager</label>
                    <input type="text" name="project_manager" id="project_manager" required="required">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="statusSelect">Status</label>
                    <select id="statusSelect" name="project_status" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
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
                    <label for="vertical_id">Vertical</label>
                    <select id="vertical_id" name="project_status" required="required">
                    <option value="" selected="selected" disabled="disabled">Vertical</option>
                    <option>Vertical 1</option>
                    <option>Vertical 2</option>
                    <option>Vertical 3</option>
                    </select>
                </div> 

                 <!-- <input type="text" name="vertical_id" id="vertical_id" required="required"></div>  -->
            </div>

            <hr>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select id="client_id" name="project_status" required="required">
                    <option value="" selected="selected" disabled="disabled">Client</option>
                    <option>Client 1</option>
                    <option>Client 1</option>
                    <option>Client 1</option>
                    </select>
                </div> 
                 <!-- <input type="text" name="clients_id" id="client_id" required="required"></div>  -->
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
                <label for="technologies_id">Technologies</label>
                <textarea name="technologies_id" id="technologies_id" required="required"></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label for="memberInput" class="form-label" style="height:20px;">Member</label>
                <i class="fa fa-plus-circle" id="plusSign" style="color: #7d4287; cursor: pointer;"></i>
            </div>

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
                                <input type="text" class="form-control mb-3" id="fieldName" placeholder="Enter member name" required="required">
                            </div>

                            <div class="col-md-6">
                                <label for="roleSelect" class="form-label mb-3">Role</label>
                            </div>

                            <div class="col-md-6">
                                <select id="roleSelect" name="role" class="form-select" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                                    <option value="" selected="selected" disabled="disabled">Role</option>
                                    <option>Frontend Developer</option>
                                    <option>Backend Developer</option>
                                    <option>Full Stack Developer</option>
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

       
        <div class="row" id="memberCardContainer"></div>










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
                                <input type="text" class="form-control mb-3" id="editFieldName" placeholder="Enter member name">
                            </div>

                            <div class="col-md-6">
                                <label for="editRoleSelect" class="form-label mb-3">Role</label>
                            </div>

                            <div class="col-md-6">
                                <select id="editRoleSelect" name="editRole" class="form-select" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                                    <option value="" selected="selected" disabled="disabled">Role</option>
                                    <option>Frontend Developer</option>
                                    <option>Backend Developer</option>
                                    <option>Full Stack Developer</option>
                                </select>
                            </div>

                            <div class="modal-footer">
    <button type="button" class="btn btn-danger" id="removeBtn">Remove</button>
    <button type="button" class="btn btn-primary" id="updateMemberBtn">Update</button>
</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<script>

    

// Member JS 

$(document).ready(function() {
    // Plus sign click event handler
    $('#plusSign').click(function() {
      // Show the add member modal
      $('#myModal').modal('show');
    });
  
    // Add Member button click event handler
    $('#addMemberBtn').click(function() {
      // Get the entered member name and role from the modal
      var memberName = $('#fieldName').val();
      var memberRole = $('#roleSelect').val();
  
      // Create a new card with the entered details
      var newCard = '<div class="card">' +
        '<div class="profile-image">' +
        '<img src="{{ asset('img/profile-img.jpg') }}" alt="Profile Image">' +
        '</div>' +
        '<div class="user-details">' +
        '<h3 class="user-name">' + memberName + '</h3>' +
        '<p class="designation">' + memberRole + '</p>' +
        '</div>' +
        '<div class="edit-icon">' +
        '<i class="fa fa-edit"></i>' +
        '</div>' +
        '</div>';
  
      // Append the new card to the memberCard container
      $('#memberCardContainer').append(newCard);
  
      // Clear the input fields in the modal
      $('#fieldName').val('');
      $('#roleSelect').val('');
  
      // Hide the add member modal
      $('#myModal').modal('hide');
    });
  
    // Edit Member button click event handler
  $(document).on('click', '.edit-icon', function() {
    // Get the current member name and role from the card
    var card = $(this).closest('.card');
    var memberName = card.find('.user-name').text();
    var memberRole = card.find('.designation').text();
  
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
    // Get the edited member name and role from the edit modal
    var editedMemberName = $('#editFieldName').val();
    var editedMemberRole = $('#editRoleSelect').val();
  
    // Get the reference to the card being edited
    var card = $('#editModal').data('card');
  
    // Update the card with the edited values
    card.find('.user-name').text(editedMemberName);
    card.find('.designation').text(editedMemberRole);
  
    // Hide the edit modal
    $('#editModal').modal('hide');
  });
  
  // Remove Member button click event handler
  $('#removeBtn').click(function() {
    // Get the reference to the card being edited
    var card = $('#editModal').data('card');
  
    // Remove the entire card from the DOM
    card.remove();
  
    // Hide the edit modal
    $('#editModal').modal('hide');
  });
  
  });

  </script>

@endsection