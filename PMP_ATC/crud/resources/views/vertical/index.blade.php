@extends('layouts.side_nav')

@section('content')
    <h1>Verticals</h1>

    <a href="{{ route('verticals.create') }}" class="btn btn-primary">Create Vertical</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Head Name</th>
                <th>Head Email</th>
                <th>Head Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($verticals as $vertical)
            <tr>
                <td>{{ $vertical->vertical_name }}</td>
                <td>{{ $vertical->vertical_head_name }}</td>
                <td>{{ $vertical->vertical_head_emailId }}</td>
                <td>{{ $vertical->vertical_head_contact }}</td>
                <td>
                        <a href="{{ route('verticals.show', $vertical->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('verticals.edit', $vertical->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('verticals.destroy', $vertical->id) }}" method="POST" class="d-inline">
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
