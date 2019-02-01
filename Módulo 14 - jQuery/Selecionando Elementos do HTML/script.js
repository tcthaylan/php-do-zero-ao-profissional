// Seleção por tag
$("div");
$("button");
$("li");

// Seleção por id
$("#botao1");

// Seleção por classe
$(".botao");
$(".lista1");

// Entrando na tag (espaço)
$(".lista1 .botao");

// As seleções retornam um array
if ($('.botao').length > 0) {
    alert('Retornou algo!');
}