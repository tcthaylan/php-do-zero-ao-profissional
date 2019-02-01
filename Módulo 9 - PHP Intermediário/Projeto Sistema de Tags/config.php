<?php
try {
    $conn = new PDO("mysql:dbname=projeto_tags;host=localhost", "root", "");

} catch (PDOException $e) {
    echo "Falhou: ".$e->getMessage();
    exit;
}
?>