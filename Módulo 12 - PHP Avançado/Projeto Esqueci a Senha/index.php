<?php
session_start();
require_once('config.php');

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
?>
<h1>Index</h1>
<a href="sair.php">Sair</a>