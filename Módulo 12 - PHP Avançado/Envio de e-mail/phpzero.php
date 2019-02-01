<?php
if (isset($_POST["nome"]) && !empty($_POST["nome"])) {
    $nome   = addslashes($_POST["nome"]);
    $email  = addslashes($_POST["email"]);
    $msg    = addslashes($_POST["msg"]);

    $para       = "tc.thaylan@gmail.com";
    $assunto    = "Pergunta do Contato";
    $corpo      = "Nome: ".$nome." - E-mail: ".$email." - Mensagem: ".$msg;

    //Cabeçalho de email, informações que o servidor precisa.
    $cabecalho = "From: suporte@tc.com.br"."\r\n".
                 "Reply-to: ".$email."\r\n".
                 "X-Mailer: PHP/".phpversion();

    mail($para, $assunto, $corpo, $cabecalho);
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Envio de E-mail</title>
</head>
<body>
    <form method="POST">
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Email: <br>
        <input type="text" name="email"> <br><br>
        Mensagem: <br>
        <textarea name="msg" cols="30" rows="10"></textarea> <br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>