<?php

require_once("config.php");

function listar($id, $limite) {
    $lista = array();
    global $conn;
    
    $stmt = $conn->prepare("SELECT 
                            usuarios.id, usuarios.id_pai, usuarios.nome, patentes.nome AS p_nome
                            FROM usuarios 
                            LEFT JOIN patentes ON usuarios.patente = patentes.id WHERE id_pai = ?");
    $stmt->execute(array($id));

    if ($stmt->rowCount() > 0) {

        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($lista as $key => $usuario) {
            $lista[$key]['filhos'] = array();

            if ($limite > 0) {
                $lista[$key]['filhos'] = listar($usuario["id"], --$limite);
            }
        }
    }
    return $lista;
}

function exibir($lista) {

    echo "<ul>";
    foreach ($lista as $usuario) {
        echo "<li>".$usuario["nome"]." - ".$usuario["p_nome"]."</li>";

        if (count($usuario["filhos"]) > 0) {
            exibir($usuario["filhos"]);
        }
    }
    echo "</ul>";
}

function calcular_cadastros($id, $limite) {
    $lista = array();
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id_pai = ?");
    $stmt->execute(array($id));
    $filhos = 0;
    
    if ($stmt->rowCount() > 0) {
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $filhos = $stmt->rowCount();

        foreach ($lista as $key => $usuario) {
            if ($limite > 0) {
                $filhos += calcular_cadastros($usuario["id"], --$limite);
            }
        }
    }
    return $filhos;
}

?>