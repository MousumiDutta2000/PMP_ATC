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

if (!$.fn.DataTable.isDataTable('#projectsTable')) {
    $(document).ready(function () {
        var table = $('#projectsTable').DataTable({
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