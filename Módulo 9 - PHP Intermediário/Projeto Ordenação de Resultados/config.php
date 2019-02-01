<?php

try {

    $dsn    = "mysql:dbname=projeto_ordenar;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    $conn = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {

    echo "Conexão Falhou: ".$e->getMessage();
    exit;
}

?>