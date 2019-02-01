<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Pesquisa em várias colunas</title>
</head>
<body>
    <h1>Digite o email ou cpf do usuário</h1>
    <form method="GET">
        Email ou cpf <br>
        <input type="text" name="campo"> 
        <input type="submit" value="Pesquisar">
    </form>
    <hr>
    <?php
    if (!empty($_GET["campo"])) {
        require_once("config.php");
        $campo = addslashes($_GET["campo"]);
        
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email OR cpf = :cpf");
        $stmt->bindValue(":email", $campo);
        $stmt->bindValue(":cpf", $campo);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetch();

            echo "Nome: ".$info["nome"];
        } else {
            echo "Cpf ou email inválido";
        }
        
    }
    ?>
    
</body>
</html>