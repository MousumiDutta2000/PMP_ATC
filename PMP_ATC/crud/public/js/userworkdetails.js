$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#userWorkTable')) {
        var table = $('#userWorkTable').DataTable({
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

        // Add the date filter input dynamically
        var dateFilterInput = $('<input type="date" class="form-control" id="dateFilter">');
        dateFilterInput.css('height', '31px'); // Adjust the height as needed
        $('.dataTables_filter').append(dateFilterInput);

        // Adjust the position of the search input
        $('.dataTables_filter input')
            .css({
                width: "200px", // Adjust the width as needed
                display: "inline-block",
                marginBottom: "5px" // Add some space below the search input
            })
            .attr("placeholder", "Search here...");

        $('#dateFilter').on('change', function () {
            var selectedDate = $(this).val();
            table.column(2).search(selectedDate).draw();
        });
    }

    adjustNameFieldWidth();

    $(window).resize(function () {
        adjustNameFieldWidth();
    });

    function adjustNameFieldWidth() {
        $('.name-container').each(function () {
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

    $('[data-toggle="tooltip"]').tooltip();
});
