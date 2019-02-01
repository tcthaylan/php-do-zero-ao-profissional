$(function() {
    $('#form').bind('submit', function(e) {
        e.preventDefault();

        var peso = $('#peso').val();
        var altura = $('#altura').val();
        var imc = peso / Math.pow(altura, 2);

        peso = peso.replace(',', '.');
        altura = altura.replace(',', '.');
        imc = imc.toFixed(2);
        
        var estadoImc = '';
        if (imc < 16) {
            estadoImc = 'baixo peso muito grave.';
        } else if (imc >= 16 && imc <= 16.99) {
            estadoImc = 'baixo peso grave';
        } else if (imc >= 17 && imc <= 18.49) {
            estadoImc = 'baixo peso.';
        } else {
            estadoImc = 'peso normal';
        }

        $('#resultado').html("Seu IMC é " + imc + " e seu status é: "+estadoImc);
    });
});