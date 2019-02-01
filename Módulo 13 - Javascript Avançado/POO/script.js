function Animal() {

    // Propriedades privadas
    var altura = 1.23
    var peso = 30;
    // Propriedades públicas
    this.nome = "Tobby";
    this.tipo = "Cachorro";
    this.idade = 12;

    // Métodos
    this.comer = function(kg) {
        for (var i = 0; i < kg; i++) {
            this.mastigar();
        }
        console.log("hmmm...");
        peso += (kg / 2);
    }

    this.fazerAniversario = function() {
        this.idade++;
    }

    this.getPeso = function() {
        return peso;
    }

    this.mastigar = function() {
        console.log("Nhoc...");
    }
}

var tobby = new Animal();
