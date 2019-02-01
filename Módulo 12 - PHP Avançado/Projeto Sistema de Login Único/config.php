<?php
try {
    $conn = new PDO("mysql:dbname=projeto_login_unico;host=localhost", "root", "");
    $conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}