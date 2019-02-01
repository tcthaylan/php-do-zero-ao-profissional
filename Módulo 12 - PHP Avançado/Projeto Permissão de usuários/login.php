<?php
session_start();
require_once("config.php");
require_once("classes/usuarios.class.php");

if (!empty($_POST["email"])) {
    $email  = addslashes($_POST["email"]);
    $senha  = md5(addslashes($_POST["senha"]));

    $usuario = new Usuarios($conn);
    if ($usuario->login($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Email e/ou senha incorreto(s)!";
    }
}
?>
<h1>Login</h1>
<form method="POST">
    E-mail: <br>
    <input type="email" name="email" required><br><br>
    Senha: <br>
    <input type="password" name="senha" required><br><br>
    <input type="submit" value="Entrar">
</form>