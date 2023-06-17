<!-- resources/views/technologies/index.blade.php -->
@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Technologies</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Technology Name</th>
                    <th>Expertise</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->id }}</td>
                        <td>{{ $technology->technology_name }}</td>
                        <td>{{ $technology->expertise }}</td>
                        <td>
                            <a href="{{ route('technologies.edit', $technology->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('technologies.destroy', $technology->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('technologies.create') }}" class="btn btn-success">Create</a>
    </div>
@endsection
