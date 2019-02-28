<?php
class homeController extends Controller {

    public function index() {
        $data = array(
            'modulos' => array(),
            'aulas'   => array()
        );

        $m = new Modulos();
        $data['modulos'] = $m->getModulos();

        $this->loadTemplate('home', $data);
    }

    public function pegar_aulas()
    {
        if (!empty($_POST['modulo'])) {
            $modulo = addslashes($_POST['modulo']);

            $a = new Aulas();
            $aulas = $a->getAulasByModulo($modulo);

            echo json_encode($aulas);
            exit;
        }
    }
}