@extends('layouts.side_nav')

@section('content')
    <h1>Edit Client</h1>

    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client_name">Client Name:</label>
            <input type="text" name="client_name" id="client_name" value="{{ $client->client_name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_no">Phone Number:</label>
            <input type="text" name="phone_no" id="phone_no" value="{{ $client->phone_no }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email_address">Email Address:</label>
            <input type="email" name="email_address" id="email_address" value="{{ $client->email_address }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('clients.index') }}" class="btn btn-primary">Back to Clients</a>
@endsection
