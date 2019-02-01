<?php
require 'Sobre1.php';
require 'Sobre2.php';

use aplicacao\v2\Sobre;

$sobre = new Sobre();
echo $sobre->getVersao();