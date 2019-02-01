<?php
try {
    $conn = new PDO("mysql:dbname=projeto_sistema_reservas;host=localhost;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}