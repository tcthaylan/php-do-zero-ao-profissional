<?php
require_once("Banco.php");

$banco = new Banco("blog", "localhost", "root", "");

/*
$banco->query("SELECT * FROM posts");

echo "Quantidade de posts: ".$banco->getNumRows()."<br>";

if ($banco->getNumRows() > 0) {
    foreach ($banco->getResult() as $post) {
        echo "Titulo: ".$post["titulo"]."<br>";
        echo "Corpo: ".$post["corpo"]."<br>";
        echo "<hr>";
    }
} else {
    echo "Não houve resultados.";
}
*/
/*
$banco->insert('posts',
     array(
    'titulo'   => 'Titulo inserido 4',
    'corpo'    => 'corpo4',
    'autor'    => 'tcthaylan4'
));
*/
/*
$banco->query("SELECT * FROM posts");
print_r($banco->getResult());
*/
/*
$banco->update('posts', array('titulo' => 'titulo_teste',), array("id"=>1));
*/
$banco->delete('posts', array('id' => '1'));