<?php
// Faz requisições a outro sites e sistemas (integrações).

// Iniciando a biblioteca
$ch = curl_init();

// Informar o endereço(url) da requisição, qual endereço vai requisitar
curl_setopt($ch, CURLOPT_URL, "http://www.checkitout.com.br/wb/pingpong");

// Qual o método de envio.
curl_setopt($ch, CURLOPT_POST, 1);

// Quais os campos qe eu vou enviar
curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=thaylan&sexo=masculino&idade=20");

// Indicando que eu quero receber os resultados (resposta).
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Executando e recebendo
$resposta = curl_exec($ch);

// Fecha a conexão
curl_close($ch);

print_r($resposta);
?>