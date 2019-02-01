<?php
/*
1. Calcular a quantidade total de páginas
2. definir o $p
3. fazer a query com LIMIT
*/  
try {
    $conn = new PDO("mysql:dbname=blog;host=localhost", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: ".$e->getMessage();
}

// Total de páginas
$sql = "SELECT COUNT(*) AS c FROM posts";
$sql = $conn->query($sql);
$sql = $sql->fetch();
$total_registros = $sql["c"];
$qtd_por_pagina = 5;
$paginas = $total_registros / $qtd_por_pagina ;

// Exibindo as páginal
$p = '1';
if (isset($_GET["p"]) && !empty($_GET["p"])) {
    $p = addslashes($_GET["p"]);
}
$p = ($p - 1) * $qtd_por_pagina; 
$sql = "SELECT * FROM posts LIMIT $p, $qtd_por_pagina ";
$sql = $conn->query($sql);
if ($sql->rowCount() > 0) {
    foreach ($sql->fetchAll() as $item) {
        echo $item["id"]." - ".$item["titulo"]."<br>";
    }
}

echo "<hr>";

// Exibindo os links das páginas
for ($i = 1; $i <= $paginas; $i++) { 
    echo "<a href='http://localhost/PHP%20do%20zero%20ao%20profissional/M%C3%B3dulo%2012/Pagina%C3%A7%C3%A3o/paginacao.php/?p=".$i."'>[".$i."]</a>";
}

?>
