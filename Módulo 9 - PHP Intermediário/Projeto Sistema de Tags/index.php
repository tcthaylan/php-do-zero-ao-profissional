<?php
require_once('config.php');

$stmt = $conn->prepare("SELECT caracteristicas FROM usuarios");
$stmt->execute();
if ($stmt->rowCount() > 0) {
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $carac = array();

    foreach ($lista as $usuario) {
        $palavras = explode(",", $usuario['caracteristicas']);
        foreach ($palavras as $palavra) {
            $palavra = trim($palavra);

            if (isset($carac[$palavra])) {
                $carac[$palavra]++;
            } else {
                $carac[$palavra] = 1;
            }
        }
    }

    $palavras = array_keys($carac);
    $contagens = array_values($carac);
    
    $maior = max($contagens);

    $tamanhos = array(11, 15, 20, 30);

    for ($i = 0; $i < count($palavras); $i++) { 
        $n = $contagens[$i] / $maior;
        $h = ceil($n * count($tamanhos));

        echo "<p style='font-size:".$tamanhos[$h-1]."px'>".$palavras[$i]." (".$contagens[$i].")</p>";
    }
}
?>

