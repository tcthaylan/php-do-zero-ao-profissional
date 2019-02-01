<?php
session_start();
require_once('config.php');

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome   = addslashes($_POST['nome']);
    $email  = addslashes($_POST['email']);

    // Verificando se o email já existe
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute(array($email));
    if ($stmt->rowCount() == 0) {
        
        // Inserindo usuário
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
        $stmt->execute(array(
            $nome,
            $email
        ));

        // Pegando id do úsuario
        $_SESSION["id"] = $conn->lastInsertId();

        // Link para aprovacao
        $link_aprovacao = "http://localhost/PHP%20do%20zero%20ao%20profissional/M%C3%B3dulo%2012/Projeto%20Cadastro%20com%20Aprova%C3%A7%C3%A3o/cadastro.php?codigo=".md5($_SESSION["id"]);

        // Enviando email para aprovação do cadastro
        $assunto    = "Confirme o seu cadastro";
        $corpo      = "Clique no link abaixo para confirmar seu cadastro: \r\n".$link_aprovacao;
        $cabecalho  = "From: suporte@tcthaylan.com.br"."\r\n".
                      "X-Mailer: PHP/".phpversion();
        mail($email, $assunto, $corpo, $cabecalho);
        echo "<h2>Ok! cofirme seu cadastro agora!</h2>";
        exit;
    } else {
        echo "Email em uso.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Com Aprovação</title>
</head>
<body>
    <form method="POST">
        Nome: <br>
        <input type="text" name="nome" required><br><br>
        Email: <br>
        <input type="text" name="email" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>