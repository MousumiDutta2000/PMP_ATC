@extends('layouts.side_nav')

@section('content')
    <h1>Create Project</h1>

    @if ($errors->any())
        <div>
            <strong>Validation Errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div>
            <div class="form-group mb-2">
                <label for="project_name">Project Name:</label>
                <input type="text" name="project_name" id="project_name" class="form-control" required="required">
            </div>

            <div class="form-group mb-2">
                <label for="typeSelect" class="form-label">Project Type</label>
                <select id="typeSelect" class="form-select" name="project_type" required="required">
                    <option value="" selected="selected" disabled="disabled">Type</option>
                    <option>Internal</option>
                    <option>External</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <label for="project_description">Description</label>
                <input type="text" name="project_description" id="project_description" class="form-control" required="required">
            </div>

            <div class="form-group mb-2">
                <label for="project_manager">Project Manager</label>
                <input type="text" name="project_manager" id="project_manager" class="form-control" required="required">
            </div>

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="projectStartInput" class="form-label" style="margin-bottom:0px;">Project Start</label>
                    <input type="date" id="projectStartInput" class="form-control" name="project_start" required="required">
                </div>

                <div class="col-md-6 mb-2">
                    <label for="projectEndInput" class="form-label" style="margin-bottom:0px;">Project End</label>
                    <input type="date" id="projectEndInput" class="form-control" name="project_end" required="required">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-2">
                    <label for="client_spoc_name">Client Name [SPOC]</label>
                    <input type="text" name="client_spoc_name" id="client_spoc_name" class="form-control" required="required">
                </div>

                <div class="col-md-4 mb-2">
                    <label for="client_spoc_email">Client Email [SPOC]</label>
                    <input type="email" name="client_spoc_email" id="client_spoc_email" class="form-control" required="required">
                </div>

                <div class="col-md-4 mb-2">
                    <label for="client_spoc_contact">Client Contact [SPOC]</label>
                    <input type="text" name="client_spoc_contact" id="client_spoc_contact" class="form-control" required="required">
                </div>
            </div>

            <div class="form-group">
                <label for="statusSelect" class="form-label" style="margin-bottom:0px;">Status</label>
                <select id="statusSelect" class="form-select" name="project_status" required="required">
                    <option value="" selected="selected" disabled="disabled">Status</option>
                    <option>Not Started</option>
                    <option>Delay</option>
                    <option>Pending</option>
                    <option>Ongoing</option>
                    <option>Completed</option>
                </select>
            </div>

            <div class="row"  style="margin-top:4px;">
                <div class="col-md-4 mb-2">
                <label for="">Vertical</label>
                <input type="text" name="vertical_id" id="vertical_id" class="form-control" required="required">
                </div>

                <div class="col-md-4 mb-2">
                <label for="">Technologies</label>
                <input type="text" name="technologies_id" id="technologies_id" class="form-control" required="required">
                </div>

                <div class="col-md-4 mb-2">
                <label for="">Client</label>
                <input type="text" name="clients_id" id="client_id" class="form-control" required="required">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style = "margin-top:10px">Create</button>
        </div>
    </form>
@endsection