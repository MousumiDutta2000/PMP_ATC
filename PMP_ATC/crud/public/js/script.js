function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }
  
  function allowDrop(ev) {
    ev.preventDefault();
  }
  
  function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.currentTarget.appendChild(document.getElementById(data));
  }
  
  function createTask() {
    var x = document.getElementById("inprogress");
    var y = document.getElementById("done");
    var z = document.getElementById("create-new-task-block");
    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "block";
      z.style.display = "none";
    } else {
      x.style.display = "none";
      y.style.display = "none";
      z.style.display = "flex";
    }
  }
  
  function saveTask() {
    var todo = document.getElementById("todo");
    var taskName = document.getElementById("task-name").value;
    todo.innerHTML += `
      <div class="task" id="${taskName.toLowerCase().split(" ").join("")}" draggable="true" ondragstart="drag(event)">
        <span>${taskName}</span>
      </div>
    `;
  }
  
  function editTask() {
    var saveButton = document.getElementById("save-button");
    var editButton = document.getElementById("edit-button");
    if (saveButton.style.display === "none") {
      saveButton.style.display = "block";
      editButton.style.display = "none";
    } else {
      saveButton.style.display = "none";
      editButton.style.display = "block";
    }
  }
  
  function toggleForm(section) {
    var form = section.querySelector('.add-card-form');
    var addButton = section.querySelector('.add-task-ico i');
  
    if (form.style.display === 'none') {
      form.style.display = 'block';
      addButton.textContent = 'remove_circle_outline';
    } else {
      form.style.display = 'none';
      addButton.textContent = 'add_circle_outline';
    }
  }
  
  function enableAddButton(form) {
    var priorityCheckboxes = form.querySelectorAll('.form__checkbox');
    var taskInput = form.querySelector('.add-card-form__main');
  
    priorityCheckboxes.forEach(function (checkbox) {
      checkbox.addEventListener('input', checkFormValidity);
    });
    taskInput.addEventListener('input', checkFormValidity);
  }
  
  function checkFormValidity() {
    var form = this.closest('form');
    var addButton = form.querySelector('.form-add-btn');
    var priorityChecked = form.querySelector('.form__checkbox:checked');
    var taskInput = form.querySelector('.add-card-form__main');
  
    if (priorityChecked && taskInput.value.trim() !== '') {
      addButton.disabled = false;
    } else {
      addButton.disabled = true;
    }
  }
  
  function addTask(form, sectionId) {
    var taskText = form.querySelector('.add-card-form__main').value.trim();
    var priority = form.querySelector('.form__checkbox:checked').value;
    var cardId = 'task' + (Math.random().toString(36).substr(2, 9)); // Generate a random ID for the task card
  
    var card = document.createElement('div');
    card.className = 'card';
    card.id = cardId;
    card.draggable = true;
    card.setAttribute('ondragstart', 'drag(event)');
  
    var cardHeader = document.createElement('div');
    cardHeader.className = 'card__header';
  
    var cardContainerColor = document.createElement('div');
    cardContainerColor.className = 'card-container-color ' + priority;
  
    var priorityText;
    if (priority === 'card-color-low') {
      priorityText = 'Low Priority';
    } else if (priority === 'card-color-med') {
      priorityText = 'Med Priority';
    } else if (priority === 'card-color-high') {
      priorityText = 'High Priority';
    }
  
    var cardHeaderPriority = document.createElement('div');
    cardHeaderPriority.className = 'card__header-priority';
    cardHeaderPriority.textContent = priorityText;
  
    var cardHeaderClear = document.createElement('div');
    cardHeaderClear.className = 'card__header-clear';
    var clearIcon = document.createElement('i');
    clearIcon.className = 'material-icons';
    clearIcon.textContent = 'clear';
    cardHeaderClear.appendChild(clearIcon);
  
    cardHeader.appendChild(cardContainerColor);
    cardHeader.appendChild(cardHeaderPriority);
    cardHeader.appendChild(cardHeaderClear);
  
    var cardText = document.createElement('div');
    cardText.className = 'card__text';
    cardText.textContent = taskText;
  
    var cardMenu = document.createElement('div');
    cardMenu.className = 'card__menu';
  
    var cardMenuLeft = document.createElement('div');
    cardMenuLeft.className = 'card__menu-left';
  
    var commentsWrapper = document.createElement('div');
    commentsWrapper.className = 'comments-wrapper';
    var commentsIcon = document.createElement('div');
    commentsIcon.className = 'comments-ico';
    var commentsMaterialIcon = document.createElement('i');
    commentsMaterialIcon.className = 'material-icons';
    commentsMaterialIcon.textContent = 'comment';
    commentsIcon.appendChild(commentsMaterialIcon);
    var commentsNum = document.createElement('div');
    commentsNum.className = 'comments-num';
    commentsNum.textContent = '0';
    commentsWrapper.appendChild(commentsIcon);
    commentsWrapper.appendChild(commentsNum);
  
    var attachWrapper = document.createElement('div');
    attachWrapper.className = 'attach-wrapper';
    var attachIcon = document.createElement('div');
    attachIcon.className = 'attach-ico';
    var attachMaterialIcon = document.createElement('i');
    attachMaterialIcon.className = 'material-icons';
    attachMaterialIcon.textContent = 'attach_file';
    attachIcon.appendChild(attachMaterialIcon);
    var attachNum = document.createElement('div');
    attachNum.className = 'attach-num';
    attachNum.textContent = '0';
    attachWrapper.appendChild(attachIcon);
    attachWrapper.appendChild(attachNum);
  
    cardMenuLeft.appendChild(commentsWrapper);
    cardMenuLeft.appendChild(attachWrapper);
  
    var cardMenuRight = document.createElement('div');
    cardMenuRight.className = 'card__menu-right';
  
    var addPeoples = document.createElement('div');
    addPeoples.className = 'add-peoples';
    var addMaterialIcon = document.createElement('i');
    addMaterialIcon.className = 'material-icons';
    addMaterialIcon.textContent = 'add';
    addPeoples.appendChild(addMaterialIcon);
  
    var imgAvatar = document.createElement('div');
    imgAvatar.className = 'img-avatar';
    var avatarImg = document.createElement('img');
    avatarImg.src = '41aad055f35eb28f42b84ca1b4cf5d53.jpg';
    imgAvatar.appendChild(avatarImg);
  
    cardMenuRight.appendChild(addPeoples);
    cardMenuRight.appendChild(imgAvatar);
  
    cardMenu.appendChild(cardMenuLeft);
    cardMenu.appendChild(cardMenuRight);
  
    card.appendChild(cardHeader);
    card.appendChild(cardText);
    card.appendChild(cardMenu);
  
    var targetSection = document.getElementById(sectionId);
    targetSection.insertBefore(card, targetSection.querySelector('.card-wrapper__footer'));
  
    form.style.display = 'none';
    var addButton = form.querySelector('.form-add-btn');
    addButton.disabled = true;
    form.reset();
  
    var addTaskButton = targetSection.querySelector('.add-task-ico i');
    addTaskButton.textContent = 'add_circle_outline';
  }
  
  var sections = document.querySelectorAll('.kanban-block');
  sections.forEach(function (section) {
    var addTaskButton = section.querySelector('.add-task-ico');
    addTaskButton.addEventListener('click', function () {
      toggleForm(section);
    });
  
    var form = section.querySelector('.add-card-form');
    enableAddButton(form);
  
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      addTask(form, section.id);
    });
  });
  

  document.getElementById("expand-btn").addEventListener("click", function() {
    var dotsIcon = this.querySelector("i");
    dotsIcon.classList.toggle("expanded");
  });
  



// function drag(ev) {
//             ev.dataTransfer.setData("text", ev.target.id);
//         }

//         function allowDrop(ev) {
//             ev.preventDefault();
//         }

//         function drop(ev) {
//             ev.preventDefault();
//             var data = ev.dataTransfer.getData("text");
//             ev.currentTarget.appendChild(document.getElementById(data));
//         }

//         function createTask(){
//             var x = document.getElementById("inprogress");
//             var y = document.getElementById("done");
//             var z = document.getElementById("create-new-task-block");
//             if (x.style.display === "none") {
//                 x.style.display = "block";
//                 y.style.display = "block";
//                 z.style.display = "none";
//             } else {
//                 x.style.display = "none";
//                 y.style.display = "none";
//                 z.style.display = "flex";
//             }
//         }

//         function saveTask(){
//             // var saveButton = document.getElementById("save-button");
//             // var editButton = document.getElementById("edit-button");
//             // if (saveButton.style.display === "none") {
//             //     saveButton.style.display = "block";
//             //     editButton.style.display = "none";
//             // } else{
//             //     saveButton.style.display = "none";
//             //     editButton.style.display = "block";
//             // }

//             var todo = document.getElementById("todo");
//             var taskName = document.getElementById("task-name").value;
//             todo.innerHTML += `
//             <div class="task" id="${taskName.toLowerCase().split(" ").join("")}" draggable="true" ondragstart="drag(event)">
//                 <span>${taskName}</span>
//             </div>
//             `
//         }

//         function editTask(){
//             var saveButton = document.getElementById("save-button");
//             var editButton = document.getElementById("edit-button");
//             if (saveButton.style.display === "none") {
//                 saveButton.style.display = "block";
//                 editButton.style.display = "none";
//             } else{
//                 saveButton.style.display = "none";
//                 editButton.style.display = "block";
//             }
//         }


//         // function toggleForm(section) {
//         //     var form = section.querySelector('.add-card-form');
//         //     var addButton = section.querySelector('.add-task-ico i');
            
//         //     if (form.style.display === 'none') {
//         //       form.style.display = 'block';
//         //       addButton.textContent = 'remove_circle_outline';
//         //     } else {
//         //       form.style.display = 'none';
//         //       addButton.textContent = 'add_circle_outline';
//         //     }
//         //   }
          
//         //   var sections = document.querySelectorAll('.kanban-block');
//         //   sections.forEach(function(section) {
//         //     var addTaskButton = section.querySelector('.add-task-ico');
//         //     addTaskButton.addEventListener('click', function() {
//         //       toggleForm(section);
//         //     });
//         //   });

//         function toggleForm(section) {
//             var form = section.querySelector('.add-card-form');
//             var addButton = section.querySelector('.add-task-ico i');
          
//             if (form.style.display === 'none') {
//               form.style.display = 'block';
//               addButton.textContent = 'remove_circle_outline';
//             } else {
//               form.style.display = 'none';
//               addButton.textContent = 'add_circle_outline';
//             }
//           }
          
//           function enableAddButton(form) {
//             var priorityCheckboxes = form.querySelectorAll('.form__checkbox');
//             var taskInput = form.querySelector('.add-card-form__main');
          
//             priorityCheckboxes.forEach(function (checkbox) {
//               checkbox.addEventListener('input', checkFormValidity);
//             });
//             taskInput.addEventListener('input', checkFormValidity);
//           }
          
//           function checkFormValidity() {
//             var form = this.closest('form');
//             var addButton = form.querySelector('.form-add-btn');
//             var priorityChecked = form.querySelector('.form__checkbox:checked');
//             var taskInput = form.querySelector('.add-card-form__main');
          
//             if (priorityChecked && taskInput.value.trim() !== '') {
//               addButton.disabled = false;
//             } else {
//               addButton.disabled = true;
//             }
//           }
          
//           function addTask(form, sectionId) {
//             var taskText = form.querySelector('.add-card-form__main').value.trim();
//             var priority = form.querySelector('.form__checkbox:checked').value;
//             var cardId = 'task' + (Math.random().toString(36).substr(2, 9)); // Generate a random ID for the task card
          
//             var card = document.createElement('div');
//             card.className = 'card';
//             card.id = cardId;
//             card.draggable = true;
//             card.setAttribute('ondragstart', 'drag(event)');
          
//             var cardHeader = document.createElement('div');
//             cardHeader.className = 'card__header';
          
//             var cardContainerColor = document.createElement('div');
//             cardContainerColor.className = 'card-container-color' + priority;
          
//             var cardHeaderPriority = document.createElement('div');
//             cardHeaderPriority.className = 'card__header-priority';
//             cardHeaderPriority.textContent = priority.charAt(0).toUpperCase() + priority.slice(1) + ' Priority';
          
//             var cardHeaderClear = document.createElement('div');
//             cardHeaderClear.className = 'card__header-clear';
//             var clearIcon = document.createElement('i');
//             clearIcon.className = 'material-icons';
//             clearIcon.textContent = 'clear';
//             cardHeaderClear.appendChild(clearIcon);
          
//             cardHeader.appendChild(cardContainerColor);
//             cardHeader.appendChild(cardHeaderPriority);
//             cardHeader.appendChild(cardHeaderClear);
          
//             var cardText = document.createElement('div');
//             cardText.className = 'card__text';
//             cardText.textContent = taskText;
          
//             var cardMenu = document.createElement('div');
//             cardMenu.className = 'card__menu';
          
//             var cardMenuLeft = document.createElement('div');
//             cardMenuLeft.className = 'card__menu-left';
          
//             var commentsWrapper = document.createElement('div');
//             commentsWrapper.className = 'comments-wrapper';
//             var commentsIcon = document.createElement('div');
//             commentsIcon.className = 'comments-ico';
//             var commentsMaterialIcon = document.createElement('i');
//             commentsMaterialIcon.className = 'material-icons';
//             commentsMaterialIcon.textContent = 'comment';
//             commentsIcon.appendChild(commentsMaterialIcon);
//             var commentsNum = document.createElement('div');
//             commentsNum.className = 'comments-num';
//             commentsNum.textContent = '0';
//             commentsWrapper.appendChild(commentsIcon);
//             commentsWrapper.appendChild(commentsNum);
          
//             var attachWrapper = document.createElement('div');
//             attachWrapper.className = 'attach-wrapper';
//             var attachIcon = document.createElement('div');
//             attachIcon.className = 'attach-ico';
//             var attachMaterialIcon = document.createElement('i');
//             attachMaterialIcon.className = 'material-icons';
//             attachMaterialIcon.textContent = 'attach_file';
//             attachIcon.appendChild(attachMaterialIcon);
//             var attachNum = document.createElement('div');
//             attachNum.className = 'attach-num';
//             attachNum.textContent = '0';
//             attachWrapper.appendChild(attachIcon);
//             attachWrapper.appendChild(attachNum);
          
//             cardMenuLeft.appendChild(commentsWrapper);
//             cardMenuLeft.appendChild(attachWrapper);
          
//             var cardMenuRight = document.createElement('div');
//             cardMenuRight.className = 'card__menu-right';
          
//             var addPeoples = document.createElement('div');
//             addPeoples.className = 'add-peoples';
//             var addMaterialIcon = document.createElement('i');
//             addMaterialIcon.className = 'material-icons';
//             addMaterialIcon.textContent = 'add';
//             addPeoples.appendChild(addMaterialIcon);
          
//             var imgAvatar = document.createElement('div');
//             imgAvatar.className = 'img-avatar';
//             var avatarImg = document.createElement('img');
//             avatarImg.src = '41aad055f35eb28f42b84ca1b4cf5d53.jpg';
//             imgAvatar.appendChild(avatarImg);
          
//             cardMenuRight.appendChild(addPeoples);
//             cardMenuRight.appendChild(imgAvatar);
          
//             cardMenu.appendChild(cardMenuLeft);
//             cardMenu.appendChild(cardMenuRight);
          
//             card.appendChild(cardHeader);
//             card.appendChild(cardText);
//             card.appendChild(cardMenu);
          
//             var targetSection = document.getElementById(sectionId);
//             targetSection.insertBefore(card, targetSection.querySelector('.card-wrapper__footer'));
          
//             form.style.display = 'none';
//             var addButton = form.querySelector('.form-add-btn');
//             addButton.disabled = true;
//             form.reset();
          
//             var addTaskButton = targetSection.querySelector('.add-task-ico i');
//             addTaskButton.textContent = 'add_circle_outline';
//           }
          
//           var sections = document.querySelectorAll('.kanban-block');
//           sections.forEach(function (section) {
//             var addTaskButton = section.querySelector('.add-task-ico');
//             addTaskButton.addEventListener('click', function () {
//               toggleForm(section);
//             });
          
//             var form = section.querySelector('.add-card-form');
//             enableAddButton(form);
          
//             form.addEventListener('submit', function (e) {
//               e.preventDefault();
//               addTask(form, section.id);
//             });
//           });
          