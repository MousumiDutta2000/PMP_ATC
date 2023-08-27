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

// filterdiv show
$(document).ready(function() {
    $('#filterButton').click(function () {
        var filterDiv = $('#filterDiv');
        var tableContainer = $('#tableContainer');

        if (filterDiv.is(':visible')) {
            // If filterDiv is visible, hide it and reset the margin of the table container
            filterDiv.hide();
            tableContainer.css('margin-top', '0');
        } else {
            // If filterDiv is hidden, show it and adjust the margin of the table container
            filterDiv.show();
            tableContainer.css('margin-top', filterDiv.height() + 'px');
        }
    });

    // Check if DataTable is already initialized on the table
    if (!$.fn.DataTable.isDataTable('#projectTable')) {
        $('#projectTable').DataTable({
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
    }

    // Initialize the DataTable
    var projectTable = $('#projectTable').DataTable();

    // Define a custom filter function
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
    var filterOptions = $('#filterOptions').val();
    var searchQuery = $('#searchQuery').val();
    var selectedTechnology = $('#technologySelect').val();
    var selectedMember = $('#projectMemberSelect').val();
    // var selectedMember = $('#projectMemberSelect').val().toLowerCase(); // Get the selected member name and convert to lowercase
    // var membersColumn = row.find('.hide-member').text().toLowerCase(); // Get the members column text

    if (filterOptions === 'date') {
        // Check if the date matches the search query
        var dateColumn = data[3];
        return dateColumn.includes(searchQuery);
    } else if (filterOptions === 'technology') {
        // Check if no technology is selected or if the selected technology matches the row's technology
        var technologyColumn = data[4];
        if (!selectedTechnology || selectedTechnology === technologyColumn) {
            return true;
        }
        return false;
    } else if (filterOptions === 'member') {
        // Check if no member is selected or if the selected member matches the row's member name
        var memberColumn = data[5]; // Assuming member name is in the 7th column (index 6)
        if (!selectedMember || selectedMember === memberColumn) {
            return true;
        }
        return false;
    } else {
        return true;
    }
    });

    // Add form section
    $(document).on('click', '.add-form-section', function() {
        var newFormSection = $('.form-section:first').clone(); // Clone the first form section
        newFormSection.find("input[type=text]").val(""); // Clear input values
        $('#formSections').append(newFormSection); // Append the cloned form section
        newFormSection.find('.btn-link.remove-form-section').show(); // Show the minus sign for the newly added form section

        // Disable the plus sign button for the previous form section
        $(this).prop('disabled', true);
        // newFormSection.prev('.form-section').find('.add-form-section').prop('disabled', false);

        // Show the "Reset" and "Search" buttons
        $('.reset-button').show();

        // Trigger the change event for #filterOptions
        $('#filterOptions').trigger('change');

        // Adjust the table container's top margin to push it down
        var filterDiv = $('#filterDiv');
        var tableContainer = $('#tableContainer');
        tableContainer.css('margin-top', filterDiv.is(':visible') ? filterDiv.height() + 'px' : '0');
    });

    // Remove form section
    $(document).on('click', '.remove-form-section', function() {
        if ($('#formSections .form-section').length > 1) {
            // Enable the plus sign button for the previous form section
            $(this).closest('.form-section').prev().find('.btn-link.add-form-section').prop('disabled', false);

            $(this).closest('.form-section').remove(); // Remove the current form section, but ensure at least one remains

            // Show the "Reset" button
            $('.reset-button').show();

            // Adjust the table container's top margin to push it down
            var filterDiv = $('#filterDiv');
            var tableContainer = $('#tableContainer');
            tableContainer.css('margin-top', filterDiv.is(':visible') ? filterDiv.height() + 'px' : '0');
        }
    });

    // choose filter options
    $('#filterOptions').change(function() {
        var selectedOption = $(this).val();
        var searchInput = $('#searchQuery');
        var technologyFilter = $('#technologyFilter');
        var technologySelect = $('#technologySelect'); // Technology select dropdown
        var projectMemberFilter = $('#projectMemberFilter'); // Project member select dropdown
        

        // Check the selected filter option
        if (selectedOption === 'technology') {
            // If 'Technology' is selected, show the technology filter and hide the search input and project member filter
            searchInput.hide();
            technologyFilter.show();
            technologySelect.show().insertAfter(searchInput);
            projectMemberFilter.hide();
        } else if (selectedOption === 'date') {
            // If 'Date' is selected, change the input type to 'date' and hide the technology filter and project member filter
            searchInput.attr('type', 'date');
            searchInput.show();
            technologyFilter.hide();
            technologySelect.hide();
            projectMemberFilter.hide();
        } else if (selectedOption === 'member') {
            // If 'Member' is selected, show the project member filter and hide the search input and technology filter
            searchInput.hide();
            projectMemberFilter.show();
            projectMemberFilter.show().insertAfter(searchInput);
            technologyFilter.hide();
            technologySelect.hide();
        } else {
            // For other options, show the search input and hide both filters
            searchInput.attr('type', 'text');
            searchInput.show();
            technologyFilter.hide();
            technologySelect.hide();
            projectMemberFilter.hide();
        }
    });

    // Add an event listener to the "Search" button
    $('#searchButton').click(function () {
        var filterOptions = $('#filterOptions').val();
        var searchQuery = $('#searchQuery').val().toLowerCase(); // Convert search query to lowercase for case-insensitive matching
        var selectedTechnology = $('#technologySelect').val();
        var selectedMember = $('#projectMemberSelect').val().toLowerCase(); // Get the selected member name and convert to lowercase

        // Iterate through each row in the table
        $('#projectTable tbody tr').each(function () {
            var row = $(this);
            var technologyColumn = row.find('.hide-technology').text(); // Get the technology column text
            var dateColumn = row.find('.hide-startDate').text().toLowerCase(); // Get the date column text and convert to lowercase
            var membersColumn = row.find('.hide-member').text().toLowerCase(); // Get the members column text

            // Split the technology names by a delimiter (e.g., comma) into an array
            var technologies = technologyColumn.split(',').map(function (item) {
                return item.trim();
            });

            // Split the member names by a delimiter (e.g., comma) into an array
            var members = membersColumn.split(',').map(function (item) {
                return item.trim().toLowerCase(); // Convert member names to lowercase
            });

            // Check if the selected technology and/or member exists in the respective arrays
            var technologyMatch = false;
            var memberMatch = false;

            if (selectedTechnology === '') {
                technologyMatch = true; // No filter for technology, so it's a match
            } else {
                for (var i = 0; i < technologies.length; i++) {
                    if (technologies[i] === selectedTechnology) {
                        technologyMatch = true;
                        break;
                    }
                }
            }

            // Check if the date contains the search query (assuming a simple substring match)
            var dateMatch = dateColumn.includes(searchQuery);

            // Check if the selected member matches any of the member names in the row
            if (Array.isArray(members) && members.length > 0) {
                for (var i = 0; i < members.length; i++) {
                    if (members[i] === selectedMember) {
                        memberMatch = true;
                        break;
                    }
                }
            }

            // Show or hide the row based on filter criteria
            if (filterOptions === 'member' && (!selectedMember || memberMatch)) {
                row.show();
            } else if ((filterOptions === 'date' && dateMatch) || (filterOptions === 'technology' && (selectedTechnology === '' || technologyMatch))) {
                row.show();
            } else {
                row.hide();
            }
        });

        applyFilters(); // Call a function to apply filters
    });


    // Add an event listener to the "Reset" button
    $('#resetButton').click(function () {
        // Clear input values in all form sections except the first one
        $('.form-section:not(:first)').each(function () {
            $(this).find('input[type="text"]').val('');
        });

        // Remove all form sections except the first one
        $('.form-section:not(:first)').remove();

        // Hide the "Reset" and "Search" buttons if there's only one form section left
        if ($('.form-section').length === 1) {
            $('.reset-button').hide();
        }

        // Reset the filter options dropdown
        $('#filterOptions').val('');

        // Reset the technology filter dropdown
        $('#technologySelect').val('');

        // Hide the technology filter
        $('#technologyFilter').hide();

        // Reset the project member filter dropdown
        $('#projectMemberSelect').val('');

        // Hide the project member filter
        $('#projectMemberFilter').hide();

        // Optionally, you can trigger a change event on the filter options dropdown to handle any associated logic
        $('#filterOptions').trigger('change');

        // Show all rows in the table
        $('#projectTable tbody tr').show();

        // Optionally, you can reapply any default sorting or filtering here if needed

        // Apply DataTables filtering and sorting (if you're using DataTables)
        var projectTable = $('#projectTable').DataTable();
        projectTable.search('').columns().search('').order([]).draw();

        // Show the "Reset" button
        $('.reset-button').show();
    });

});