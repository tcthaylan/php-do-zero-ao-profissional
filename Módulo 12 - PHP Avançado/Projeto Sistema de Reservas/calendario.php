<table width="100%" border="1">
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sab</th>
    </tr>
    <?php
    $i = 0;
    for ($l = 0; $l < $linhas; $l++) { 
        echo "<tr>";
        for ($w = 0; $w < 7; $w++) { 
            $date = date("Y-m-d", strtotime(+$i." days", strtotime($data_inicio)));

            echo "<td>";
            echo $date."<br><br>";
            foreach ($lista as $item) {
                if ($date <= $item["data_fim"] && $date >= $item["data_inicio"]) {
                    echo $item["nome"]."(".$item['id_carro'].")<br>";
                }
            }
            echo "</td>";
            $i++;
        }
        echo "</tr>";
    }
    ?>
</table>