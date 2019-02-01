<?php

require_once("config.php");

if (isset($_GET["id"]) && empty($_GET["id"]) == false) {
   
    $id = $_GET["id"];

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");

    $stmt->execute(array(
        $id
    ));

    header("Location: index.php");
} else {

    header("Location: index.php");
}
?>