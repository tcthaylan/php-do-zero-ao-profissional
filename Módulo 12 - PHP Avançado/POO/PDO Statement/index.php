<?php
require_once 'Usuario.php';

/* Inserindo novo usuário
$usuario = new Usuario();
$usuario->setEmail('tcthaylan893@gmail.com');
$usuario->setSenha('123');
$usuario->setNome('teste_thaylan');
$usuario->salvar();
*/

/* Alterando email do usuário
$usuario = new Usuario('1');
$usuario->setEmail('email-novo@gmail.com');
$usuario->salvar();
*/

$u = new Usuario('1');
echo $u->getNome();
$u->deletar();