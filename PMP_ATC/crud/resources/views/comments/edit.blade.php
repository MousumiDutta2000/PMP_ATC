@extends('layouts.side_nav')

@section('pageTitle', 'Comments')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('comments.index') }}">Home</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('comments.index') }}">Comments</a></li>
    <li class="breadcrumb-item">{{ $comment->commented_by }}</li>
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
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="commented_by">Commented By:</label>
                    <input type="text" name="commented_by" id="commented_by" value="{{ $comment->commented_by }}" class="form-control shadow-sm" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="user">User:</label>
                    <input type="text" name="user" id="user" value="{{ $comment->user }}" class="form-control shadow-sm" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="task_id">Task ID:</label>
                    <input type="number" name="task_id" id="task_id" value="{{ $comment->task_id }}" class="form-control shadow-sm" required>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('comments.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
@endsection
