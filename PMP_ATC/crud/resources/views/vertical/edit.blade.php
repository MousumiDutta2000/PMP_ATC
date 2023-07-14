@extends('layouts.side_nav') 

@section('pageTitle', 'Verical') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('verticals.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('verticals.index') }}">Vertical</a></li>
<li class="breadcrumb-item">{{ $vertical->vertical_name }}</li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
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
  <form action="{{ route('verticals.update', $vertical->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="vertical_name">Vertical Name</label>
                <input type="text" name="vertical_name" id="vertical_name" class="form-control shadow-sm" value="{{ $vertical->vertical_name }}" required>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="vertical_head_name">Vertical Head Name</label>
                <input type="text" name="vertical_head_name" id="vertical_head_name" class="form-control shadow-sm" value="{{ $vertical->vertical_head_name }}" required>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="vertical_head_emailId">Vertical Head Email:</label>
                <input type="email" name="vertical_head_emailId" id="vertical_head_emailId" class="form-control shadow-sm" value="{{ $vertical->vertical_head_emailId }}" required>
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="vertical_head_contact">Vertical Head Contact:</label>
                <input type="text" name="vertical_head_contact" id="vertical_head_contact" class="form-control shadow-sm" value="{{ $vertical->vertical_head_contact }}" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
            </div>
        </div>




    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('verticals.index') }}" class="btn btn-danger">Cancel</a>
    </div>


        </form>
    </div>
@endsection

