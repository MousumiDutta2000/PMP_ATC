@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h2>Edit Project Item Status</h2>
        <form action="{{ route('project_item_statuses.update', $projectItemStatus->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Under discussion" {{ $projectItemStatus->status === 'Under discussion' ? 'selected' : '' }}>Under discussion</option>
                    <option value="Under development" {{ $projectItemStatus->status === 'Under development' ? 'selected' : '' }}>Under development</option>
                    <option value="In queue" {{ $projectItemStatus->status === 'In queue' ? 'selected' : '' }}>In queue</option>
                    <option value="Not Started" {{ $projectItemStatus->status === 'Not Started' ? 'selected' : '' }}>Not Started</option>
                    <option value="Pending" {{ $projectItemStatus->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Delay" {{ $projectItemStatus->status === 'Delay' ? 'selected' : '' }}>Delay</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
