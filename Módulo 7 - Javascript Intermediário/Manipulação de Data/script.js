//Tempo atual, momento da criação do objeto.
var dt = new Date();
dt.getHours();
dt.getMinutes();
dt.getSeconds();

//Parametro TimeStamp
var dt = new Data(0);
//data completa
dt;

//Parametro String, formato americado
var dt = new Data(Date.parse("March 10, 2001"));
dt;
//Dia
dt.getDate();
//Semana - 0 a 6
dt.getDay();
//Mês - 0 a 11
dt.getMonth();
//Ano
dt.getFullYear();

//Exemplo
console.log(dt.getDate() + "/" + (dt.getMonth() + 1) + "/" + dt.getFullYear());

//Dias da semana
var dt = new Data(Date.parse("March 10, 2001"));

var diasSemana = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"];

diasSemana[dt.getDay()];

//Alterando data
dt.setDate( dt.getDate() + 60);