<?php

session_start();

require_once("config.php");

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE codigo = ?");

$codigo = $_GET["codigo"];

$stmt->execute(array($codigo));

if ($stmt->rowCount() > 0) {
    
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
    
        $email  = addslashes($_POST["email"]);
        $senha  = md5(addslashes($_POST["senha"]));
        $codigo = md5(time().rand(0,99));  
    
        $stmt = $conn->prepare("INSERT INTO usuarios VALUES (DEFAULT, ?, ?, ?)");
    
        $stmt->execute(array(
            $email,
            $senha,
            $codigo
        ));

        unset($_SESSION["id"]);

        header("Location: login.php");
    }

} else {

    header("Location: login.php");
    exit;
}

?>

<h1>Cadastrar</h1>
<form method="POST">
    Email: <br>
    <input type="text" name="email"> <br><br>
    Senha: <br>
    <input type="password" name="senha"> <br><br>
    <input type="submit" value="Cadastrar">
</form>