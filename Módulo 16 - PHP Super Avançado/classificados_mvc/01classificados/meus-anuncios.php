<?php require_once('pages/header.php'); ?>
<?php
if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
?>
<div class="container">
    <h1>Meus Anúncios</h1>
    <a href="add-anuncio.php" class="btn btn-info">Adicionar Anúncio</a>
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('classes/anuncios.class.php');
            $a = new Anuncios($conn);
            $meusAnuncios = $a->getMeusAnuncios($_SESSION["id"]);
            foreach ($meusAnuncios as $anuncio):
                ?>
                <tr>
                    <?php if (!empty($anuncio['url'])): ?>
                    <td><img src="assets/images/anuncios/<?php echo $anuncio['url'] ?>" width='30'"></td>
                    <?php else: ?>
                    <td><img src="assets/images/default.jpg" width="30"></td>
                    <?php endif; ?>
                    <td><?php echo $anuncio["titulo"]; ?></td>
                    <td><?php echo number_format($anuncio["valor"], 2); ?></td>
                    <td><a href="editar-anuncio.php?id_anuncio=<?php echo $anuncio['id_anuncio']; ?>" class="btn btn-primary">Editar</a> <a href="excluir-anuncio.php?id_anuncio=<?php echo $anuncio['id_anuncio']; ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<?php require_once('pages/footer.php'); ?>