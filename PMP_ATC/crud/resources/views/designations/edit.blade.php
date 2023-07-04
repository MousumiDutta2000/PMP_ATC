@extends('layouts.side_nav')

@section('pageTitle', 'Designations') 


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('designations.index') }}">Designations</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/form.css') }}"> 
@endsection 
@section('content')
@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-container">
  <form action="{{ route('designations.update', $designation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" name ="level" value = "{{$designation -> level}}">
            </div>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('designations.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
        </form>
    </div>
@endsection