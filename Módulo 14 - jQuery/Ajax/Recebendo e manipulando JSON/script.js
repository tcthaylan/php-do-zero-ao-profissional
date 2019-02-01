$(function() {
    $('#form').bind('submit', function(e) {
        e.preventDefault();
        // Pega todos os dados preenchidos e não preenchidos do form e formata os dados para facilitar o envio via ajax
        var txt = $(this).serialize();
        console.log(txt);

        $.ajax({
            type:'POST',
            url:'ajax.php',
            data:txt,
            dataType:'json',
            success:function(j) {
                alert("Meu nome é " + j.nome + " e ele tem " + j.qtd_caracteres + " caracteres.");
            }
        });
    });
});