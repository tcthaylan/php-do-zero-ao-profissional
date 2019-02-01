<?php
class Calculadora
{
    private $numeroInicial;

    public function __construct($n)
    {
        $this->numeroInicial = $n;
    }

    public function somar($n)
    {
        $this->numeroInicial += $n;
        return $this;
    }

    public function subtrair($n)
    {
        $this->numeroInicial -= $n;
        return $this;
    }

    public function multiplicar($n)
    {
        $this->numeroInicial *=  $n;
        return $this;
    }

    public function dividir($n)
    {
        $this->numeroInicial /= $n;
        return $this;
    }

    public function resultado()
    {
        return $this->numeroInicial;
    }
}

$calculadora = new Calculadora(10);
$calculadora->somar(2)->subtrair(3)->multiplicar(5)->dividir(2); // Retornando o próprio objeto.
$resultado = $calculadora->resultado();
echo $resultado;
