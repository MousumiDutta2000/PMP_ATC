@extends('layouts.side_nav') 

@section('pageTitle', 'Skills') 

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Skills</li>
    <li class="breadcrumb-item active" aria-current="page">Add Skill</li>
@endsection

@section('content')
    <div class="titlebar">
        <h1>Add Skill</h1>
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
    <div class="card" style="background-color:white">
        <div class="card-body">
            <form method="post" action="{{ route('user_technologies.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class ="col-md-4">
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
                    <div class ="col-md-4">
                        <div class="form-group">
                            <label for="project_role_id">Project Role:</label>
                            <select name="project_role_id" id="project_role_id" class="form-control" required>
                                <option value="">Select Project Role</option>
                                @foreach ($project_roles as $project_role)
                                    <option value="{{ $project_role->id }}">{{ $project_role->member_role_type }}</option>
                                @endforeach
                            </select>
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
                            <label for="details">Details:</label>
                            <input type="text" name="details" id="details" class="form-control" required>
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
                            <label for="typeSelect">Is Current Company</label>
                            <input type="checkbox" name="is_current_company" id="is_current_company" value="1" {{ old('is_current_company') ? 'checked' : '' }}>

                        </div>
                    </div>
                    <div class="form-actions mt-2">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('user_technologies.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
            </form>
        </div>
    </div>
@endsection

<!-- @section('custom_js')
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
@endsection -->
