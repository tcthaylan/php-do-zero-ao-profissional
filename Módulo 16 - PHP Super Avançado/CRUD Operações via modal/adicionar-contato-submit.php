<?php
require('config.php');
require('classes/contato.class.php');
$c = new Contato($conn);

if (!empty($_GET['nome'] && !empty($_GET['email']))) {
    $nome   = addslashes($_GET['nome']);
    $email  = addslashes($_GET['email']);

    $c->addContato($nome, $email);
    header('Location: index.php');
    exit;
} 
?>