<?php
session_start();
require_once("config.php");
require_once("Language.class.php");

if (!empty($_GET["lang"])) {
    $_SESSION["lang"] = addslashes($_GET["lang"]);
}

$lang = new Language();
?>
<a href="http://localhost/PHP%20do%20zero%20ao%20profissional/prática%20php/revisao%20modulo%2012/Projeto%20Mult-linguagem/index.php?lang=pt-br">Português</a>
<a href="http://localhost/PHP%20do%20zero%20ao%20profissional/prática%20php/revisao%20modulo%2012/Projeto%20Mult-linguagem/index.php?lang=en">English</a>
<hr>
Linguagem selecionada:<?php echo $lang->getLinguagem(); ?>
<hr>
<button><?php $lang->get('BUTTON'); ?></button>
<button><?php $lang->get('CATEGORIA_PHOTOS'); ?></button>
<hr>
<?php print_r($lang->getIni()); ?>
<hr>
<?php print_r($lang->getBd()); ?>