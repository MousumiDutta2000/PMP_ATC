@extends('layouts.side_nav')

@section('pageTitle', 'Tasks')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tasks</li>
@endsection

@section('custom_css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sprint.css') }}">
@endsection

@section('custom_js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="{{ asset('js/table.js') }}"></script>
@endsection

@section('content')
<main class="container">
    <section class="body">
        {{-- <div class="titlebar" style="display: flex; justify-content: flex-end; margin-top: -67px; margin-bottom: 50px; padding: 2px 30px; margin-right: -30px;">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary" style="margin-right: 10px;">Add New</a>
            
        </div> --}}
        
            <table id="taskTable" class="table table-hover responsive" style="width:100%; border-spacing: 0 10px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        {{-- <th>Sprint Name</th> --}}
                        {{-- <th>Type</th> --}}
                        {{-- <th>Priority</th> --}}
                        <th>Details</th>
                        {{-- <th>Attachments</th> --}}
                        {{-- <th>Assigned To</th> --}}
                        {{-- <th>Created By</th> --}}
                        {{-- <th>Last Edited By</th> --}}
                        {{-- <th>Estimated Time</th> --}}
                        {{-- <th>Time Taken</th> --}}
                        {{-- <th>Status</th> --}}
                        {{-- <th>Parent Task</th> --}}
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                <tr class="shadow" style="border-radius:15px;">
                    <td style="font-size: 15px;">{{ $task->uuid }}</td>
                    <td style="font-size: 15px;">{{ $task->title }}</td>
                    {{-- <td style="font-size: 15px;">{{ $task->sprintId->sprint_name }}</td> --}}
                    {{-- <td style="font-size: 15px;">{{ $task->taskTypeId->type }}</td> --}}
                    {{-- <td style="font-size: 14px;">
                        @if(strtolower($task->priority) == 'low priority')
                            <div class="badge text-white font-weight-bold" style="background: linear-gradient(90deg, #9ea7fc 17%, #6eb4f7 83%);">{{ $task->priority }}</div>
                        @elseif(strtolower($task->priority) == 'med priority')
                            <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #81d5ee 17%, #7ed492 83%);">{{ $task->priority }}</div>
                        @elseif(strtolower($task->priority) == 'high priority')
                            <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #c781ff 17%, #e57373 83%);">{{ $task->priority }}</div>
                        @endif
                    </td> --}}
                    <td>{{ strip_tags($task->details) }}</td>
                    {{-- <td style="font-size: 15px;">{{ basename($task->attachments) }}</td> --}}
                    
                    {{-- <td style="font-size: 15px;">{{ $task->assignedTo->profile_name }}</td> --}}
                    {{-- <td>
                        @foreach ($task->taskUser as $taskUser)
                            {{ $taskUser->assignedTo->profile_name }}
                            <br>
                        @endforeach
                    </td> --}}

                    {{-- <td style="font-size: 15px;">{{ $task->createdBy->profile_name }}</td> --}}
                    {{-- <td style="font-size: 15px;">{{ $task->lastEditedBy->profile_name }}</td> --}}
                   
                    {{-- <td>{{ $task->estimated_time }}</td> --}}
                    {{-- <td style="font-size: 15px;">{{ $task->time_taken }}</td>
                    <td style="font-size: 15px;">{{ $task->status }}</td> --}}
                    {{-- <td style="font-size: 15px;">
                        @if($task->parentTask)
                            {{ $task->parentTask->title }}
                        @else
                            Null
                        @endif
                    </td> --}}
                    {{-- <td style="font-size: 15px;">{{ $task->parentTask->title }}</td> --}}
                    
                    <td class="d-flex align-items-center" style="font-size: 15px;">
                        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Show">
                            <i class="fas fa-eye text-info" style="margin-right: 10px"></i>
                        </a>
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" data-toggle="tooltip" data-placement="top" title="Edit"> 
                            <i class="fas fa-edit text-primary" style="margin-right: 10px"></i>
                            </a>
                            <form method="post" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                                @method('delete')
                                @csrf
                                <button type="button" class="btn btn-link p-0 delete-button" data-toggle="modal" data-placement="top" title="Delete" data-target="#deleteModal{{ $task->id }}">
                                    <i class="fas fa-trash-alt text-danger mb-2" style="border: none;"></i>
                                </button>          
                                <!-- Delete Modal start -->
                                <div class="modal fade" id="deleteModal{{ $task->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header flex-column">
                                                <div class="icon-box">
                                                    <i class="material-icons">&#xE5CD;</i>
                                                </div>
                                                <h3 class="modal-title w-100">Are you sure?</h3>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you really want to delete these record?</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal end-->
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
</main>
@endsection
                    
                                  







{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Tasks</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Assigned To</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->assigned_to }}</td>
                    <td>{{ $task->due_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Send an AJAX request to retrieve the tasks data
        axios.get('/tasks')
            .then(function (response) {
                // Handle the successful response
                var tasks = response.data;
                var tbody = document.querySelector('tbody');
    
                tasks.forEach(function (task) {
                    var row = document.createElement('tr');
                    var titleCell = document.createElement('td');
                    var descriptionCell = document.createElement('td');
                    var assignedToCell = document.createElement('td');
                    var dueDateCell = document.createElement('td');
    
                    titleCell.textContent = task.title;
                    descriptionCell.textContent = task.description;
                    assignedToCell.textContent = task.assigned_to;
                    dueDateCell.textContent = task.due_date;
    
                    row.appendChild(titleCell);
                    row.appendChild(descriptionCell);
                    row.appendChild(assignedToCell);
                    row.appendChild(dueDateCell);
    
                    tbody.appendChild(row);
                });
            })
            .catch(function (error) {
                // Handle the error
                console.error('Error:', error);
            });
    </script>
    

    
</body>

</html> --}}
