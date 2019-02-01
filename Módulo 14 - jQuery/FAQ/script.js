//FAQ: Como saber se um elemento existe?
if ($('.algo').length > 0) {
    alert('Existe');
} else {
    alert('Não existe');
}

//FAQ: Saber se elemento tem uma classe
if ($('span').hasClass('algo')) {
    alert('Tem');
} else {
    alert('Não tem');
}

//FAQ: Ativar/Desativar um elemento de form
$('form').find('input').eq(0).attr('disabled', 'disabled');
$('form').find('input').eq(0).removeAttr('disabled');
$('form').find('input').eq(0).css('display', 'none');
$('form').find('input').eq(0).attr('checked', 'checked');

//FAQ: Pegar item selecionado de SELECT
$('#idade').val();

//FAQ: Alterar 3o elemento de lista
$('.lista li').eq(2).html('item alterado');

//FAQ: Pegar elemento nativo
$('li')[0].innerHTML = "alguma coisa";
$(nativo).html('alguma coisa');