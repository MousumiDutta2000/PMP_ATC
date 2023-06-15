<!-- resources/views/technologies/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Technology</h1>
        <form action="{{ route('technologies.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="technology_name">Technology Name</label>
                <input type="text" name="technology_name" class="form-control" id="technology_name">
            </div>
            <div class="form-group">
                <label for="expertise">Expertise</label>
                <input type="text" name="expertise" class="form-control" id="expertise">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
