<?php

//DSN = Data Source Name
$dsn = "mysql:dbname=blog;host=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try {
    $conn = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM posts";
    $sql = $conn->query($sql);
    //PDOStatement::rowCount — Returns the number of rows affected by the last SQL statement
    if ($sql->rowCount() > 0) {
        
        foreach ($sql->fetchAll() as $usuario) {
            
            echo "Nome: ".$usuario["autor"]."<br>";
        }
    } else {

        echo "não existe usuarios";
    }

} catch(PDOException $e) {

    echo "Falhou: ".$e->getMessage();
}


?>