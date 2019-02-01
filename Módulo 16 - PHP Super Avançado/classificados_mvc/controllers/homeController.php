<?php
class homeController extends controller
{
    public function index()
    {   
        $dados = array();

        $a = new Anuncios();
        $u = new Usuarios();
        $c = new Categorias();

        $filtros = array(
            'categoria' => '',
            'valor' => '',
            'depreciacao' => ''
        );

        if (isset($_GET['filtros'])) {
            $filtros = $_GET['filtros'];
        }

        $total_usuarios = $u->getTotalUsuarios();
        $total_anuncios = $a->getTotalAnuncios($filtros);

        // Paginação
        $qtd_por_pagina = 2;
        $p = 1;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $paginas =  $a->getTotalPaginas($qtd_por_pagina, $total_anuncios); 

        $anuncios = $a->getUltimosAnuncios($p, $qtd_por_pagina, $filtros);
        $categorias = $c->getCategorias();

        $dados['total_usuarios']    = $total_usuarios;
        $dados['total_anuncios']    = $total_anuncios;
        $dados['categorias']        = $categorias;
        $dados['filtros']           = $filtros;
        $dados['anuncios']          = $anuncios;
        $dados['paginas']           = $paginas;

        $this->loadTemplate('home', $dados);
    }
}