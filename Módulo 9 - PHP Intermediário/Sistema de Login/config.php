<?php

$dsn = "mysql:dbname=blog;host=localhost";
$dbuser = "root";
$dbpass = "";

try {

    $conn = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {

    echo "Falhou Conexão".$e->getMessage();
}



?>