<?php
require_once('config.php');
require_once('classes/anuncios.class.php');
$a = new Anuncios($conn);

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET["id_anuncio"]) && !empty($_GET["id_anuncio"])) {
    $id_anuncio = addslashes($_GET["id_anuncio"]);
    $a->excluirAnuncio($id_anuncio);
}

header("Location: meus-anuncios.php");
exit;