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
});