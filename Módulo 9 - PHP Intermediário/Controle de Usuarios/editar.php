<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
</head>
<body>
    <?php 

    require_once("config.php");

    if (isset($_GET["id"]) && empty($_GET) == false) {
        
        $id = $_GET["id"];

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");

        $stmt->execute(array(
            $id
        ));

        if ($stmt->rowCount() > 0) {
            
            $dado =  $stmt->fetch();

        } else {

            header("Location: index.php");
        }
    } else {

        header("Location: index.php");
    }

    if (isset($_POST["nome"]) && empty($_POST["nome"]) == false) {

        $nome   = addslashes($_POST["nome"]);
        $email  = addslashes($_POST["email"]);
        $senha  = md5(addslashes($_POST["senha"]));
        
        $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");

        $stmt->execute(array(
            $nome,
            $email,
            $senha,
            $id
        ));

        header("Location: index.php");
    }

    ?>
    <h1>Editar Usuario</h1>

    <form method="POST">
        Nome:
        <input type="text" name="nome" required placeholder="<?php echo $dado["nome"]?>">
        <br><br>
        Email:
        <input type="email" name="email" required placeholder="<?php echo $dado["email"]?>">
        <br><br>
        Senha:
        <input type="password" name="senha" required>
        <br><br>
        <input type="submit" value="Editar">
    </form>
</body>
</html>