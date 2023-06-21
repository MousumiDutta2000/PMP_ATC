@extends('layouts.side_nav')

@section('pageTitle', 'Profile')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
    <li class="breadcrumb-item " aria-current="page">Profiles</li>
    <li class="breadcrumb-item active" aria-current="page">edit</li>
@endsection

@section('content')
    <main class ="container">
    <section>
        <form method = "post" action ="{{route('profiles.update', $profile->id)}}" enctype = "multipart/form-data">
            @csrf
            @method('PUT')
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
                    <label>Name</label>
                    <input type="text" name ="name" value = "{{$profile -> name}}">
                    <label>Highest Educational Qualification</label>
                    <select  name="highest_educational_qualification_id" >
                        @foreach (json_decode('{"1":"1","2":"2","3":"3"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}" {{(isset($profile->highest_educational_qualification_id) && $profile ->highest_educational_qualification_id == $optionKey ) ?'selected' : '' }}>{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <!-- <label>Vertical</label>
                    <select  name="vertical_id" >
                        @foreach (json_decode('{"1":"1","2":"2","3":"3"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                    </select> -->
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" id="file-preview"/>
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)" >
                </div>
               <div>
                    <label>Designation</label>
                    <select  name="designation_id" >
                        @foreach (json_decode('{"1":"1","2":"2","3":"3"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}" {{(isset($profile->designation_id) && $profile ->designation_id == $optionKey ) ?'selected' : '' }}>{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <label>Contact Number</label>
                    <input type="text" class="input" name="contact_number" value = "{{$profile -> contact_number }}">
                    <label>Email</label>
                    <input type="text" class="input" name="email" value = "{{$profile -> email }}">
                    <!-- <label>Line Manager</label>
                    <input type="text" class="input" name="line_manager_id" >
                    <label>User ID</label>
                    <input type="text" class="input" name="user_id" > -->
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