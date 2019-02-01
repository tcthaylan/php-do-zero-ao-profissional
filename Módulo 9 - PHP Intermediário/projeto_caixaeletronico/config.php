<?php
try {
    $conn = new PDO("mysql:dbname=projeto_caixa_eletronico;host=localhost", "root", "");

} catch (PDOException $e) {
    echo "Falhou: ".$e->getMessage();
    exit;
}
?>