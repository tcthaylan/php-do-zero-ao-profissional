$(function() {
    //keydown, keyup
    $('#chat').bind('keyup', function(e) {
        if (e.keyCode == 13) {
            var txt = $(this).val();
            console.log(txt);
            $(this).val('');
        }
    });
});