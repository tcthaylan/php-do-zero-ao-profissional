$(function() {
    $('#form').bind('submit', function(e) {
        e.preventDefault();
        // Pega todos os dados preenchidos e não preenchidos do form e formata os dados para facilitar o envio via ajax
        var txt = $(this).serialize();
        console.log(txt);

        $.ajax({
            type:'GET',
            url:'ajax.php',
            data:txt,
            success:function(resultado) {
                alert('Resultado: '+resultado);
            },
            error:function() {
                alert('Falha na requisição');
            }
        });
    });
});