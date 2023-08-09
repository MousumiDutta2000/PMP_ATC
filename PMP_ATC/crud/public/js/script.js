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
  
  function addTask(form, sectionId, status) {
    // Get the submitted task data from the form
    var title = form.querySelector('#title').value;
    var priority = form.querySelector('#priority').value;

    // Create a unique card ID
    var cardId = 'task' + (Math.random().toString(36).substr(2, 9));

    // Create the card element
    var card = document.createElement('div');
    card.className = 'card';
    card.id = cardId;

    // Create card header
    var cardHeader = document.createElement('div');
    cardHeader.className = 'card__header';

    // Create priority badge
    var cardContainerColor = document.createElement('div');
    cardContainerColor.className = 'card-container-color ' + priority;
    cardContainerColor.innerHTML = priority;

    // Create clear icon
    var cardHeaderClear = document.createElement('div');
    cardHeaderClear.className = 'card__header-clear';
    var clearIcon = document.createElement('i');
    clearIcon.className = 'material-icons';
    clearIcon.textContent = 'clear';
    cardHeaderClear.appendChild(clearIcon);

    cardHeader.appendChild(cardContainerColor);
    cardHeader.appendChild(cardHeaderClear);

    // Create card text
    var cardText = document.createElement('div');
    cardText.className = 'card__text';
    cardText.textContent = title;

    // Append card elements
    card.appendChild(cardHeader);
    card.appendChild(cardText);

    // Find the target section and insert the card
    var targetSection = document.getElementById(status + '-tasks');
    targetSection.insertBefore(card, targetSection.querySelector('.card-wrapper__footer'));

    // Hide the form and reset it
    form.style.display = 'none';
    form.reset();
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
  

// Function to toggle the project type dropdown and rotate the arrow icon
// function toggleProjectTypeDropdown() {
//   var dropdownContent = document.getElementById("project-type-container");
//   dropdownContent.style.display = dropdownContent.style.display === "none" ? "block" : "none";

//   // Toggle the down arrow icon rotation
//   var downArrowIcon = document.querySelector(".down-arrow-icon");
//   downArrowIcon.classList.toggle("rotate");
// }

function toggleProjectTypeDropdown(dropdownId, status) {
  var dropdownContent = document.getElementById(dropdownId);
  dropdownContent.style.display = dropdownContent.style.display === "none" ? "block" : "none";

  // Toggle the down arrow icon rotation
  var downArrowIcon = dropdownContent.previousElementSibling.querySelector(".down-arrow-icon");
  downArrowIcon.classList.toggle("rotate");

  // Store the clicked status in a hidden input field
  document.getElementById("selectedStatus").value = status;
}

// Function to open the modal and update the modal heading with the selected project type



function openModal(type, status) {
  // Update the modal heading with the selected project type
  var modalProjectType = document.getElementById("modalProjectType");
  modalProjectType.innerText = type;

  // Set the selected status as a value in the form
  document.getElementById("status").value = status;

  // Show the modal
  document.getElementById("modal").style.display = "block";

  // Pass the status to the addTask function
  var form = document.querySelector(".add-card-form");
  var sectionId = status.toLowerCase().replace(/\s+/g, "");
  addTask(form, sectionId, status);
  
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
$('.ckeditor').ckeditor();
        
// Hide the modal
function closeModal() {
  var modal = document.getElementById('modal');
  modal.style.display = 'none';
}