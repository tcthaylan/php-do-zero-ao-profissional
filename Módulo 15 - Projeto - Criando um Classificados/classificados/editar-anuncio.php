<?php
require_once('pages/header.php');
require_once('classes/anuncios.class.php');
$a = new Anuncios($conn);

if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET["id_anuncio"]) && !empty($_GET["id_anuncio"])) {
    $id_anuncio = addslashes($_GET["id_anuncio"]);
} else {
    header("Location: meus-anuncios.php");
    exit;
}

if (isset($_POST["titulo"]) && !empty($_POST["titulo"])) {
    $id_categoria   = addslashes($_POST["categoria"]);
    $titulo         = addslashes($_POST["titulo"]);
    $descricao      = addslashes($_POST["descricao"]);
    $valor          = addslashes(number_format($_POST["valor"], 2));
    $depreciacao    = addslashes($_POST["depreciacao"]);
    if (isset($_FILES["fotos"])) {
        $fotos = $_FILES["fotos"];
    } else {
        $fotos = array();
    }

    if (!empty($_POST["titulo"]) && !empty($_POST["valor"]) && !empty($_POST["categoria"]) && !empty($_POST["depreciacao"])) {
        $a->editarAnuncio($id_anuncio, $id_categoria, $titulo, $descricao, $valor, $depreciacao, $fotos);
        header("Location: editar-anuncio.php?id_anuncio=".$id_anuncio);
        ?>
        <div class="alert alert-success">
            Produto editado com sucesso.
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-warning">
            Preencha todos os campos.
        </div>
        <?php
    }
}
$anuncio = $a->getAnuncio($id_anuncio);
?>
<div class="container">
    <h1>Meus Anúncios - Editar Anúncio</h1>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="custom-select">
                <?php
                require_once('classes/categorias.class.php');
                $c = new Categorias($conn);
                $categorias = $c->getCategorias();
                foreach ($categorias as $categoria):
                    ?>
                    <option value="<?php echo $categoria["id_categoria"]; ?>" <?php echo($anuncio["id_categoria"] == $categoria["id_categoria"])?"selected='selected'":''; ?>><?php echo $categoria["nome"] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" id="titulo" name="titulo" value="<?php echo $anuncio['titulo'] ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"><?php echo $anuncio['descricao'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input class="form-control" type="number" id="valor" name="valor" value="<?php echo $anuncio['valor'] ?>">
        </div>
        <div class="form-group">
            <label for="depreciacao">Estado de Conservação:</label>
            <select name="depreciacao" id="depreciacao" class="custom-select">
                <option value="1" <?php echo($anuncio["depreciacao"] == '1')?"selected='selected'":''; ?>>Novo</option>
                <option value="2" <?php echo($anuncio["depreciacao"] == '2')?"selected='selected'":''; ?>>Seminovo</option>
                <option value="3" <?php echo($anuncio["depreciacao"] == '3')?"selected='selected'":''; ?>>Usado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fotos">Adicionar fotos:</label><br>
            <input id="fotos" type="file" name="fotos[]" multiple>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Fotos do Anúncio
            </div>
            <div class="card-body card-body-flex">
                <?php foreach ($anuncio['fotos'] as $anuncio): ?>
                    <div class="foto_item">
                        <img src="<?php echo "assets/images/anuncios/".$anuncio['url']; ?>" class="img-thumbnail"><br>
                        <a href="excluir-imagem.php?id_anuncio_imagem=<?php echo $anuncio['id_anuncio_imagem'] ?>" class="btn btn-outline-danger">Excluir Imagem</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<?php require_once('pages/footer.php'); ?>