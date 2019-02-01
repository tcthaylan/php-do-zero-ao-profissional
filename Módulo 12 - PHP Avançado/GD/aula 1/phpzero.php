<?php
// O arquivo
$filename = 'wallpaper.jpg';

// Largura e altura máximos (máximo, pois como é proporcional, o resultado varia)
$new_width = 200;
$new_height = 200;

// Obtendo o tamanho original
list($old_width, $old_height) = getimagesize($filename);

// Calculando proporção
$ratio = $old_width / $old_height;

if ($new_width/ $new_height > $ratio) {
    $new_width = $new_height * $ratio;
} else {
    $new_height = $new_width / $ratio;
}

// Gerando uma nova imagem
$new_image = imagecreatetruecolor($new_width, $new_height);
$old_image = imagecreatefromjpeg($filename);
imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);

// Gerando a imagem
header("Content-type: image/jpeg");
imagejpeg($new_image);