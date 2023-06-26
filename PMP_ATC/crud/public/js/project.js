

// // Member JS 

// $(document).ready(function() {
//     // Plus sign click event handler
//     $('#plusSign').click(function() {
//       // Show the add member modal
//       $('#myModal').modal('show');
//     });
  
//     // Add Member button click event handler
//     $('#addMemberBtn').click(function() {
//       // Get the entered member name and role from the modal
//       var memberName = $('#fieldName').val();
//       var memberRole = $('#roleSelect').val();
  
//       // Create a new card with the entered details
//       var newCard = '<div class="card">' +
//         '<div class="profile-image">' +
//         '<img src="{{ asset('img/profile-img.jpg') }}" alt="Profile Image">' +
//         '</div>' +
//         '<div class="user-details">' +
//         '<h3 class="user-name">' + memberName + '</h3>' +
//         '<p class="designation">' + memberRole + '</p>' +
//         '</div>' +
//         '<div class="edit-icon">' +
//         '<i class="fa fa-edit"></i>' +
//         '</div>' +
//         '</div>';
  
//       // Append the new card to the memberCard container
//       $('#memberCardContainer').append(newCard);
  
//       // Clear the input fields in the modal
//       $('#fieldName').val('');
//       $('#roleSelect').val('');
  
//       // Hide the add member modal
//       $('#myModal').modal('hide');
//     });
  
//     // Edit Member button click event handler
//   $(document).on('click', '.edit-icon', function() {
//     // Get the current member name and role from the card
//     var card = $(this).closest('.card');
//     var memberName = card.find('.user-name').text();
//     var memberRole = card.find('.designation').text();
  
//     // Set the values in the edit modal input fields
//     $('#editFieldName').val(memberName);
//     $('#editRoleSelect').val(memberRole);
  
//     // Store a reference to the card being edited
//     $('#editModal').data('card', card);
  
//     // Show the edit modal
//     $('#editModal').modal('show');
//   });
  
//   // Update Member button click event handler
//   $('#updateMemberBtn').click(function() {
//     // Get the edited member name and role from the edit modal
//     var editedMemberName = $('#editFieldName').val();
//     var editedMemberRole = $('#editRoleSelect').val();
  
//     // Get the reference to the card being edited
//     var card = $('#editModal').data('card');
  
//     // Update the card with the edited values
//     card.find('.user-name').text(editedMemberName);
//     card.find('.designation').text(editedMemberRole);
  
//     // Hide the edit modal
//     $('#editModal').modal('hide');
//   });
  
//   // Remove Member button click event handler
//   $('#removeBtn').click(function() {
//     // Get the reference to the card being edited
//     var card = $('#editModal').data('card');
  
//     // Remove the entire card from the DOM
//     card.remove();
  
//     // Hide the edit modal
//     $('#editModal').modal('hide');
//   });
  
//   });