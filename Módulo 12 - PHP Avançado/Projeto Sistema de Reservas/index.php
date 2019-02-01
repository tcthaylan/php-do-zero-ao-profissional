<?php
require_once("config.php");
require_once("classes/carros.class.php");
require_once("classes/reservas.class.php");

$r = new Reservas($conn);
?>

<h1>Reservas</h1>
<a href="reservar.php">Adicionar Reserva</a> 
<br><br>

<form method="GET">
    <select name="ano">
        <?php
        for ($i = date("Y"); $i >= 2000; $i--) { 
            echo "<option value='$i'>".$i."</option>";
        }
        ?>
    </select>
    <select name="mes">
        <?php
        for ($i = 1; $i <= 12; $i++) { 
            echo "<option value='$i'>".$i."</option>";
        }
        ?>
    </select>
    <input type="submit" value="Mostrar">
</form>
<hr>
<?php
if (empty($_GET["ano"])) {
    exit;
}

// filtrar com addslashes
$data = addslashes($_GET["ano"].'-'.$_GET["mes"]);
// Dia da semana
$dia1 = date("w", strtotime($data));
// Total de dias
$qtd_dias = date("t", strtotime($data));
// Qtd de linhas do calendario
$linhas = ceil(($dia1 + $qtd_dias) / 7);
// Data inicio
$data_inicio = date("Y-m-d", strtotime(-$dia1."days", strtotime($data)));
// Data fim
$data_fim = date("Y-m-d", strtotime( ( ($dia1 + ($linhas * 7) - 1) ).' days', strtotime($data)) );

$lista = $r->getReservas($data_inicio, $data_fim);
/*
foreach ($lista as $item) {
    $data1 = date("d/m/y", strtotime($item["data_inicio"]));
    $data2 = date("d/m/y", strtotime($item["data_fim"]));
    echo $item["nome"]."  reservou o carro ".$item["id_carro"]." entre ".$data1." e ".$data2.".<br>";
}
*/
?>
<?php
require_once("calendario.php");
?>