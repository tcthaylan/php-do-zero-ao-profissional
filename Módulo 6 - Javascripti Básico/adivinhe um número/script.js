function verificar() {
    var n1 = document.getElementById('n1').innerHTML;
    var n2 = document.getElementById('n2').value;

    if (n1 == n2) {
        alert("Você acertou o número!");
    } else {
        alert("Você errou!");
    }

    resetar();
}

function resetar() {
    document.getElementById('n2').value = "";

    document.getElementById('n1').innerHTML = Math.floor(Math.random() * 100);
}