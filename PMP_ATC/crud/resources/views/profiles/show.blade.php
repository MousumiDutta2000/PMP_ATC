@extends('layouts.side_nav')
@section('pageTitle', 'Profile')

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Your other JavaScript code -->
    
    <script>
        $(document).ready(function() {
            // Add click event listener to the add button
            $('#addSkillButton').click(function(e) {
                e.preventDefault();

                // Open the addModal
                $('#addModal').modal('show');
            });
        });
    </script>
@endsection

@section('content')

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="{{ asset($profile->image) }}" alt="Profile" class="rounded-circle">
          <div class="pt-2">
            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
          </div>
          <h2>{{$profile->profile_name}}</h2>
          <h3>{{ $profile->designation->level }}</h3>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-permissions">Permissions</button>
            </li>
            
            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#skill-set">Skill Set</button>
            </li>
          </ul>

          <div class="tab-content pt-2">
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <br>
              <h5 class="card-title">Personal Details</h5>
              <br>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Full Name</div>
                <div class="col-lg-9 col-md-8">{{ $profile->profile_name }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Father's Name</div>
                <div class="col-lg-9 col-md-8">{{$profile->father_name}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                <div class="col-lg-9 col-md-8">{{$profile->DOB}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Work Location</div>
                <div class="col-lg-9 col-md-8">{{$profile->work_location}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Work Address</div>
                <div class="col-lg-9 col-md-8">{{$profile->work_address}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Highest Educational Qualification</div>
                <div class="col-lg-9 col-md-8">
                  <span id="highest_education">{{$profile->highestEducationValue->highest_education_value}}</span>
                  <button class="btn btn-primary btn-sm edit-field" data-field="highest_education" title="Edit Highest Education"><i class="ri-edit-2-fill"></i></button>
                </div>
              </div>
              <br>
              <h5 class="card-title">Contact Details</h5>
              <br>
              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{$profile->email}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Contact Number</div>
                <div class="col-lg-9 col-md-8">
                  <span id="contact_number">{{$profile->contact_number}}</span>
                  <button class="btn btn-primary btn-sm edit-field" data-field="contact_number" title="Edit Contact Number"><i class="ri-edit-2-fill"></i></button>
                </div>
              </div>
            </div>

            <div class="tab-pane fade show active skill-set" id="skill-set">
              <br>
              <h5 class="card-title">Skill Set</h5>
              <a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-primary" id="addSkillButton">Add Skill</a>
              <br>
              <main class="container">
                <section>
                  <table id="example" class="table table-hover responsive" style="width: 100%;border-spacing: 0 10px;">
                  <br>
                    <thead>
                        <tr>
                            <th>Technology</th>
                            <th>Years Of Experience</th>
                            <th>Role</th>
                            <th>Details</th>
                            <th>Is Under Current Company</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($user_technologies as $user_technology)
                    @if($user_technology->user_id == $profile->user_id)
                        
                        <tr class = "shadow" style="border-radius:15px;">
                            <td>{{ $user_technology->technology->technology_name }}</td>
                            <td>{{ $user_technology->years_of_experience}}</td>
                            <td>{{ $user_technology->project_role->member_role_type }}</td>
                            <td>{{ $user_technology->details }}</td>
                            @if($user_technology->is_current_company == 0)
                            
                                <td>No</td>
                            
                            @elseif($user_technology->is_current_company == 1)
                            
                                <td>Yes</td>
                            
                            @endif
                            <td>
                                <div class="btn-group" role="group">
                                            <a href="{{ route('user_technologies.edit', $user_technology->id) }}">
                                                <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                            </a>
                                            <form method="post" action="{{ route('user_technologies.destroy', $user_technology->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0">
                                                    <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                                </button>
                                            </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                      @endforeach           
                    </tbody>
                  </table>
                </section>
              </main>
            </div>

            <!--Add modal-->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Skill Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</i> </span>
                                </button>
                            </div>
                              <div class="modal-body">
                                <form method="post" action="{{ route('user_technologies.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-3">
                                      <div class ="col-md-4">
                                          <div class="form-group">
                                              <label for="user_id">User:</label>
                                              <input type="text" name="user_id" id="user_id" class="form-control" required>
                                          </div>                                    
                                      </div>
                                      <div class ="col-md-4">
                                          <div class="form-group">
                                              <label for="project_role_id">Role:</label>
                                              <select name="project_role_id" id="project_role_id" class="form-control" required>
                                                  <option value="">Select Role</option>
                                                  @foreach ($project_roles as $project_role)
                                                      <option value="{{ $project_role->id }}">{{ $project_role->member_role_type }}</option>
                                                  @endforeach
                                              </select>                                       
                                          </div>
                                      </div>
                                      <div class ="col-md-6">
                                          <div class="form-group">
                                              <label for="details">Details:</label>
                                              <textarea class="form-control" class="shadow-sm" name="details" id="details" required="required"></textarea>
                                          </div>                                   
                                      </div>
                                      <div class ="col-md-4">
                                              <div class="form-group">
                                                  <label for="technology_id">Technology:</label>
                                                  <select name="technology_id" id="technology_id" class="form-control" required>
                                                    <option value="">Select Technology</option>
                                                    @foreach ($technologies as $technology)
                                                        <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                                                    @endforeach
                                                  </select>                                             
                                              </div>
                                      </div>
                                      <div class ="col-md-6">
                                          <div class="form-group">
                                              <label for="years_of_experience">Years Of Experience:</label>
                                              <input type="text" name="years_of_experience" id="years_of_experience" class="form-control" required>
                                          </div>
                                      
                                      </div>
                                      
                                      <div class="col-md-6">
                        
                                          <div class="form-group">
                                              <label for="typeSelect">Is Under Current Company:</label>
                                              <input type="checkbox" name="is_current_company" id="is_current_company" value="1" {{ old('is_current_company') ? 'checked' : '' }}>

                                          </div>
                                          <br>
                                      </div>
                                    </div>   
                                  <div class="form-actions mt-2">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                  </div>
                                </form>
                              </div>
                          </div>
                        </div>
                      </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
              <!-- Profile Edit Form -->
              <form>
                <div class="row mb-3">
                  <label for="company" class="col-md-4 col-lg-3 col-form-label">Highest Educational Qualification</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="company" type="text" class="form-control" id="company" value="MBA">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
              </form><!-- End Profile Edit Form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Field</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="editField" value="">
        <input type="text" class="form-control" id="editValue" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Handle edit button click
  $('.edit-field').click(function() {
    var field = $(this).data('field');
    var value = $('#' + field).text();

    $('#editField').val(field);
    $('#editValue').val(value);
    $('#editModal').modal('show');
  });

  // Handle save changes
  $('#saveChanges').click(function() {
    var field = $('#editField').val();
    var value = $('#editValue').val();

    $('#' + field).text(value);
    $('#editModal').modal('hide');
  });
</script>

@endsection
