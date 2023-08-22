$(document).ready(function () {
    // Initialize DataTable only once
    var table = $('#projectsTable').DataTable({
        aaSorting: [],
        responsive: true,
        lengthMenu: [5, 10, 25, 50, 100],
        columnDefs: [
            {
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: -1
            }
        ]
    });

    var technologyColumn = table.column(4);
    var memberColumn = table.column(5);

    // Hide the "Start Date," "Technology," and "Member" columns initially
    table.column(3).visible(false); // 3 is the column index for "Start Date"
    technologyColumn.visible(false); // Hide the Technology column initially
    memberColumn.visible(false); // Hide the Member column initially

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

    // CSK Editor
    $('.ckeditor').ckeditor();

    // addmember modal
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

    // Adjust name field width
    adjustNameFieldWidth();

    $(window).resize(function() {
        adjustNameFieldWidth();
    });

    function adjustNameFieldWidth() {
        $('.name-container').each(function() {
            var maxWidth = 150; // Maximum width for the name field
            var containerWidth = $(this).parent().width();
            var nameWidth = $(this).find('.name').width();

            if (nameWidth > maxWidth && nameWidth > containerWidth) {
                $(this).css('max-width', nameWidth + 10 + 'px');
            } else {
                $(this).css('max-width', '');
            }
        });
    }

    // Tooltip initialization
    $('[data-toggle="tooltip"]').tooltip();

    console.log("Executing placeholder code");
    $(".dataTables_filter input")
        .attr("placeholder", "Search here...")
        .css({
            width: "300px",
            display: "inline-block",
        });
});
