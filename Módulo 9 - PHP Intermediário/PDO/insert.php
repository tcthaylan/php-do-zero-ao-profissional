<?php

$dsn    = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try {

    $conn = new PDO($dsn, $dbuser, $dbpass);

    $stmt = $conn->prepare("INSERT INTO posts VALUES (DEFAULT, ?, ?, ?, ?)");

    $titulo         = "Titulo inserido";
    $data_criado    = "2018-07-05";
    $corpo          = "Corpo inserido";
    $autor          = "Autor inserido";

    $stmt->execute(array(
        $titulo,
        $data_criado,
        $corpo,
        $autor
    ));
    
    //PDO::lastInsertId — Returns the ID of the last inserted row or sequence value
    echo "Ultimo id inserido: ".$conn->lastInsertId();

} catch (PDOException $e) {

    echo "Falho: ".$e->getMessage();
}

?>