<?php

session_start();
require_once("config.php");
require_once("funcoes.php");

$stmt = $conn->prepare("SELECT id FROM usuarios");
$stmt->execute();
$usuarios = array();

if ($stmt->rowCount() > 0) {
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $key => $usuario) {
        $usuarios[$key]['filhos'] = calcular_cadastros($usuario['id'], $limite);
    }
}

print_r($usuarios);

$stmt = $conn->prepare("SELECT * FROM patentes ORDER BY min DESC");
$stmt->execute();
$patentes = array();

if ($stmt->rowCount() > 0) {
    $patentes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($patentes);
}

foreach ($usuarios as $usuario) {
    
    foreach ($patentes as $patente) {

        if ($patente["min"] <= $usuario["filhos"]) {

            $stmt = $conn->prepare("UPDATE usuarios SET patente = ? WHERE id = ?");
            $stmt->execute(array(
                $patente["id"],
                $usuario["id"]
            ));

            break;
        }
    }
}

?>

