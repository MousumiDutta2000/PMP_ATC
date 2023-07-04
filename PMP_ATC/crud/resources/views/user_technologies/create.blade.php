@extends('layouts.side_nav') 

@section('pageTitle', 'Add User Technologies') 

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('user_technologies.index') }}">User Technologies</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add User Technologies</li>
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
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('user_technologies.store') }}">
                @csrf
                <div class="row mt-3">
                    <div class ="col-md-4">
                        <div class="form-group">
                            <label for="user_id">User:</label>
                            <select name="user_id" id="user_id" class="form-control shadow-sm" required>
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="form-group">
                            <label for="project_role_id">Role:</label>
                            <select name="project_role_id" id="project_role_id" class="form-control shadow-sm" required>
                                <option value="">Select Role</option>
                                @foreach ($project_roles as $project_role)
                                    <option value="{{ $project_role->id }}">{{ $project_role->member_role_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="form-group">
                            <label for="technology_id">Technology:</label>
                            <select name="technology_id" id="technology_id" class="form-control shadow-sm" required>
                                <option value="">Select Technology</option>
                                @foreach ($technologies as $technology)
                                    <option value="{{ $technology->id }}">{{ $technology->technology_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="col-md-8">
                        <div class="form-group">
                            <label for="details">Details:</label>
                            <textarea class="form-control shadow-sm" name="details" id="details" required="required"></textarea>
                        </div>
                    </div>
                    <div class ="col-md-3">
                        <div class="form-group">
                            <label for="years_of_experience">Years Of Experience:</label>
                            <input type="text" name="years_of_experience" id="years_of_experience" class="form-control shadow-sm" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="typeSelect">Is Under Current Company:</label>
                            <input type="checkbox" name="is_current_company" id="is_current_company" class="shadow-sm" value="1" {{ old('is_current_company') ? 'checked' : '' }}>
                        </div>
                    </div>
                <div class="form-actions mt-3 text-end">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('user_technologies.index') }}" class="btn btn-danger">Cancel</a>
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection