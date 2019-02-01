<?php

session_start();
require_once("config.php");

if (isset($_POST["email"]) && !empty($_POST["email"])) {

    $stmt = $conn->prepare("SELECT 
                            usuarios.*, patentes.nome AS p_nome 
                            FROM usuarios 
                            LEFT JOIN patentes ON usuarios.patente = patentes.id WHERE email = ? AND senha = ?");

    $email = addslashes($_POST["email"]);
    $senha = md5(addslashes($_POST["senha"]));

    $stmt->execute(array(
        $email,         
        $senha
    ));

    if ($stmt->rowCount() > 0) {

        foreach ($stmt->fetch() as $key => $value) {

            $_SESSION[$key] = $value;
        }

        header("Location: index.php");
        exit;

    } else {

        echo "Email e/ou senha incorreto(s)";
    }
}


?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Login - Sistema de Marketing Multinível</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center">    
            <form method="POST">
                <div class="form-header">
                    <i class="fab fa-affiliatetheme fa-3x my-2"></i>
                    <h1 class="lead">Sistema de Marketing Multinível</h1>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Digite seu email...">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input class="form-control" type="password" name="senha" placeholder="Digite sua senha...">
                    </div>
                    <button class="btn btn-info active" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
