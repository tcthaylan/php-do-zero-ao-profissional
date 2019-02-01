<?php
class galeriaController extends controller
{
    public function index()
    {
        $dados = array(
            'qtd_fotos' => 21
        );

        $this->loadTemplate('galeria', $dados);
    }
}