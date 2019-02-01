<?php
require 'environment.php';

$config = array();
if (ENVIRONMENT == 'development') {
    define('BASE_URL', '/PHP%20do%20zero%20ao%20profissional/Módulo%2016/classificados_mvc');
    $config['dbname']   = 'classificados';
    $config['host']     = 'localhost';
    $config['dbuser']   = 'root';
    $config['dbpass']   = '';
} else {
    define('BASE_URL', 'https://www.meusite.com.br');
    $config['dbname']   = 'classificados';
    $config['host']     = 'localhost';
    $config['dbuser']   = 'root';
    $config['dbpass']   = '';
}

global $conn;

try {
    $conn = new PDO('mysql:dbname='.$config['dbname'].';host='.$config['host'].';charset=utf8', $config['dbuser'], $config['dbpass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();
    exit;
}