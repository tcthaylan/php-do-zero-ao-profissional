pontuacao = 1;

function addBola() {
    
    var bola = document.createElement("div");
    bola.setAttribute("class", "bola");

    var cor = Math.floor(Math.random() * 999999);

    if (cor < 100) {
        cor += 100;
    } 

    var x = Math.floor(Math.random() * 400);
    var y = Math.floor(Math.random() * 750);
    bola.setAttribute("style", "top:"+x+"px;left:"+y+"px;" + "background-color: #"+cor+";");

    bola.setAttribute("onclick", "estourarBola(this)");

    document.getElementById("balls-space").appendChild(bola);
}

function estourarBola(elemento) {

    document.getElementById("balls-space").removeChild(elemento);
    
    placar();
}

function iniciar() {
    intervalo = setInterval(addBola, 1000);
}

function placar() {

    document.getElementById("pontos").innerHTML = pontuacao++;
}

function pause() {
    clearInterval(intervalo);
}