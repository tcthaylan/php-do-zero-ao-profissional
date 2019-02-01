//Aplica o negrito
$('.botao').html("Este é um <strong>texto</strong>");
//Texto bruto
$('.botao').text("Este é um <strong>texto</strong>");

// Adiciona atributo na tag
$('#teste').find('img').attr('width', '200');
//Adiciona Css na tag
$('#teste').find('img').width('200');

// Adicionando um value no input
$('input').val('teste');

//before e after
$('input').before('<div>Nome:</div>');
$('input').after('<div>Email:</div>');

//Acrescentando depois
$('.lista1').append('<li>Novo item</li>');
//Acrescentado antes
$('.lista1').prepend('<li>Novo item</li>');

// Remove
$('.lista1').remove();