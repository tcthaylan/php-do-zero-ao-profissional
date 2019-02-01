<?php

session_start();

require_once("config.php");
require_once("funcoes.php");

if (empty($_SESSION["id"])) {

    header("Location: login.php");
    exit;
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
        <div class="col">
          <h1>Sistema de Marketing Multinível</h1>
          <p>Usuário Logado: <?php echo $_SESSION["nome"]; ?></p>
          <p>Id: <?php echo $_SESSION["id"]; ?></p>
          <p>Email: <?php echo $_SESSION["email"]; ?></p>
          <p>Patente: <?php echo $_SESSION["p_nome"]; ?></p>
          <a href="cadastro.php" class="btn btn-primary">Cadastrar Novo Usuário</a>
          <a href="sair.php" class="btn btn-danger">Sair</a>
          <hr>
        </div>
        <div class="row">
          <div class="col">
            <h2>Cadastros</h2>
          </div>
          <div class="w-100"></div>
          <pre>
              <?php print_r(listar($_SESSION["id"], $limite)) ?>
            </pre>
          <div class="col">
            <?php
            $lista = listar($_SESSION["id"], $limite);
            exibir($lista);
            ?>
          </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>