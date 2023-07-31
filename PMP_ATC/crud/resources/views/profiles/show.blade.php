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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/profiles.js') }}"></script>
    <script src="{{ asset('js/side_highlight.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function showFile(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("file-preview").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        $(document).ready(function() {
            let editable = {{ $editable ? 'true' : 'false' }};
            toggleEditFields(editable);

            $('#editProfileButton').on('click', function() {
                editable = !editable;
                toggleEditFields(editable);
            });

            function toggleEditFields(editable) {
              let formId = 'editProfileForm';
              let editableFields = [
                  'highest_educational_qualification_id',
                  'contact_number',
              ];

              // Toggle the visibility of the span and input elements for Highest Educational Qualification
              $('#' + formId + ' #' + 'highest_education_span').toggle(!editable);
              $('#' + formId + ' #' + 'highest_educational_qualification_id').toggle(editable);

              // Toggle the visibility of the span and input elements for Contact Number
              $('#' + formId + ' #' + 'contact_number_span').toggle(!editable);
              $('#' + formId + ' #' + 'contact_number').toggle(editable);

              editableFields.forEach(function(field) {
                  $('#' + formId + ' #' + field).prop('readonly', !editable);
              });

              $('#' + formId + ' button[type="submit"]').toggle(editable);
          }
        });
    </script>
@endsection



@section('content')

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">
      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          @if($profile->image)
            <img src="{{ asset($profile->image) }}" alt="Profile" class="rounded-circle" style="height:100px;">
          @else
              <!-- Show initials as the new profile image -->
              <div class="rounded-circle" style="background-color: {{ generateUniqueColor(strtoupper(substr($profile->profile_name, 0, 2))) }}; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 100px;">
                  {{ strtoupper(substr($profile->profile_name, 0, 1)) }}
              </div>
          @endif 
          <div class="pt-2 d-flex">
            <div class="btn-group mr-2" role="group">
              <a href="#" data-toggle="modal" data-target="#updatePfpModal{{$profile->id}}" class="btn btn-primary btn-sm" title="Upload new profile image" id="updatePfpButton"><i class="bi bi-upload"></i></a>
            </div>
            <div class="btn-group" role="group">
              <!-- Add the delete image button here -->
              <form action="{{ route('profiles.deleteImage', $profile->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm" title="Remove my profile image">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>          
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
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#skill-set">Skill Set</button>
            </li>
          </ul>

          <div class="tab-content pt-2">


            <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <div class="card-header d-flex justify-content-end">
                <button class="btn btn-primary btn-sm edit-field" id="editProfileButton"><i class="ri-edit-2-fill"></i></button>
              </div>
              <h5 class="card-title">Personal Details</h5>
                <div class="col-md-6 mb-2">
                  <div class="label" style="display: inline-block; width: 200px;">Full Name</div>
                  <div style="display: inline-block;">{{ $profile->profile_name }}</div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="label" style="display: inline-block; width: 200px;">Father's Name</div>
                  <div style="display: inline-block;">{{$profile->father_name}}</div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="label" style="display: inline-block; width: 200px;">Date Of Birth</div>
                  <div style="display: inline-block;">{{$profile->DOB}}</div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="label" style="display: inline-block; width: 200px;">Work Location</div>
                  <div style="display: inline-block;">{{$profile->work_location}}</div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="label" style="display: inline-block; width: 200px;">Work Address</div>
                  <div style="display: inline-block;">{{$profile->work_address}}</div>
                </div>
              <form method="post" action="{{ route('profiles.update2', ['profile' => $profile->id]) }}" enctype="multipart/form-data" id="editProfileForm">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2" style="display:flex">
                  <div class="label" style="display: inline-block; width: 200px;">Highest Educational Qualification</div>
                  <div style="display: inline-block; vertical-align: top;">
                    <div class="form-group" style="display: inline-block;">
                    <span id="highest_education_span">{{$profile->highestEducationValue->highest_education_value}}</span>
                    <select name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control" required{{ $editable ? '' : ' readonly' }} style="display: inline-block; width: auto;">
                      @foreach ($qualifications as $qualification)
                        <option value="{{ $qualification->id }}" {{ $profile->highest_educational_qualification_id == $qualification->id ? 'selected' : '' }}>
                          {{ $qualification->highest_education_value }}
                        </option>
                      @endforeach
                    </select>
                    </div>             
                  </div>
                </div>
                <br>
                <h5 class="card-title">Contact Details</h5>
                <div class="col-md-6 mb-2">
                  <div class="label" style="display: inline-block; width: 200px;">Email</div>
                  <div style="display: inline-block; vertical-align: top;">
                  {{$profile->email}}
                    <div class="form-group" style="display: inline-block;">
                      <input type="text" class="form-control" name="email" id="email" value="{{ $profile->email }}" required hidden>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-2" style="display:flex">
                  <div class="label" style="display: inline-block; width: 200px;">Contact Number</div>
                  <div style="display: inline-block; vertical-align: top;">
                    <div class="form-group" style="display: inline-block; padding-left: 39px;">
                      <span id="contact_number_span" style="padding-right:66px;">{{$profile->contact_number}}</span>
                      <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ $profile->contact_number }}"{{ $editable ? '' : ' readonly' }} maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" style="display: inline-block;">                    
                    </div>
                  </div>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary" {{ $editable ? '' : ' style=display:none' }} id="editProfileButton">Update</button>
                </div>
              </form>
            </div>
            

            <div class="tab-pane fade show skill-set" id="skill-set">
              <br>
              <h5 class="card-title">Skill Set</h5>
              <div style="display: flex; justify-content: flex-end; margin-top: -40px;">
                <a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-primary" id="addSkillButton">Add Skill</a>
              </div>
              <br>
              <main class="container">
                <section>
                  <table  class="table table-hover responsive" style="width: 100%;border-spacing: 0 10px; border-collapse: separate;">
                    <thead>
                        <tr>
                            <th>Technology</th>
                            <th>Years Of Experience</th>
                            <th>Role</th>
                            <th>Is Under Current Company</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($user_technologies as $user_technology)
                        @if($user_technology->user_id == $profile->user_id)
                          
                          <tr class = "shadow" style="border-radius:15px;">
                              <td>{{ $user_technology->technology->technology_name }}</td>
                              <td style="padding-left:80px">{{ $user_technology->years_of_experience}}</td>
                              <td>{{ $user_technology->project_role->member_role_type }}</td>
                              @if($user_technology->is_current_company == 0)
                                  <td style="padding-left:80px">No</td>
                              @elseif($user_technology->is_current_company == 1)
                                  <td style="padding-left:80px">Yes</td>
                              @endif
                              <td>
                                <div class="btn-group" role="group">
                                  <a href="#" data-toggle="modal" data-target="#showModal_{{ $user_technology->id }}">
                                    <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                  </a>
                                  <a href="#" data-toggle="modal" data-target="#editModal_{{ $user_technology->id }}">
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


          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Add skill modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">                
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style=" background-color:#061148; ">
        <h5 class="modal-title" id="addModalLabel" style="color: white;font-weight: bolder;">Add Skill Details</h5>
      </div>
      @if($errors->any())
        <div>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="modal-body">
        <form method="post" action="{{ route('user_technologies.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="row mt-3">  
            <input value="{{$profile->user_id}}" name="user_id" id="user_id" class="form-control " hidden required>
            <div class ="col-md-12">
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

            <div class ="col-md-12">
              <div class="form-group">
                <label for="years_of_experience">Years Of Experience:</label>
                <input type="text" name="years_of_experience" id="years_of_experience" class="form-control" required>
              </div>
            </div>

            <div class ="col-md-12">
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
                                     
            <div class="form-group">
              <label for="details">Details:</label>
              <textarea class="form-control" class="shadow-sm" name="details" id="details" required="required"></textarea>
            </div>                                   
                                      
            <div class="col-md-6">            
              <div class="form-group">
                <label for="typeSelect">Is Under Current Company:</label>
                <input type="checkbox" name="is_current_company" id="is_current_company" value="1" {{ old('is_current_company') ? 'checked' : '' }}>
              </div>
            </div>  

            <div class="form-actions mt-3 text-end modal-footer">
              <button type="submit" class="btn btn-primary">Create</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#D22B2B">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit skill modal-->
@foreach ($user_technologies as $user_technology)
  <div class="modal fade" id="editModal_{{ $user_technology->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel_{{ $user_technology->id }}" aria-hidden="true">                
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style=" background-color:#061148; ">
          <h5 class="modal-title" id="editModalLabel_{{ $user_technology->id }}" style="color: white;font-weight: bolder;">Edit Skill</h5>
        </div>
        @if($errors->any())
          <div>
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="modal-body">
          <form method="post" action="{{ route('user_technologies.update', $user_technology->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
              <div class ="col-md-12">
                <div class="form-group">
                  <label for="technology_id">Technology:</label>
                  <select name="technology_id" id="technology_id" class="form-control" required>
                    @foreach ($technologies as $technology)
                      <option value="{{ $technology->id }}" {{ $user_technology->technology_id == $technology->id ? 'selected' : '' }}>
                        {{ $technology->technology_name }}
                      </option>
                    @endforeach
                  </select>                                             
                </div>
              </div>

              <div class ="col-md-12">
                <div class="form-group">
                    <label for="years_of_experience">Years Of Experience:</label>
                    <input type="text" name="years_of_experience" id="years_of_experience" class="form-control" value="{{ old('years_of_experience', $user_technology->years_of_experience) }}" required>
                </div>                                        
              </div>

              <div class ="col-md-12">
                <div class="form-group">
                  <label for="project_role_id">Role:</label>
                  <select name="project_role_id" id="project_role_id" class="form-control" required>
                    @foreach ($project_roles as $project_role)
                      <option value="{{ $project_role->id }}" {{ $user_technology->project_role_id == $project_role->id ? 'selected' : '' }}>
                        {{ $project_role->member_role_type }}
                      </option>
                    @endforeach
                  </select>                                       
                </div>
              </div>
                                        
              <div class="form-group">
                <label for="details">Details:</label>
                <textarea class="form-control" class="shadow-sm" name="details" id="details" required="required">{{ $user_technology->details }}</textarea>
              </div>                                 
                                          
              <div class="col-md-12">
                <div class="form-group">
                  <label for="typeSelect">Is Under Current Company:</label>
                  <input type="checkbox" name="is_current_company" id="is_current_company" value="1" {{ $user_technology->is_current_company ? 'checked' : '' }}>
                </div>
              </div>

              <div class="form-actions mt-3 text-end modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#D22B2B">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

<!--Show skill modal-->  
@foreach ($user_technologies as $user_technology)                  
  <div class="modal fade" id="showModal_{{ $user_technology->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel_{{ $user_technology->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style=" background-color:#061148; ">
          <h5 class="modal-title" id="showModalLabel_{{  $user_technology->id }}" style="color: white;font-weight: bolder;">Skill Details</h5>
        </div>
        <div class="modal-body">
          <table class="table table-striped" style="margin: 0 auto;">
            <tbody>
              <tr>
                  <th style="font-weight: 600; padding-left:30px;">Technology:</th>
                  <td style="font-weight: 500">{{ $user_technology->technology->technology_name }}</td>
              </tr>
              <tr>
                  <th style="font-weight: 600; padding-left:30px;">Years Of Experience:</th>
                  <td style="font-weight: 500; padding-left:30px;">{{ $user_technology->years_of_experience }}</td>
              </tr>
              <tr>
                  <th style="font-weight: 600; padding-left:30px;">Role:</th>
                  <td style="font-weight: 500">{{ $user_technology->project_role->member_role_type }}</td>
              </tr>
              <tr>
                  <th style="font-weight: 600; padding-left:30px;">Details:</th>
                  <td style="font-weight: 500">{{ $user_technology->details }}</td>
              </tr>
              <tr>
                  <th style="font-weight: 600; padding-left:30px;">Is Under Current Company:</th>
                  @if($user_technology->is_current_company == 0)
                      <td style="font-weight: 500; padding-left:30px;">No</td>
                  @elseif($user_technology->is_current_company == 1)            
                      <td style="font-weight: 500; padding-left:30px;">Yes</td>                  
                  @endif
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#D22B2B">Close</button>
        </div>
      </div>
    </div>
  </div>
@endforeach

<!--Update Profile Picture modal-->
@foreach($profiles as $profile)
  <div class="modal fade" id="updatePfpModal{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="updatePfpModalLabel" aria-hidden="true">                
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style=" background-color:#061148; ">
          <h5 class="modal-title" id="updatePfpModalLabel" style="color: white;font-weight: bolder;">Update Profile Picture</h5>
        </div>
        @if($errors->any())
          <div>
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="modal-body">
          <form method="post" action="{{ route('profiles.update1', ['profile' => $profile->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

              <div class="form-group">
                <label for="image">Current Image:</label>
                <img src="{{ asset($profile->image) }}" alt="Current Image" class="img-product" id="file-preview" style="width:80px;height:80px">
                <br>
                <label for="image">Change Image:</label>
                <input type="file" name="image" accept="image/*" class="form-control" onchange="showFile(event)">
              </div>

              <div class="form-actions mt-3 text-end modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#D22B2B">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection
