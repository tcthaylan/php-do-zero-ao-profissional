<?php
session_start();
require_once("config.php");

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email  = addslashes($_POST["email"]);
    $senha  = md5(addslashes($_POST["senha"]));

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->execute(array(
        $email,
        $senha
    ));
    if ($stmt->rowcount() > 0) {
        $info = $stmt->fetch();
        $_SESSION["id"] = $info["id"];
        header("Location: index.php");
        exit;
    } else {
        echo "Email e/ou senha inválido(s).";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Projeto esqueci a senha</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        Email: <br>
        <input type="text" name="email" required><br><br>
        Senha: <br>
        <input type="password" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
    <br>
    <a href="cadastrar.php">Criar um conta</a>
    <a href="esqueci.php">Esqueci minha senha</a>
</body>
</html>