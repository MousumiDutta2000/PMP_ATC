@extends('layouts.side_nav')

@section('pageTitle', 'Add users')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">Add User</li>
@endsection

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
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
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="profile_name" class="mb-1" style="font-size: 15px;">Name:</label>
                        <input type="text" name="profile_name" id="profile_name" class="form-control shadow-sm" placeholder="Enter name" value="{{ old('profile_name') }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="mb-1" style="font-size: 15px;">Father's Name:</label>
                        <input type="text" name="father_name" id="father_name" class="form-control shadow-sm" placeholder="Enter father's name" required style="color: #858585; font-size: 14px;">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="mb-1" style="font-size: 15px;">Date of Birth:</label>
                        <input type="date" name="DOB" id="DOB" class="form-control shadow-sm" required style="color: #858585; font-size: 14px;">
                    </div>
                </div>

                <hr style="border-top: 0px solid #0129704a;">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact_number" class="mb-1" style="font-size: 15px;">Contact Number:</label>
                        <input type="text" class="form-control shadow-sm" name="contact_number" id="contact_number" placeholder="Enter contact number" required style="color: #858585; font-size: 14px;">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email" class="mb-1" style="font-size: 15px;">Email:</label>
                        <input type="text" class="form-control shadow-sm" name="email" id="email" placeholder="Enter email id" required style="color: #858585; font-size: 14px;">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password" class="mb-1" style="font-size: 15px;">Password:</label>
                        <input type="password" class="form-control shadow-sm" name="password" id="password" placeholder="Enter password" required style="color: #858585; font-size: 14px; height: 39px; border-radius: 4px">
                    </div>
                </div>

                <hr style="border-top: 0px solid #0129704a;">

                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="image" class="mb-1" style="font-size: 15px;">Add Image:</label>
                        <img src="" alt="" class="img-product" id="file-preview" style="max-width: 150px;">
                        <input type="file" name="image" accept="image/*" class="form-control shadow-sm" style="color: #858585; font-size: 14px;">
                    </div>
                </div>
                
                <hr style="border-top: 0px solid #0129704a;">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="designation_id" class="mb-1" style="font-size: 15px;">Designation:</label>
                        <select name="designation_id" id="designation_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px; padding: 8px !important; height: 39px; border-radius: 4px">
                            <option value="">Select Designation</option>
                            @foreach ($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->level }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="mb-1" style="font-size: 15px;">Work Location:</label>
                        <input type="text" name="work_location" id="work_location" class="form-control shadow-sm" placeholder="Enter work location" required style="color: #858585; font-size: 14px;">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="mb-1" style="font-size: 15px;">Work Address:</label>
                        <input type="text" name="work_address" id="work_address" class="form-control shadow-sm" placeholder="Enter work address" required style="color: #858585; font-size: 14px;">
                    </div>
                </div>

                <hr style="border-top: 0px solid #0129704a;">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="vertical_id" class="mb-1" style="font-size: 15px;">Vertical:</label>
                        <select name="vertical_id" id="vertical_id" class="form-control shadow-sm" required style="color: #858585; font-size: 14px; padding: 8px !important;">
                            <option value="">Select Vertical</option>
                            @foreach ($verticals as $vertical)
                                <option value="{{ $vertical->id }}">{{ $vertical->vertical_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
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

                <div class="col-md-4">
                    <div class="form-group form-check form-switch mt-4">
                        <label class="form-check-label mt-2" for="is_admin" style="margin-left:5px;">Is Admin</label>
                        <input class="form-check-input" role="switch" type="checkbox" name="is_admin" id="is_admin" style="width: 3em; height: 2em;">
                    </div>
                </div>
            </div>

            <div class="form-actions mt-3 text-end">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('profiles.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@section('custom_js')
    <script>
        function showFile(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("file-preview").src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
