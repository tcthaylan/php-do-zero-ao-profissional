<?php
session_start();
require 'vendor/autoload.php';
require 'config.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

spl_autoload_register(function ($class){
    if(file_exists('controllers/'.$class.'.php')) {
            require_once 'controllers/'.$class.'.php';
    } elseif(file_exists('models/'.$class.'.php')) {
            require_once 'models/'.$class.'.php';
    } elseif(file_exists('core/'.$class.'.php')) {
            require_once 'core/'.$class.'.php';
    }
});

$log = new Logger('teste');
$log->pushHandler(new StreamHandler('erros.log', Logger::WARNING));

$log->addError('Aviso! Deu algo errado!');

$core = new Core();
$core->run();
?>