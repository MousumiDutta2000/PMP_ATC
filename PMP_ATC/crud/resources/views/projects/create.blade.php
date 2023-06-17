@extends('layouts.app')

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
    <div class="form-group">
      <label for="project_name">Project Name:</label>
      <input type="text" name="project_name" id="project_name" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="project_type">Project Type:</label>
      <input type="text" name="project_type" id="project_type" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="project_description">Description:</label>
      <input type="text" name="project_description" id="project_description" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="project_manager">Project Manager:</label>
      <input type="text" name="project_manager" id="project_manager" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="project_startDate">Project StartDate:</label>
      <input type="text" name="project_startDate" id="project_startDate" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="project_endDate">Project EndDate:</label>
      <input type="text" name="project_endDate" id="project_endDate" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="client_spoc_name">Client Name:</label>
      <input type="text" name="client_spoc_name" id="client_spoc_name" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="client_spoc_email">Client Email:</label>
      <input type="email" name="client_spoc_email" id="client_spoc_email" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="client_spoc_contact">Client Contact:</label>
      <input type="text" name="client_spoc_contact" id="client_spoc_contact" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="project_status">Project Status:</label>
      <input type="text" name="project_status" id="project_status" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="">Vertical id:</label>
      <input type="text" name="vertical_id" id="vertical_id" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="">Technologies id:</label>
      <input type="text" name="technologies_id" id="technologies_id" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="">Client id:</label>
      <input type="text" name="client_id" id="client_id" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection
