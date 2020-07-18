import('jquery');
/**
 * function to change texte on load button
 */
$(document).ready(function () {
    $('#more').on('click', function () {
        var txt = $('#collapseExample').is(':visible') ? 'En savoir plus' : 'Masquer';
        $('#more').text(txt);
        $(this).next('#collapseExample').slideToggle(200);
    });
});