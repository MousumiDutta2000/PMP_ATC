@extends('layouts.side_nav')

@section('content')
  <h1>Edit Vertical</h1>

  @if ($errors->any())
      <div>
          <strong>Validation Errors:</strong>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="{{ route('verticals.update', $vertical->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
          <label for="vertical_name">Vertical Name:</label>
          <input type="text" name="vertical_name" id="vertical_name" class="form-control" value="{{ $vertical->vertical_name }}" required>
      </div>
      <div class="form-group">
          <label for="vertical_head_name">Vertical Head Name:</label>
          <input type="text" name="vertical_head_name" id="vertical_head_name" class="form-control" value="{{ $vertical->vertical_head_name }}" required>
      </div>
      <div class="form-group">
          <label for="vertical_head_emailId">Vertical Head Email:</label>
          <input type="email" name="vertical_head_emailId" id="vertical_head_emailId" class="form-control" value="{{ $vertical->vertical_head_emailId }}" required>
      </div>
      <div class="form-group">
          <label for="vertical_head_contact">Vertical Head Contact:</label>
          <input type="text" name="vertical_head_contact" id="vertical_head_contact" class="form-control" value="{{ $vertical->vertical_head_contact }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
  </form>

  <a href="{{ route('verticals.index') }}" class="btn btn-primary">Back</a>
@endsection
