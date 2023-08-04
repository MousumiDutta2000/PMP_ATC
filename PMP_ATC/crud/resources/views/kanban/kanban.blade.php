    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kanban.css') }}">

    <script src="{{ asset('js/kanban.js') }}"></script>
    <script src="{{ asset('js/bundle.fa06bd827b69c86d1e5c.js') }}"></script>
    <script src="{{ asset('js/bundle.779c8b3edfadced3283a.js') }}"></script>
    <script src="{{ asset('js/bundle.24f6873edaef6bd85f9e.js') }}"></script>
    <script src="{{ asset('js/bundle.8c4c1640f9a406d21583.js') }}"></script>
    <script src="{{ asset('js/bundle.4e09edb465a6cb160c4a.js') }}"></script>


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
                                <div class="img-avatar"><img src="3bc84a401a51991f895ac6f6f40b7010.jpg">
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
                                <div class="img-avatar"><img src="615f6d8539dbe37bc2c8f3d7d749182c.jpg">
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
                                <div class="img-avatar"><img src="0cafaf103d2eef926eebb15b20651c88.jpg">
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
                                <div class="img-avatar"><img src="3bc84a401a51991f895ac6f6f40b7010.jpg">
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
                                <div class="img-avatar"><img src="615f6d8539dbe37bc2c8f3d7d749182c.jpg">
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
                                <div class="img-avatar"><img src="615f6d8539dbe37bc2c8f3d7d749182c.jpg">
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
                                <div class="img-avatar"><img src="41aad055f35eb28f42b84ca1b4cf5d53.jpg">
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
                                <div class="img-avatar"><img src="3bc84a401a51991f895ac6f6f40b7010.jpg">
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
                                <div class="img-avatar"><img src="0cafaf103d2eef926eebb15b20651c88.jpg">
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
