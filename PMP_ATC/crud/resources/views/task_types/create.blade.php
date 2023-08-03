@extends('layouts.side_nav')

@section('pageTitle', 'Task Type')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('task_types.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('task_types.index') }}">Task Type</a></li>
<li class="breadcrumb-item active" aria-current="page">Add New</li>
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

@if ($errors->any())
<div class="error-messages">
    <strong>Validation Errors:</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-container">
    <form action="{{ route('task_types.store') }}" method="POST">
        @csrf
        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type_name" class="mb-1" style="font-size: 15px;">Type Name</label>
                    <select id="type_name" class="shadow-sm" name="type_name" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color:#999; font-size: 14px;">
                        <option value="" selected="selected" disabled="disabled">Select type</option>
                        <option>Feature</option>
                        <option>Epic</option>
                        <option>Story</option>
                        <option>Task</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="level" class="mb-1" style="font-size: 15px;">Level</label>
                    <select id="level" class="shadow-sm" name="level" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color:#999; font-size: 14px;">
                        <option value="" selected="selected" disabled="disabled">Select level</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" style="font-size: 15px;">Description</label>
                    <textarea name="description" id="description" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required></textarea>
                </div>
            </div>


            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('task_types.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>

@endsection
