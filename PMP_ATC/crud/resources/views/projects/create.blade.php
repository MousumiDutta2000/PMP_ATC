@extends('layouts.side_nav') @section('pageTitle', 'Projects')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{ $project->project_name }}/Settings</li>
    </ol>
</nav>

<form
    action="{{ route('projects.updateSettings', $project->id) }}"
    method="POST"
    class="form">

    @csrf @method('PUT')

    <div class="mb-3">
        <label for="projectIdInput" class="form-label">Project ID</label>
        <input
            type="text"
            id="projectIdInput"
            class="form-control"
            name="project_id"
            value="{{ $project->id }}"
            required="required">
    </div>

    <div class="mb-3">
        <label for="projectNameInput" class="form-label">Project Name</label>
        <input
            type="text"
            id="projectNameInput"
            class="form-control"
            name="project_name"
            value="{{ $project->project_name }}"
            required="required">
    </div>

    <div class="mb-3">
        <label for="projectDescriptionInput" class="form-label">Project Description</label>
        <input
            type="text"
            id="projectDescriptionInput"
            class="form-control"
            name="project_description"
            value="{{ $project->project_description }}"
            placeholder="Describe the project"
            required="required">
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="projectStartInput" class="form-label">Project Start</label>
            <input
                type="date"
                id="projectStartInput"
                class="form-control"
                name="project_start"
                value="{{ $project->project_start }}"
                required="required">
        </div>
        <div class="col-md-6 mb-3">
            <label for="projectEndInput" class="form-label">Project End</label>
            <input
                type="date"
                id="projectEndInput"
                class="form-control"
                name="project_end"
                value="{{ $project->project_end }}"
                required="required">
        </div>
    </div>

    <div class="mb-3">
        <label for="statusSelect" class="form-label">Status</label>
        <select id="statusSelect" class="form-select" name="status">

            <option value="" selected="selected" disabled="disabled">Status</option>
            <option>Not Started</option>
            <option>Delay</option>
            <option>Pending</option>
            <option>Ongoing</option>
            <option>Completed</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="memberInput" class="form-label">Member</label>
        <i class="fas fa-plus plus-icon" id="plusSign"></i>
    </div>

    <div id="popupContainer" style="display: none;">
        <div id="popupContent">
            <input type="text" id="searchInput" class="form-control" placeholder="Search">
            <div id="searchResults"></div>
        </div>
        <div id="popupOverlay"></div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection