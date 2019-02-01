<?php
session_start();
require_once("config.php");

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email  = addslashes($_POST["email"]);
    $senha  = md5(addslashes($_POST["senha"]));
    
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute(array($email));
    if ($stmt->rowCount() == 0) {
        $stmt = $conn->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
        $stmt->execute(array(
            $email,
            $senha
        ));
        $_SESSION["id"] = $conn->lastInsertId();
        header("Location: index.php");
    } else {
        echo "Email em uso, digite outro email!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar - Projeto esqueci a senha</title>
</head>
<body>
    <h1>Cadastrar</h1>
    <form method="POST">
        Email: <br>
        <input type="text" name="email" required><br><br>
        Senha: <br>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="login.php">Voltar</a>
</body>
</html>