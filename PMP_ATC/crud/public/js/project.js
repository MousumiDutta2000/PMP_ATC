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

    // Handle filter button click
    $('#filterButton').on('click', function () {
        $('#filterForm').toggle(); // Show/hide the filter form
    });

    // Handle filter type change
    $('#filterType').on('change', function () {
        var filterType = $(this).val();
        $('#dateFilter, #technologyFilter').hide();
        
        if (filterType === 'date') {
            $('#dateFilter').show();
            $('#technologyFilter').hide();
        } else if (filterType === 'technology') {
            $('#dateFilter').hide();
            $('#technologyFilter').show();
        }
    });

    // Handle apply filter button click
    $('#applyFilter').on('click', function () {
        var filterType = $('#filterType').val();
        var selectedDate = $('#date').val();
        var selectedTechnology = $('#technology').val();

        // Apply date or technology filtering
        if (filterType === 'date') {
            table.column(3).search(selectedDate);
        } else if (filterType === 'technology') {
            table.column(4).search(selectedTechnology);
        }

        table.draw();
        
        // Hide the filter form
        $('#filterForm').hide();
    });

    // Hide the "Start Date" column
    table.column(3).visible(false); // 3 is the column index for "Start Date"
});


