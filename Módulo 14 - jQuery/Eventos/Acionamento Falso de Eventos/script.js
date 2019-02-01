// Acionando eventos com trigger
$('#botao1').bind('click', function(){
    $('#botao2').trigger('click');
});

$('#botao2').bind('click', function(){
    alert('clicou no botao 2');
});

// Checar todos

var checarTodos = $('#checarTodos');
checarTodos.bind('click', function() {
    if ($('input:checkbox').is(':checked')) {
        $('input:checkbox').prop('checked', true);
    } else {
        $('input:checkbox').prop('checked', false);
    }
});