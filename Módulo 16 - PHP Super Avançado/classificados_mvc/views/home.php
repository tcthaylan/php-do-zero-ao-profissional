<div class="container-fluid">
    <div class="jumbotron mt-3">
        <h1>Nós temos hoje <?php echo $total_anuncios ?> anúncios</h1>
        <p class="lead">E mais de <?php echo $total_usuarios ?> usuários cadastrados</p>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <h4>Pesquisa Avançada</h4>
            <form method="GET">
                <div class="form-group">
                    <label for="categoria">Categoria: </label>
                    <select name="filtros[categoria]" id="categoria" class="form-control">
                        <option></option>
                        <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id_categoria'] ?>" <?php echo($filtros['categoria'] == $categoria['id_categoria'])? 'selected="selected"':''; ?> ><?php echo $categoria['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="valor">Preço: </label>
                    <select name="filtros[valor]" id="valor" class="form-control">
                        <option></option>
                        <option value="0-50" <?php echo($filtros['valor'] == '0-50')?'selected="selected"':'';?>>R$ 0 - 50</option>
                        <option value="51-100" <?php echo($filtros['valor'] == '51-100')?'selected="selected"':'';?>>R$ 51 - 100</option>
                        <option value="101-200" <?php echo($filtros['valor'] == '101-200')?'selected="selected"':'';?>>R$ 101 - 200</option>
                        <option value="201-500" <?php echo($filtros['valor'] == '201-500')?'selected="selected"':'';?>>R$ 201 - 500</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="depreciacao">Estado de Conservação: </label>
                    <select name="filtros[depreciacao]" id="depreciacao" class="form-control">
                        <option></option>
                        <option value="1" <?php echo($filtros['depreciacao'] == '1')?'selected="selected"':'';?>>Novo</option>
                        <option value="2" <?php echo($filtros['depreciacao'] == '2')?'selected="selected"':'';?>>Seminovo</option>
                        <option value="3" <?php echo($filtros['depreciacao'] == '3')?'selected="selected"':'';?>>Usado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info">Buscar</button>
            </form>
        </div>
        <div class="col-sm-9">
            <h4>Últimos Anuncios</h4>
            <table class="table table-striped">
                    <?php foreach ($anuncios as $anuncio): ?>
                        <tr>
                            <td>
                                <?php if (!empty($anuncio['url'])): ?>
                                <td><img src="assets/images/anuncios/<?php echo $anuncio['url'] ?>" width='30'"></td>
                                <?php else: ?>
                                <td><img src="assets/images/default.jpg" width="30"></td>
                                <?php endif; ?>
                            </td>
                            <td><a href="produto/abrir/<?php echo $anuncio['id_anuncio'] ?>"><?php echo $anuncio['titulo'] ?></a><br>
                                <?php echo $anuncio['categoria'] ?>
                            </td>
                            <td>R$ <?php echo $anuncio['valor'] ?></td>
                        </tr>
                    <?php endforeach;?>
            </table>
            <nav>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $paginas; $i++): ?>
                    <li class="page-item <?php echo($p == $i)?'active':''; ?>">
                        <a href="index.php?<?php 
                        $url = $_GET; 
                        $url['p'] = $i;
                        echo http_build_query($url);
                        ?>" class="page-link"><?php echo $i ?></a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>