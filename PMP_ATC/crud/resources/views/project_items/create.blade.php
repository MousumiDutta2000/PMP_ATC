@extends('layouts.side_nav') 

@section('pageTitle', 'Project_Items') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('project-items.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('project-items.index') }}">Project_items</a></li>
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
    <form action="{{ route('project-items.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="item_name">Item Name</label>
                    <input type="text" name="item_name" id="item_name" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required="required"></div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="status" style="font-size: 15px;">Status</label>
                    <select name="status" id="status" class="form-controlcl" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="" selected="selected" disabled="disabled">Select status</option>
                        <option value="Under discussion">Under Discussion</option>
                        <option value="Under development">Under Development</option>
                        <option value="In queue">In queue</option>
                        <option value="Not Started">Not Started</option>
                        <option value="Pending">Pending</option>
                        <option value="Delay">Delay</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="details" style="font-size: 15px;">Details</label>
                <textarea name="details" id="details" class="form-control" required></textarea>
            </div>

            {{-- <div class="form-group">
                <label for="project_description">Details</label>
                <textarea class="ckeditor form-control" name="project_description" id="project_description" required="required"></textarea>
            </div> --}}

            <div class="col-md-6">
                <div class="form-group">
                    <label for="project_id" style="font-size: 15px;">Project ID</label>
                    <select name="project_id" id="project_id" class="form-controlcl" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select Project</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>    
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="item_id" style="font-size: 15px;">Item ID</label>
                    <select name="item_id" id="item_id" class="form-controlcl" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select Item</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="sprint_id" style="font-size: 15px;">Sprint ID</label>
                    <select name="sprint_id" id="sprint_id" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select Sprint</option>
                        @foreach($sprints as $sprint)
                            <option value="{{ $sprint->id }}">{{ $sprint->sprint_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="expected_delivery" style="font-size: 15px;">Expected Delivery</label>
                    <input type="date" name="expected_delivery" id="expected_delivery" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="start_date" style="font-size: 15px;">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date" style="font-size: 15px;">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_to" style="font-size: 15px;">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="assigned_by" style="font-size: 15px;">Assigned By</label>
                    <select name="assigned_by" id="assigned_by" class="form-controlcl shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required>
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>    
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('project-items.index') }}" class="btn btn-danger">Cancel</a>
            </div>

    </form>

</div>


<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('project_description', {
            toolbar: 'Basic',
            contentsCss: '{{ asset('
            css / project.css ') }}',
        });
    });
</script>
@endsection






