@extends('layouts.side_nav') 

@section('pageTitle', 'Project') 

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('projects.index') }}">{{ $project->project_name }}</a></li>
<li class="breadcrumb-item active" aria-current="page">Tasks</li>
@endsection 

@section('kanban_css')
<link href="https://cdn.jsdelivr.3net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/kanban2.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection 

@section('content') 
    <div class="container">
        <div class="kanban-board">
            @foreach($taskStatuses as $status)
                <div class="kanban-block shadow" id="{{ strtolower(str_replace(' ', '', $status)) }}" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="backlog-name">{{ $status }}</div>

                    <div class="backlog-dots">
                        <i class="material-icons" onclick="toggleProjectTypeDropdown('{{ strtolower(str_replace(' ', '', $status)) }}-dropdown')">keyboard_arrow_down</i>
                    </div>

                    <div class="backlog-tasks" id="{{ strtolower(str_replace(' ', '', $status)) }}-tasks" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                    @foreach($tasks as $task)
                    @if ($task->status === $status) <!-- Check if task status matches the current status block -->
                        <div class="card shadow" id="task{{ $task->id }}" draggable="true" ondragstart="drag(event)">
                            <div class="card__header">
                                <div class="card-container-color {{ $task->priority }}">
                                    @if(strtolower($task->priority) == 'low priority')
                                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(90deg, #9ea7fc 17%, #6eb4f7 83%);">{{ $task->priority }}</div>
                                    @elseif(strtolower($task->priority) == 'med priority')
                                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #81d5ee 17%, #7ed492 83%);">{{ $task->priority }}</div>
                                    @elseif(strtolower($task->priority) == 'high priority')
                                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #c781ff 17%, #e57373 83%);">{{ $task->priority }}</div>
                                    @endif
                                </div>
                                <div class="card__header-clear"><i class="material-icons">clear</i></div>
                            </div>
                            <div class="card__text">{{ $task->title }}</div>
                            <div class="card__details">{{ \Illuminate\Support\Str::limit(strip_tags($task->details), 20, $end='...') }}</div>

             <div class="card__menu">
                {{-- ---comment and attach part------ --}}

                <div class="card__menu-left">
                    <div class="comments-wrapper">
                        <div class="comments-ico"><i class="material-icons">comment</i></div>
                        <div class="comments-num">1</div>
                    </div>
                    <div class="attach-wrapper">
                        <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                        <div class="attach-num">2</div>
                    </div>
                </div>

                <div class="card__menu-right">
                    <div class="add-peoples"><i class="material-icons">add</i></div>
                    <div class="img-avatar">
                        <img src="{{ asset('img/placeholder.jpg') }}" id="selectedAvatar">
                    </div>
                </div>
                
                
            </div>
            </div>
            @endif
            @endforeach
                    <div class="card-wrapper__footer">
                        <div class="add-task" id="{{ strtolower(str_replace(' ', '', $status)) }}-create-task-btn">Create
                            <div class="add-task-ico" onclick="toggleProjectTypeDropdown('{{ strtolower(str_replace(' ', '', $status)) }}-dropdown', '{{ $status }}')">
                                <i class="material-icons down-arrow-icon">keyboard_arrow_down</i>
                            </div>
                            <div class="project-type-dropdown" id="{{ strtolower(str_replace(' ', '', $status)) }}-dropdown" style="display: none;">
                                <!-- Dropdown content here -->
                                @foreach($projectTypes as $type)
                                    <div class="project-type" onclick="openModal('{{ $type }}', '{{ $status }}')">{{ $type }}<i class="material-icons">add</i></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="modal" style="z-index:1000;">
        <div class="modal-content" style="padding: 15px; max-width: 900px; margin-top: 15px;">
        <h4 id="modalProjectTypeHeading"> Create <span id="modalProjectType"></span></h4>
            <form class="add-card-form add-card-form-true" style="display: flex;" action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" style="font-size: 15px;" class="mb-1">Title</label>
                            <input type="text" name="title" id="title" class="form-control shadow-sm" placeholder="Enter title" required style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="priority" style="font-size: 15px;" class="mb-1">Priority</label>
                            <select name="priority" id="priority" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                                <option value="" selected="selected" disabled="disabled">Select priority</option>
                                <option value="Low priority">Low priority</option>
                                <option value="Med priority">Med priority</option>
                                <option value="High priority">High priority</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="form-group mb-3 mt-3">
                        <label for="details" style="font-size: 15px;">Details</label>
                        <textarea name="details" id="details" class="ckeditor form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required></textarea>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="attachments" class="mb-1" style="font-size: 15px;">Attachments</label><br>
                            <input type="file" name="attachments[]" id="attachments" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; width: 100%; color: #858585; font-size: 14px;" multiple>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="estimated_time" class="mb-1" style="font-size: 15px;">Estimated Time</label>
                            <div class="input-group">
                                <input type="number" name="estimated_time_number" id="estimated_time_number" class="form-control shadow-sm" placeholder="Enter estimated time" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                                <div class="input-group-append">
                                    <select name="estimated_time_unit" id="estimated_time_unit" class="form-control shadow-sm" style="height:39px; color: #858585; font-size: 14px;">
                                        <option value="hour">Hour</option>
                                        <option value="day">Day</option>
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
                    
                <label for="assigned_to" style="font-size: 15px;" class="mt-3 mb-1">Assigned To</label>
                <select name="assigned_to[]" id="assigned_to" class="add-card-form__main assigned_to" required multiple>
                    @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}" data-avatar="{{ asset($profile->image) }}">{{ $profile->profile_name }}</option>
                    @endforeach
                </select>

                <input type="hidden" name="status" id="status" value="">
                <input type="hidden" name="selectedStatus" id="selectedStatus" value="">

                <div class="mt-3 text-end">
                    <button type="submit" class="form-add-btn" style="margin-right: 10px;">Create</button>
                    <button type="button" class="form-add-btn" onclick="closeModal()">Close</button>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- partial -->
    
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/bundle.fa06bd827b69c86d1e5c.js') }}"></script>
<script src="{{ asset('js/bundle.779c8b3edfadced3283a.js') }}"></script>
<script src="{{ asset('js/bundle.24f6873edaef6bd85f9e.js') }}"></script>
<script src="{{ asset('js/bundle.8c4c1640f9a406d21583.js') }}"></script>
<script src="{{ asset('js/bundle.4e09edb465a6cb160c4a.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
// assigned_to user select2 function
$(document).ready(function() {
  $('.assigned_to').select2({
      placeholder: 'Select user',
      templateSelection: formatUserSelection,
      templateResult: formatUserOption
  });

  function formatUserOption(option) {
      if (!option.id) return option.text;

      var avatar = $(option.element).data('avatar');
      var optionText = option.text;

      var $option = $(
          `<span><img class="user-avatar" src="${avatar}">${optionText}</span>`
      );

      return $option;
  }

  function formatUserSelection(selection) {
      var avatar = $(selection.element).data('avatar');
      var selectionText = selection.text;

      var $selection = $(
          `<span><img class="user-avatar" src="${avatar}" style="width: 20px; height: 20px; border-radius: 50%; margin-right: 5px;">${selectionText}</span>`
      );

      return $selection;
  }
});
</script>

@endsection



{{-- --------------------original---------------------- --}}
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - kanban board with html, css and js</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/kanban2.css') }}">

</head>
  

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="./kanban.css">
        <title>Kanban Board</title>
    </head>

    <body>
        <div class="container">
            <div class="kanban-heading">
                <strong class="kanban-heading-text">Kanban Board</strong>
            </div>
            <div class="kanban-board">
                <div class="kanban-block shadow" id="todo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <!-- <strong>To Do</strong> -->
                    <div class="backlog-name">To Do</div>
                    <div class="backlog-dots"><i class="material-icons">expand_more</i></div>
                    <!-- <div class="task-button-block">
                        <button id="task-button" onclick="createTask()">Create new task</span>
                    </div> -->
                    <div class="card shadow" id="task1" draggable="true" ondragstart="drag(event)">

                        <div class="card__header">
                            <div class="card-container-color card-color-low">
                                <div class="card__header-priority">Low Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Company website redesign</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">1</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">2</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/3bc84a401a51991f895ac6f6f40b7010.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" id="task2" draggable="true" ondragstart="drag(event)">

                        <div class="card__header">
                            <div class="card-container-color card-color-med">
                                <div class="card__header-priority">Med Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Mobile app login process prototype</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">2</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">3</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/615f6d8539dbe37bc2c8f3d7d749182c.jpg') }}">
                                </div>
                            </div>
                        </div>

                        <!-- <span>Task 2</span> -->
                    </div>

                    <div class="card shadow" id="task3" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-high">
                                <div class="card__header-priority">High Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Onboarding designs</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">1</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">2</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/41aad055f35eb28f42b84ca1b4cf5d53.jpg') }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-wrapper__footer">
                        <div class="add-task">Add task</div>
                        <div class="add-task-ico"><i class="material-icons">add_circle_outline</i></div>
                    </div>
                    <form class="add-card-form add-card-form-true" style="display: none;">
                        <div class="add-card-form__header">
                            <div class="form__low-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="Low Priority" value="card-color-low"><label class="form__label"
                                    for="Low Priority">Low Priority</label></div>
                            <div class="form__med-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="Med Priority" value="card-color-med"><label class="form__label"
                                    for="Med Priority">Med Priority</label></div>
                            <div class="form__high-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="High Priority" value="card-color-high"><label class="form__label"
                                    for="High Priority">High Priority</label></div>
                        </div><textarea class="add-card-form__main-error add-card-form__main" type="text"
                            placeholder="Write your task"></textarea>
                        <div class="add-card-form__footer">
                            <div class="form__footer">
                                <div class="form__footer-av"><img src="{{ asset('img/41aad055f35eb28f42b84ca1b4cf5d53.jpg') }}"></div>
                                <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                            </div><input class="form-add-btn" type="submit" disabled="" value="Add">
                        </div>
                    </form>
                </div>


                <div class="kanban-block shadow" id="inprogress" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="backlog-name">In Progress</div>
                    <div class="backlog-dots"><i class="material-icons">expand_more</i></div>

                    <!-- <div class="cards"> -->
                    <div class="card shadow" id="task4" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-high">
                                <div class="card__header-priority">High Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Research and strategy for upcoming projects</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">1</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">3</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/0cafaf103d2eef926eebb15b20651c88.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" id="task5" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-med">
                                <div class="card__header-priority">Med Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Account profile flow diagrams</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">1</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">2</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/3bc84a401a51991f895ac6f6f40b7010.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" id="task6" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-low">
                                <div class="card__header-priority">Low Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Slide templates for client pitch project</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">3</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">3</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/615f6d8539dbe37bc2c8f3d7d749182c.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" id="task7" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-low">
                                <div class="card__header-priority">Low Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Review administrator console designs</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">2</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">3</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="41aad055f35eb28f42b84ca1b4cf5d53.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper__footer">
                        <div class="add-task">Add task</div>
                        <div class="add-task-ico"><i class="material-icons">add_circle_outline</i></div>
                    </div>
                    <form class="add-card-form add-card-form-true" style="display: none;">
                        <div class="add-card-form__header">
                            <div class="form__low-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="Low Priority" value="card-color-low"><label class="form__label"
                                    for="Low Priority">Low Priority</label></div>
                            <div class="form__med-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="Med Priority" value="card-color-med"><label class="form__label"
                                    for="Med Priority">Med Priority</label></div>
                            <div class="form__high-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="High Priority" value="card-color-high"><label class="form__label"
                                    for="High Priority">High Priority</label></div>
                        </div><textarea class="add-card-form__main-error add-card-form__main" type="text"
                            placeholder="Write your task"></textarea>
                        <div class="add-card-form__footer">
                            <div class="form__footer">
                                <div class="form__footer-av"><img src="41aad055f35eb28f42b84ca1b4cf5d53.jpg"></div>
                                <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                            </div><input class="form-add-btn" type="submit" disabled="" value="Add">
                        </div>
                    </form>
                </div>
                <!-- </div> -->
                <!-- </div> -->

                <div class="kanban-block shadow" id="done" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="backlog-name">Done</div>
                    <div class="backlog-dots"><i class="material-icons">expand_more</i></div>

                    <!-- <div class="cards"> -->
                    <div class="card shadow" id="task8" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-low">
                                <div class="card__header-priority">Low Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Rewiew client spec document and give feedback</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">1</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">3</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/615f6d8539dbe37bc2c8f3d7d749182c.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" id="task9" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-med">
                                <div class="card__header-priority">Med Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Navigation designs</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">2</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">3</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/41aad055f35eb28f42b84ca1b4cf5d53.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" id="task7" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-low">
                                <div class="card__header-priority">Low Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">User profile prototypes</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">3</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">2</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/3bc84a401a51991f895ac6f6f40b7010.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" id="task7" draggable="true" ondragstart="drag(event)">
                        <div class="card__header">
                            <div class="card-container-color card-color-high">
                                <div class="card__header-priority">High Priority</div>
                            </div>
                            <div class="card__header-clear"><i class="material-icons">clear</i></div>
                        </div>
                        <div class="card__text">Create style guide based on previous feedback</div>
                        <div class="card__menu">
                            <div class="card__menu-left">
                                <div class="comments-wrapper">
                                    <div class="comments-ico"><i class="material-icons">comment</i></div>
                                    <div class="comments-num">2</div>
                                </div>
                                <div class="attach-wrapper">
                                    <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                                    <div class="attach-num">3</div>
                                </div>
                            </div>
                            <div class="card__menu-right">
                                <div class="add-peoples"><i class="material-icons">add</i></div>
                                <div class="img-avatar"><img src="{{ asset('img/0cafaf103d2eef926eebb15b20651c88.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrapper__footer">
                        <div class="add-task">Add task</div>
                        <div class="add-task-ico"><i class="material-icons">add_circle_outline</i></div>
                    </div>
                    <form class="add-card-form add-card-form-true" style="display: none;">
                        <div class="add-card-form__header">
                            <div class="form__low-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="Low Priority" value="card-color-low"><label class="form__label"
                                    for="Low Priority">Low Priority</label></div>
                            <div class="form__med-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="Med Priority" value="card-color-med"><label class="form__label"
                                    for="Med Priority">Med Priority</label></div>
                            <div class="form__high-pr"><input class="form__checkbox" type="radio" name="priority"
                                    alt="High Priority" value="card-color-high"><label class="form__label"
                                    for="High Priority">High Priority</label></div>
                        </div><textarea class="add-card-form__main-error add-card-form__main" type="text"
                            placeholder="Write your task"></textarea>
                        <div class="add-card-form__footer">
                            <div class="form__footer">
                                <div class="form__footer-av"><img src="{{ asset('img/41aad055f35eb28f42b84ca1b4cf5d53.jpg') }}"></div>
                                <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                            </div><input class="form-add-btn" type="submit" disabled="" value="Add">
                        </div>
                    </form>
                </div>
                <!-- </div> -->

                <div class="create-new-task-block" id="create-new-task-block">
                    <strong>New Task</strong>
                    <span class="form-row">
                        <label class="form-row-label" for="task-name">Task</label>
                        <input class="form-row-input" type="text" name="task-name" id="task-name">
                    </span>
                    <span class="form-row">
                        <label class="form-row-label" for="task-name">Description</label>
                        <textarea class="form-row-input" name="task-description" id="task-description" cols="70"
                            rows="10"></textarea>
                    </span>
                    <span class="form-row">
                        <label class="form-row-label" for="task-name">Status</label>
                        <select class="form-row-input" name="task-status" id="task-status">
                            <option value="todo">To Do</option>
                            <option value="inprogress">In Progress</option>
                            <option value="done">Done</option>
                        </select>
                    </span>
                    <span class="form-row-buttons">
                        <button id="edit-button" onclick="editTask()">Edit</span>
                    <button id="save-button" onclick="saveTask()">Save</span>
                        <button id="cancel-button" onclick="createTask()">Cancel</span>
                            </span>
                </div>
            </div>
        </div>
    </body>

    </html>
    <!-- partial -->
    
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bundle.fa06bd827b69c86d1e5c.js') }}"></script>
    <script src="{{ asset('js/bundle.779c8b3edfadced3283a.js') }}"></script>
    <script src="{{ asset('js/bundle.24f6873edaef6bd85f9e.js') }}"></script>
    <script src="{{ asset('js/bundle.8c4c1640f9a406d21583.js') }}"></script>
    <script src="{{ asset('js/bundle.4e09edb465a6cb160c4a.js') }}"></script>

    <script>
        const divElement = document.querySelector('.kanban-block');
        const iconElement = document.querySelector('.backlog-dots i');

        let isExpanded = true; // Set initial state to expanded

        iconElement.addEventListener('click', function () {
            if (isExpanded) {
                // If it's expanded, shrink the div
                divElement.style.height = '0';
                divElement.style.overflow = 'hidden';
                iconElement.style.transform = 'rotate(-90deg)';
            } else {
                // If it's not expanded, expand the div
                divElement.style.height = 'auto';
                divElement.style.overflow = 'visible';
                iconElement.style.transform = 'rotate(0deg)';
            }

            // Toggle the state
            isExpanded = !isExpanded;
        });
    </script>


</body>

</html>
    --}}
   
   
    {{-- //     function openModal(projectType) {
        //     // Show the modal
        //     var modal = document.getElementById('modal');
        //     modal.style.display = 'block';
        
        //     // Update the modal content (You can customize this part as needed)
        //     var modalContent = document.querySelector('.modal-content');
            
        //     // Get the form data
        //     var form = document.querySelector('.add-card-form');
        //     var formData = new FormData(form);
        
        //     // Send an AJAX request to the server
        //     var xhr = new XMLHttpRequest();
        //     xhr.open('POST', '/tasks');
        //     xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === XMLHttpRequest.DONE) {
        //             if (xhr.status === 200) {
        //                 // Request successful, update the Kanban board or perform other actions
        //                 closeModal();
        //                 // Refresh the Kanban board or update it with the new task
        //                 // You can use JavaScript to update the Kanban board without refreshing the page
        //             } else {
        //                 // Request failed, handle the error
        //                 console.error('Error:', xhr.responseText);
        //             }
        //         }
        //     };
        //     xhr.send(formData);
        // } --}}






        {{-- <div class="card shadow" id="task1" draggable="true" ondragstart="drag(event)">

            <div class="card__header">
                <div class="card-container-color card-color-low"> --}}
                    {{-- <div class="card__header-priority"> --}}
                        {{-- @if(strtolower($task->priority) == 'low priority')
                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(90deg, #9ea7fc 17%, #6eb4f7 83%);">{{ $task->priority }}</div>
                    @elseif(strtolower($task->priority) == 'med priority')
                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #81d5ee 17%, #7ed492 83%);">{{ $task->priority }}</div>
                    @elseif(strtolower($task->priority) == 'high priority')
                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #c781ff 17%, #e57373 83%);">{{ $task->priority }}</div>
                    @endif --}}
                        {{-- Low Priority</div> --}}
                {{-- </div>
                <div class="card__header-clear"><i class="material-icons">clear</i></div>
            </div>
            <div class="card__text">{{ $task->title }}</div>
            <div class="card__menu"> --}}
                {{-- ---comment and attach part------ --}}

                {{-- <div class="card__menu-left">
                    <div class="comments-wrapper">
                        <div class="comments-ico"><i class="material-icons">comment</i></div>
                        <div class="comments-num">1</div>
                    </div>
                    <div class="attach-wrapper">
                        <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                        <div class="attach-num">2</div>
                    </div>
                </div> --}}

                {{-- <div class="card__menu-right">
                    <div class="add-peoples"><i class="material-icons">add</i></div>
                    <div class="img-avatar"><img src="{{ asset('img/3bc84a401a51991f895ac6f6f40b7010.jpg') }}">
                    </div>
                </div> --}}
            {{-- </div>
        </div> --}}


        {{-- @foreach($tasks as $task)
        <div class="card shadow" id="task1" draggable="true" ondragstart="drag(event)">

            <div class="card__header">
                <div class="card-container-color card-color-low"> --}}
                    {{-- <div class="card__header-priority"> --}}
                        {{-- @if(strtolower($task->priority) == 'low priority')
                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(90deg, #9ea7fc 17%, #6eb4f7 83%);">{{ $task->priority }}</div>
                    @elseif(strtolower($task->priority) == 'med priority')
                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #81d5ee 17%, #7ed492 83%);">{{ $task->priority }}</div>
                    @elseif(strtolower($task->priority) == 'high priority')
                        <div class="badge text-white font-weight-bold" style="background: linear-gradient(138.6789deg, #c781ff 17%, #e57373 83%);">{{ $task->priority }}</div>
                    @endif --}}
                        {{-- Low Priority</div> --}}
                {{-- </div>
                <div class="card__header-clear"><i class="material-icons">clear</i></div>
            </div>
            <div class="card__text">{{ $task->title }}</div>
        </div>
        @endforeach  --}}