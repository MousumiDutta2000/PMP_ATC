@extends('layouts.side_nav')

@section('pageTitle', 'Project')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Project</li>
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
    <section>
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -86px; margin-bottom: 50px; padding: 20px 30px; margin-right: -30px;">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New</a>
        </div>

            <table id="projectTable" class="table table-hover responsive" style="width: 100%; border-spacing: 0 10px;">
                <thead>
                    <tr>
                        <th style="width: 150px; padding-left: 15px;">UUID</th>
                        <th style="width: 55%;">Project Name</th>
                        <th style="width: 167px;">Status</th>
                        <th style="width: 12%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr class="shadow" style="border-radius:15px;">
                        <!-- <td>{{ $project->short_uuid }}</td> -->
                        <td style="padding-left:15px;">{{ $project->uuid }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td>
                            @if($project->project_status == 'Not Started')
                                <div class="badge badge-success-light text-white font-weight-bold" style="background-color: #ed5768; ">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Delay')
                                <div class="badge badge-warning-light text-white font-weight-bold" style="background-color: #c25eea; padding-left:18px; padding-right:18px;">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Pending')
                                <div class="badge badge-danger-light text-white font-weight-bold" style="background-color: #ffc500">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Ongoing')
                                <div class="badge badge-primary-light text-white font-weight-bold" style="background-color: #1b74ae;">{{ $project->project_status }}</div>
                            @elseif($project->project_status == 'Completed')
                                <div class="badge badge-info-light text-white font-weight-bold" style="background-color: #17b85d">{{ $project->project_status }}</div>
                            @endif
                        </td>
                        
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('sprints.index', ['sprints' => $project->id]) }}"><i class="fa-solid fa-people-roof text-warning" style="margin-right: 10px"></i></a>
                                <a href=""> <i class="fa-sharp fa-solid fa-flag text-info" style="margin-right: 10px"></i></a>
                                <a href="{{ route('projects.edit', ['project' => $project->id]) }}">
                                <i class="fa-solid fa-gear text-secondary" style="margin-right: 10px"></i></a>

                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0">
                                        <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </section>
</main>

@endsection