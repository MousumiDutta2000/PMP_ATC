<!-- resources/views/highest_education_value/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Highest Education Value</h1>

    <form action="{{ route('highest-education-values.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="highest_education_value">Highest Education Value:</label>
            <input type="text" name="highest_education_value" id="highest_education_value" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
