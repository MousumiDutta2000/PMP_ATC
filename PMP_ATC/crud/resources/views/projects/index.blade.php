@extends('layouts.side_nav')
@section('pageTitle', 'Projects')

@section('content')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('projects.index') }}">Home</a>
</li>
<li class="breadcrumb-item active" aria-current="page">Projects</li>
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
        <div class="titlebar">
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
        </div>

        <div class="table-row">
            <table id="example" class="table table-hover responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->project_name }}</td>
                        <!-- <td>{{ $project->active ? 'Active' : 'Inactive' }}</td> -->
                        <td><div class="badge badge-success badge-success-alt text-success">Enabled</div></td>
                        <td>
                        <div class="btn-group" role="group">
                            <a href=""><i class="fa-solid fa-people-roof text-warning" style="margin-right: 10px"></i></a>
                            <a href=""> <i class="fa-sharp fa-solid fa-flag text-info" style="margin-right: 10px"></i></a>
                            <a href="{{ route('projects.settings', ['project' => $project->id]) }}">
                                <i class="fa-solid fa-gear text-secondary" style="margin-right: 10px"></i></a>

                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0">
                                        <i class="fas fa-trash-alt text-danger" style="border: none;"></i>
                                    </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
