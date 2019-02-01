<?php

print_r($_FILES['foto']);
if (!empty($_FILES['foto'])) {

    $arquivo = $_FILES['foto'];

    move_uploaded_file($arquivo['tmp_name'], 'fotos/'.$arquivo['name']);

    echo 'Foto enviada com sucesso, '.$_POST['nome'];
}
