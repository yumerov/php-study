<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Translator;

define('DEMO_LOCALE', 'de_DE');
define('DEMO_FORMAT', 'yaml');
define('DEMO_FILE', 'messages.de.yml');

$translator = new Translator(DEMO_LOCALE, new MessageSelector());
$translator->addLoader(DEMO_FORMAT, new YamlFileLoader());
$translator->addResource(DEMO_FORMAT, DEMO_FILE, DEMO_LOCALE);
$translator->setFallbackLocales(['en']);

echo $translator->trans('Hello %name%', ['%name%' => 'lzy']);