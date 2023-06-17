@extends('layouts.side_nav')

@section('content')
    <h1>Vertical Details</h1>

    <p><strong>Name:</strong> {{ $vertical->vertical_name }}</p>
    <p><strong>Head Name:</strong> {{ $vertical->vertical_head_name }}</p>
    <p><strong>Head Email:</strong> {{ $vertical->vertical_head_emailId }}</p>
    <p><strong>Head Contact:</strong> {{ $vertical->vertical_head_contact }}</p>

    <a href="{{ route('verticals.index') }}">Back</a>
@endsection

