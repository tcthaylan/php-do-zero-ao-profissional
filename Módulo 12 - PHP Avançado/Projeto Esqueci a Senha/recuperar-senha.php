<?php
require_once("config.php");

if (isset($_GET["hash"]) && !empty($_GET["hash"])) {
    $hash = addslashes($_GET["hash"]);

    $stmt = $conn->prepare("SELECT * FROM usuarios_token WHERE hash = ? AND used = 0 AND expirado_em > NOW()");
    $stmt->execute(array($hash));
    if ($stmt->rowCount() > 0) {
        $info = $stmt->fetch();
        if (isset($_POST["senha"]) && !empty($_POST["senha"])) {
            $senha = md5(addslashes($_POST["senha"]));

            $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
            $stmt->execute(array(
                $senha,
                $info["id_usuario"]
            ));

            $stmt = $conn->prepare("UPDATE usuarios_token SET used = 1 WHERE hash = ?");
            $stmt->execute(array(
                $hash
            ));

            echo "Senha alterada com sucesso! <br>";
            echo "<a href='login.php'>Acessar minha conta</a>";
            exit;
        }

    } else {
        echo "Hash inválido ou usado!";
        exit;
    }


} else {
    echo "Hash inválido...";
    exit;
}

?>
<h1>Trocar Senha</h1>
<form method="POST">
    Insira uma nova senha: <br>
    <input type="text" name="senha"> <br><br>
    <input type="submit" value="Trocar senha">
</form>