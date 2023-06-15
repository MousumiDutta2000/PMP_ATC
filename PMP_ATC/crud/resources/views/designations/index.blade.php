@extends('layouts.app')
@section('content')
<main class="container">
        <section>
            <div class="titlebar">
                <h1>Designations</h1>
                <a href="{{route('designations.create')}}" class = 'btn-link'>Add Designation</a>
            </div>
            <!-- @if($message = Session::get('success')) -->
                <!-- <div>
                    <ul>
                        <li>{{$message}}</li>
                    </ul>
                </div> -->
                <!-- <script type ="text/javascript">
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
                    })-->

                    <!-- Toast.fire({
                    icon: 'success',
                    title: '{{$message}}'
                    })
                </script> -->
            <!-- @endif -->
            <div class="table">
                <div class="table-filter">
                    <br>
                    <!-- <div>
                        <ul class="table-filter-list">
                            <li>
                                <br>   
                            <p class="table-filter-link link-active">All</p> 
                            </li>
                        </ul>
                    </div> -->
                </div>
                <!-- <form method = "GET" action="{{route('designations.index')}}" accept-charset="UTF-8" role="search">
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
                </form> -->
                <table>
                            <div>
                            <tr>
                                <th>ID</th>
                                <th>Level</th>
                                </tr>
                            </div>
                            <div>
                        @if(count($designations)>0)
                        @foreach($designations as $designation)
                            <tr>
                                <td>{{$designation ->id}}</td>
                                <td> {{$designation ->level}} </td>
                                <td>
                                <div style="display: flex">  
                                    <!-- <a href="{{route('designations.edit', $designation->id)}}" class="btn-link btn btn-success" style="padding-top: 4px; padding-bottom: 4px">  
                                     <button class="btn btn-success" > 
                                        <i class="fas fa-pencil-alt" ></i> 
                                     </button> 
                                    </a>  -->
                                    <form method = "post" action ="{{route('designations.destroy', $designation ->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick = "deleteConfirm(event)" >
                                            <i class="far fa-trash-alt">Delete</i>
                                        </button>
                                    </form>
                                    
                                </div>
                                </td>
                            </tr>
                            </div>
                        @endforeach
                    @else
                                <p>Designation Not Found</p>
                    @endif
                </table>
                <div class="table-paginate">
                    {{$designations->links('layouts.pagination')}}
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
<!-- <script>
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
</script> -->
@endsection