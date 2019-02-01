<?php
session_start();
require_once("config.php");

if (isset($_POST["agencia"]) && !empty($_POST["agencia"])) {
    $agencia    = addslashes($_POST["agencia"]);
    $conta      = addslashes($_POST["conta"]);
    $senha      = md5(addslashes($_POST["senha"]));

    $stmt = $conn->prepare("SELECT * FROM contas WHERE agencia = ? AND conta = ? AND senha = ?"); 
    $stmt->execute(array(
        $agencia,
        $conta,
        $senha
    ));

    if ($stmt->rowCount() > 0) {
        $info = $stmt->fetch();
        $_SESSION["id"] = $info["id"];
        header("Location: index.php");
        exit;

    } else {
        echo "Agencia e/ou senha inválido(s)";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Caixa Eletrônico</title>
</head>
<body>
    <h1>Caixa Eletrônico</h1>
    <form method="POST">
        Agência: <br>
        <input type="text" name="agencia" required> <br><br>

        Conta: <br>
        <input type="text" name="conta" required> <br><br>

        Senha: <br>
        <input type="password" name="senha" required> <br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>