<?php

require 'Product.php';
require 'Order';
require 'ProductOrderFacade.php';

$product = new Product();
$productOrderFacade = new ProductOrderFacade($product);
$productOrderFacade->generateOrder();
$order = $productOrderFacade->getOrder();
$order->send();