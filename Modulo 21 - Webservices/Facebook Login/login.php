<?php
require 'fb.php';

// Definindo um "ajudador" para gerar uma url de login 
$helper = $fb->getRedirectLoginHelper();

/* Não precisa de permissão
id
first_name
last_name
middle_name
name
name_format
picture
short_name
*/

// Definindo Permissões
$permissions = array('email');

// Gera uma url
$loginurl = $helper->getLoginUrl('http://localhost/PHP%20do%20zero%20ao%20profissional/Modulo%2021%20-%20Webservices/Facebook%20Login/callback.php', $permissions);

?>

<a href="<?php $loginurl ?>">Fazer login com Facebook</a>