<?php
require_once('config.php');
require_once('classes/anuncios.class.php');
$a = new Anuncios($conn);

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET["id_anuncio_imagem"]) && !empty($_GET["id_anuncio_imagem"])) {
    $id_anuncio_imagem = addslashes($_GET["id_anuncio_imagem"]);
    $id_anuncio = $a->excluirImagem($id_anuncio_imagem);
}

if (isset($id_anuncio)) {
    header("Location: editar-anuncio.php?id_anuncio=".$id_anuncio);
    exit;
} else {
    header("Location: meus-anuncios.php");
    exit;
}
