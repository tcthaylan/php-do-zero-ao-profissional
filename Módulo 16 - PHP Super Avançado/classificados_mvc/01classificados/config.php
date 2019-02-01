<?php
session_start();
try {
    global $conn;
    $conn = new PDO("mysql:dbname=classificados;host=localhost;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
    exit;
}