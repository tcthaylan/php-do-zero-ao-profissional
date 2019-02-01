function calculadora() {

    var n1 = parseFloat(document.getElementById('n1').value);
    var n2 = parseFloat(document.getElementById('n2').value);

    var operacao = parseInt(document.getElementById('operacao').value);

    var resultado = 0;

    switch(operacao) {

        case 1:
            resultado = n1 + n2;
            break;
        
        case 2:
            resultado = n1 - n2;
            break;
        
        case 3:
            resultado = n1 * n2;
            break;

        case 4:
            if (n2 == 0) {
                alert("Erro: digite um número diferente de zero!");
                break;
            }
            resultado = n1 / n2;
            break;

        default:
            break;
    }
    
    document.getElementById('resultado').innerHTML = resultado;
}