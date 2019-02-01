// Removendo espaços com trim
$.trim($('h1').html);
// Ex
var valor = $('h1').html();
valor = $.trim(valor);

// Percorrenco array com each
$('.lista li').each(function () {
    alert($(this).html());
});

// Verificando o tipo da variável
var seila = 22;
typeof seila; // com js
$.type(seila) // com jquery

// Verificando se é um número ou array ou etc.
var seila2 = 25;
$.isNumeric(seila2);
$.isFunction(seila2);
$.isArray(seila2);