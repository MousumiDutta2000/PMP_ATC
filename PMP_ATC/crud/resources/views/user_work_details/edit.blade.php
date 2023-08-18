@extends('layouts.side_nav')

@section('project_css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
    <style>
        /* Custom styling for reducing text and form element size */
        label, input, select, textarea, button {
            font-size: 14px; /* Adjust the font size as needed */
        }

        /* Adjust the container's padding if needed */
        .form-container {
            padding: 15px;
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
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="form-container">
        <h5>Edit User Work Detail</h5>
        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user_work_details.update', $userWorkDetail) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_time">Start Time:</label>
                        <input type="time" name="start_time" id="start_time" value="{{ $userWorkDetail->start_time }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end_time">End Time:</label>
                        <input type="time" name="end_time" id="end_time" value="{{ $userWorkDetail->end_time }}" required>
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <label for="work_type_id">Work Type:</label>
                        <select name="work_type_id" id="work_type_id">
                            @foreach ($workTypes as $workType)
                                <option value="{{ $workType->id }}" {{ $workType->id === $userWorkDetail->work_type_id ? 'selected' : '' }}>
                                    {{ $workType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <textarea name="notes" id="notes" rows="3">{{ $userWorkDetail->notes }}</textarea>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary ml-auto">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
