<?php 
require_once('pages/header.php');
require_once('classes/anuncios.class.php');
require_once('classes/usuarios.class.php');

if (isset($_GET['id_anuncio']) && !empty($_GET['id_anuncio']))  {
    $id_anuncio = addslashes($_GET['id_anuncio']);
} else {
    header("Location: index.php");
    exit;
}
$a = new Anuncios($conn);
$u = new Usuarios($conn);
$anuncio = $a->getAnuncio($id_anuncio);
$id_usuario = $anuncio['id_usuario'] ;
$usuario = $u->getUsuario($id_usuario);
?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach($anuncio['fotos'] as $key => $item): ?>
                    <div class="carousel-item <?php echo($key == 0)?'active':''; ?>">
                        <img class="d-block w-100" src="assets/images/anuncios/<?php echo $item['url']; ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-8">
            <h1><?php echo $anuncio['titulo'] ?></h1>
            <h4><?php echo $anuncio['categoria'] ?></h4>
            <p><?php echo $anuncio['descricao'] ?></p>
            <br>
            <h3>R$ <?php echo $anuncio['valor'] ?></h3>
            <h4>Telefone: <?php echo $usuario['telefone'] ?></h4>
        </div>
    </div>
</div>

<?php require_once('pages/footer.php') ?>