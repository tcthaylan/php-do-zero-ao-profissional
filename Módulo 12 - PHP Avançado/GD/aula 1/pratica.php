<?php

$filename = 'wallpaper.jpg';

$new_width = 300;
$new_height = 300;

list($old_width, $old_height) = getimagesize($filename);

$new_image = imagecreatetruecolor($new_width, $new_height);
$old_image = imagecreatefromjpeg($filename);
imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);

header("Content-Type: image/jpeg");

imagejpeg($new_image, 'bomdua.jpg');
