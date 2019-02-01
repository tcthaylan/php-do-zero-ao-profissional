<?php

$file = $_FILES["arquivo"];

print_r($file);

if (isset($file["tmp_name"]) && !empty($file["tmp_name"])) {

    $filename = md5(time().rand(0, 99).$file["name"]).".jpg";

    move_uploaded_file($file["tmp_name"], "arquivos/".$filename);
    
    echo "Arquivo enviado";
}
?>