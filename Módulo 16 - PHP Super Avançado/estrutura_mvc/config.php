<?php
require 'environment.php';

$config = array();
if (ENVIRONMENT == 'development') {
    define('BASE_URL', 'local.estrutura_mvc');
    $config['dbname']   = 'estrutura_mvc';
    $config['host']     = 'localhost';
    $config['dbuser']   = 'root';
    $config['dbpass']   = '';
} else {
    define('BASE_URL', 'https://www.meusite.com.br');
    $config['dbname']   = 'estrutura_mvc';
    $config['host']     = 'localhost';
    $config['dbuser']   = 'root';
    $config['dbpass']   = '';
}

global $conn;

try {
    $conn = new PDO('mysql:dbname='.$config['dbname'].';host='.$config['host'], $config['dbuser'], $config['dbpass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();
    exit;
}