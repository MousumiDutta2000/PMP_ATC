@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Comment Details</h1>

        <p><strong>Commented By:</strong> {{ $comment->commented_by }}</p>
        <p><strong>User:</strong> {{ $comment->user }}</p>
        <p><strong>Task ID:</strong> {{ $comment->task_id }}</p>

        <a href="{{ route('comments.index') }}">Back to Comments</a>
    </div>
@endsection
