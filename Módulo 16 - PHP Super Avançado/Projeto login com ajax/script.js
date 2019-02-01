$(function () {
    $('#form').on('submit', function(e) {
        e.preventDefault();

        var email = $('input[name=email]').val();
        var password = $('input[name=password]').val();

        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {email:email, password:password},
            success: function(msg) {
                alert(msg);
            }
        });
    });
});