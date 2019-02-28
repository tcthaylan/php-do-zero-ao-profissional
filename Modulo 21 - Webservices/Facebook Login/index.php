<?php
require 'fb.php';

if (!empty($_SESSION['fb_access_token'])) {
    echo 'Está logado!';
} else {
    header('Location: login.php');
    exit;
}