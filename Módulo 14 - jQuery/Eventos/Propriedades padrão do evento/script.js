$(function() {
    $('#enviar').bind('click', function(e) {
        //Interronpe a ação padrão do evento
        e.preventDefault();
        //Retorna o alvo
        console.log(e.target);
        //Retorna o tipo do evento
        alert(e.type);
    });
})