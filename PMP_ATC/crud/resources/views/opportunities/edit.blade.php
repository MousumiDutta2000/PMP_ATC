@extends('layouts.side_nav')

@section('content')
    <h1>Edit Opportunity</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('opportunities.update', $opportunity->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="opportunity_status_id">Opportunity Status ID:</label>
            <input type="text" name="opportunity_status_id" id="opportunity_status_id" value="{{ $opportunity->opportunity_status_id }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="proposal">Proposal:</label>
            <input type="text" name="proposal" id="proposal" value="{{ $opportunity->proposal }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="initial_stage">Initial Stage:</label>
            <input type="text" name="initial_stage" id="initial_stage" value="{{ $opportunity->initial_stage }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="technical_stage">Technical Stage:</label>
            <input type="text" name="technical_stage" id="technical_stage" value="{{ $opportunity->technical_stage }}" class="form-control" required>
        </div>

        <div >
            <button type="submit" class="btn btn-primary">Update Opportunity</button>
        </div>
    </form>

    <a href="{{ route('opportunities.index') }}" class="btn btn-primary">Back to Opportunities</a>
@endsection
