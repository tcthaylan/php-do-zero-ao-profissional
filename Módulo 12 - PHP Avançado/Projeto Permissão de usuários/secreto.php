<?php
session_start();
require_once("config.php");
require_once("classes/usuarios.class.php");

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

$usuario = new Usuarios($conn);
$usuario->setUser($_SESSION["id"]);

if ($usuario->temPermissao("SECRET") == false) {
    header("Location: index.php");
    exit;
}

?>
<h1>Arquivo Secreto</h1>