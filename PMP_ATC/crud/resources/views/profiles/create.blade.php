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
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Father's Name:</label>
                            <input type="text" name="father_name" id="father_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">DOB:</label>
                            <input type="date" name="DOB" id="DOB" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="highest_educational_qualification_id">Highest Educational Qualification:</label>
                            <select name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control" required>
                                <option value="">Select Highest Educational Qualification</option>
                                @foreach($qualifications as $qualification)
                                    <option value="{{ $qualification->id }}">{{ $qualification->highest_education_value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="image">Add Image:</label>
                            <img src="" alt="" class="img-product" id="file-preview" style="max-width: 150px;">
                            <input type="file" name="image" accept="image/*" class="form-control" onchange="showFile(event)">
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="contact_number">Contact Number:</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="name">Work Location:</label>
                            <input type="text" name="work_location" id="work_location" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label for="name">Work Address:</label>
                            <input type="text" name="work_address" id="work_address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="designation_id">Designation:</label>
                            <select name="designation_id" id="designation_id" class="form-control" required>
                                <option value="">Select Designation</option>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="vertical_id">Vertical:</label>
                            <select name="vertical_id" id="vertical_id" class="form-control" required>
                                <option value="">Select Vertical</option>
                                @foreach ($verticals as $vertical)
                                    <option value="{{ $vertical->id }}">{{ $vertical->vertical_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="line_manager_id">Line Manager:</label>
                            <select name="line_manager_id" id="line_manager_id" class="form-control" required>
                                <option value="">Select Line Manager</option>
                                @foreach ($lineManagers as $lineManager)
                                    <option value="{{ $lineManager->id }}">{{ $lineManager->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="user_id">User:</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-actions mt-3 text-end">
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
