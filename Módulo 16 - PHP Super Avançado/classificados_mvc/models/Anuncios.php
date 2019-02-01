<?php
class Anuncios extends model
{
    public function getTotalAnuncios($filtros)
    {   

        $filtroString = array("1=1");
        if (!empty($filtros['categoria'])) {
            $filtroString[] = 'id_categoria = :id_categoria';
        }
        if (!empty($filtros['valor'])) {
            $filtroString[] = 'valor BETWEEN :preco1 AND :preco2';
        }
        if (!empty($filtros['depreciacao'])) {
            $filtroString[] = 'depreciacao = :depreciacao';
        }

        $stmt = $this->conn->prepare("SELECT COUNT(*) AS c FROM anuncios WHERE ".implode(' AND ', $filtroString)."");

        if (!empty($filtros['categoria'])) {
            $stmt->bindValue(":id_categoria", $filtros['categoria']);
        }
        if (!empty($filtros['valor'])) {
            $preco = explode('-', $filtros['valor']);
            $stmt->bindValue(":preco1", $preco[0]);
            $stmt->bindValue(":preco2", $preco[1]);
        }
        if (!empty($filtros['depreciacao'])) {
            $stmt->bindValue(":depreciacao", $filtros['depreciacao']);
        }

        $stmt->execute();
        $row = $stmt->fetch();
        return $row['c'];
    }
    
    public function getUltimosAnuncios($page, $perPage, $filtros)
    {
        $array = array();

        $offset = ($page - 1) * $perPage;

        $filtroString = array("1=1");
        if (!empty($filtros['categoria'])) {
            $filtroString[] = 'id_categoria = :id_categoria';
        }
        if (!empty($filtros['valor'])) {
            $filtroString[] = 'valor BETWEEN :preco1 AND :preco2';
        }
        if (!empty($filtros['depreciacao'])) {
            $filtroString[] = 'depreciacao = :depreciacao';
        }
        
        $stmt = $this->conn->prepare("SELECT *,
        (SELECT anuncios_imagens.url FROM anuncios_imagens WHERE anuncios_imagens.id_anuncio = anuncios.id_anuncio limit 1) AS url,
        (SELECT categorias.nome FROM categorias WHERE categorias.id_categoria = anuncios.id_categoria) AS categoria 
        FROM anuncios WHERE ".implode(' AND ', $filtroString)." ORDER BY id_anuncio DESC LIMIT $offset, $perPage");

        if (!empty($filtros['categoria'])) {
            $stmt->bindValue(":id_categoria", $filtros['categoria']);
        }
        if (!empty($filtros['valor'])) {
            $preco = explode('-', $filtros['valor']);
            $stmt->bindValue(":preco1", $preco[0]);
            $stmt->bindValue(":preco2", $preco[1]);
        }
        if (!empty($filtros['depreciacao'])) {
            $stmt->bindValue(":depreciacao", $filtros['depreciacao']);
        }
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function getAnuncio($id_anuncio)
    {   
        $array = array();
        $stmt = $this->conn->prepare("SELECT *, 
        (SELECT categorias.nome 
        FROM categorias 
        WHERE categorias.id_categoria = anuncios.id_categoria) AS categoria 
        FROM anuncios 
        WHERE id_anuncio = :id_anuncio");
        $stmt->bindValue(":id_anuncio", $id_anuncio);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetch();

            $array['fotos'] = array();
            $stmt = $this->conn->prepare("SELECT url, id_anuncio_imagem FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
            $stmt->bindValue(":id_anuncio", $id_anuncio);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $array['fotos'] = $stmt->fetchAll();
            }
        }
        return $array;
    }

    public function getImagens($id_anuncio)
    {
        $array = array();
        $stmt = $this->conn->prepare("SELECT url, id_anuncio_imagem FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
        $stmt->bindValue(":id_anuncio", $id_anuncio);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }

    public function getMeusAnuncios($id_usuario)
    {   
        $array = array();

        $stmt = $this->conn->prepare("SELECT *, 
        (SELECT anuncios_imagens.url 
        FROM anuncios_imagens 
        WHERE anuncios_imagens.id_anuncio = anuncios.id_anuncio limit 1)
        AS url 
        FROM anuncios 
        WHERE id_usuario = :id_usuario");
        
        $stmt->bindValue(":id_usuario", $id_usuario);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $array = $stmt->fetchAll();
        }
        return $array;
    }

    public function addAnuncio($id_usuario, $id_categoria, $titulo, $descricao, $valor, $depreciacao)
    {
        $stmt = $this->conn->prepare("INSERT INTO anuncios (id_usuario, id_categoria, titulo, descricao, valor, depreciacao, data_anuncio) VALUES (:id_usuario, :id_categoria, :titulo, :descricao, :valor, :depreciacao, NOW())");
        $stmt->bindValue(":id_usuario", $id_usuario);
        $stmt->bindValue(":id_categoria", $id_categoria);
        $stmt->bindValue(":titulo", $titulo);
        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":depreciacao", $depreciacao);
        $stmt->execute();
    }

    public function excluirAnuncio($id_anuncio)
    {   
        $stmt = $this->conn->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio");
        $stmt->bindValue(":id_anuncio", $id_anuncio);
        $stmt->execute();

        $stmt = $this->conn->prepare("DELETE FROM anuncios WHERE id_anuncio = :id_anuncio");
        $stmt->bindValue(":id_anuncio", $id_anuncio);
        $stmt->execute();
    }

    public function excluirImagem($id_anuncio_imagem)
    {   
        $stmt = $this->conn->prepare("SELECT * FROM anuncios_imagens WHERE id_anuncio_imagem = :id_anuncio_imagem");
        $stmt->bindValue(":id_anuncio_imagem", $id_anuncio_imagem);
        $stmt->execute();

        $id_anuncio = 0;
        if ($stmt->rowCount() > 0) {
            $info = $stmt->fetch();
            $id_anuncio = $info['id_anuncio'];
            if (is_file("assets/images/anuncios/".$info['url'])) {
                unlink("assets/images/anuncios/".$info['url']);
            }
        }

        $stmt = $this->conn->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio_imagem = :id_anuncio_imagem");
        $stmt->bindValue(":id_anuncio_imagem", $id_anuncio_imagem);
        $stmt->execute();

        return $id_anuncio;
    }

    public function editarAnuncio($id_anuncio, $id_categoria, $titulo, $descricao, $valor, $depreciacao, $fotos)
    {
        $stmt = $this->conn->prepare("UPDATE anuncios SET id_categoria = :id_categoria, titulo = :titulo, descricao = :descricao, valor = :valor, depreciacao = :depreciacao WHERE id_anuncio = :id_anuncio");
        $stmt->bindValue(":id_anuncio", $id_anuncio);
        $stmt->bindValue(":id_categoria", $id_categoria);
        $stmt->bindValue(":titulo", $titulo);
        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":depreciacao", $depreciacao);
        $stmt->execute();

        if (count($fotos["tmp_name"]) > 0) {
            for ($i = 0; $i < count($fotos["tmp_name"]); $i++) {
                $tipo = $fotos["type"][$i];
                if (in_array($tipo, array("image/png", "image/jpeg"))) {
                    // Nome do arquivo
                    $file = md5(rand(0,999).time()).".jpg";
                    $filename = "assets/images/anuncios/".$file;
                    // Salvando o arquivo
                    move_uploaded_file($fotos['tmp_name'][$i], $filename);
                    // Largura e altura máximas
                    $new_width  = 500;
                    $new_height = 200;
                    // Obtendo tamanho original
                    list($old_width, $old_height) = getimagesize($filename);
                    // Calculando proporção
                    $ratio = $old_width / $old_height;
                    if ($new_width / $new_height > $ratio) {
                        $new_width = $new_height * $ratio;
                    } else {
                        $new_height = $new_width / $ratio;
                    }
                    // Gerando uma nova imagem
                    $new_image = imagecreatetruecolor($new_width, $new_height);
                    if ($tipo == 'image/jpeg') {
                        $old_image = imagecreatefromjpeg($filename);
                    } else {
                        $old_image = imagecreatefrompng($filename);
                    }
                    imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
                    // Gerando imagem
                    imagejpeg($new_image, $filename, 80);
                    // Salvando imagem no banco
                    $stmt = $this->conn->prepare("INSERT INTO anuncios_imagens (id_anuncio, url) VALUES (:id_anuncio, :url)");
                    $stmt->bindValue(":id_anuncio", $id_anuncio);
                    $stmt->bindValue(":url", $file);
                    $stmt->execute();
                }
            }
        }
    }

    // Calcula total de páginas
    public function getTotalPaginas($qtd_por_pagina, $total_anuncios)
    {
        $paginas = $total_anuncios / $qtd_por_pagina;
        return $paginas;
    }
}