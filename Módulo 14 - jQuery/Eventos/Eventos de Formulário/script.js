$(function() {
    //select
    $('#nome').bind('select', function() {
        console.log('select');
    });

    //submit
    $('form').bind('submit', function(e) {
        e.preventDefault();
        console.log('submit');        
    });

    //focus
    $('#nome, #email').bind('focus', function() {
        $(this).addClass('foco');
    });

    //blur
    $('#nome, #email').bind('blur', function() {
        $(this).removeClass('foco');
    });

    //change
    $('#idade').bind('change', function() {
        console.log(this.value);
    });
});