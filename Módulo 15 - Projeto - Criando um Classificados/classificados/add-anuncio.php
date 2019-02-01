<?php require_once('pages/header.php'); ?>
<?php
if (empty($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

require_once('classes/anuncios.class.php');
$a = new Anuncios($conn);
if (isset($_POST["titulo"]) && !empty($_POST["titulo"])) {
    $id_categoria   = addslashes($_POST["categoria"]);
    $titulo         = addslashes($_POST["titulo"]);
    $descricao      = addslashes($_POST["descricao"]);
    $valor          = addslashes(number_format($_POST["valor"], 2));
    $depreciacao    = addslashes($_POST["depreciacao"]);
    
    if (!empty($_POST["titulo"]) && !empty($_POST["valor"]) && !empty($_POST["categoria"]) && !empty($_POST["depreciacao"])) {
        $a->addAnuncio($_SESSION["id"], $id_categoria, $titulo, $descricao, $valor, $depreciacao);
        ?>
        <div class="alert alert-success">
            Produto adicionado com sucesso.
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
?>
<div class="container">
    <h1>Meus Anúncios - Adicionar Anúncio</h1>
    <form method="POST">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="custom-select">
                <?php
                require_once('classes/categorias.class.php');
                $c = new Categorias($conn);
                $categorias = $c->getCategorias();
                foreach ($categorias as $categoria):
                    ?>
                    <option value="<?php echo $categoria["id_categoria"]; ?>"><?php echo $categoria["nome"] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" id="titulo" name="titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input class="form-control" type="number" id="valor" name="valor">
        </div>
        <div class="form-group">
            <label for="depreciacao">Estado de Conservação:</label>
            <select name="depreciacao" id="depreciacao" class="custom-select">
                <option value="1">Novo</option>
                <option value="2">Seminovo</option>
                <option value="3">Usado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar Anúncio</button>
    </form>
</div>
<?php require_once('pages/footer.php'); ?>