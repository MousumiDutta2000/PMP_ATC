<!-- resources/views/highest_education_value/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Highest Education Value Details</h1>

    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $highestEducationValue->id }}</td>
        </tr>
        <tr>
            <th>Highest Education Value:</th>
            <td>{{ $highestEducationValue->highest_education_value }}</td>
        </tr>
    </table>

    <a href="{{ route('highest-education-values.edit', $highestEducationValue->id) }}" class="btn btn-primary">Edit</a>
@endsection
