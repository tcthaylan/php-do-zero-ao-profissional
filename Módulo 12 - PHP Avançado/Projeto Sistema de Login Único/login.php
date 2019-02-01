<?php
session_start();
require_once("config.php");
require_once("classes/usuarios.class.php");
$_SESSION["id"] = '';
$u = new Usuarios($conn);

if (!empty($_POST["email"])) {
    $email  = addslashes($_POST["email"]);
    $senha  = md5(addslashes($_POST["senha"]));

    if ($u->login($email, $senha)) {
        $u->setIp($_SESSION["id"]);
        header("Location: index.php");
        exit;
    } else {
        echo "Email e/ou senha está incorreto!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Login Único</title>
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
</body>
</html>