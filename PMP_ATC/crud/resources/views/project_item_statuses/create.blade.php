@extends('layouts.side_nav') 

@section('pageTitle', 'Project_Item_Statuses') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project_item_statuses.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('project_item_statuses.index') }}">Project_Item_Statuses</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
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
    <form action="{{ route('project_item_statuses.store') }}" method="POST">
        @csrf
        <div class="row">
            {{-- <div class="col-md-6"> --}}

                <div class="form-group">
                    <label for="status" style="font-size: 15px;">Status</label>
                    <select id="status" class="shadow-sm" name="project_status" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                    <option value="" selected="selected" disabled="disabled">Select status</option>
                    <option value="Under discussion">Under discussion</option>
                    <option value="Under development">Under development</option>
                    <option value="In queue">In queue</option>
                    <option value="Not Started">Not Started</option>
                    <option value="Pending">Pending</option>
                    <option value="Delay">Delay</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
            {{-- </div> --}}

           

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('project_item_statuses.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>

@endsection
