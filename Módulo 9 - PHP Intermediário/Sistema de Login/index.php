<?php

session_start();

if (isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
    
    echo "Página index";
    echo "<br>";
    echo $_SESSION["id"];

} else {
    
    header("Location: login.php");
}

?>

