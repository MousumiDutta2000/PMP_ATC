@extends('layouts.side_nav')

@section('pageTitle', 'Skills')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user_technologies.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Skills</li>
@endsection

@section('custom_css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/table.js') }}"></script>
@endsection

@section('content')
<main class="container">
    <section class="body">
        <div class="titlebar">
            <a href="{{ route('user_technologies.create') }}" class="btn btn-primary">Add Skill</a>
        </div> 
        @if ($user_technologies->count() > 0)   
            <table id="example" class="table table-hover responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Project Role</th>
                        <th>Technology</th>
                        <th>Details</th>
                        <th>Years Of Experience</th>
                        <th>Is Current Company</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_technologies as $user_technology)
                    <tr>
                        <td>{{ $user_technology->user->name }}</td>
                        <td>{{ $user_technology->project_role->member_role_type }}</td>
                        <td>{{ $user_technology->technology->technology_name }}</td>
                        <td>{{ $user_technology->details }}</td>
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
                                        <a href="{{ route('user_technologies.edit', $user_technology->id) }}">
                                            <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                        </a>
                                        <form method="post" action="{{ route('user_technologies.destroy', $user_technology->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0">
                                                <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                            </button>
                                        </form>
                            </div>
                            <!-- <a href="{{ route('user_technologies.show', $user_technology->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('user_technologies.edit', $user_technology->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('user_technologies.destroy', $user_technology->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
             <!-- Show Modal -->
             @foreach ($user_technologies as $user_technology)
                <div class="modal fade" id="showModal_{{ $user_technology->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel_{{ $user_technology->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showModalLabel_{{ $user_technology->id }}">Skill Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                            <th>ID</th>
                                            <td>{{ $user_technology->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>User</th>
                                            <td>{{ $user_technology->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Technology</th>
                                            <td>{{ $user_technology->technology->technology_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td>{{ $user_technology->details }}</td>
                                        </tr>
                                        <tr>
                                            <th>Years Of Experience</th>
                                            <td>{{$user_technology->years_of_experience}}</td>
                                        </tr>
                                        <tr>
                                            <th>Is Current Company</th>
                                                @if($user_technology->is_current_company == 0)
                                                    <td>No</td>
                                                @elseif($user_technology->is_current_company == 1)
                                                    <td>Yes</td>                                
                                                @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info mt-4" role="alert">
                No skills found.
            </div>
        @endif
    </section>
</main>

@endsection
