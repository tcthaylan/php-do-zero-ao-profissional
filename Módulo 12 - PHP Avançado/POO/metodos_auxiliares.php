<?php
class Post 
{
    private $titulo;
    private $data;
    private $corpo;
    private $comentarios;
    private $qtdComentarios;

    public function getTitulo() 
    {
        return $this->titulo;
    }

    public function setTitulo($t) 
    {
        if (is_string($t)) {
            $this->titulo = $t;
        }
    }

    public function addComentario($msg)
    {
        $this->comentarios[] = $msg;
        $this->contarComentarios();
    }

    public function getComentario()
    {
        return $this->comentarios;
    }

    public function getQuantosComentarios() 
    {
        return $this->qtdComentarios;
    }

    private function contarComentarios() 
    {
        $this->qtdComentarios = count($this->comentarios);
    }
}

$postagem = new Post();

$postagem->addComentario("mensagem 1");
$postagem->addComentario("mensagem 2");
$postagem->addComentario("mensagem 3");

echo $postagem->getQuantosComentarios();

print_r($postagem->getComentario());
?>
