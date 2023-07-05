@extends('layouts.side_nav')

@section('pageTitle', 'User Technologies')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user_technologies.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">User Technologies</li>
@endsection

@section('custom_css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_technologies.css') }}">
@endsection

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
    <script src="{{ asset('js/user_technologies.js') }}"></script>
@endsection

@section('content')
<main class="container">
    <section class="body">
        <!-- <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -86px; margin-bottom: 50px; padding: 20px 30px; margin-right: -30px;">
            <a href="{{ route('user_technologies.create') }}" class="btn btn-primary">Add User Technologies</a>
        </div>  -->
        <div class="table">
        <table id="userTechnologyTable" class="table table-hover responsive" style="width: 100%;border-spacing: 0 10px;">  
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Technology</th>
                        <th>Years Of Experience</th>
                        <th>Is Under Current Company</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($user_technologies->count() > 0) 
                        @foreach ($user_technologies as $user_technology)
                            <tr class = "shadow" style="border-radius:15px;">
                                <td>{{ $user_technology->user->name }}</td>
                                <td>{{ $user_technology->project_role->member_role_type }}</td>
                                <td>{{ $user_technology->technology->technology_name }}</td>
                                <td>{{ $user_technology->years_of_experience}}</td>
                                @if($user_technology->is_current_company == 0)
                                
                                    <td>No</td>
                                
                                @elseif($user_technology->is_current_company == 1)
                                
                                    <td>Yes</td>
                                
                                @endif
                                <td>
                                    <div class="btn-group" role="group">
                                    <a href="#" data-toggle="modal" data-target="#showModal_{{ $user_technology->id }}">
                                                    <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                                </a>
                                                <!-- <a href="{{ route('user_technologies.edit', $user_technology->id) }}">
                                                    <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                                </a>
                                                <form method="post" action="{{ route('user_technologies.destroy', $user_technology->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-link p-0">
                                                        <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                                    </button>
                                                </form> -->
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

<!-- Show Modal -->
@foreach ($user_technologies as $user_technology)                  
    <div class="modal fade" id="showModal_{{ $user_technology->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel_{{ $user_technology->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style=" background-color:#061148; ">
                    <h5 class="modal-title" id="showModalLabel_{{  $user_technology->id }}" style="color: white;font-weight: bolder;">Skill Details</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" style="margin: 0 auto;">
                        <tbody>
                            <tr>
                                <th style="font-weight: 600; padding-left:30px;">Technology:</th>
                                <td style="font-weight: 500">{{ $user_technology->technology->technology_name }}</td>
                            </tr>
                            <tr>
                                <th style="font-weight: 600; padding-left:30px;">Years Of Experience:</th>
                                <td style="font-weight: 500; padding-left:30px;">{{ $user_technology->years_of_experience }}</td>
                            </tr>
                            <tr>
                                <th style="font-weight: 600; padding-left:30px;">Role:</th>
                                <td style="font-weight: 500">{{ $user_technology->project_role->member_role_type }}</td>
                            </tr>
                            <tr>
                                <th style="font-weight: 600; padding-left:30px;">Details:</th>
                                <td style="font-weight: 500">{{ $user_technology->details }}</td>
                            </tr>
                            <tr>
                                <th style="font-weight: 600; padding-left:30px;">Is Under Current Company:</th>
                                @if($user_technology->is_current_company == 0)
                                    <td style="font-weight: 500; padding-left:30px;">No</td>
                                @elseif($user_technology->is_current_company == 1)            
                                    <td style="font-weight: 500; padding-left:30px;">Yes</td>                  
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#D22B2B">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
    

@endsection
