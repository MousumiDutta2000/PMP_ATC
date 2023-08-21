if (!$.fn.DataTable.isDataTable('#userWorkTable')) {
    $(document).ready(function () {
        var table = $('#userWorkTable').DataTable({
            responsive: true
        });

        // Add the date filter input dynamically
        var dateFilterInput = $('<input type="date" class="form-control" id="dateFilter">');
        $('.dataTables_filter').append(dateFilterInput);

        $('#dateFilter').on('change', function () {
            var selectedDate = $(this).val();
            table.column(2).search(selectedDate).draw();
        });
    });
}

