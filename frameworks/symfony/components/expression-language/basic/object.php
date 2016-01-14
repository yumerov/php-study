<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';

require PATH_PREFIX . 'Object.php';

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

$object = new Object();
$object->width = 124;

$language = new ExpressionLanguage();

var_dump($language->evaluate("object.width", ['object' => $object]));

