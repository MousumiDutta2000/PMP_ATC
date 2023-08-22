$(document).ready(function() {

    // CSK Editor
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });

    // addmdember modal
    $('.addmember').select2({
        placeholder: 'Select Member',
        dropdownParent: $('#myModal')
    });
    
    // editmember modal
    $('.editmember').select2({
        placeholder: 'Select Member',
        dropdownParent: $('#editModal')
    });

    // taskstatus
    $('.task_status').select2({
        placeholder: 'Select Task Status',
    });

    //tasktypes
    $('.task_type').select2({
        placeholder: 'Select Task Type',
    });
});

// $(document).ready(function () {
//     // Initialize the DataTable
//     var table = $('#projectsTable').DataTable({
//         responsive: true,
//     });

//     // Add the date filter input dynamically
//     var dateFilterInput = $('<input type="date" class="form-control" id="dateFilter">');
//     dateFilterInput.css('height', '31px'); // Adjust the height as needed
//     $('.dataTables_filter').append(dateFilterInput);

//     // Adjust the position of the search input
//     $('.dataTables_filter input')
//         .css({
//             width: "200px", // Adjust the width as needed
//             display: "inline-block",
//             marginBottom: "5px" // Add some space below the search input
//         })
//         .attr("placeholder", "Search here...");

//     // Apply date filtering when the date input changes
//     $('#dateFilter').on('change', function () {
//         var selectedDate = $(this).val();
//         table.column(3).search(selectedDate).draw();
//     });

//     // Hide the "Start Date" column
//     table.column(3).visible(false); // 3 is the column index for "Start Date"
// });

$(document).ready(function () {
    var table = $('#projectsTable').DataTable({
        responsive: true,
    });

    var technologyColumn = table.column(4); // Store the Technology column for later use
    var memberColumn = table.column(5); // Store the Member column for later use

    // Handle filter button click
    $('#filterButton').on('click', function () {
        $('#filterForm').toggle(); // Show/hide the filter form
        if (technologyColumn.visible() || memberColumn.visible()) {
            technologyColumn.visible(false); // Hide the Technology column initially
            memberColumn.visible(false); // Hide the Member column initially
        }
    });

    // Handle filter type change
    $('#filterType').on('change', function () {
        var filterType = $(this).val();
        $('#dateFilter, #technologyFilter, #memberFilter').hide();
    
        if (filterType === 'date') {
            $('#dateFilter').show();
            $('#technologyFilter').hide();
            $('#memberFilter').hide();
            technologyColumn.visible(false);
            memberColumn.visible(false);
            console.log("Date filter selected"); // Add debug output
        } else if (filterType === 'technology') {
            $('#dateFilter').hide();
            $('#technologyFilter').show();
            $('#memberFilter').hide();
            technologyColumn.visible(false);
            memberColumn.visible(false);
            console.log("Technology filter selected"); // Add debug output
        } else if (filterType === 'member') {
            $('#dateFilter').hide();
            $('#technologyFilter').hide();
            $('#memberFilter').show();
            technologyColumn.visible(false);
            memberColumn.visible(false);
            console.log("Member filter selected"); // Add debug output
        }
    });
    

    // Handle apply filter button click
    $('#applyFilter').on('click', function () {
        var filterType = $('#filterType').val();
        var selectedDate = $('#date').val();
        var selectedTechnology = $('#technology').val();
        var selectedMember = $('#member').val();

        // Apply date, technology, or member filtering
        if (filterType === 'date') {
            table.column(3).search(selectedDate);
        } else if (filterType === 'technology') {
            table.column(4).search(selectedTechnology);
        } else if (filterType === 'member') {
            table.column(5).search(selectedMember);
        }

        table.draw();
        
        // Hide the filter form
        $('#filterForm').hide();
    });

    // Hide the "Start Date," "Technology," and "Member" columns initially
    table.column(3).visible(false); // 3 is the column index for "Start Date"
    technologyColumn.visible(false); // Hide the Technology column initially
    memberColumn.visible(false); // Hide the Member column initially
});