<?php
require_once('config.php');
require_once('classes/filmes.class.php');
$f = new Filmes($conn);

if (!empty($_GET["id_filme"]) && !empty($_GET["nota"])) {
    $id_filme   = addslashes($_GET["id_filme"]);
    $nota       = addslashes($_GET["nota"]);

    if ($nota >= 1 && $nota <= 5) {
        $f->votar($id_filme, $nota);
        $f->calcularMedia($id_filme); 
    }
}

header("Location: index.php");
exit;