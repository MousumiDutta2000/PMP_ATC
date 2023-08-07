<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kanban</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/kanban2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
        /* Your CSS styles for the kanban board and other elements */
        .project-type-dropdown {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }
        .dropdown-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }
        .dropdown-content .project-type {
            padding: 8px 0;
            cursor: pointer;
        }
        .dropdown-content .project-type:hover {
            background-color: #f1f1f1;
        }
        /* Additional styles for the down arrow icon */
        .down-arrow-icon {
            cursor: pointer;
            color: #4CAF50;
            transform: rotate(0deg);
            transition: transform 0.2s;
        }
        .down-arrow-icon.rotate {
            transform: rotate(180deg);
        }
        /* Position the dropdown below the down arrow icon */
        .dropdown-below {
            top: 100%;
            left: 0;
        }
        /* Styles for the "Create" button */
        .add-task {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s;
        }
        .add-task:hover {
            background-color: #45A049;
        }
        /* Styles for the add_circle_outline icon */
        .add-task-ico {
            display: inline-block;
            margin-left: 5px;
            font-size: 20px;
            vertical-align: middle;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 1% auto;
            padding: 35px;
            border: 1px solid #888;
            width: 70%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .add-card-form {
            display: none;
            flex-direction: column;
            padding: 0 0 10px 0;
            width: 100% !important; 
        }
        .add-card-form__main{
            border: 1px solid #ddd;
        }

        .select2-container .select2-search--inline .select2-search__field {
        box-sizing: border-box;
        border: none;
        font-size: 100%;
        margin-top: 5px;
        margin-left: 5px;
        padding: 0;
        max-width: 100%;
        resize: none;
        height: 18px;
        vertical-align: bottom;
        font-family: sans-serif;
        overflow: hidden;
        word-break: keep-all;
       }
    </style>


<body>
    <div class="container">
        <div class="kanban-heading">
            <!-- <strong class="kanban-heading-text">Kanban Board</strong> -->
            <strong class="kanban-heading-text">{{ $project->project_name }}</strong>
        </div>
        <div class="project-type-dropdown">
            <div class="dropdown-content dropdown-below" id="project-type-container" style="display: none;">
                <!-- List of project types -->
                @foreach($projectTypes as $type)
                    <div class="project-type" onclick="openModal('{{ $type }}')">{{ $type }}</div>
                @endforeach
            </div>
        </div>
        <div class="kanban-board">
            @foreach($taskStatuses as $status)
                <div class="kanban-block shadow" id="{{ strtolower(str_replace(' ', '', $status)) }}" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <div class="backlog-name">{{ $status }}</div>
                    <div class="backlog-dots"><i class="material-icons down-arrow-icon" onclick="toggleProjectTypeDropdown()">keyboard_arrow_down</i></div>
                    <div class="backlog-tasks" id="{{ strtolower(str_replace(' ', '', $status)) }}-tasks" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                    
                    <div class="card-wrapper__footer">
                        <button class="add-task" id="create-task-btn">Create
                            <div class="add-task-ico" onclick="toggleProjectTypeDropdown()"><i class="material-icons">keyboard_arrow_down</i></div>
                        </button>
                    </div>
                </div>
            @endforeach    
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="modal">
        <div class="modal-content">
        <h4 id="modalProjectTypeHeading"> Create <span id="modalProjectType"></span></h4>
            <form class="add-card-form add-card-form-true" style="display: flex;" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mt-3">
                            <label for="title" style="font-size: 15px;">Title</label>
                            <input type="text" name="title" id="title" class="form-control shadow-sm" placeholder="Enter title" required style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mt-3">
                            <label for="priority" style="font-size: 15px;">Priority</label>
                            <select name="priority" id="priority" class="form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;">
                                <option value="" selected="selected" disabled="disabled">Select priority</option>
                                <option value="Low priority">Low priority</option>
                                <option value="Med priority">Med priority</option>
                                <option value="High priority">High priority</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mt-3">
                            <label for="estimated_time" style="font-size: 15px;">Estimated Time</label>
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
                    
                <div class="form-group mb-3">
                    <label for="details" style="font-size: 15px;" class="mb-3">Details</label>
                    <textarea name="details" id="details" class="ckeditor form-control shadow-sm" style="padding-top:5px; padding-bottom:5px; height:39px; color: #858585; font-size: 14px;" required></textarea>
                </div>
                    
                <label for="assigned_to" style="font-size: 15px;" class="mb-3">Assigned To</label>
                <select name="assigned_to[]" id="assigned_to" class="add-card-form__main assigned_to" required multiple>
                    @foreach ($profiles as $profile)
                        <option value="{{ $profile->id }}">{{ $profile->profile_name }}</option>
                    @endforeach
                </select>

                <div class="mt-3 text-end">
                    <button type="submit" class="form-add-btn" style="margin-right: 10px;">Create</button>
                    <button type="button" class="form-add-btn" onclick="closeModal()">Close</button>
                </div>
            </form>
        </div>
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
  // Function to toggle the project type dropdown and rotate the arrow icon
function toggleProjectTypeDropdown() {
  var dropdownContent = document.getElementById("project-type-container");
  dropdownContent.style.display = dropdownContent.style.display === "none" ? "block" : "none";

  // Toggle the down arrow icon rotation
  var downArrowIcon = document.querySelector(".down-arrow-icon");
  downArrowIcon.classList.toggle("rotate");
}

// Function to open the modal and update the modal heading with the selected project type
function openModal(type) {
  // Update the modal heading with the selected project type
  var modalProjectType = document.getElementById("modalProjectType");
  modalProjectType.innerText = type;

  // Show the modal
  document.getElementById("modal").style.display = "block";
}

// Function to close the modal and show the project type dropdown
function closeModal() {
  // Hide the modal
  document.getElementById("modal").style.display = "none";
}

// Function to handle the project type selection
function selectProjectType(type) {
  // Close the project type dropdown
  var dropdownContent = document.getElementById("project-type-container");
  dropdownContent.style.display = "none";

  // Toggle the down arrow icon rotation
  var downArrowIcon = document.querySelector(".down-arrow-icon");
  downArrowIcon.classList.toggle("rotate");

  // Open the modal with the selected project type
  openModal(type);
}

// CSK Editor (Assuming you've loaded the necessary libraries for CKEditor)
$(document).ready(function() {
  $('.ckeditor').ckeditor();
});

</script>

<script>
  $(document).ready(function() {
    $('.assigned_to').select2({
      placeholder: 'Select user',
    });
  });
</script>

<script>
    function closeModal() {
        // Hide the modal
        var modal = document.getElementById('modal');
        modal.style.display = 'none';
    }
 
    </script>
</html>



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

                        <!-- <span>Task 1</span> -->
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
   
   
