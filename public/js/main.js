function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
$(document).ready(function() {
    $('.aux-btn-edit').on('click', function(evt) {
        id = $(this).data('id');
        name = $(this).data('name');
        email = $(this).data('email');
        base_url = $('#formUpdate').attr('action');

        /* Delete ID from URL */
        splitted_url = base_url.split(/\/[0-9]+/);

        /* Adds new ID to the URL */
        form_url = splitted_url[0]+'/'+id;

        $('#formUpdate').attr('action', form_url);
        $('#formUpdate #name').val(name);
        $('#formUpdate #email').val(email);
    });
});