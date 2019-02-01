function validar() {
    
    var n = document.getElementById("n").value;

    if (n.length > 2) {
        alert("Você digitou um número que tem mais de dois algarismos!");
        return false;
    } else {
        return true;
    }
}