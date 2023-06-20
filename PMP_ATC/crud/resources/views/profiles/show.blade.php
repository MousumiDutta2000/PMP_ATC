@extends('layouts.side_nav')
@section('pageTitle', 'Profile')
@section('content')

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{asset('img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
              <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
              <h2>Kevin Anderson</h2>
              <h3>L1A</h3>
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
                <li class="nav-item" style = "position:absolute; top:80px; right:15px;">
                <button class="btn btn-primary" data-bs-toggle="tab" data-bs-target="#profile-edit"><i class=" ri-edit-2-fill"></i></button>
                </li>
              </ul>
              <!-- <span style = "position:absolute; top:80px; right:15px;"><button class="btn btn-primary" data-bs-target="#profile-edit"><i class=" ri-edit-2-fill"></i></button></span>  -->
              <div class="tab-content pt-2">

              

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  

                  <h5 class="card-title">Basic Details</h5>

                  <div class="row">
                    
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                  </div>
                  
                  <!-- <span style = "position:absolute; top:80px; right:15px;"><button class="btn btn-primary" data-bs-target="#profile-edit"><i class=" ri-edit-2-fill"></i></button></span>  -->
        
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                  </div>

                  <h5 class="card-title">Additional Details</h5> 

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Line Manager</div>
                    <div class="col-lg-9 col-md-8">Andrew Anderson</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Vertical</div>
                    <div class="col-lg-9 col-md-8">XYZ</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Designation</div>
                    <div class="col-lg-9 col-md-8">L1A</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Highest Educational Qualification</div>
                    <div class="col-lg-9 col-md-8">B.Tech</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact Number</div>
                    <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
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

              </ul>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection