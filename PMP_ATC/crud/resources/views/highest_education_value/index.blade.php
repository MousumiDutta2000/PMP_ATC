<!-- resources/views/highest_education_value/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Highest Education Values</h1>

    <a href="{{ route('highest-education-values.create') }}" class="btn btn-primary">Add New</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Highest Education Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($highestEducationValues as $highestEducationValue)
                <tr>
                    <td>{{ $highestEducationValue->id }}</td>
                    <td>{{ $highestEducationValue->highest_education_value }}</td>
                    <td>
                        <a href="{{ route('highest-education-values.show', $highestEducationValue->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('highest-education-values.edit', $highestEducationValue->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('highest-education-values.destroy', $highestEducationValue->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
