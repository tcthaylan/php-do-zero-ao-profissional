<?php

//md5 — Calcula o "hash MD5" de uma string, não é reversível.
$senha = "123";
$senhaCripto = md5($senha);

echo $senha . "<br>";
echo $senhaCripto;

//base64_encode — Codifica dados com MIME base64
//base64_decode — Decodifica dados codificados com MIME base64
?>