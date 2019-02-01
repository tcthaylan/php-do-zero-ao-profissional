<?php
//Gerar uma sessão
session_start();
$_SESSION["teste2"] = "Thaylan Conceição";
echo "Sessão iniciada, ". $_SESSION["teste2"];

//Gerar um Cookie
setcookie("teste2", "Suely Conceição da Silva", time() + 3600);
echo "<br>Cookie iniciado, ". $_COOKIE["teste2"];

?>