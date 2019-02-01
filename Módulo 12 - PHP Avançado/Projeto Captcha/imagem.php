<?php
session_start();
header("Content-Type: image/jpeg");

$n = $_SESSION["captcha"];

$imagem = imagecreate(100, 50);
imagecolorallocate($imagem, 200, 200, 200);
$fontcolor = imagecolorallocate($imagem, 20, 20, 20);
imagettftext($imagem, 40, 0, 21, 35, $fontcolor, 'Ginga.otf', $n);

imagejpeg($imagem, null, 100);
