<?php
require_once("config.php");
require_once("classes/carros.class.php");
require_once("classes/reservas.class.php");

$c = new Carros($conn);
$r = new Reservas($conn);

if (!empty(($_POST["nome"]))) {
    $id_carro       = addslashes($_POST["id_carro"]);
    $data_inicio    = addslashes($_POST["data_inicio"]);
    $data_fim       = addslashes($_POST["data_fim"]);
    $nome_pessoa    = addslashes($_POST["nome"]);

    if ($r->estaDisponivel($id_carro, $data_inicio, $data_fim)) {
        echo "Carro disponível";
        $r->reservar($id_carro, $data_inicio, $data_fim, $nome_pessoa);
        header("Location: index.php");
        exit;
    } else {
        echo "Carra já está reservado!";
    }
}
?>

<h1>Reservar</h1>
<form method="POST">
    Carro: <br>
    <select name="id_carro" required>
        <?php
        $lista = $c->getCarros();
        foreach ($lista as $item) {
            echo "<option value=".$item['id'].">".$item["nome"]."</option>";
        }
        ?>
    </select>
    <br><br>
    Data de Inicio: <br>
    <input type="date" name="data_inicio" required><br><br>
    Data de Fim: <br>
    <input type="date" name="data_fim" required><br><br>
    Nome da Pessoa: <br>
    <input type="text" name="nome" required><br><br>
    <input type="submit" value="Reservar">
</form>
<a href="index.php">Voltar</a>