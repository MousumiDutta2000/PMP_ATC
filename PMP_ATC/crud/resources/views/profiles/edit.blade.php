@extends('layouts.side_nav')

@section('pageTitle', 'Edit Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection

@section('content')
    <style>
        .card {
            /* width: 400px; */
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .titlebar {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .img-product {
            display: block;
            max-width: 150px; /* Updated the max-width to make the image smaller */
            height: auto;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #4285f4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #3367d6;
        }

        .btn-secondary {
            background-color: #ccc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #999;
        }
    </style>
    <div class="card">
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('profiles.update', ['profile' => $profile->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class ="col-md-4">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $profile->name }}" required>
                    </div>
                </div>
                <div class ="col-md-4">
                    <div class="form-group">
                        <label for="highest_educational_qualification_id">Highest Educational Qualification:</label>
                        <input type="text" name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control" value="{{ $profile->highest_educational_qualification_id }}" required>
                    </div>
                </div>
                <div class ="col-md-4">
                    <div class="form-group">
                        <label for="vertical_id">Vertical:</label>
                        <input type="text" name="vertical_id" id="vertical_id" class="form-control" value="{{ $profile->vertical_id }}" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="image">Current Image:</label>
                    <img src="{{ asset($profile->image) }}" alt="Current Image" class="img-product" id="file-preview">
                    <br>
                    <label for="image">Change Image:</label>
                    <input type="file" name="image" accept="image/*" class="form-control" onchange="showFile(event)">
                </div>
                <div class ="col-md-6">
                    <div class="form-group">
                        <label for="contact_number">Contact Number:</label>
                        <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ $profile->contact_number }}" required>
                    </div>
                </div>
                <div class ="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $profile->email }}" required>
                    </div>
                </div>
                <div class ="col-md-4">
                    <div class="form-group">
                        <label for="designation_id">Designation:</label>
                        <input type="text" class="form-control" name="designation_id" id="designation_id" value="{{ $profile->designation_id }}" required>
                    </div>
                </div>
                <div class ="col-md-4">
                    <div class="form-group">
                        <label for="line_manager_id">Line Manager:</label>
                        <input type="text" class="form-control" name="line_manager_id" id="line_manager_id" value="{{ $profile->line_manager_id }}" required>
                    </div>
                </div>
                <div class ="col-md-4">
                    <div class="form-group">
                        <label for="user_id">User ID:</label>
                        <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $profile->user_id }}" required>
                    </div>
                </div> 
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-primary">Update</button>
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
