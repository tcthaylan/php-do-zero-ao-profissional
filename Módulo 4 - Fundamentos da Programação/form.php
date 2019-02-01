<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Email: <br>
        <input type="text" name="email"><br><br>
        Senha: <br>
        <input type="password" name="senha"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    
    if (isset($_POST["senha"]) && !empty($_POST["senha"])) {
        
        $email = $_POST["email"];
        $senha = $_POST["senha"];
    
        echo "Meu email é: ".$email."<br>";
        echo "Minha senha é: ".$senha."<br>";
    }
}

?>