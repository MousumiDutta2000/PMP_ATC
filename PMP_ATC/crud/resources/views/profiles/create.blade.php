@extends('layouts.app')
@section('content')
    <main class ="container">
    <section>
        <form method = "post" action ="{{route('profiles.store')}}" enctype = "multipart/form-data">
            @csrf
            <div class="titlebar">
                <h1>Add Profile</h1>
                <!-- <button>Save</button> -->
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
                    <label>Name</label>
                    <input type="text" name ="name">
                    <label>Highest Educational Qualification</label>
                    <select  name="highest_educational_qualification_id" >
                        @foreach (json_decode('{"1":"1","2":"2","3":"3"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <label>Vertical</label>
                    <select  name="vertical_id" >
                        @foreach (json_decode('{"1":"1","2":"2","3":"3"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product" id="file-preview"/>
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)" >
                </div>
               <div>
                    <label>Designation</label>
                    <select  name="designation_id" >
                        @foreach (json_decode('{"1":"1","2":"2","3":"3"}', true) as $optionKey => $optionValue)
                            <option value="{{$optionKey}}" >{{$optionValue}}</option>
                        @endforeach
                    </select>
                    <label>Contact Number</label>
                    <input type="text" class="input" name="contact_number" >
                    <label>Email</label>
                    <input type="text" class="input" name="email">
                    <label>Line Manager</label>
                    <input type="text" class="input" name="line_manager_id" >
                    <label>User ID</label>
                    <input type="text" class="input" name="user_id" >
               </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Save</button>
            </div>
        </form>
        </section>
    </main>

@endsection