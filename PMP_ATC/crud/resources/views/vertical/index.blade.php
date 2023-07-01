@extends('layouts.side_nav')

@section('pageTitle', 'Vertical')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('verticals.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Vertical</li>
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
        <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -74px; margin-bottom: 50px;">
            <a href="{{ route('verticals.create') }}" class="btn btn-primary">Add New</a>
        </div>
        {{-- @if ($verticals->count() > 0) --}}
            <table id="verticalTable" class="table table-hover responsive" style="width:100%; border-spacing: 0 10px;">
                <thead>
            <tr>
                <th>Name</th>
                <th>Head Name</th>
                <th>Head Email</th>
                <th>Head Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($verticals as $vertical)
            <tr class="shadow" style="border-radius:15px;">
                <td>{{ $vertical->vertical_name }}</td>
                <td>{{ $vertical->vertical_head_name }}</td>
                <td>{{ $vertical->vertical_head_emailId }}</td>
                <td>{{ $vertical->vertical_head_contact }}</td>
                <td>
                            
                                <div class="btn-group" role="group">
                                    <a href="{{ route('verticals.show', ['vertical' => $vertical->id]) }}">
                                        <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                    </a>
                                    <a href="{{ route('verticals.edit', ['vertical' => $vertical->id]) }}">
                                        <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                    </a>
                                    <form method="post" action="{{ route('verticals.destroy', ['vertical' => $vertical->id]) }}">
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
        {{-- @else
            <p>No verticals found.</p>
        @endif --}}
    </section>
</main>
@endsection

