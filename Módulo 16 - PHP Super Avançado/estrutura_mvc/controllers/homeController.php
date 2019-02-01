<?php
class homeController extends controller
{
    public function index()
    {   
        $u = new Usuarios();
        $a = new Anuncios();

        $dados = array(
            'nome'          => $u->getNome(),
            'idade'         => $u->getIdade(),
            'qtd_anuncio'   => $a->getTotalAnuncios()
        );
        $this->loadTemplate('home', $dados);
    }
}