<?php
session_start();
$_SESSION["captcha"] = rand(1000, 9999);
?>
<img src="imagem.php" width="100" height="50">