$(function() {
    $('.modal_ajax').bind('click', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        $('.modal-bg').show();

        $.ajax({
            url:link,
            type:'GET',
            success:function(html) {
                $('.modal').html(html+'<button class="fechar">Fechar</button>');
                $('.fechar').bind('click', function() {
                    $('.modal-bg').hide();
                });
            }
        });
    });
});