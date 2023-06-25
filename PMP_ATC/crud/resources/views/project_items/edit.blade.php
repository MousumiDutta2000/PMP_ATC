

@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Edit Project Item</h1>

        <form action="{{ route('project-items.update', $projectItem->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" name="item_name" id="item_name" class="form-control" value="{{ $projectItem->item_name }}" required>
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <textarea name="details" id="details" class="form-control" required>{{ $projectItem->details }}</textarea>
            </div>

            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="text" name="project_id" id="project_id" class="form-control" value="{{ $projectItem->project_id }}" required>
            </div>

            <div class="form-group">
                <label for="item_id">Item ID</label>
                <input type="text" name="item_id" id="item_id" class="form-control" value="{{ $projectItem->item_id }}" required>
            </div>

            <div class="form-group">
                <label for="sprint_id">Sprint ID</label>
                <input type="text" name="sprint_id" id="sprint_id" class="form-control" value="{{ $projectItem->sprint_id }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Under discussion" {{ $projectItem->status == 'Under discussion' ? 'selected' : '' }}>Under discussion</option>
                    <option value="Under development" {{ $projectItem->status == 'Under development' ? 'selected' : '' }}>Under development</option>
                    <option value="In queue" {{ $projectItem->status == 'In queue' ? 'selected' : '' }}>In queue</option>
                    <option value="Not Started" {{ $projectItem->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                    <option value="Pending" {{ $projectItem->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Delay" {{ $projectItem->status == 'Delay' ? 'selected' : '' }}>Delay</option>
                </select>
            </div>

            <div class="form-group">
                <label for="expected_delivery">Expected Delivery</label>
                <input type="date" name="expected_delivery" id="expected_delivery" class="form-control" value="{{ $projectItem->expected_delivery }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $projectItem->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $projectItem->end_date }}" required>
            </div>

            <div class="form-group">
                <label for="assigned_to">Assigned To</label>
                <input type="text" name="assigned_to" id="assigned_to" class="form-control" value="{{ $projectItem->assigned_to }}" required>
            </div>

            <div class="form-group">
                <label for="assigned_by">Assigned By</label>
                <input type="text" name="assigned_by" id="assigned_by" class="form-control" value="{{ $projectItem->assigned_by }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
