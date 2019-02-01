<?php
session_start();
require_once("config.php");

if (isset($_POST["valor"]) && !empty($_POST["valor"])) {
    $tipo = $_POST["tipo"];
    $valor = str_replace(",", ".", $_POST["valor"]);
    $valor = floatval($valor);

    $stmt = $conn->prepare("INSERT INTO historico VALUES (DEFAULT, ?, ?, ?, NOW())");
    $stmt->execute(array(
        $_SESSION["id"],
        $tipo,
        $valor
    ));

    if ($tipo == '0') {
        //Deposito
        $stmt = $conn->prepare("UPDATE contas SET saldo = saldo + ? WHERE id = ?");
        $stmt->execute(array(
            $valor,
            $_SESSION["id"]
        ));

    } else {
        //Saque
        $stmt = $conn->prepare("UPDATE contas SET saldo = saldo - ? WHERE id = ?");
        $stmt->execute(array(
            $valor,
            $_SESSION["id"]
        ));
    }
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transação</title>
</head>
<body>
    <h1>Transação</h1>
    <form method="POST">
        Valor: <br>
        <input type="text" name="valor" required pattern="[0-9.,]{1,}"> <br><br>

        Tipo de transação: <br>
        <select name="tipo" required>
            <option value="0">Deposito</option>
            <option value="1">Saque</option>
        </select>
        <br><br>

        <input type="submit" value="Adicionar">
    </form>
</body>
</html>