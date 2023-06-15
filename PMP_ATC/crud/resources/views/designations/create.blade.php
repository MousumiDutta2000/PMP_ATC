@extends('layouts.app')
@section('content')
    <main class ="container">
    <section>
        <form method = "post" action ="{{route('designations.store')}}" enctype = "multipart/form-data">
            @csrf
            <div class="titlebar">
                <h1>Add Designation</h1>
            </div>
            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
               <div>
                    <label>Level</label>
                    <input type="text" name ="level">
                </div>
            </div>
            <div>
                <h1></h1>
                <button>Save</button>
            </div>
        </form>
        </section>
    </main>
@endsection