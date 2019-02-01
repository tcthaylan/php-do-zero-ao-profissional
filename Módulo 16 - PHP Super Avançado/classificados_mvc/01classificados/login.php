<?php require_once('pages/header.php'); ?>
<div class="container">
    <h1>Login</h1>
    <?php
    require_once('classes/usuarios.class.php');
    $u = new Usuarios($conn);

    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email  = addslashes($_POST["email"]);
        $senha  = $_POST["senha"];

        if (!empty($_POST["email"]) && !empty($_POST["senha"])) {
            if ($u->login($email, $senha)) {
                header("Location: index.php");
                exit;
            } else {
                ?>
                <div class="alert alert-danger">
                    E-mail e/ou senha incorreto(s)!
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-warning">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    ?>
    <form method=POST>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input class="form-control" id="email" type="email" name="email">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input class="form-control" id="senha" type="password" name="senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<?php require_once('pages/footer.php'); ?>