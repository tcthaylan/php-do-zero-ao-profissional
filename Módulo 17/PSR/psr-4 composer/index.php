<?php

require __DIR__.'/vendor/autoload.php';

$client = new LojaB7Web\Clients\ClientStore();
$product = new LojaB7Web\Products\ProductsControl();

echo $client->getClient();
echo $product->getProduct();
