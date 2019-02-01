<?php

session_start();

if (empty($_SESSION["id"])) {
    
    header("Location: login.php");
    exit;
}

?>
<h1>Área Interna do Sistema</h1>
<p>Usuário: <?php echo $_SESSION["email"]?> - <a href="login.php">Sair</a></p>
<p>Link para convite: <a href="#">http://localhost/PHP%20do%20zero%20ao%20profissional/M%C3%B3dulo%209/Projeto%20Registro%20por%20Convite/registrar.php?codigo=<?php echo $_SESSION["codigo"]; ?></a></p>