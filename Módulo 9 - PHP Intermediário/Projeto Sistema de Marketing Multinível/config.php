<?php

try {

    $dsn    = "mysql:dbname=projeto_mmn;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    global $conn;

    $conn = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {

    echo "Conexão falhou: ".$e->getMessage();
}

$limite = 3;

?>