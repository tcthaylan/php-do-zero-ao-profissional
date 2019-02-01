<?php
require_once('config.php');
        
if (isset($_POST["sexo"]) && $_POST["sexo"] != '') {
    $sexo = addslashes($_POST["sexo"]);
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE sexo = ?");
    $stmt->execute(array($sexo));
    $info = $stmt->fetchAll();
} else {
    $sexo = "";
    $stmt = $conn->query("SELECT * FROM usuarios");
    $info = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Filtro em tabela</title>
</head>
<body>
    <h1>Filtro em Tabela</h1>
    <form method="POST">
        <select name="sexo">
            <option></option>
            <option value="0" <?php echo($sexo == "0")?"selected='selected'":''; ?>>Masculino</option>
            <option value="1" <?php echo($sexo == "1")?"selected='selected'":''; ?>>Feminino</option>
        </select>
        <input type="submit" value="Filtrar">
    </form>
    <br>
    <table border="1" width="600">
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Idate</th>
        </tr>
        <?php
        $sexos = array("0" => "Masculino", "1" => "Feminino");
        foreach ($info as $value) {
            echo "<tr>";
            echo "<td>".$value["nome"]."</td>";
            echo "<td>".$sexos[$value["sexo"]]."</td>";
            echo "<td>".$value["idade"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>