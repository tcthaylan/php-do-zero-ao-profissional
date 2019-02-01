<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Novo Usuario</title>
</head>
<body>

    <?php require_once('config.php'); ?>

    <?php 
    
    if (isset($_POST["nome"]) && empty($_POST["nome"]) == false) {
        
        $nome   = addslashes($_POST["nome"]);
        $email  = addslashes($_POST["email"]);
        $senha  = md5(addslashes($_POST["senha"]));

        try {

            $stmt = $conn->prepare("INSERT INTO usuarios VALUES (DEFAULT, ?, ?, ?)");
    
            $stmt->execute(array(
                $nome,
                $email,
                $senha
            ));
    
           header("Location: index.php");
    
        } catch (PDOException $e) {
    
            echo "Falhou: ".$e->getMessage();
        }

    } 
    

    ?>

    <h1>Adicionar Novo Usuario</h1>

    <form method="POST">
        Nome:
        <input type="text" name="nome">
        <br><br>
        Email:
        <input type="email" name="email">
        <br><br>
        Senha:
        <input type="password" name="senha">
        <br><br>
        <input type="submit" value="Adicionar">
    </form>

    <br>
    <a href="index.php">Voltar</a>

</body>
</html>