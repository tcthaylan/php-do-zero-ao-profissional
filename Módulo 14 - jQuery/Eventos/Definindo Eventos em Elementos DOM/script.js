/*
$(function() {
    $('button').click(function() {
        if ($(this).hasClass('fundoVermelho') == true) {
            $(this).removeClass('fundoVermelho');
        } else {
            $(this).addClass('fundoVermelho');
        }
    });
});
*/

/* alternancia com .toggleClass
$(function() {
    $('button').click(function() {
        $(this).toggleClass('fundoVermelho');
    });
});
*/

/* mouseout e mouseover
$(function() {
    $('button').mouseover(function() {
        $(this).addClass('fundoVermelho');
    });
    $('button').mouseout(function() {
        $(this).removeClass('fundoVermelho');
    });
});
*/

/*Outra opção
$(function() {
    $('button').hover(function() {
        $(this).addClass('fundoVermelho');
    }, function() {
        $(this).removeClass('fundoVermelho');
    });
});
*/

/* Removendo eventos e outras maneiras de adicionar eventos
$('button').bind('click', function() {
    alert('clicou');
});
$('button').unbind('click'); // removido

$('button').on('click', function() {
    alert('clicou');
});
$('button').off('click'); // removido
*/