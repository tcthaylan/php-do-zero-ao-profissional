<?php
try {
    $conn = new PDO('mysql:dbname=projeto_cadastro_aprovacao;host=localhost', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();
}