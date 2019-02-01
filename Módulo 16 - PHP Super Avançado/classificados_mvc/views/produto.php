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
        </div>
    </div>
</div>