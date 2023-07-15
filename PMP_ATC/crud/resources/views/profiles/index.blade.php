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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profiles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/profiles.js') }}"></script>
@endsection

@section('content')
<main class="container">
    <section>
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -67px; margin-bottom: 50px; padding: 2px 30px; margin-right: -30px;">
            <a href="{{ route('profiles.create') }}" class="btn btn-primary">Add Profile</a>
        </div>
        <div>
            <table id="profileTable" class="table table-hover responsive table-sm" style="width: 100%;border-spacing: 0 10px;">
                <thead class="" style="border-radius:7px">
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Line Manager</th>
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
                            <tr class="shadow" style="border-radius:15px; font-size: small;">
                                <td>
                                    <a href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar mr-3">
                                                <img class="rounded-circle" src="{{ asset($profile->image) }}" alt="Profile Image" width="50" style="height: 2.2em; width: 2.2em">
                                            </div>
                                            <div class="name-container">
                                                <p class="font-weight-bold mb-0 name">{{ $profile->profile_name }}</p>
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
                                            <button type="button" class="btn btn-link p-0 delete-button" data-toggle="modal" data-target="#deleteModal{{ $profile->id }}">
                                                <i class="fas fa-trash-alt text-danger mb-2" style="border: none;"></i>
                                            </button>          
                                            <!-- Delete Modal start -->
                                            <div class="modal fade" id="deleteModal{{ $profile->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header flex-column">
                                                            <div class="icon-box">
                                                                <i class="material-icons">&#xE5CD;</i>
                                                            </div>
                                                            <h3 class="modal-title w-100">Are you sure?</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you really want to delete these record?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Modal end-->
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
