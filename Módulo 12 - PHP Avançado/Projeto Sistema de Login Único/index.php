<?php
session_start();
require_once("config.php");
require_once("classes/usuarios.class.php");
$u = new Usuarios($conn);

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
} else {
    $id = $_SESSION["id"];
    $ip = $_SERVER["REMOTE_ADDR"];    
    if ($u->verificarIp($id, $ip)) {
        header("Location: login.php");
        exit;
    }
}
?>
<h1>Index</h1>