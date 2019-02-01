<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

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

        if ($stmt->rowCount() > 0) {
            
            $_SESSION["id"] = session_id();
            
            header("Location: index.php");
        } else {

            echo "Email e/ou senha incorreto(s)";
        }
    }

    ?>

    <form method="POST">
        E-mail: <br>
        <input type="text" name="email">
        <br><br>
        Senha: <br>
        <input type="password" name="senha">
        <br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>