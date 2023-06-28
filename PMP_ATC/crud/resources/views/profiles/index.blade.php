@extends('layouts.side_nav')

@section('pageTitle', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profiles</li>
@endsection

@section('custom_css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <style>
        .name-container {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script>
        $(document).ready(function() {
            adjustNameFieldWidth();

            $(window).resize(function() {
                adjustNameFieldWidth();
            });

            function adjustNameFieldWidth() {
                $('.name-container').each(function() {
                    var maxWidth = 150;
                    var containerWidth = $(this).parent().width();
                    var nameWidth = $(this).find('.name').width();

                    if (nameWidth > maxWidth && nameWidth > containerWidth) {
                        $(this).css('max-width', nameWidth + 10 + 'px');
                    } else {
                        $(this).css('max-width', '');
                    }
                });
            }
        });
    </script>
@endsection

@section('content')
<main class="container">
    <section>
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -74px; margin-bottom: 50px;">
            <a href="{{ route('profiles.create') }}" class="btn btn-primary">Add Profile</a>
        </div>
        <div>
            <table id="example" class="table table-hover responsive" style="width: 100%;border-spacing: 0 10px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Line Manager</th>
                        <!-- <th>User</th> -->
                        <th>Vertical</th>
                        <th>Designation</th>
                        <th>High Edu. Qual.</th>
                        <th>Date of Birth</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody >
                    @if(count($profiles)>0)
                        @foreach($profiles as $index => $profile)
                            <tr class="shadow" style="border-radius:15px;">
                                <td>
                                    <a href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-blue mr-3">
                                                <img class="rounded-circle" src="{{ asset($profile->image) }}" alt="Profile Image" width="50" style="height: 3.2em;">
                                            </div>
                                            <div class="name-container">
                                                <p class="font-weight-bold mb-0 name">{{ $profile->profileName->name }}</p>
                                                <!-- <p class="text-muted">{{ $profile->email }}</p> -->
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td>{{ $profile->contact_number }}</td>
                                <td>{{ $profile->lineManager->name }}</td>
                                <td>{{ $profile->vertical->vertical_name }}</td>
                                <td>{{ $profile->designation->level }}</td>
                                <td>{{ $profile->highestEducationValue->highest_education_value }}</td>
                                <td>{{ $profile->DOB }}</td>
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
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
