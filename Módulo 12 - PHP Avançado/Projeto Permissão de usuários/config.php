<?php
try {
    global $conn;
    $conn = new PDO("mysql:dbname=projeto_permissao_usuarios;host=localhost", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}