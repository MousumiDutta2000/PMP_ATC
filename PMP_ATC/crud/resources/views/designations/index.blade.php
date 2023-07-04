@extends('layouts.side_nav')

@section('pageTitle', 'Designations')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('designations.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Designations</li>
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
            <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -86px; margin-bottom: 50px; padding: 20px 30px; margin-right: -30px;">
                <a href="{{route('designations.create')}}" class = "btn btn-primary">Add Designation</a>
            </div>
            
            <div class="table">
                <table id="designationTable" class="table table-hover responsive" style="width: 100%;border-spacing: 0 10px;">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($designations)>0)
                                @foreach($designations as $designation)
                                    <tr class = "shadow" style="border-radius:15px;">
                                        <td> {{$designation ->level}} </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                    <a href="#" data-toggle="modal" data-target="#showModal_{{ $designation->id }}">
                                                        <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                                                    </a>
                                                    <a href="{{ route('designations.edit', ['designation' => $designation->id]) }}">
                                                        <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                                                    </a>
                                                    <form method="post" action="{{ route('designations.destroy', ['designation' => $designation->id]) }}">
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
                <!-- Show Modal -->
             @foreach ($designations as $designation)
                <div class="modal fade" id="showModal_{{ $designation->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel_{{ $designation->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showModalLabel_{{ $designation->id }}">Level Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                            <th>Level</th>
                                            <td>{{ $designation->level }}</td>
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
@endsection