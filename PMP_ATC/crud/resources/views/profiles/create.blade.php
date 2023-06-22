@extends('layouts.side_nav')

@section('pageTitle', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">Add User</li>
@endsection

@section('content')
    <div class="titlebar">
        <h1>Add Profile</h1>
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
    <form method="post" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="highest_educational_qualification_id">Highest Educational Qualification:</label>
            <input type="text" name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="vertical_id">Vertical:</label>
            <input type="text" name="vertical_id" id="vertical_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Add Image:</label>
            <img src="" alt="" class="img-product" id="file-preview">
            <input type="file" name="image" accept="image/*" class="form-control" onchange="showFile(event)">
        </div>
        <div class="form-group">
            <label for="designation_id">Designation:</label>
            <input type="text" class="form-control" name="designation_id" id="designation_id" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number:</label>
            <input type="text" class="form-control" name="contact_number" id="contact_number" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="line_manager_id">Line Manager</label>
            <input type="text" class="form-control" name="line_manager_id" id="line_manager_id" required>
        </div>
        <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" name="user_id" id="user_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
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