<?php
class Pessoa
{   
    private $nome;
    private $idade;

    private function __construct()
    {

    }

    public static function getInstance() 
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Pessoa();
        }
        return $instance;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($n)
    {
        $this->nome = $n;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($i)
    {
        $this->idade = $i;
    }
}

$pessoa1 = Pessoa::getInstance();
$pessoa1->setNome('Thaylan');

$pessoa2 = Pessoa::getInstance();
$pessoa2->setIdade(21);

echo 'Nome: '.$pessoa2->getNome();
echo '<br>';
echo 'Idade: '.$pessoa1->getIdade();