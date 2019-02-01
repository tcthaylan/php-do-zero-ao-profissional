<?php
$pessoa = array(
    "nome" => "Thaylan Conceição",
    "idade" => 20,
    "país" => "Brasil",
    "estado" => "SP",
    "cidade" => "Mauá"
);

//array_keys — Retorna todas as chaves ou uma parte das chaves de um array
$pessoaKeys = array_keys($pessoa);
print_r($pessoaKeys);

echo "<br><br>";
//array_values — Retorna todos os valores de um array
$pessoaKeys = array_values($pessoa);
print_r($pessoaKeys);

echo "<br><br>";
//array_pop — Extrai um elemento do final do array
array_pop($pessoa);
print_r($pessoa);

echo "<br><br>";
//array_shift — Retira o primeiro elemento de um array
array_shift($pessoa);
print_r($pessoa);

echo "<br><br>";
//asort — Ordena um array mantendo a associação entre índices e valores
//arsort - Ordena um array em ordem descrescente mantendo a associação entre índices e valores

//count — Conta o número de elementos de uma variável, ou propriedades de um objeto

//in_array — Checa se um valor existe em um array
?>