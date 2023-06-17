@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Create Client</h1>

        <form method="POST" action="{{ route('clients.store') }}">
            @csrf
            <div class="form-group">
                <label for="client_name">Client Name:</label>
                <input type="text" name="client_name" id="client_name" class="form-control" required>
                <br>
                <label for="phone_no">Phone Number:</label>
                <input type="text" name="phone_no" id="phone_no" class="form-control" required>
                <br>
                <label for="email_address">Email Address:</label>
                <input type="email" name="email_address" id="email_address" class="form-control" required>
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

        <a href="{{ route('clients.index') }}" class="btn btn-primary">Back to Clients</a>
    </div>
@endsection
