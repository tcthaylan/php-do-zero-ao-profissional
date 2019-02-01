$(function() {
    $('button').bind('click', function() {
        /*load
        $('.div').load('texto.html');
        */

        /*get
        $.get('texto.html', function(e) {
            $('.div').html(e);
        });
        */
       
        //post
        $.post('texto.html', function(e) {
            $('.div').html(e);
        });
    });
});