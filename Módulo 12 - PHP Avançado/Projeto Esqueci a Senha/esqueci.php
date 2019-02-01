<?php
require_once("config.php");

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email  = addslashes($_POST["email"]);

    // Verificando se o email existe
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute(array($email));
    if ($stmt->rowCount() > 0) {
        // $info = informações do usuário
        // $hash = Codigo para recuperar senha
        // $empirado_em = tempo de validade do hash
        $info = $stmt->fetch();
        $hash = md5(rand(0, 9999).rand(0, 9999).time());
        $expirado_em = date("Y-m-d H:i", strtotime('+2 months'));
        
        // Inserindo um hash para o id do usuário.
        $stmt = $conn->prepare("INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (?, ?, ?)");
        $stmt->execute(array(
            $info["id"],
            $hash,
            $expirado_em
        ));

        // Enviando email para recuperar senha
        $link_repuperacao   = "http://localhost/PHP%20do%20zero%20ao%20profissional/M%C3%B3dulo%2012/Projeto%20Esqueci%20a%20Senha/recuperar-senha.php?hash=".$hash;
        $assunto            = "Redefinir senha";
        $corpo              = "Para recuperar a senha clique no link abaixo.<br>".$link_repuperacao;
        $cabecalho          = "From: suporte@tcthaylan.com.br"."\r\n".
                              "X-Mailer: PHP/".phpversion();
        // Função mail comentada para teste sem servidor de email.
        // mail($email, $assunto, $corpo, $cabecalho);

        echo $corpo;
        exit;
    } else {
        echo "Este email não está cadastrado!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esqueci a senha</title>
</head>
<body>
    <h1>Esqueci minha senha</h1>
    <form method="POST">
        Qual seu email? <br>
        <input type="text" name="email" placeholder="Email..."><br><br>
        <input type="submit" value="Recuperar senha">
    </form>
</body>
</html>