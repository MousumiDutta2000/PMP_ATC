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
                        <th>Line Manager</th>
                        <th>User</th>
                        <th>Vertical</th>
                        <th>Designation</th>
                        <th>High Edu. Qual.</th>
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
                            <div class="btn-group" role="group">
                                <a href="{{ route('profiles.show', ['profile' => $profile->id]) }}">
                                    <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                </a>
                                <a href="{{ route('profiles.edit', ['profile' => $profile->id]) }}">
                                    <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                </a>
                                <form method="post" action="{{ route('profiles.destroy', ['profile' => $profile->id]) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                    </button>
                                </form>
                            </div>
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

