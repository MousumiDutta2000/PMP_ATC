@extends('layouts.side_nav')

@section('pageTitle', 'Add users')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">Add User</li>
@endsection

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/profile_create_form.css') }}"> 
@endsection 

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/profiles.js') }}"></script>
@endsection

@section('content')
    <div class="titlebar"></div>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <form method="post" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
            @csrf
            <div id="section-1">
                <h5>Add Profile Details</h5>
                <div class="w-50">
                    <div>
                        <div class="form-group">
                            <div class="image-preview">
                                <div class="circle-preview" id="circle-preview"></div>
                            </div>
                            <div class="d-flex">
                                <input type="file" name="image" accept="image/*" id="image" style="display: none" onchange="showFile(event)">
                                <label for="image" class="btn btn-secondary">
                                    <i class="bi bi-camera"></i> Choose Image
                                </label>
                            </div>
                            <div class="text-secondary text-xs mt-1">Click to add profile picture</div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="profile_name" class="mb-1" style="font-size: 15px;">Name:</label>
                            <input type="text" name="profile_name" id="profile_name" class="form-control shadow-sm" placeholder="Enter name" value="{{ old('profile_name') }}" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="contact_number" class="mb-1" style="font-size: 15px;">Contact Number:</label>
                            <input type="text" class="form-control shadow-sm" name="contact_number" id="contact_number" placeholder="Enter contact number" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="email" class="mb-1" style="font-size: 15px;">Email:</label>
                            <input type="text" class="form-control shadow-sm" name="email" id="email" placeholder="Enter email id" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="showSection(2)">Next</button>
            </div>

            <div id="section-2" style="display: none;">
                <h3>Section 2: Password, Confirm Password, Is Admin</h3>
                <div>
                    <div>
                        <div class="form-group">
                            <label for="password" class="mb-1" style="font-size: 15px;">Password:</label>
                            <input type="password" class="form-control shadow-sm" name="password" id="password" placeholder="Enter password" required style="color: #858585; font-size: 14px; height: 39px; border-radius: 4px">
                        </div>
                    </div>
                    <div>
                        <div class="form-group form-check form-switch mt-4">
                            <label class="form-check-label mt-2" for="is_admin" style="margin-left:10px;">Is Admin</label>
                            <input class="form-check-input" role="switch" type="checkbox" name="is_admin" id="is_admin" style="width: 4em; height: 2em;">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="showSection(1)">Previous</button>
                <button type="button" class="btn btn-primary" onclick="showSection(3)">Next</button>
            </div>

            <div id="section-3" style="display: none;">
                <h3>Section 3: Father's Name, DOB, Work Location, Work Address, Highest Educational Values, Designation, Line manager, Vertical</h3>
                <div>
                    <div>
                        <div class="form-group">
                            <label for="father_name" class="mb-1" style="font-size: 15px;">Father's Name:</label>
                            <input type="text" name="father_name" id="father_name" class="form-control shadow-sm" placeholder="Enter father's name" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="DOB" class="mb-1" style="font-size: 15px;">Date of Birth:</label>
                            <input type="date" name="DOB" id="DOB" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="work_location" class="mb-1" style="font-size: 15px;">Work Location:</label>
                            <input type="text" name="work_location" id="work_location" class="form-control shadow-sm" placeholder="Enter work location" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="work_address" class="mb-1" style="font-size: 15px;">Work Address:</label>
                            <input type="text" name="work_address" id="work_address" class="form-control shadow-sm" placeholder="Enter work address" required style="color: #858585; font-size: 14px;">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="highest_educational_qualification_id" class="mb-1" style="font-size: 15px;">Highest Educational Qualification:</label>
                            <select name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Highest Educational Qualification</option>
                                @foreach($qualifications as $qualification)
                                    <option value="{{ $qualification->id }}">{{ $qualification->highest_education_value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="designation_id" class="mb-1" style="font-size: 15px;">Designation:</label>
                            <select name="designation_id" id="designation_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Designation</option>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="line_manager_id" class="mb-1" style="font-size: 15px;">Line Manager:</label>
                            <select name="line_manager_id" id="line_manager_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Line Manager</option>
                                @foreach ($lineManagers as $lineManager)
                                    <option value="{{ $lineManager->id }}">{{ $lineManager->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="vertical_id" class="mb-1" style="font-size: 15px;">Vertical:</label>
                            <select name="vertical_id" id="vertical_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                                <option value="">Select Vertical</option>
                                @foreach ($verticals as $vertical)
                                    <option value="{{ $vertical->id }}">{{ $vertical->vertical_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="showSection(2)">Previous</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('custom_js')
    <script>
        function showSection(sectionNumber) {
            document.getElementById('section-1').style.display = 'none';
            document.getElementById('section-2').style.display = 'none';
            document.getElementById('section-3').style.display = 'none';

            if (sectionNumber === 1) {
                document.getElementById('section-1').style.display = 'block';
            } else if (sectionNumber === 2) {
                document.getElementById('section-2').style.display = 'block';
            } else if (sectionNumber === 3) {
                document.getElementById('section-3').style.display = 'block';
            }
        }
        
        function showFile(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                var circlePreview = document.getElementById("circle-preview");
                circlePreview.style.backgroundImage = `url(${e.target.result})`;
                circlePreview.style.backgroundSize = "cover";
                circlePreview.style.backgroundPosition = "center";
            };

            reader.readAsDataURL(file);
        }


    </script>
@endsection
