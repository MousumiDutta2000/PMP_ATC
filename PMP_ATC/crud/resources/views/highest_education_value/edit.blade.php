<!-- resources/views/highest_education_value/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Highest Education Value</h1>

    <form action="{{ route('highest-education-values.update', $highestEducationValue->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="highest_education_value">Highest Education Value:</label>
            <input type="text" name="highest_education_value" id="highest_education_value" class="form-control" value="{{ $highestEducationValue->highest_education_value }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
