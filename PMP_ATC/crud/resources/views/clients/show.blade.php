@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client Details</h1>

        <p><strong>ID:</strong> {{ $client->id }}</p>
        <p><strong>Client Name:</strong> {{ $client->client_name }}</p>
        <p><strong>Phone Number:</strong> {{ $client->phone_no }}</p>
        <p><strong>Email Address:</strong> {{ $client->email_address }}</p>

        <a href="{{ route('clients.index') }}">Back to Clients</a>
    </div>
@endsection
