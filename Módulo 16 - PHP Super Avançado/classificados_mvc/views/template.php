<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Site de Classificados</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
            </div>
            <ul class="navbar-nav">
                <?php if (!empty($_SESSION["id"])):?>
                    <li class="nav-item">
                        <a href="meus-anuncios.php" class="nav-link">Meus Anuncios</a>
                    </li>
                    <li class="nav-item">
                        <a href="sair.php" class="nav-link">Sair</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="cadastre-se.php" class="nav-link">Cadastre-se</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>

    <!-- jQuery, Popper.js and Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
    