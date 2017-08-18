$(document).ready(function() {
    $('.aux-btn-edit').on('click', function(evt) {
        id = $(this).data('id');
        plate = $(this).data('plate');
        container = $(this).data('container');
        responsible = $(this).data('responsible');
        comments = $(this).data('comments');
        entry = $(this).data('entry');
        departure = $(this).data('departure');
        base_url = $('#formUpdate').attr('action');

        /* Delete ID from URL */
        splitted_url = base_url.split(/\/[0-9]+/);

        /* Adds new ID to the URL */
        form_url = splitted_url[0]+'/'+id;

        $('#formUpdate').attr('action', form_url);
        $('#formUpdate #plate').val(plate);
        $('#formUpdate #container').val(container);
        $('#formUpdate #responsible').val(responsible);
        $('#formUpdate #comments').val(comments);
        $('#formUpdate #entry').val(entry);
        $('#formUpdate #departure').val(departure);

    });
});