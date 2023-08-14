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
            @foreach($taskStatusesWithIds as $statusObject)
            @php
                $status = $statusObject->status; // Access the 'status' property of the object
                $statusId = $statusObject->project_task_status_id; // Access the 'project_task_status_id'
            @endphp
                <div class="kanban-block shadow" id="{{ strtolower(str_replace(' ', '', $status)) }}" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="backlog-name">{{ $status }}</div>

                    <div class="backlog-dots">
                        <i class="material-icons" onclick="toggleProjectTypeDropdown('{{ strtolower(str_replace(' ', '', $status)) }}-dropdown')">keyboard_arrow_down</i>
                    </div>

                    <div class="backlog-tasks" id="{{ strtolower(str_replace(' ', '', $status)) }}-tasks" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                    @foreach($tasks as $task)
                    @if ($task->project_task_status_id === $statusId) <!-- Check if task status matches the current status block -->
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
                            <div class="edit-wrapper" style="margin-right: 6px;">
                                <div class="edit-ico">
                                    <i class="material-icons" onclick="openEditModal('{{ $task->id }}', '{{ json_encode($task) }}')">edit</i>
                                </div>
                            </div>
                            <div class="card__text">{{ $task->title }}</div>
                            <div class="card__details">{{ \Illuminate\Support\Str::limit(strip_tags($task->details), 20, $end='...') }}</div>

            <div class="card__menu">
                <!-----comment and attach part------ -->

                <div class="card__menu-left">

                    <div class="comments-wrapper">
                        <div class="comments-ico"><i class="material-icons">comment</i></div>
                        <div class="comments-num">1</div>
                    </div>
                    <div class="attach-wrapper" style="margin-right:6px;">
                        <div class="attach-ico"><i class="material-icons">attach_file</i></div>
                        <div class="attach-num">2</div>
                    </div>
                    <div class="user-wrapper">
                        <div class="user-ico"><i class="material-icons">person</i></div>
                        <div class="user-num" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ implode(', ', $task->taskUsers->pluck('user.name')->toArray()) }}">
                            {{ $task->taskUsers->count() }}
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @endif
            @endforeach
            <div class="card-wrapper__footer">
                <div class="add-task" id="{{ strtolower(str_replace(' ', '', $status)) }}-create-task-btn">Create
                    <div class="add-task-ico" onclick="toggleProjectTypeDropdown('{{ strtolower(str_replace(' ', '', $status)) }}-dropdown','{{ $statusObject->project_task_status_id }}')">
                        <i class="material-icons down-arrow-icon">keyboard_arrow_down</i>
                    </div>
                    <div class="project-type-dropdown" id="{{ strtolower(str_replace(' ', '', $status)) }}-dropdown" style="display: none;">
                        <!-- Dropdown content here -->
                        @foreach($projectTypes as $type)
                            <div class="project-type" onclick="openModal('{{ $type }}', '{{ $statusObject->project_task_status_id }}')">{{ $type }}<i class="material-icons">add</i></div>
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

                <input type="hidden" name="project_task_status_id" id="projectTaskStatusId" value="">
                <input type="hidden" name="selectedStatus" id="selectedStatus" value=""> 

            
                <div class="mt-3 text-end">
                    <button type="submit" class="form-add-btn" style="margin-right: 10px;">Create</button>
                    <button type="button" class="form-add-btn" onclick="closeModal()">Close</button>
                </div>
            </form>
        </div>
    </div>

<!-- The Edit Task Modal -->
<div class="modal" id="editModal" style="z-index: 1000;">
    <div class="modal-content" style="padding: 15px; max-width: 900px; margin-top: 15px;">
        <h4>Edit Task</h4>
        <form class="edit-card-form" style="display: flex;" action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
            <!-- ... edit form fields ... -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" style="font-size: 15px;">Title</label>
                        <input type="text" name="title" id="title" class="form-control shadow-sm" value="{{ $task->title }}" required>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="priority" style="font-size: 15px;">Priority</label>
                        <select name="priority" id="priority" class="form-control shadow-sm" required>
                            <option value="Low priority" {{ $task->priority == 'Low priority' ? 'selected' : '' }}>Low Priority</option>
                            <option value="Med priority" {{ $task->priority == 'Med priority' ? 'selected' : '' }}>Med Priority</option>
                            <option value="High priority" {{ $task->priority == 'High priority' ? 'selected' : '' }}>High Priority</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="details" style="font-size: 15px;">Details</label>
                    <textarea name="details" id="details" class="form-control shadow-sm" required>{{ strip_tags($task->details) }}</textarea>
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estimated_time" style="font-size: 15px;">Estimated Time</label>
                        <div class="input-group">
                            <input type="number" name="estimated_time_number" id="estimated_time_number" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" value="{{ old('estimated_time_number', explode(' ', $task->estimated_time)[0]) }}">
                            <div class="input-group-append">
                                <select name="estimated_time_unit" id="estimated_time_unit" class="form-control shadow-sm" style="height:39px; color: #858585; font-size: 14px;">
                                    <option value="hour" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'hour' ? 'selected' : '' }}>Hour</option>
                                    <option value="day" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'day' ? 'selected' : '' }}>Day</option>
                                    <option value="month" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'month' ? 'selected' : '' }}>Month</option>
                                    <option value="year" {{ old('estimated_time_unit', explode(' ', $task->estimated_time)[1]) === 'year' ? 'selected' : '' }}>Year</option>
                                </select>
                            </div>
                        </div>
                    </div>        
                </div>

                <div class="form-group">
                    <label for="assigned_to" style="font-size: 15px;" class="mt-3 mb-1">Assigned To</label>
                    <div id="assigned-to-wrapper" class="shadow-sm">
                        <select name="assigned_to[]" id="assigned_to_edit" class="add-card-form__main assigned_to" required multiple>
                            @foreach ($profiles as $profile)
                              <option value="{{ $profile->id }}"
                                @if (in_array($profile->id, explode(',', $task->assigned_to)))
                                  selected
                                @endif
                                data-avatar="{{ asset($profile->image) }}">{{ $profile->profile_name }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
           

            <div class="mt-3 text-end">
                <button type="submit" class="form-add-btn" style="margin-right: 10px;">Save</button>
                <button type="button" class="form-add-btn" onclick="closeEditModal()">Cancel</button>
            </div>
        </div>
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
