<?php
// Recebe os dados do facebook e retorna para o index
use Facebook\Facebook;
require 'fb.php';

$helper = $fb->getRedirectLoginHelper();

try {
    $_SESSION['fb_access_token'] = (string) $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Erro:'.$e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Erro SDK:'.$e->getMessage();
    exit;
}

header('Location: index.php');