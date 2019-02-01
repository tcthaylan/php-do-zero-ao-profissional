<?php

$dataAtual = date("d/m/Y \a\s H:i:s");
echo $dataAtual;
//date - Formata a data e a hora local (servidor).
//string date ( string $format [, int $timestamp ] ) - parâmetros com [] são opcionais



//time — Retorna o timestamp Unix atual
//int time ( void )

//mktime - Obtém um timestamp Unix de uma data
$dataNascimento = mktime(0, 0, 0, 7, 15, 1997);

echo "<br>".date("d/m/Y", $dataNascimento)."<br>";

//strtotime - Interpreta qualquer descrição de data/hora em texto em inglês em timestamp Unix
//int strtotime ( string $time [, int $now ] )

?>