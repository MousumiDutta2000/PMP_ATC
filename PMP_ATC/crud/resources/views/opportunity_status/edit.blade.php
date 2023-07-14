@extends('layouts.side_nav') 

@section('pageTitle', 'Opportunity_status') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('opportunity_status.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('opportunity_status.index') }}">Opportunity_status</a></li>
<li class="breadcrumb-item">{{ $opportunityStatus->project_goal }}</li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> 
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
  <form action="{{ route('opportunity_status.update', $opportunityStatus->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="project_goal">Project Goal</label>
                <select name="project_goal" id="project_goal" class="form-control shadow-sm">
                    <option value="Achieved" {{ $opportunityStatus->project_goal === 'Achieved' ? 'selected' : '' }}>Achieved</option>
                    <option value="Lost" {{ $opportunityStatus->project_goal === 'Lost' ? 'selected' : '' }}>Lost</option>
                </select>
            </div>
        </div>


        <div class="form-actions mt-3 text-end">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('opportunity_status.index') }}" class="btn btn-danger">Cancel</a>
        </div>


        </form>
    </div>
@endsection
