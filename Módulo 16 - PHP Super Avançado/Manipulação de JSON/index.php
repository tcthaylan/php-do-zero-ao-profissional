<?php
$json = file_get_contents('https://www.correiodoestado.com.br/climatempo/json/');

$json = json_decode($json);

foreach ($json->previsao as $item) {
    echo 'Cidade: '.$item->cidade.'<br>';
}

$json = json_encode($json);