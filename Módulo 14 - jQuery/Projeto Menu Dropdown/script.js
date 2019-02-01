$(function() {
    $('li').hover(function() {
        $(this).find('.menu-dropdown').slideDown();
    },
    function() {
        $(this).find('.menu-dropdown').slideUp();
    });
});