<?php

$filename = 'wallpaper.png';
$filename_mini = 'mini_imagem_nova.jpg';

list($largura_original, $altura_original) = getimagesize($filename);
list($largura_mini, $altura_mini) = getimagesize($filename_mini);

$imagem_final = imagecreatetruecolor($largura_original, $altura_original);

$imagem_original = imagecreatefrompng($filename);
$mini_imagem = imagecreatefromjpeg($filename_mini);

imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);

imagecopy($imagem_final, $mini_imagem, 0, 0, 0, 0, $largura_mini, $altura_mini);

imagepng($imagem_final, 'nova_imagem.png');
