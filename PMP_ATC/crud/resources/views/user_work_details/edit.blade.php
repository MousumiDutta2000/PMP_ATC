@extends('layouts.side_nav')

@section('content')
    <h1>Edit User Work Detail</h1>
    <form action="{{ route('user_work_details.update', $userWorkDetail) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="start_time">Start Time:</label>
        <input type="time" name="start_time" id="start_time" value="{{ $userWorkDetail->start_time }}" required>

        <label for="end_time">End Time:</label>
        <input type="time" name="end_time" id="end_time" value="{{ $userWorkDetail->end_time }}" required>

        <label for="work_type_id">Work Type:</label>
        <select name="work_type_id" id="work_type_id">
            @foreach ($workTypes as $workType)
                <option value="{{ $workType->id }}" {{ $workType->id === $userWorkDetail->work_type_id ? 'selected' : '' }}>
                    {{ $workType->name }}
                </option>
            @endforeach
        </select>

        <label for="notes">Notes:</label>
        <textarea name="notes" id="notes" rows="3">{{ $userWorkDetail->notes }}</textarea>

        <button type="submit">Update</button>
    </form>
@endsection
