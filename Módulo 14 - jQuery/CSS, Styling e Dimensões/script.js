// Adiciona uma classe
$('h1').addClass('fundoVermelho');
// Remove uma classe
$('h1').removeClass('fundoVermelho');
// Verifica se a classe existe, retorna true ou false
if ($('h1').hasClass('fundoVermelho')) {
    alert('Tem sim');
} else {
    alert('Não tem');
}
// Adicionando css no elemento
$('h1').css("color", "#0000FF");
$('h1').css("font-size", "15px");
$('h1').css("color", "#0000FF").css('font-size', '12px');
$('h1').css({"color" : "#FF0000", "font-size" : "15px"})
