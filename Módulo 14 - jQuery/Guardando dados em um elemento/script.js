// Guardando Dados
$('input').attr('data-idade', '21'); // salva no html
$('input').data('idade', '21'); // salva no jquery
$('input').data('idade'); // retorna 21
$('input').data('caracteres', $('input').val().length)