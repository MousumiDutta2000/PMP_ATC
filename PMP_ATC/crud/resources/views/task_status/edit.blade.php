@extends('layouts.side_nav')

@section('pageTitle', 'Task Status')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('task_status.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('task_status.index') }}">Task Status</a></li>
<li class="breadcrumb-item">{{ $TaskStatus->id }}</li>
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
    <form action="{{ route('task_status.update', $TaskStatus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status" class="mb-1" style="font-size: 15px;">Selected Status</label>
                    <select id="status" class="shadow-sm" name="status" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <option value="To do" {{ $TaskStatus->status === 'To do' ? 'selected' : '' }}>To do</option>
                        <option value="Under Discussion" {{ $TaskStatus->status === 'Under Discussion' ? 'selected' : '' }}>Under Discussion</option>
                        <option value="Under Design" {{ $TaskStatus->status === 'Under Design' ? 'selected' : '' }}>Under Design</option>
                        <option value="In Queue" {{ $TaskStatus->status === 'In Queue' ? 'selected' : '' }}>In Queue</option>
                        <option value="Under Development" {{ $TaskStatus->status === 'Under Development' ? 'selected' : '' }}>Under Development</option>
                        <option value="In Progress" {{ $TaskStatus->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Done" {{ $TaskStatus->status === 'Done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="level" class="mb-1" style="font-size: 15px;">Level</label>
                    <select id="level" class="shadow-sm" name="level" required="required" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        <option value="0" {{ $TaskStatus->level === '0' ? 'selected' : '' }}>0</option>
                        <option value="1" {{ $TaskStatus->level === '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $TaskStatus->level === '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $TaskStatus->level === '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $TaskStatus->level === '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $TaskStatus->level === '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $TaskStatus->level === '6' ? 'selected' : '' }}>6</option>
                    </select>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('task_types.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
