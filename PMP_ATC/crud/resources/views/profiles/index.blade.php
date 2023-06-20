@extends('layouts.side_nav')

@section('pageTitle', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profiles</li>
@endsection

@section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <a href="{{ route('profiles.create') }}" class="btn btn-primary">Add Profile</a>
        </div>
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Line Manager ID</th>
                        <th>User ID</th>
                        <th>Vertical ID</th>
                        <th>Designation ID</th>
                        <th>Highest Educational Qualification ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($profiles)>0)
                    @foreach($profiles as $profile)
                    <tr>
                        <td>{{$profile->image}}</td>
                        <td>{{$profile->name}}</td>
                        <td>{{$profile->email}}</td>
                        <td>{{$profile->contact_number}}</td>
                        <td>{{$profile->line_manager_id}}</td>
                        <td>{{$profile->user_id}}</td>
                        <td>{{$profile->vertical_id}}</td>
                        <td>{{$profile->designation_id}}</td>
                        <td>{{$profile->highest_educational_qualification_id}}</td>
                        <td>
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-info">Show</a>
                            <!-- <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary">Edit</a> -->
                                <form method="post" action="{{route('profiles.destroy', $profile->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @else
                <p>Profile Not Found</p>
                @endif
            </table>
        </div>
    </section>
</main>
@endsection

