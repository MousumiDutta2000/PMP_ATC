@extends('layouts.app')
@section('content')
<main class="container">
        <section>
            <div class="titlebar">
                <h1>Profiles</h1>
                <a href="{{route('profiles.create')}}" class = 'btn-link'>Add Profile</a>
            </div>
            @if($message = Session::get('success'))
                <!-- <div>
                    <ul>
                        <li>{{$message}}</li>
                    </ul>
                </div> -->
                <script type ="text/javascript">
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'success',
                    title: '{{$message}}'
                    })
                </script>
            @endif
            <div class="table">
                <div class="table-filter">
                    <div>
                        <ul class="table-filter-list">
                            <li>
                                <p class="table-filter-link link-active">All</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <form method = "GET" action="{{route('profiles.index')}}" accept-charset="UTF-8" role="search">
                <div class="table-search">   
                    <div>
                        <button class="search-select">
                           Search Profile
                        </button>
                        <span class="search-select-arrow">
                            <i class="fas fa-caret-down"></i>
                        </span>
                    </div>
                    <div class="relative">
                        <input class="search-input" type="text" name="search" placeholder="Search profile..." value="{{ request('search') }}">
                    </div>
                </div>
                </form>
                <table>
                <div class="table-product-head">
                   <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Line Manager ID</th>
                    <th>User ID</th>
                    <th>Vertical ID</th>
                    <th>Designation ID</th>
                    <th>Highest Educational Qualification ID</th>
                    <th>Actions</th>
                    </tr>
                </div>
                <div class="table-product-body">
        @if(count($profiles)>0)
            @foreach($profiles as $profile)
                <tr>
                    <td>{{$profile ->image}}</td>
                    <!-- <td><img src="{{asset('images/' . $profile->image)}}"/></td>               -->
                    <td> {{$profile ->name}} </td>
                    <td>{{$profile ->email}}</td>
                    <td>{{$profile ->contact_number}}</td>
                    <td>{{$profile ->line_manager_id}}</td>
                    <td>{{$profile ->user_id}}</td>
                    <td>{{$profile ->vertical_id}}</td>
                    <td>{{$profile ->designation_id}}</td>
                    <td>{{$profile ->highest_educational_qualification_id}}</td>
                    <td>
                    <div style="display: flex">  
                        <a href="{{route('profiles.edit', $profile->id)}}" class="btn-link btn btn-success" style="padding-top: 4px; padding-bottom: 4px">  
                        <!-- <button class="btn btn-success" > -->
                            <i class="fas fa-pencil-alt" ></i> 
                        <!-- </button> -->
                        </a> 
                        <form method = "post" action ="{{route('profiles.destroy', $profile ->id)}}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick = "deleteConfirm(event)" >
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                        
                    </div>
                    </td>
                </tr>
                </div>
            @endforeach
        @else
                    <p>Profile Not Found</p>
        @endif
    </table>
                <div class="table-paginate">
                    {{$profiles->links('layouts.pagination')}}
                    <!-- <div class="pagination">
                        <a href="#" disabled>&laquo;</a>
                        <a class="active-page">1</a>
                        <a>2</a>
                        <a>3</a>
                        <a href="#">&raquo;</a>
                    </div> -->
                </div>
            </div>
        </section>
</main>
<script>
    window.deleteConfirm = function(e){
        e.preventDefault();
        var form = e.target.form;
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
  }
})
    }
</script>
@endsection