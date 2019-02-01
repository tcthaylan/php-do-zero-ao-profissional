<?php
session_start();
require_once('config.php');
if (isset($_GET["codigo"]) && !empty($_GET["codigo"])) {
    $codigo = addslashes($_GET["codigo"]);
    $stmt = $conn->prepare("UPDATE usuarios SET status = '1' WHERE md5(id) = ?");
    $stmt->execute(array($codigo));
    echo "<h2>Cadastro Confirmado com sucesso!";
}
?>
<h1>Cadastro...</h1>