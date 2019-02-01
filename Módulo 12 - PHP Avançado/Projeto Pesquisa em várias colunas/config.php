<?php

try {
    $conn = new PDO("mysql:dbname=projeto_pesquisa_varias_colunas;host=localhost", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}