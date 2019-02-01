<?php 
try {
    $dsn    = "mysql:dbname=projeto_esqueci_senha;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    global $conn;
    
    $conn = new PDO($dsn, $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}