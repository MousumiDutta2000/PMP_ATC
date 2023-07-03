@extends('layouts.side_nav')
@section('pageTitle', 'Designations')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('designations.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('designations.index') }}">Designations</a></li>
<li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection 

@section('project_css')
<link rel="stylesheet" href="{{ asset('css/project.css') }}"> 
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
    <section>
        <form method = "post" action ="{{route('designations.store')}}">
            @csrf
            <div class="titlebar">
                <h1>Add Designation</h1>
            </div>
            
            <div>
               <div>
                    <label>Level</label>
                    <input type="text" name ="level">
                </div>
            </div>
            <div>
                <h1></h1>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
        </section>
    </main>
@endsection