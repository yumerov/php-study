<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';
require PATH_PREFIX . 'LzyExpressionLanguageProvider.php';

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

$language = new ExpressionLanguage(NULL, [
  new LzyExpressionLanguageProvider()
]);

echo $language->evaluate('lzy_trim("    hello    ")') . "\n";
echo $language->evaluate('lzy_md5("qwerty")') . "\n";