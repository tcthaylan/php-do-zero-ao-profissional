<?php
require_once('config.php');
require_once('classes/filmes.class.php');
$f = new Filmes($conn);
$filmes = $f->getFilmes();

if (count($filmes) > 0) {
    foreach ($filmes as $value): 
        ?>
        <fieldset>
            <strong><?php echo $value["titulo"] ?></strong><br>
            <?php
            for ($i = 0; $i < 5; $i++):
                ?>
                <a href="votar.php?id_filme=<?php echo $value["id"]?>&nota=<?php echo $i + 1 ?>"><img src="star.png" height="20"></a>
                <?php
            endfor;
            echo '('.number_format($value["media"], 2).')';
            ?>
        </fieldset>
        <?php
    endforeach;
} else {
    echo "Não há filmes cadastrados!";
}