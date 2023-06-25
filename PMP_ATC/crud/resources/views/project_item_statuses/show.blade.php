@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h2>Project Item Status Details</h2>
        <div>
            <strong>ID:</strong> {{ $projectItemStatus->id }}
        </div>
        <div>
            <strong>Status:</strong> {{ $projectItemStatus->status }}
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('project_item_statuses.index') }}">Back to List</a>
        </div>
    </div>
@endsection
