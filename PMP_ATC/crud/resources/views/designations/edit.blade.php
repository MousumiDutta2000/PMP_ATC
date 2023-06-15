@extends('layouts.app')
@section('content')
    <main class ="container">
    <section>
        <form method = "post" action ="{{route('designations.update', $designation->id)}}" enctype = "multipart/form-data">
            @csrf
            @method('PUT')
            <div class="titlebar">
                <h1>Edit </h1>
                <button>Save</button>
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
            <div class="card">
               <div>
                    <label>Level</label>
                    <input type="text" name ="level" value = "{{$designation -> level}}">
               </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Save</button>
            </div>
        </form>
        </section>
    </main>
    <script>
        function showFile(event){
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = document.getElementById('file-preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection