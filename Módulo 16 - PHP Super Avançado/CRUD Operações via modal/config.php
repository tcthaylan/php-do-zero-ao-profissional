<?php
try {
    global $conn;
    $conn = new PDO('mysql:dbname=operacoes_modal;host=localhost;charset=utf8', 'root', '');
    $conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}