if (!$.fn.DataTable.isDataTable('#userWorkTable')) {
    $(document).ready(function () {
        var table = $('#userWorkTable').DataTable({
            responsive: true
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
    });
}
