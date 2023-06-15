<!-- resources/views/technologies/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Technology</h1>
        <form action="{{ route('technologies.update', $technology->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="technology_name">Technology Name</label>
                <input type="text" name="technology_name" class="form-control" id="technology_name" value="{{ $technology->technology_name }}">
            </div>
            <div class="form-group">
                <label for="expertise">Expertise</label>
                <input type="text" name="expertise" class="form-control" id="expertise" value="{{ $technology->expertise }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
