<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Usuarios</title>
</head>
<body>

    <?php require_once('config.php');?>

    <a href="adicionar.php">Adicionar Novo Usuario</a>

    <table width="100%">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>

        <?php
        $stmt = $conn->prepare("SELECT * FROM usuarios");

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $usuarios) {
                
                echo "<tr>";
                
                echo "<th>".$usuarios["nome"]."</th>";
                echo "<th>".$usuarios["email"]."</th>";
                echo "<th><a href='editar.php?id=".$usuarios["id"]."'>Editar</a> - <a href='excluir.php?id=".$usuarios["id"]."'>Excluir</a></th>";

                echo "</tr>";
            }
        } 
        ?>
    </table>
</body>
</html>
