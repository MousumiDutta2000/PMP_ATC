@extends('layouts.side_nav')

@section('content')
    <div class="container">
        <h1>Skill Details</h1>

        <!-- <p><strong>ID:</strong> {{ $user_technology->id }}</p> -->
        <p><strong>User:</strong> {{ $user_technology->user->name }}</p>
        <p><strong>Project Role:</strong> {{ $user_technology->project_role->member_role_type }}</p>
        <p><strong>Technology:</strong> {{ $user_technology->technology->technology_name }}</p>
        <p><strong>Details:</strong> {{ $user_technology->details }}</p>
        <p><strong>Years Of Experience:</strong> {{ $user_technology->years_of_experience }}</p>
        <p><strong>Is Current Company:</strong> 
            @if($user_technology->is_current_company == 0)
                No
            @elseif($user_technology->is_current_company == 1)
                Yes 
            @endif
        </p>

        <a href="{{ route('user_technologies.index') }}">Back to Skill Index</a>
    </div>
@endsection