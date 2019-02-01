<?php

session_start();

require_once("config.php");

if (!empty($_POST["email"]) && !empty($_POST["senha"])) {

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");

    $id_pai = $_SESSION["id"];
    $nome   = addslashes($_POST["nome"]);
    $email  = addslashes($_POST["email"]);
    $senha  = md5(addslashes($_POST["senha"]));

    $stmt->execute(array($email));

    if ($stmt->rowCount() == 0) {

        $stmt = $conn->prepare("INSERT INTO usuarios (id_pai, nome, email, senha) VALUES (?, ?, ?, ?)");

        $stmt->execute(array(
            $id_pai,
            $nome,
            $email,
            $senha
        ));

        header("Location: index.php");
        exit;

    } else {

        echo "Já existe esse email cadastrado!";
    }
}

?>
<h1>Cadastrar Novo Usuário</h1>
<form method="POST">
    Nome: <br>
    <input type="text" name="nome" required> <br><br>
    Email: <br>
    <input type="email" name="email" required> <br><br>
    Senha: <br>
    <input type="password" name="senha" required> <br><br>
    <input type="submit" value="Cadastrar">
</form>