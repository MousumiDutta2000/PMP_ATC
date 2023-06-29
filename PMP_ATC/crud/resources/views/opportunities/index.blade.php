@extends('layouts.side_nav')


@section('pageTitle', 'Opportunities')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('opportunities.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Opportunities</li>
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
            <a href="{{ route('opportunities.create') }}" class="btn btn-primary">Add Opportunities</a>
        </div>
        <div class="table" style="display: flex; justify-content: flex-end; margin-top: -74px; margin-bottom: 50px;">
            <table id="opportunitiesTable" class="table table-hover responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Opporunity Status</th>
                        <th>Proposal</th>
                        <th>Initial Stage</th>
                        <th>Technical Stage</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($opportunities as $opportunity)
                            <tr>
                                <td>{{$opportunity->id}}</td>
                                <td>{{$opportunity->opportunity_status_id}}</td>
                                <td>{{$opportunity->proposal}}</td>
                                <td>{{$opportunity->initial_stage}}</td>
                                <td>{{$opportunity->technical_stage}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('opportunities.show', ['opportunity' => $opportunity->id]) }}">
                                            <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                        </a>
                                        <a href="{{ route('opportunities.edit', ['opportunity' => $opportunity->id]) }}">
                                            <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                        </a>
                                        <form method="post" action="{{ route('opportunities.destroy', ['opportunity' => $opportunity->id]) }}">
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
                </tbody>
            </table>
        </div>
    </section>
</main>
@endsection
