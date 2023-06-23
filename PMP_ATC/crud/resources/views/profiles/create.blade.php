@extends('layouts.side_nav')

@section('pageTitle', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">Add User</li>
@endsection

@section('content')
    <div class="titlebar">
        <h1>Add users</h1>
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
    <div class="card" style="background-color:#DEE1FA">
        <div class="card-body">
            <form method="post" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class ="col-md-4">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="form-group">
                            <label for="name">Father's Name:</label>
                            <input type="text" name="father_name" id="father_name" class="form-control" required>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="form-group">
                            <label for="name">DOB:</label>
                            <input type="date" name="DOB" id="DOB" class="form-control" required>
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="form-group">
                            <label for="highest_educational_qualification_id">Highest Educational Qualification:</label>
                            <input type="text" name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control" required>
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="form-group">
                            <label for="image">Add Image:</label>
                            <img src="" alt="" class="img-product" id="file-preview">
                            <input type="file" name="image" accept="image/*" class="form-control" onchange="showFile(event)">
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="form-group">
                            <label for="contact_number">Contact Number:</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number" required>
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="form-group">
                            <label for="name">Work Location:</label>
                            <input type="text" name="work_location" id="work_location" class="form-control" required>
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="form-group">
                            <label for="name">Work Address:</label>
                            <input type="text" name="work_address" id="work_address" class="form-control" required>
                        </div>
                    </div>
                    <div class ="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="designation_id">Designation:</label>
                            <!-- <select class="form-control" id="statusSelect" name="profile_designation" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                                <option value="" selected="selected" disabled="disabled">Select Designation</option>
                                <option>1</option>
                            </select> -->
                            <input type="text" class="form-control" name="designation_id" id="designation_id" required>
                        </div>
                    </div>
                    <div class ="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="vertical_id">Vertical:</label>
                            <!-- <select class="form-control" id="statusSelect" name="profile_vertical" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                                <option value="" selected="selected" disabled="disabled">Select Vertical</option>
                                <option>1</option>
                            </select> -->
                            <input type="text" name="vertical_id" id="vertical_id" class="form-control" required>
                        </div>
                    </div>
                    <div class ="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="line_manager_id">Line Manager</label>
                            <!-- <select class="form-control" id="statusSelect" name="profile_manager" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; border-radious:10px">
                                <option value="" selected="selected" disabled="disabled">Select Your Manager</option>
                                <option>1</option>
                            </select> -->
                            <input type="text" class="form-control" name="line_manager_id" id="line_manager_id" required>
                        </div>
                    </div>
                    <div class ="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="user_id">User ID</label>
                            <input type="text" class="form-control" name="user_id" id="user_id" required>
                            <!-- <select class="form-control" id="statusSelect" name="profile_users" required="required" style="padding-top:5px; padding-bottom:5px; height:39px;">
                                <option value="" selected="selected" disabled="disabled">Select User</option>
                                <option>1</option>
                            </select> -->
                        </div>
                    </div>
                 </div>
                <div class="form-actions mt-2">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('profiles.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
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
