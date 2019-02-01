<?php
try {
    global $conn;
    $conn = new PDO("mysql:dbname=projeto_multilinguagem;host=localhost", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}