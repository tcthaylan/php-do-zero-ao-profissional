<?php require_once('pages/header.php'); ?>
<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    require_once('classes/usuarios.class.php');
    $u = new Usuarios($conn);

    if (isset($_POST["nome"]) && !empty($_POST["nome"])) {
        $nome       = addslashes($_POST["nome"]);
        $email      = addslashes($_POST["email"]);
        $senha      = $_POST["senha"];
        $telefone   = addslashes($_POST["telefone"]);

        if (!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) {
            if ($u->cadastrar($nome, $email, $senha, $telefone)) {
                ?>
                <div class="alert alert-success">
                    <strong>Parabéns!</strong> Cadastrado com sucesso.<a href="login.php" class="alert-link"> Faça o login agora</a>
                </div>
                <?php
            } else {
                ?>
                <div class="alert alert-warning">
                    Este e-mail já existe. <a href="login.php" class="alert-link"> Faça o login agora</a>
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
            <label for="nome">Nome:</label>
            <input class="form-control" id="nome" type="text" name="nome" autofocus>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input class="form-control" id="email" type="email" name="email">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input class="form-control" id="senha" type="password" name="senha">
        </div>
        <div class="form-group">
            <label for="senha">Telefone (opcional):</label>
            <input class="form-control" id="senha" type="text" name="telefone">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
<?php require_once('pages/footer.php'); ?>