<?php

$familiaConceicao = array(
    array("nome" => "Thaylan Conceição", "idade" => 20),
    array("nome" => "Suely Conceição da Silva", "idade" => 40),
    array("nome" => "Antonio Raul da Conceição", "idade" => 44)
);

foreach ($familiaConceicao as $integrantes) {

    foreach ($integrantes as $key => $integrante) {

        echo $key . ": " . $integrante . "<br>";
    }
    echo "<br>";
}

?>