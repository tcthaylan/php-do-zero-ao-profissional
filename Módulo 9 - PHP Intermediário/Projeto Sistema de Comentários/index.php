<?php

try {

    $conn = new PDO("mysql:dbname=projeto_comentarios;host=localhost", "root", "");

} catch (PDOException $e) {

    echo "Conexão falhou: ".$e->getMessage();
    exit;
}

if (isset($_POST["nome"]) && !empty($_POST["nome"])) {
    
    $nome       = addslashes($_POST["nome"]);
    $mensagem   = addslashes($_POST["mensagem"]);

    $stmt = $conn->prepare("INSERT INTO mensagens VALUES (DEFAULT, DEFAULT, ?, ?)");

    $stmt->execute(array(
        $nome,
        $mensagem
    ));

    header("Location: index.php");
}
?>

<fieldset>
    <form method="POST">
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Mensagem: <br>
        <textarea name="mensagem"></textarea> <br><br>
        <input type="submit" value="Enviar Mensagem">
    </form>
</fieldset>
<br>

<?php

$stmt = $conn->prepare("SELECT nome, msg, data_msg FROM mensagens ORDER BY data_msg DESC");

$stmt->execute();

if ($stmt->rowcount() > 0) {
    
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $msg) {
        
        echo "<strong>".$msg["nome"]."</strong>";
        echo "<br>";
        echo $msg["msg"]."<br>";
        echo "Postado: ".date("d/m/Y \a\s H:i:s", strtotime($msg["data_msg"]));
        echo "<hr>";
    }
} else {

    echo "Não há mensagens";
}

?>