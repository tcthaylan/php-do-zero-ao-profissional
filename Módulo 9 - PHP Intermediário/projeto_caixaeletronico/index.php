<?php
session_start();
require_once("config.php");

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
} else {
    $stmt = $conn->prepare("SELECT * FROM contas WHERE id = ?");
    $stmt->execute(array($_SESSION["id"]));
    if ($stmt->rowCount() > 0) {
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caixa Eletônico</title>
</head>
<body>
    <h1>Banco XYZ</h1>
    Titular: <?php echo $info["titular"]?> <br>
    Agência: <?php echo $info["agencia"]; ?> <br>
    Conta: <?php echo $info["conta"]; ?> <br>
    Saldo: <?php echo $info["saldo"]?> <br>
    <a href="sair.php">Sair</a>
    <hr>
    <h3>Movimentação/Extrato</h3>

    <a href="add-transacao.php">Adicionar Transação</a> <br>

    <table border="1" width="400">
        <tr>
            <th>Data</th>
            <th>Valor</th>
        </tr>
        <?php
        $stmt = $conn->prepare("SELECT * FROM historico WHERE id_conta = ?");
        $stmt->execute(array($_SESSION["id"]));
        if ($stmt->rowCount() > 0) {

            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $value) {
                echo "<tr>";
                echo "<th>".date("d/m/Y H:i", strtotime($value["data_operacao"]))."</th>";
                if ($value["tipo"] == 0) {
                    echo "<th style='color:green;'>R$ ".$value["valor"]."</th>";
                } else {
                    echo "<th style='color:red;'>- R$ ".$value["valor"]."</th>";
                }
                echo "</tr>";    
            }
        }
        ?>
    </table>
</body>
</html>