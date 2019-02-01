<?php
$p = $_POST;
$p['qtd_caracteres'] = strlen($p['nome']);
echo json_encode($p);