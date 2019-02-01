<?php

try {

    $conn = new PDO("mysql:dbname=projeto_convite;host=localhost", "root", "");

} catch (PDOException $e) {

    echo "Conexão falhou: ".$e->getMessage();
    exit;
}

?>