<?php
class produtoController extends controller
{
    public function index()
    {

    }
    public function abrir($id_anuncio)
    {
        $dados = array();

        $a = new Anuncios();
        $u = new Usuarios();

        if (empty($id_anuncio))  {
            header("Location: index.php");
            exit;
        }

        $anuncio = $a->getAnuncio($id_anuncio);

        $id_usuario = $anuncio['id_usuario'];
        $usuario = $u->getUsuario($id_usuario);

        $dados['anuncio'] = $anuncio;
        $dados['usuario'] = $anuncio;

        $this->loadTemplate('produto', $dados);
    }
}