<?php

$texto = "O rato roeu a roupa do rei de roma";

//explode — Divide uma string em strings
$textoArray = explode(" ", $texto);
print_r($textoArray);

//implode - Junta elementos de uma matriz em uma string
$textoString = implode(" ", $textoArray);
echo "<br>".$textoString."<br>"; 

//number_format — Formata um número com os milhares agrupados
$n = number_format(334329.894845, 2, ",", ".");
echo "<br>".$n."<br>";

//str_replace - Substitui todas as ocorrências da string de procura com a string de substituição
$string = str_replace("roeu", "comeu", $texto);
echo "<br>".$string."<br>";

//strtolower - Converte uma string para minúsculas
//strtoupper — Converte uma string para maiúsculas

//substr — Retorna uma parte de uma string
$parteString = substr($texto, 0, 11);
echo "<br>".$parteString."<br>";

//ucfirst — Converte para maiúscula o primeiro caractere de uma string
//ucwords — Converte para maiúsculas o primeiro caractere de cada palavra
?>