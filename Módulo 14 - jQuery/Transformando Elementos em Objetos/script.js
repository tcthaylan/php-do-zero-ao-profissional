// Jquery na variável
var textoDiv = $('#teste');
textoDiv.html('novo texto');


// JS na variável
$(document.getElementById("teste2")).html("Novo texto")
var teste2 = document.getElementById("teste2")
//Não Funciona
teste2.html('ddd')
// Funciona
$(teste2).html('ddd');

// Selecionando elemento especifico
$('li:eq(1)').html('item alterado')
$('li').eq('2').html('alterado')