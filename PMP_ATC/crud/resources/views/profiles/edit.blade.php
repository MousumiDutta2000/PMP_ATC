@extends('layouts.side_nav')

@section('pageTitle', 'Edit Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection

@section('project_css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
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

<div class="form-container">
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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="highest_educational_qualification_id">Highest Educational Qualification:</label>
                    <select name="highest_educational_qualification_id" id="highest_educational_qualification_id" class="form-control" required>
                        @foreach ($qualifications as $qualification)
                            <option value="{{ $qualification->id }}" {{ $profile->highest_educational_qualification_id == $qualification->id ? 'selected' : '' }}>
                                {{ $qualification->highest_education_value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ $profile->contact_number }}" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="image">Current Image:</label>
            <img src="{{ asset($profile->image) }}" alt="Current Image" class="img-product" id="file-preview" style="width:80px;height:80px">
            <br>
            <label for="image">Change Image:</label>
            <input type="file" name="image" accept="image/*" class="form-control" onchange="showFile(event)">
        </div>
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
                    <label for="vertical_id">Vertical:</label>
                    <select name="vertical_id" id="vertical_id" class="form-control" required>
                        @foreach ($verticals as $vertical)
                            <option value="{{ $vertical->id }}" {{ $profile->vertical_id == $vertical->id ? 'selected' : '' }}>
                                {{ $vertical->vertical_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="designation_id">Designation:</label>
                    <select name="designation_id" id="designation_id" class="form-control" required>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}" {{ $profile->designation_id == $designation->id ? 'selected' : '' }}>
                                {{ $designation->level }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="line_manager_id">Line Manager:</label>
                    <select name="line_manager_id" id="line_manager_id" class="form-control" required>
                        @foreach($lineManagers as $lineManager)
                            <option value="{{ $lineManager->id }}" {{ $profile->line_manager_id == $lineManager->id ? 'selected' : '' }}>
                                {{ $lineManager->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="text-end">
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
